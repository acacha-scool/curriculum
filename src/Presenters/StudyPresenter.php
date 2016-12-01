<?php

namespace Scool\Curriculum\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Scool\Curriculum\Transformers\StudyTransformer;

/**
 * Class StudyPresenter
 *
 * @package namespace Scool\Curriculum\Presenters;
 */
class StudyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StudyTransformer();
    }
}
