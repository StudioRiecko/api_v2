<?php

namespace App\Modules\Base\Traits;

use Illuminate\Support\Str;

/**
 * Trait AppendsSlug
 *
 * @package Modules\Core\Traits
 */
trait AppendsSlug
{
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        if(!isset($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value, '-','nl');
        }
    }
}
