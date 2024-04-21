<div class="custom-control custom-checkbox form-group form_checkbox">
    {{
        Form::input(
        'hidden',
        $name,
        $value==1? 0 : 1,
        array_merge([
            'class'=>'form-control '.($errors->has($name) ? 'is-invalid' : ''),
        ], []))
    }}
    {{
        Form::checkbox(
        $name,
        $value,
        (($checked) ? 'checked' : ''),
        array_merge([
            'class'=>'custom-control-input',
            'id' => $name,
            'data-parsley-required' => $required,
            'data-parsley-message'  => __('s_form.checkbox validation required'),
            'data-parsley-errors-container' => '#'.$name.'_error'
        ], $attributes))
    }}
    @hasSection($name)
    <label id="label_{{ $name }}" class="custom-control-label" for="{{ $name }}">
        @yield($name)
    </label>
    @else
    <label id="label_{{ $name }}" class="custom-control-label" for="{{ $name }}">{!! $label !!}</label>
    @endif

    @if (isset($attributes['data-parsley-errors-container']))
    <span id={{ str_replace('#', '', $attributes['data-parsley-errors-container']) }}></span>
    @else
    <span id="{{ $name.'_error' }}"></span>
    @endif

    @if (isset($attributes['muti-errors-name']))
    <span class="form-error-cont">
        {{ $errors->first($attributes['muti-errors-name']) }}
    </span>
    @else
    <span class="form-error-cont"> {{ ($errors->has($name) ? $errors->first($name) : '') }} </span>
    @endif
</div>

@push('scripts')
@endpush