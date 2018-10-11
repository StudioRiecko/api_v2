<?php

namespace App\Modules\Base\Repositories;

use App\Modules\Base\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 *
 * @package App\Modules\Base\Repositories
 */
abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var
     */
    protected $query;

    /**
     * @param null $model
     *
     * @return Model
     */
    public function model($model = null): Model
    {
        if (!is_null($this->query)) {
            return $this->query;
        }
        if (!is_null($model)) {
            return new $model;
        }

        return new $this->model;
    }

    /**
     * @param array $columns
     *
     * @return Collection
     */
    public function all($columns = ['*']): Collection
    {
        return $this->model()->get($columns);
    }

    /**
     * @param array $search
     * @param array $extra
     *
     * @return Model
     */
    public function firstOrCreate(array $search, array $extra = []): Model
    {
        return $this->model()->firstOrCreate($search, $extra);
    }

    /**
     * @param array $data
     *
     * @return Model
     */
    public function create(array $data): Model
    {
        $model = $this->model()->create($data);

        return $this->model()->find($model->id);
    }

    /**
     * @param array $data
     *
     * @return Collection
     */
    public function createMany(array $data): Collection
    {
        return $this->model()->insert($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     *
     * @return Model
     */
    public function update(array $data, $id, $attribute = 'id'): Model
    {
        return $this->model()->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param string $id
     *
     * @return int
     */
    public function delete(string $id): int
    {
        return $this->model()->destroy($id);
    }

    /**
     * @param string $id
     *
     * @return Model
     */
    public function find(string $id): Model
    {
        return $this->model()->find($id);
    }

    /**
     * @param string $field
     * @param $value
     * @param string $condition
     *
     * @return Model
     */
    public function findBy(string $field, $value, $condition = '='): Model
    {
        return $this->model()->where($field, $condition, $value)->first();
    }

    /**
     * @param string $uuid
     *
     * @return Model
     */
    public function findU(string $uuid): Model
    {
        return $this->model()->findU($uuid);
    }

    /**
     * @param array $uuids
     *
     * @return Collection
     */
    public function findManyU(array $uuids): Collection
    {
        $results = collect();

        foreach ($uuids as $uuid) {
            $results->push($this->findU($uuid));
        }

        return $results;
    }

}
