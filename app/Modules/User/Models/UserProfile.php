<?php

namespace App\Modules\User\Models;

use App\Modules\City\Models\City;
use App\Modules\EducationLevel\Models\EducationLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class UserProfile
 *
 * @package App\Modules\User\Models
 */
class UserProfile extends Model
{
    /**
     * @var string
     */
    protected $table = "user_profiles";
    
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'gender',
        'nickname',
        'birthday',
        'phone_number',
        'city_id',
        'education_level_id',
    ];
    
    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    
    /**
     * @return BelongsTo
     */
    public function educationLevel(): BelongsTo
    {
        return $this->belongsTo(EducationLevel::class);
    }
    
}