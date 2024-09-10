<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AboutInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Models\About;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectRepository extends BaseRepository implements ProjectInterface
{
    protected $service;
    /**
     * Method __construct
     *
     * @param Project $project [explicite description]
     * @param ProjectService $service
     *
     * @return void
     */
    public function __construct(Project $project, ProjectService $service)
    {
        $this->model = $project;
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
        })->get();
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
        if (isset($data['image'])) {
            $data['image'] = $this->service->handleImageImage($data['image'], 'project_images');
        }

        $project = $this->model->query()->create($data);

        // $this->service->create_kanban($project->name, $project->id, $project->descriptiom);

        return $this->service->create_kanban($project->name, $project->id, $project->descriptiom);
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
        $project = Project::find($id);
        if (isset($data['image'])) {
            $data['image'] = $this->service->handleUpdateImage($data['image'], $project->image, 'project_images');
        }
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
        $project = $this->show($id);
        $this->service->handleDeleteImage($project->image);
        return $this->show($id)->delete();
    }
}
