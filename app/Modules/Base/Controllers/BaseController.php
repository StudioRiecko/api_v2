<?php

namespace App\Modules\Base\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Base\Interfaces\BaseTransformerInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Spatie\Fractal\Fractal;

/**
 * Class BaseController
 *
 * @package App\Modules\Base\Controllers
 */
class BaseController extends Controller
{
    /**
     * @var ResponseFactory
     */
    protected $response_factory;
    
    /**
     * @var Fractal
     */
    private $fractal;
    
    /**
     * BaseController constructor.
     *
     * @param Fractal $fractal
     * @param ResponseFactory $response_factory
     */
    public function __construct(Fractal $fractal, ResponseFactory $response_factory)
    {
        $this->fractal = $fractal;
        $this->response_factory = $response_factory;
    }
    
    /**
     * @return JsonResponse
     */
    protected function responseSuccess(): JsonResponse
    {
        return $this->response_factory->json(['status' => 'success']);
    }
    
    /**
     *
     * @param Model $data
     * @param BaseTransformerInterface $transformer
     *
     * @return JsonResponse
     */
    protected function transformItem(Model $data, BaseTransformerInterface $transformer): JsonResponse
    {
        return $this->response_factory->json(
            $this->fractal->item($data)->transformWith($transformer)->toArray()
            );
    }
    
    /**
     * @param Collection $data
     * @param BaseTransformerInterface $transformer
     * @param bool $paginate
     *
     * @return JsonResponse
     */
    protected function transformCollection(
        Collection $data,
        BaseTransformerInterface $transformer,
        bool $paginate = true
        ): JsonResponse {
            if ($paginate) {
                $paginated_data = $this->paginate($data);
                $adapter = new IlluminatePaginatorAdapter($paginated_data);
                
                return $this->response_factory->json(
                    $this->fractal
                    ->collection($paginated_data)
                    ->transformWith($transformer)
                    ->paginateWith($adapter)
                    ->toArray()
                    );
            }
            
            return $this->response_factory->json(
                $this->fractal->collection($data)->transformWith($transformer)->toArray()
                );
    }
    
    /**
     * @param Collection $collection
     *
     * @return LengthAwarePaginator
     */
    private function paginate(Collection $collection): LengthAwarePaginator
    {
        $per_page = config('fractal.per_page');
        $page = Request::get('page', 1);
        $url = Request::path();
        
        return new LengthAwarePaginator(
            $collection->forPage($page, $per_page),
            $collection->count(),
            $per_page,
            $page,
            [
                'path' => $url,
            ]
            );
    }
    
    /**
     * @return JsonResponse
     */
    protected function noContent(): JsonResponse
    {
        return $this->response_factory->json([], 204);
    }
}
