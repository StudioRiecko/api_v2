<?php

namespace App\Modules\Base\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface ProductListProductRepository
 *
 * @package Modules\Core\Repositories
 */
interface BaseRepositoryInterface
{
    /**
     * @return Model
     */
    public function model(): Model;

    /**
     * Retrieve all records of the inherited model.
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function all($columns = ['*']): Collection;

    /**
     * @param array $search
     * @param array $extra
     *
     * @return Model
     */
    public function firstOrCreate(array $search, array $extra = []): Model;

    /**
     * @param array $data
     *
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param array $data
     *
     * @return Collection
     */
    public function createMany(array $data): Collection;

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     *
     * @return Model
     */
    public function update(array $data, $id, $attribute = 'id'): Model;

    /**
     * @param string $id
     *
     * @return int
     */
    public function delete(string $id): int;

    /**
     * Retrieve model by id.
     *
     * @param string $id
     *
     * @return Model
     */
    public function find(string $id): Model;

    /**
     * Retrieve records by field name
     *
     * @param string $field
     * @param $value
     * @param string $condition
     *
     * @return Model
     */
    public function findBy(string $field, $value, $condition = '='): Model;

    /**
     * Retrieve model by uuid regardless of status.
     *
     * @param $uuid
     *
     * @return Model
     */
    public function findU(string $uuid): Model;

    /**
     * @param array $uuids
     *
     * @return Collection
     */
    public function findManyU(array $uuids): Collection;
}
