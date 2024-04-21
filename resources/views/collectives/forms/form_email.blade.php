<div class="form-group form_text">
    @if ($label)
    <label id="label_{{ $name }}" for="{{ $name }}">
        {!! $label !!}
    </label>
        @if ($required)
        <span>&nbsp;*</span>
        @endif
    @endif
    {{
        Form::email(
        $name,
        $value,
        array_merge([
            'class'                 => 'form-control',
            'id'                    => $name,
            'data-parsley-required' => $required,
        ], $attributes))
    }}
    <span class="form-error-cont"> {{ ($errors->has($name) ? $errors->first($name) : '') }} </span>
    @isset ($attributes['muti-error-name'])
    <span class="form-error-cont">
        {{ $errors->first($attributes['muti-errors-name']) }}
    </span>
    @endisset
</div>