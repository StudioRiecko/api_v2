<?php

namespace App\Providers;

use App\Modules\Address\Interfaces\AddressTransformerInterface;
use App\Modules\Address\Transformers\AddressTransformer;
use App\Modules\Company\Interfaces\CompanyTransformerInterface;
use App\Modules\Company\Transformers\CompanyTransformer;
use App\Modules\Compensation\Interfaces\CompensationRepositoryInterface;
use App\Modules\Compensation\Interfaces\CompensationTransformerInterface;
use App\Modules\Compensation\Repositories\CompensationRepository;
use App\Modules\Compensation\Transformers\CompensationTransformer;
use App\Modules\EducationLevel\Interfaces\EducationLevelTransformerInterface;
use App\Modules\EducationLevel\Transformers\EducationLevelTransformer;
use App\Modules\File\Interfaces\FileTransformerInterface;
use App\Modules\File\Transformers\FileTransformer;
use App\Modules\JobGroup\Interfaces\JobGroupTransformerInterface;
use App\Modules\JobGroup\Transformers\JobGroupTransformer;
use App\Modules\School\Interfaces\SchoolTransformerInterface;
use App\Modules\School\Transformers\SchoolVacancyTransformer;
use App\Modules\User\Interfaces\UserFilterTransformerInterface;
use App\Modules\User\Interfaces\UserTransformerInterface;
use App\Modules\User\Transformers\UserFilterTransformer;
use App\Modules\User\Transformers\UserTransformer;
use App\Modules\Vacancy\Interfaces\VacancyDetailTransformerInterface;
use App\Modules\Vacancy\Interfaces\VacancyOverviewTransformerInterface;
use App\Modules\Vacancy\Interfaces\VacancyTransformerInterface;
use App\Modules\Vacancy\Transformers\VacancyOverviewTransformer;
use App\Modules\VacancyType\Interfaces\VacancyTypeTransformerInterface;
use App\Modules\VacancyType\Transformers\VacancyTypeTransformer;
use Illuminate\Support\ServiceProvider;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\Interfaces\UserRepositoryInterface;
use App\Modules\User\Repositories\UserProfileRepository;
use App\Modules\User\Interfaces\UserProfileRepositoryInterface;
use App\Modules\Address\Repositories\AddressRepository;
use App\Modules\Address\Interfaces\AddressRepositoryInterface;
use App\Modules\City\Interfaces\CityRepositoryInterface;
use App\Modules\City\Repositories\CityRepository;
use App\Modules\Company\Interfaces\CompanyRepositoryInterface;
use App\Modules\Company\Repositories\CompanyRepository;
use App\Modules\Country\Interfaces\CountryRepositoryInterface;
use App\Modules\Country\Repositories\CountryRepository;
use App\Modules\EducationLevel\Interfaces\EducationLevelRepositoryInterface;
use App\Modules\EducationLevel\Repositories\EducationLevelRepository;
use App\Modules\JobGroup\Interfaces\JobGroupRepositoryInterface;
use App\Modules\JobGroup\Repositories\JobGroupRepository;
use App\Modules\Province\Interfaces\ProvinceRepositoryInterface;
use App\Modules\Province\Repositories\ProvinceRepository;
use App\Modules\School\Interfaces\SchoolRepositoryInterface;
use App\Modules\School\Repositories\SchoolRepository;
use App\Modules\Vacancy\Interfaces\VacancyRepositoryInterface;
use App\Modules\Vacancy\Repositories\VacancyRepository;
use App\Modules\Vacancy\Transformers\VacancyDetailTransformer;
use App\Modules\VacancyType\Interfaces\VacancyTypeRepositoryInterface;
use App\Modules\VacancyType\Repositories\VacancyTypeRepository;

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
            /** Address bindings */
            AddressRepositoryInterface::class => AddressRepository::class,
            AddressTransformerInterface::class => AddressTransformer::class,

            /** Vacancy bindings */
            VacancyOverviewTransformerInterface::class => VacancyOverviewTransformer::class,
            VacancyDetailTransformerInterface::class => VacancyDetailTransformer::class,
            VacancyRepositoryInterface::class => VacancyRepository::class,
            VacancyTypeRepositoryInterface::class => VacancyTypeRepository::class,
            VacancyTypeTransformerInterface::class => VacancyTypeTransformer::class,

            /** User bindings */
            UserRepositoryInterface::class => UserRepository::class,
            UserTransformerInterface::class => UserTransformer::class,
            UserFilterTransformerInterface::class => UserFilterTransformer::class,

            /** UserProfile bindings */
            UserProfileRepositoryInterface::class => UserProfileRepository::class,

            /** Company */
            CompanyRepositoryInterface::class => CompanyRepository::class,
            CompanyTransformerInterface::class => CompanyTransformer::class,

            /** EducationLevel */
            EducationLevelRepositoryInterface::class => EducationLevelRepository::class,
            EducationLevelTransformerInterface::class => EducationLevelTransformer::class,

            /** JobGroup */
            JobGroupRepositoryInterface::class => JobGroupRepository::class,
            JobGroupTransformerInterface::class => JobGroupTransformer::class,

            /** School */
            SchoolRepositoryInterface::class => SchoolRepository::class,
            SchoolTransformerInterface::class => SchoolVacancyTransformer::class,

            /** Compensation */
            CompensationRepositoryInterface::class => CompensationRepository::class,
            CompensationTransformerInterface::class => CompensationTransformer::class,

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
