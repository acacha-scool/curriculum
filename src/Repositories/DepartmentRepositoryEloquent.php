<?php

namespace Scool\Curriculum\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Scool\Curriculum\Repositories\DepartmentRepository;
use Scool\Curriculum\Models\Department;
use Scool\Curriculum\Validators\DepartmentValidator;

/**
 * Class DepartmentRepositoryEloquent
 * @package namespace Scool\Curriculum\Repositories;
 */
class DepartmentRepositoryEloquent extends BaseRepository implements DepartmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Department::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DepartmentValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
