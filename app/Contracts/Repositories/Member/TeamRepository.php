<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TeamInterface;
use App\Models\Team;
use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamRepository extends BaseRepository implements TeamInterface
{
    protected $service;
    /**
     * Method __construct
     *
     * @param Team $team [explicite description]
     * @param TeamService $service
     *
     * @return void
     */
    public function __construct(Team $team, TeamService $service)
    {
        $this->model = $team;
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
        return $this->model->query()->when($search, function ($query) use ($search) {
            $query->whereLike('name', '%' . $search . '%');
        })->latest()->paginate();
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
        return $this->model->query()->create($data);
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
    