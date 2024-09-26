<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\DepartmentInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\Department;
use App\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentRepository extends BaseRepository implements DepartmentInterface
{
    protected $service;
    /**
     * Method __construct
     *
     * @param Department $Department [explicite description]
     * @param DepartmentService $service
     *
     * @return void
     */
    public function __construct(Department $department, DepartmentService $service)
    {
        $this->model = $department;
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
        })->orderBy('name','ASC')->paginate(6);
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
    public function get(): mixed
    {
        return $this->model->query()->get();
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
        return $this->model->query()->findOrFail($id)->update($data);
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
         return $this->model->query()->findOrFail($id)->delete();

    }
}
