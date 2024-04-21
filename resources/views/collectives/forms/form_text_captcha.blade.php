<div class="form-group row form_text align-items-center">
    <div class="col-md-6">
        <a class="refresh-captcha" rel="tooltip" title="{{ __('s_form.refresh') }}" onclick="document.getElementById('captcha-code').src='/captcha/flat?'+Math.random()">
            <img src="{!! captcha_src('flat') !!}" alt="captcha" id="captcha-code" class="h-42"/>
        </a>
    </div>
    <div class="col-md-6">
        @if ($label)
        <label id="label_{{ $name }}" for="{{ $name }}">
            {!! $label !!}
        </label>
            @if ($required)
            <span>&nbsp;*</span>
            @endif
        @endif
        {{
            Form::text(
            $name,
            $value,
            array_merge([
                'class'                 => 'form-control',
                'id'                    => $name,
                'data-parsley-required' => $required,
                'data-parsley-message'  => __('s_form.checkbox validation required'),
            ], $attributes))
        }}
        <span class="form-error-cont"> {{ ($errors->has($name) ? $errors->first($name) : '') }} </span>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $(function() {
        var name_id = $('#{{ $name }}');
        name_id.val('');
    });
</script>
@endpush