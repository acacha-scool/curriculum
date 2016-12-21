<?php

namespace Scool\Curriculum\Models;

use Acacha\Names\Traits\Nameable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Scool\Curriculum\Traits\HasManyFamilies;
use Scool\Curriculum\Traits\HasStudies;
use Scool\Foundation\User;

/**
 * Class Department.
 *
 * @package Scool\Curriculum\Models
 */
class Department extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the subdepartments for the department.
     */
    public function subdepartments()
    {
        return $this->hasMany(Department::class,'parent');
    }

    /**
     * Get the parent department.
     */
    public function parent()
    {
        return $this->belongsTo(Department::class,'parent');
    }

    /**
     * The heads that belong to the department.
     */
    public function heads()
    {
        return $this->belongsToMany(User::class,'department_head', 'department_id','user_id')
            ->withPivot('main');
    }

    /**
     * The principal head that belong to the department.
     */
    public function head()
    {
        return $this->heads()->wherePivot('main', 1)->first();
    }

    /**
     * Set the principal head.
     *
     * @param  User  $user
     * @return void
     */
    public function setHeadAttribute(User $user)
    {
        foreach ($this->heads as $head) {
            $this->heads()->updateExistingPivot($head->id, ['main' => false]);
        }
        if ( ! $this->heads->contains($user) ) {
            $this->heads()->save($user, ['main' => true]);
        } else {
            $this->heads()->updateExistingPivot($user->id, ['main' => true]);
        }
    }
}
