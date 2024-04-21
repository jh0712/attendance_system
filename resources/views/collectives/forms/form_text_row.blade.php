<div class="form-group row no-gutters form_text">
    @if ($label)
    <label id="label_{{ $name }}" class="col-12" for="{{ $name }}">
        {!! $label !!}
        @if ($required)
        <span>&nbsp;*</span>
        @endif
    </label>
    @endif
    <div class="col">
        {{
            Form::text(
            $name,
            $value,
            array_merge([
                'class'                 => 'form-control',
                'id'                    => $name,
                'data-parsley-required' => $required,
                'data-parsley-message'  => __('s_form.text validation required'),
            ], $attributes))
        }}
    </div>
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
