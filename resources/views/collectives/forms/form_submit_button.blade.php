{{
    Form::submit(
        $text,
        array_merge([
            'class'=>'btn btn-primary waves-effect waves-light mo-mb-2 '.$class,
            'id'=>$id??'btn_form_submit'
        ],$attributes)
    );
}}