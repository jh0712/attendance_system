<?php
use Modules\Country\Contracts\CountryContract;
use Modules\Country\Repositories\CountryRepository;

return [
    'name' => 'Country',
    'bindings' => [
    Modules\Country\Contracts\CountryContract::class => Modules\Country\Repositories\CountryRepository::class
    ]
];
