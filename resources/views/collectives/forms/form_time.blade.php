<div class="form-group form_time">
    @if($label)
        <label id="label_{{ $name }}" for="{{ $name }}">{!! $label !!}</label>
    @endif
    {{
        Form::input(
        $type,
        $name,
        $value,
        array_merge([
        'class'=>'form-control '.($errors->has($name) ? 'is-invalid' : ''),
        'id' => $name
        ], $attributes))
    }}
    <i class="form-group_bar"></i>
    <div class="invalid-feedback" role="alert">
        {{ ($errors->has($name) ? $errors->first($name) : '') }}
    </div>
</div>