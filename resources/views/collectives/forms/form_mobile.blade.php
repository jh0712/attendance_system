<div class="{{ isset($attributes['group_class_b']) ? $attributes['group_class_b'] : 'col-md-6' }}">
    <div class="form-group row no-gutters form_moblie_number">
        @if ($labelContact)
        <label id="label_{{ $name }}" class="col-12" for="{{ $number_name }}">
            {!! $labelContact !!}
            @if ($required)
            <span>&nbsp;*</span>
            @endif
        </label>
        @endif
        <div class="col-auto">
            {{
                Form::select(
                $name,
                $list,
                $value,
                array_merge([
                    'placeholder'=>'+&nbsp;&nbsp;-&nbsp;-',
                    'id'=>$name,
                    'class'=>'form-control',
                    'data-parsley-errors-container' => '#'.$name.'_error',
                    'data-parsley-required' => $required,
                    'data-parsley-required-message'=>__('s_form.mobile register country validation required'),
                ], $attributes))
            }}
        </div>
        <div class="col">
            {{
                Form::text(
                    $number_name,
                    $number,
                    array_merge([
                        'placeholder'=>__('s_form.mobile number'),
                        'class'=>'form-control',
                        'id'=>$number_name,
                        'data-parsley-errors-container' => '#'.$name.'_number_error',
                        'data-parsley-required' => $required,
                        'data-parsley-required-message'=>__('s_form.mobile number validation required'),
                        'data-parsley-type'=>'number',
                        'data-parsley-type-message'=>__('s_form.mobile number validation format')
                    ], $attributes)
                )
            }}
        </div>
        @yield($name)
        <span class="w-100" id="{{ $name.'_error' }}"></span>
        <span class="form-error-cont"> {{ ($errors->has($name) ? $errors->first($name) : '') }} </span>
        <span id="{{ $name.'_number_error' }}"></span>
        <span class="form-error-cont"> {{ ($errors->has($name) ? $errors->first($name) : '') }} </span>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $(function() {

            var name_id = $('#{{ $name }}');
            var num_name_id = $('#{{ $number_name }}');
            name_id
            .closest('.form-group')
            .find('.filter-option')
            .text('+' + name_id.val());

            if (name_id.val()==0 || $('fieldset').is(':disabled') == false) {
                name_id.on('change',function (e) {
                    $(this).closest('.form-group').find('.filter-option').text('+' + $(this).val());
                });
            } else {
                var default_val = name_id.val()
                var option = new Option(default_val, default_val);
                $(option).html('+' + default_val);
                $('select#{{ $name }}').text('');
                $('select#{{ $name }}').append(option);
            }

            $('#{{ $name }},#{{ $number_name }}').parsley({
                classHandler: function (el) {
                    return el.$element.closest('div');
                },
                triggerAfterFailure: 'change changed.bs.select',
                trigger:      'change',
            });
        });
    </script>
@endpush