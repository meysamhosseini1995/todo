<?php


namespace App\Repositories;

use App\Contracts\TodoRepositoryContract;
use App\Models\Todo;
use Illuminate\Http\Request;
class TodoRepository extends Repository implements TodoRepositoryContract
{
    /**
     * BaseRepository constructor.
     *
     * @param mixed $model
     */
    public function __construct(Todo $model)
    {
        $this->model = $model;
    }


    public function filter(Request $request): static
    {
        if ($request->exists('is_completed')){
            $this->model = $this->model->where(['is_completed'=>$request->get('is_completed')]);
        }
        return $this;
    }
}
