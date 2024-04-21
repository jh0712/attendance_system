<div class="form-group form_select">
    @if ($label)
    <label id="label_{{ $name }}" for="{{ $name }}">
        {!! $label !!}
    </label>
        @if ($required)
        <span>&nbsp;*</span>
        @endif
    @endif
    {{
        Form::select(
        $name,
        $list,
        $value,
        array_merge([
            'id'                            => $name,
            'class'                         => 'form-control',
            'data-parsley-required'         => $required,
            'data-parsley-required-message'=>__('s_form.select validation required'),
            'data-parsley-errors-container' => '#'.$name.'_error',
            'placeholder'=>__('s_form.select'),
        ], $attributes))
    }}
    @if (isset($attributes['span_error']))
        <span id="{{ $attributes['span_error'] }}"></span>
    @else
         <span id="{{ $name.'_error' }}"></span>
    @endif
    <span class="form-error-cont">{{ ($errors->has($name) ? $errors->first($name) : '') }}</span>
</div>
