<?php

namespace App\Modules\Messages\Repositories;

use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Messages\Interfaces\MessageRepositoryInterface;
use App\Modules\Messages\Models\Messages;
use Illuminate\Database\Eloquent\Collection;


/**
 * Class MessageRepository
 *
 * @package App\Modules\Message\Repositories
 */
class MessageRepository extends BaseRepository implements MessageRepositoryInterface
{
    /**
     * @var string
     */
    protected $model = Messages::class;
    
    /**
     * @param $message
     *
     * @return Messages
     */
    public function listMessages(): Messages
    {
        $messages = $this->model->all();
        
       return $messages;
    }
    
    /**
     * @param $message
     *
     * @return Messages
     */
    public function storeRequest($request): Messages
    {
        $data = [
            'from'     => $request->get('from'),
            'to'    => $request->get('to'),
            'title'   => $request->get('title'),
            'message'   => $request->get('message'),
        ];
        
        return $this->model()->create($data);
    }
    
}
