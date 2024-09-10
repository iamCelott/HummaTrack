<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AboutInterface;
use App\Contracts\Interfaces\KanbanInterface;
use App\Models\About;
use App\Models\Kanban;
use App\Models\Task;
use App\Services\KanbanService;
use Illuminate\Http\Request;

class KanbanRepository extends BaseRepository implements KanbanInterface
{
    protected $service;
    /**
     * Method __construct
     *
     * @param Kanban $kanban [explicite description]
     * @param KanbanService $service
     *
     * @return void
     */
    public function __construct(Kanban $kanban, KanbanService $service)
    {
        $this->model = $kanban;
        $this->service = $service;
    }
    /**
     * Method search
     *
     * @param Request $request [explicite description]
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->all();
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
