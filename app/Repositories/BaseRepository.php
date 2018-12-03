<?php
/**
* Base Repository
*/
namespace App\Repositories;

use Exception;
use DB;
use Auth;

abstract class BaseRepository implements BaseInterface
{
    protected $model;

    /**
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Retrieve all data of repository
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Retrieve all data of repository, paginated
     */
    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = $limit ?: config('setting.paginate');

        return $this->model->paginate($limit, $columns);
    }
    /**
     * Find data by id
     */
    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function where($conditions, $operator = null, $value = null)
    {
        return $this->model->where($conditions, $operator, $value)->get();
    }

    /**
     * Save a new entity in repository
     */
    public function create($input)
    {
        return $this->model->create($input);
    }

    /**
     * Update a entity in repository by id
     */
    public function update($input, $id)
    {
        return $this->model->find($id)->update($input);
    }
    
    /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function getConnection();
}
