<div class="form-group row form_style_file_upload no-gutters {{ isset($attributes['class'])?$attributes['class']:'' }}">
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
            Form::input(
                'file',
                $name,
                $value,
                array_merge([
                    'class'=>'filestyle',
                    'id' => $name,
                    'data-buttonName' => 'btn-dark waves-effect waves-light',
                    'data-buttonText' => __('s_form.choose file'),
                    'data-placeholder' => __('s_form.no file chosen'),
                    'data-parsley-required' => $required,
                    'data-parsley-required-message'=>__('s_form.file validation required'),
                    'data-parsley-filemaxmegabytes' => '5',
                    'data-parsley-filemimetypes' => 'image/jpeg, image/png, application/msword, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'style' => 'display: none;'
                ], $attributes))
        }}
    </div>
    @if (isset($attributes['data-section-id']))
        @yield($attributes['data-section-id'])
    @endif
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



