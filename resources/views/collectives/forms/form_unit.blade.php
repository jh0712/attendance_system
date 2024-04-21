@isset ($attributes['parsley_default'])
    @switch($attributes['parsley_default'])
        @case('parsley_amount')
            @php
                $attributes = array_merge([
                    'data-parsley-pattern'=>'^[-+]?(\d*)(\.\d{1,2})?$',
                    'data-parsley-pattern-message'=>__('s_form.rate should only on second decimal place message'),
                    'type'=>'range',
                    'data-parsley-range'=>'[0.01, 100000.00]',
                    'data-parsley-range-message'=>__('s_form.rate should be between').' %s ~ %s',
                    'data-parsley-max-message'=>__('s_form.rate should be lower than or equal to').' %s',
                ], $attributes);
            @endphp
            @break
        @case('parsley_no_decimal')
            @php
                $attributes = array_merge([
                    'data-parsley-pattern'=>'^\s*(?=.*[1-9])\d*(?:\.\d*)?\s*$',
                    'data-parsley-pattern-message'=>__('s_form.rate should over 0'),
                ], $attributes);
            @endphp
            @break
        @default
            @php
                $attributes = array_merge([
                    'data-parsley-pattern'=>'^[-+]?(\d*)(\.\d{1,2})?$',
                    'data-parsley-pattern-message'=>__('s_form.rate should only on second decimal place message'),
                    'min'=>'0.01',
                    'data-parsley-min'=>'0.01',
                    'data-parsley-min-message'=>__('s_form.rate should be over').' %s',
                ], $attributes);
            @endphp
    @endswitch
@endisset
<div class="form-group form_unit {{ $name }}" >
    @if ($label)
    <label id="label_{{ $name }}" for="{{ $name }}">
        {!! $label !!}
    </label>
        @if ($required)
        <span>&nbsp;*</span>
        @endif
    @endif
    <div class="input-group">
        <span class="input-group-btn input-group-prepend">
            @empty($attributes['old_amount_unit'])
                <div class="input-group-text unit_width" id="unit_{{ $name }}">-&nbsp;<i class="fas fa-dollar-sign"></i>&nbsp;-</div>
            @else
                <div class="input-group-text unit_width" id="unit_{{ $name }}">{{ $attributes['old_amount_unit'] }}</div>
            @endempty
        </span>
        {{
            Form::text(
            $name,
            $value,
            array_merge([
                'id'=>$name,
                'class'=>'form-control',
                'data-parsley-errors-container' => '#'.$name.'_error',
                'data-parsley-required' => $required,
                'data-parsley-required-message'=>__('s_form.unit validation required'),
            ], $attributes))
        }}
    </div>
    <span id="exchange_{{ $name }}" class="d_none note_gray js_step_mark"></span>
    <span id="{{ $name.'_error' }}"></span>
    <span class="form-error-cont">{{ ($errors->has($name) ? $errors->first($name) : '') }}</span>
</div>

