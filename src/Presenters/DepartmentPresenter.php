<?php

namespace Scool\Curriculum\Presenters;

use Scool\Curriculum\Transformers\DepartmentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DepartmentPresenter
 *
 * @package namespace Scool\Curriculum\Presenters;
 */
class DepartmentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DepartmentTransformer();
    }
}
