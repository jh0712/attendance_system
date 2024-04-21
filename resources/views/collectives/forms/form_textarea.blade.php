<div class="form-group form_textarea {{ isset($attributes['add_class'])?$attributes['add_class']:'' }}">
    @if ($label)
    <label id="label_{{ $name }}" for="{{ $name }}">
        {!! $label !!}
    </label>
        @if ($required)
        <span>&nbsp;*</span>
        @endif
    @endif
    {{
        Form::textarea(
        $name,
        $value,
        array_merge([
            'id'                    => $name,
            'data-parsley-required' => $required,
            'data-parsley-message'  => __('s_form.textarea validation required')
        ], array_merge_recursive($attributes, ['class' => 'form-control'])))
    }}
    <span class="form-error-cont">{{ ($errors->has($name) ? $errors->first($name) : '') }}</span>
    @isset ($attributes['muti-error-name'])
    <span class="form-error-cont">
        {{ $errors->first($attributes['muti-errors-name']) }}
    </span>
    @endisset
</div>
