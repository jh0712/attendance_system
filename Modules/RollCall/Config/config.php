<?php
use Modules\RollCall\Contracts\RollCallContract;
use Modules\RollCall\Repositories\RollCallRepository;

return [
    'name' => 'RollCall',
    'bindings' => [
        RollCallContract::class => RollCallRepository::class
    ]
];
