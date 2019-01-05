<?php

namespace App\Modules\Messages\Interfaces;

use App\Modules\Messages\Models\Messages;
use App\Modules\Base\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface MessageRepositoryInterface
 *
 * @package App\Modules\Messages\Interfaces
 */
interface MessageRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $messages
     *
     * @return Messages
     */
    public function listMessages(): Messages;
    
}
