<?php

namespace App\Contracts\Repositories\Member;

use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\Team;
use App\Models\User;
use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamRepository extends BaseRepository implements TeamInterface
{
    protected $service;
    protected $user;
    /**
     * Method __construct
     *
     * @param Team $team [explicite description]
     * @param TeamService $service
     *
     * @return void
     */
    public function __construct(Team $team, User $user, TeamService $service)
    {
        $this->model = $team;
        $this->user = $user;
        $this->service = $service;
    }
    /**
     * Method search
     *
     * @param Request $request [explicite description]
     *
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        $search = $request->search;
        $authId = $request->authId;
        return $this->model->query()->when($search, function ($query) use ($search) {
            $query->whereLike('name', '%' . $search . '%');
        })->where('created_by', $authId)->latest()->paginate(10);
    }

    /**
     * Method store
     *
     * @param array $data [explicite description]
     *
     * @return mixed
     */
    public function store(array $data): mixed
    {
        $team = $this->model->create([
            'name' => $data['name'],
            'created_by' => $data['created_by'],
            'unique_code' => $this->service->generateCode(),
        ]);

        array_push($data['user_id'], $data['created_by']);
        $userIds = array_map('intval', $data['user_id'] ?? []);

        $syncData = [];
        foreach ($userIds as $user) {
            $syncData[$user] = ['role' => $user == $data['created_by'] ? 'leader' : 'member'];
        }

        if (!empty($userIds)) {
            $team->users()->sync($syncData);
        }

        return $team;
    }

    public function project_search_team(Request $request): mixed
    {
        $search = $request->search;

        return $this->model->with(['users', 'create_by', 'leader'])
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->where('created_by', $request->id)->latest()->get();
    }

    /**
     * Method show
     *
     * @param mixed $id [explicite description]
     *
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }
    /**
     * Method update
     *
     * @param mixed $id [explicite description]
     * @param array $data [explicite description]
     *
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)->update($data);
    }
    /**
     * Method delete
     *
     * @param mixed $id [explicite description]
     *
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->show($id)->delete();
    }
}
