<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use InvalidArgumentException;


abstract class Repository
{
    const perPage = 10;

    protected mixed $model;

    /**
     * @param array $relations
     * @return Collection
     */
    public function all(array $relations = []): Collection
    {
        return $this->model->with($relations)->orderBy('id', 'DESC')->get();
    }

    /**
     * Paginate the given query.
     *
     * @param array $relations
     * @return LengthAwarePaginator
     *
     * @throws InvalidArgumentException
     */
    public function paginate(array $relations = []): LengthAwarePaginator
    {
        return $this->model->with($relations)->orderBy('id', 'DESC')->paginate($this->getPerPage());
    }


    /**
     * Find model by id.
     *
     * @param int $modelId
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Model|null
     */
    public function findById(
        int   $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }


    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model|null
     */
    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    /**
     * Update existing model.
     *
     * @param int|Model $model
     * @param array $payload
     * @return Model|null
     */
    public function update(int|Model $model, array $payload): ?Model
    {
        if (!$model instanceof Model){
            $model = $this->findById($model);
        }
        $model->update($payload);
        return $model->fresh();
    }

    /**
     * Delete model by id.
     *
     * @param int|Model $model
     * @return bool
     */
    public function deleteById(int|Model $model): bool
    {
        if (!$model instanceof Model){
            $model = $this->findById($model);
        }
        $model->delete();
        return true;
    }


    private function getPerPage()
    {
        return request()->exists('perPage') ? request()->input('perPage') : self::perPage;
    }
}
