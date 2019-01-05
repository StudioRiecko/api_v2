<?php

namespace App\Modules\Messages\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to', 'title', 'message',
    ];
    

}
