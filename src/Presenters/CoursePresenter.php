<?php

namespace Scool\Curriculum\Presenters;

use Scool\Curriculum\Transformers\CourseTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CoursePresenter
 *
 * @package namespace Scool\Curriculum\Presenters;
 */
class CoursePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CourseTransformer();
    }
}
