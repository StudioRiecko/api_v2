<?php

namespace App\Modules\User\Controllers;

use App\Modules\Base\Controllers\BaseController;
use App\Modules\User\Interfaces\UserTransformerInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Spatie\Fractal\Fractal;

/**
 * Class UserMeController
 *
 * @package App\Modules\User\Controllers
 */
class UserMeController extends BaseController
{
    /**
     * @var UserTransformerInterface
     */
    private $user_transformer;

    /**
     * UserMeController constructor.
     *
     * @param Fractal $fractal
     * @param ResponseFactory $response_factory
     * @param UserTransformerInterface $user_transformer
     */
    public function __construct(
        Fractal $fractal,
        ResponseFactory $response_factory,
        UserTransformerInterface $user_transformer
    ) {
        parent::__construct($fractal, $response_factory);

        $this->user_transformer = $user_transformer;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $item = $request->user();

        return $this->transformItem($item, $this->user_transformer);
    }
}
