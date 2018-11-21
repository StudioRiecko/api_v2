<?php

namespace App\Providers;

use App\Modules\Address\Interfaces\AddressTransformerInterface;
use App\Modules\Address\Transformers\AddressTransformer;
use App\Modules\EducationLevel\Interfaces\EducationLevelTransformerInterface;
use App\Modules\EducationLevel\Transformers\EducationLevelTransformer;
use App\Modules\File\Interfaces\FileTransformerInterface;
use App\Modules\File\Transformers\FileTransformer;
use App\Modules\User\Interfaces\UserFilterTransformerInterface;
use App\Modules\User\Interfaces\UserTransformerInterface;
use App\Modules\User\Transformers\UserFilterTransformer;
use App\Modules\User\Transformers\UserTransformer;
use Illuminate\Support\ServiceProvider;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\Interfaces\UserRepositoryInterface;
use App\Modules\User\Repositories\UserProfileRepository;
use App\Modules\User\Interfaces\UserProfileRepositoryInterface;
use App\Modules\Address\Repositories\AddressRepository;
use App\Modules\Address\Interfaces\AddressRepositoryInterface;
use App\Modules\City\Interfaces\CityRepositoryInterface;
use App\Modules\City\Repositories\CityRepository;
use App\Modules\Country\Interfaces\CountryRepositoryInterface;
use App\Modules\Country\Repositories\CountryRepository;
use App\Modules\EducationLevel\Interfaces\EducationLevelRepositoryInterface;
use App\Modules\EducationLevel\Repositories\EducationLevelRepository;
use App\Modules\JobGroup\Interfaces\JobGroupRepositoryInterface;
use App\Modules\JobGroup\Repositories\JobGroupRepository;
use App\Modules\Province\Interfaces\ProvinceRepositoryInterface;
use App\Modules\Province\Repositories\ProvinceRepository;


/**
 * Class InjectionServiceProvider
 *
 * @package App\Providers
 */
class InjectionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $binders = [

            /** User bindings */
            UserRepositoryInterface::class => UserRepository::class,
            UserTransformerInterface::class => UserTransformer::class,
            UserFilterTransformerInterface::class => UserFilterTransformer::class,

            /** UserProfile bindings */
            UserProfileRepositoryInterface::class => UserProfileRepository::class,

            /** EducationLevel */
            EducationLevelRepositoryInterface::class => EducationLevelRepository::class,
            EducationLevelTransformerInterface::class => EducationLevelTransformer::class,

            /** File */
            FileTransformerInterface::class => FileTransformer::class,

            /** City */
            CityRepositoryInterface::class => CityRepository::class,

            /** Country */
            CountryRepositoryInterface::class => CountryRepository::class,

            /** Provice */
            ProvinceRepositoryInterface::class => ProvinceRepository::class,
        ];

        foreach ($binders as $interface => $class) {
            $this->app->bind($interface, function ($app) use ($class) {
                return $app->make($class);
            });
        }
    }
}
