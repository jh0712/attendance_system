<div class="form_hide">
    {{
        Form::input(
        'hidden',
        $name,
        $value,
        array_merge([
            'class'=>'form-control '.($errors->has($name) ? 'is-invalid' : ''),
            'id' => $name
        ], $attributes))
    }}
</div>