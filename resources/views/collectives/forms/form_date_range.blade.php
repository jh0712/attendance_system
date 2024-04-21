<div class="form-group form_range">
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
            Form::text(
            $name,
            $value,
            array_merge([
                'id'=>$name,
                'class'=>'form-control',
                'placeholder'=>__("s_form.yyyy mm dd - yyyy mm dd"),
                'data-parsley-errors-container' => '#'.$name.'_error',
                'data-parsley-required' => $required,
                'data-parsley-required-message'=>__('s_form.date start validation required'),

            ], $attributes))
        }}
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="mdi mdi-calendar"></i>
            </span>
        </div>
    </div>
    <span id="{{ $name.'_error' }}"></span>

    <span class="form-error-cont">{{ ($errors->has($name) ? $errors->first($name) : '') }}</span>
</div>

@push('scripts')
<script type="text/javascript">
    $(function() {
        var id = $('#'+"{{ $name }}")
        id.daterangepicker({
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: "{{ __('s_form.clear btn') }}",
            }
        });
        id.on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            $(this).parsley().validate()
        });

        id.on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            $(this).parsley().validate()
        });
        id.val('').closest('.form-group').removeClass('parsley-success');

    });
</script>
@endpush