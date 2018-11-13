<?php
namespace App\Modules\Base\Transformers;

use App\Modules\Base\Interfaces\BaseTransformerInterface;
use League\Fractal\TransformerAbstract;

/**
 * Class BaseTransformer
 *
 * @package App\Modules\Base\Transformers
 */
abstract class BaseTransformer extends TransformerAbstract implements BaseTransformerInterface
{

}
