<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepository
{
    /**
     * Set the relationships of the query
     *
     * @param array $with
     *
     * @return mixed
     */
    public function with(array $with = []);

    /**
     * Set withoutGlobalScopes attribute to true and apply it to the query
     *
     * @return mixed
     */
    public function withoutGlobalScopes();

    /**
     * Find a resource by id
     *
     * @param string $id
     *
     * @return Model|null
     */
    public function findOneById($id);

    /**
     * Find a resource by criteria
     *
     * @param array $criteria
     *
     * @return Model|null
     */
    public function findOneBy(array $criteria);

    /**
     * Search All resources by criteria
     *
     * @param array $criteria
     *
     * @return Collection
     */
    public function findByCriteria(array $criteria = []): Collection;

    /**
     * Save a resource
     *
     * @param array $data
     *
     * @return Model
     */
    public function store(array $data);

    /**
     * Update a resource
     *
     * @param Model $model
     * @param array $data
     *
     * @return Model
     */
    public function update(Model $model, array $data);

    /**
     * Delete a resource
     *
     * @param Model $model
     *
     * @return mixed
     */
    public function delete(Model $model);
}
