<?php

declare(strict_types=1);

namespace App\Repositories;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

//todo interface to repository
abstract class EloquentRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @var Builder
     */
    protected Builder $query;

    /**
     * @var int|null
     */
    protected ?int $limit;

    /**
     * @var array
     */
    protected array $with = [];

    /**
     * @var array
     */
    protected array $wheres = [];

    /**
     * @var array
     */
    protected array $whereIns = [];

    /**
     * @var array
     */
    protected array $orderBys = [];

    /**
     * @var array
     */
    protected array $scopes = [];

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        $this->newQuery()->eagerLoad();

        $models = $this->query->get();

        $this->unsetClauses();

        return $models;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->get()->count();
    }

    /**
     * @return Model
     */
    public function first(): Model
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();

        $model = $this->query->first();

        $this->unsetClauses();

        return $model;
    }

    /**
     * @param Model $model
     */
    public function save(Model $model): void
    {
        $model->save();
    }

    /**
     * @return Model
     */
    public function firstOrFail(): Model
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();

        $model = $this->query->firstOrFail();

        $this->unsetClauses();

        return $model;
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();

        $models = $this->query->get();

        $this->unsetClauses();

        return $models;
    }

    /**
     * @return Model
     * @param $id
     */
    public function find($id): Model
    {
        $this->unsetClauses();

        $this->newQuery()->eagerLoad();

        return $this->query->findOrFail($id);
    }

    /**
     * @return Builder|Model|object|null
     * @param $column
     * @param array $columns
     * @param $value
     */
    public function findBy(string $column, $value, array $columns = ['*'])
    {
        $this->unsetClauses();

        $this->newQuery()->eagerLoad();

        return $this->query->where($column, $value)->first($columns);
    }

    /**
     * @return bool|null
     * @throws Exception
     * @param $id
     */
    public function delete($id): ?bool
    {
        $this->unsetClauses();

        return $this->find($id)->delete();
    }

    /**
     * @return $this
     * @param int $limit
     */
    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return $this
     * @param string $direction
     * @param string $column
     */
    public function orderBy(string $column, $direction = 'asc'): self
    {
        $this->orderBys[] = compact('column', 'direction');

        return $this;
    }

    /**
     * @return LengthAwarePaginator
     * @param array $columns
     * @param string $pageName
     * @param null $page
     * @param int $limit
     */
    public function paginate($limit = 25, array $columns = ['*'], $pageName = 'page', $page = null): LengthAwarePaginator
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();

        $models = $this->query->paginate($limit, $columns, $pageName, $page);

        $this->unsetClauses();

        return $models;
    }

    /**
     * @return $this
     * @param mixed $value
     * @param string $operator
     * @param string $column
     */
    public function where(string $column, $value, $operator = '='): self
    {
        $this->wheres[] = compact('column', 'value', 'operator');

        return $this;
    }

    /**
     * Add a simple where in clause to the query.
     *
     * @return $this
     * @param mixed $values
     * @param string $column
     */
    public function whereIn(string $column, $values): self
    {
        $values = is_array($values) ? $values : [$values];

        $this->whereIns[] = compact('column', 'values');

        return $this;
    }

    /**
     * @return $this
     * @param $relations
     */
    public function with($relations): self
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        $this->with = $relations;

        return $this;
    }

    /**
     * @return $this
     */
    protected function newQuery(): self
    {
        $this->query = $this->model->newQuery();

        return $this;
    }

    /**
     * @return $this
     */
    protected function eagerLoad(): self
    {
        foreach ($this->with as $relation) {
            $this->query->with($relation);
        }

        return $this;
    }

    /**
     * @return $this
     */
    protected function setClauses(): self
    {
        foreach ($this->wheres as $where) {
            $this->query->where($where['column'], $where['operator'], $where['value']);
        }

        foreach ($this->whereIns as $whereIn) {
            $this->query->whereIn($whereIn['column'], $whereIn['values']);
        }

        foreach ($this->orderBys as $orders) {
            $this->query->orderBy($orders['column'], $orders['direction']);
        }

        if (isset($this->limit) and !is_null($this->limit)) {
            $this->query->take($this->limit);
        }

        return $this;
    }

    /**
     * @return $this
     */
    protected function setScopes(): self
    {
        foreach ($this->scopes as $method => $args) {
            $this->query->$method(implode(', ', $args));
        }

        return $this;
    }

    /**
     * @return $this
     */
    protected function unsetClauses(): self
    {
        $this->wheres = [];
        $this->whereIns = [];
        $this->scopes = [];
        $this->limit = null;

        return $this;
    }
}
