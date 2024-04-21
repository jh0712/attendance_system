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
    @yield($name)
    @isset ($attributes['data-parsley-errors-container'])
    <span class="col-12" id={{ str_replace('#', '', $attributes['data-parsley-errors-container']) }}></span>
    @endisset
    @if (isset($attributes['muti-errors-name']))
    <span class="col-12 form-error-cont">
        {{ $errors->first($attributes['muti-errors-name']) }}
    </span>
    @else
    <span class="form-error-cont col-12"> {{ ($errors->has($name) ? $errors->first($name) : '') }} </span>
    @endif
</div>
