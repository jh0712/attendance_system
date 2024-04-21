<?php

namespace Modules\Country\Contracts;

use Modules\Kh\Contracts\CrudContract;
use Modules\Kh\Contracts\SlugContract;
use Modules\Kh\Contracts\ActiveContract;

interface CountryContract extends CrudContract, SlugContract,ActiveContract
{

}
