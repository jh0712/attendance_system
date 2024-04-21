<?php

namespace Modules\Translation\Contracts;

use Modules\Kh\Contracts\CrudContract;


interface TranslatorInsertContract extends CrudContract
{
    /**
     *  Insert translation at once
     *
     *  @param  array $updated_arr
     *  @param  model $model
     *  @return mixed
     */
    public function multiInsertTranslation($data_trans, $model);

    public function multiUpdateTranslation($key_name, $model, array $updated_arr);
}
