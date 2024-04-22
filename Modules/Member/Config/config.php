<?php
use Modules\Member\Contracts\MemberContract;
use Modules\Member\Repositories\MemberRepository;
return [
    'name' => 'Member',
    'bindings' => [
       MemberContract::class => MemberRepository::class
    ]
];
