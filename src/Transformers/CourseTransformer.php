<?php

namespace Scool\Curriculum\Transformers;

use League\Fractal\TransformerAbstract;
use Scool\Curriculum\Models\Course;

/**
 * Class CourseTransformer
 * @package namespace Scool\Curriculum\Transformers;
 */
class CourseTransformer extends TransformerAbstract
{

    /**
     * Transform the \Course entity
     * @param \Course $model
     *
     * @return array
     */
    public function transform(Course $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
