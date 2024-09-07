<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AboutInterface;
use App\Contracts\Interfaces\TaskInterface;
use App\Models\About;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskRepository extends BaseRepository implements TaskInterface
{
    protected $service;
    /**
     * Method __construct
     *
     * @param Task $team [explicite description]
     * @param Taskservice $service
     *
     * @return void
     */
    public function __construct(Task $team, TaskService $service)
    {
        $this->model = $team;
        $this->service = $team;
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
        // $search = $request->search;
        // return $this->model->query()->when($search, function ($query) use ($search) {
        //     $query->whereLike('name', '%' . $search . '%');
        // })->get();

        return $this->model->query()->get();
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
