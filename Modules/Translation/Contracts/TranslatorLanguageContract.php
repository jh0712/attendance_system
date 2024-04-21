<?php

namespace Modules\Translation\Contracts;

use Modules\Kh\Contracts\CrudContract;
use Modules\Kh\Contracts\SlugContract;
use Modules\Kh\Contracts\ActiveContract;

interface TranslatorLanguageContract extends CrudContract, SlugContract, ActiveContract
{
}
