<?php

namespace Scool\Curriculum\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Traits\CacheableRepository;
use Scool\Curriculum\Models\Study;
use Scool\Curriculum\Validators\StudyValidator;

/**
 * Class StudyRepositoryEloquent
 * @package namespace App\Repositories;
 */
class StudyRepositoryEloquent extends BaseRepository implements StudyRepository,CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Study::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StudyValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
