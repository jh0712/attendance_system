<div class="form-group form_password">
    @if ($label)
    <label id="label_{{ $name }}" for="{{ $name }}">
        {!! $label !!}
    </label>
        @if ($required)
        <span>&nbsp;*</span>
        @endif
    @endif
    <div class="input-group">
        {{
            Form::password(
            $name,
            array_merge([
                'placeholder'=>__('s_form.password'),
                'id'=>$name,
                'class'=>'form-control',
                'data-parsley-errors-container' => '#'.$name.'_error',
                'data-parsley-required' => $required,
                'data-parsley-required-message'=>__('s_form.password validation required'),
            ], $attributes))
        }}
        <div class="input-group-prepend">
            <button class="btn-primary rs_pw input-group-text" type="button">
                <i class="far fa-eye"></i>
            </button>
            <button class="btn-primary rs_pw_hide input-group-text" style="display: none;" type="button">
                <i class="far fa-eye-slash"></i>
            </button>
        </div>
    </div>
    <span id="{{ $name.'_error' }}"></span>
    <span class="form-error-cont">{{ ($errors->has($name) ? $errors->first($name) : '') }}</span>
</div>
