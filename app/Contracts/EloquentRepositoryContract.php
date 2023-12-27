<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use InvalidArgumentException;

interface EloquentRepositoryContract
{

    /**
     * @param array $relations
     * @return Collection
     */
    public function all(array $relations = []): Collection;

    /**
     * Paginate the given query.
     *
     * @param array $relations
     * @return LengthAwarePaginator
     *
     * @throws InvalidArgumentException
     */
    public function paginate(array $relations = []): LengthAwarePaginator;


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
    ): ?Model;


    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model|null
     */
    public function create(array $payload): ?Model;

    /**
     * Update existing model.
     *
     * @param int|Model $model
     * @param array $payload
     * @return Model|null
     */
    public function update(int|Model $model, array $payload): ?Model;


    /**
     * Delete model by id.
     *
     * @param int|Model $model
     * @return bool
     */
    public function deleteById(int|Model $model): bool;
}
