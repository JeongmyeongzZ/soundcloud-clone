<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    /**
     * @var EloquentRepository
     */
    protected EloquentRepository $repository;

    /**
     * Todo condition to filter class
     *
     * @return Collection
     * @param array $conditions
     */
    public function getAll(array $conditions): Collection
    {
        foreach ($conditions as $condition) {
            $this->repository->where($condition['column'], $condition['value'], $condition['operator'] ?? null);
        }

        return $this->repository->get();
    }

    /**
     * @return Model
     * @param array $conditions
     */
    public function get(array $conditions): Model
    {
        foreach ($conditions as $condition) {
            $this->repository->where($condition['column'], $condition['value'], $condition['operator'] ?? null);
        }

        return $this->repository->first();
    }

    /**
     * @return Model
     * @param $id
     */
    public function find($id): Model
    {
        return $this->repository->find($id);
    }

    /**
     * @param Model $model
     * @param array $attributes
     */
    public function save(Model $model, array $attributes): void
    {
        $this->repository->save($model->fill($attributes));
    }

    /**
     * @return bool|null
     * @throws Exception
     * @param $id
     */
    public function delete($id): ?bool
    {
        return $this->repository->delete($id);
    }
}
