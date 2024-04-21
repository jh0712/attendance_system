<div class="form-group row no-gutters form_select_icon">
    @if ($label)
    <label class="col-12" id="label_{{ $name }}" for="{{ $name }}">
        {!! $label !!}
        @if ($required)
        <span>&nbsp;*</span>
        @endif
    </label>
    @endif
    <div class="col">
        {{
            Form::select(
            $name,
            $list,
            $value,
            array_merge([
                'id'                            => $name,
                'class'                         => 'form-control',
                'data-parsley-required'         => $required,
                'data-parsley-errors-container' => '#'.$name.'_error',
                'data-parsley-required-message'=>__('s_form.select validation required'),
                'placeholder'=>__('s_form.select'),
            ], $attributes))
        }}
    </div>
    @yield($name)
    <span class="col-12" id="{{ $name.'_error' }}"></span>
    <span class="form-error-cont">{{ ($errors->has($name) ? $errors->first($name) : '') }}</span>
</div>
