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
                ], $attributes);
            @endphp
            @break
        @case('parsley_exchange')
            @php
                $attributes = array_merge([
                    'data-parsley-pattern'=>'^[-+]?(\d*)(\.\d{1,6})?$',
                    'data-parsley-pattern-message'=>__('s_form.rate should only on sixth decimal place message'),
                    'min'=>'0.000001',
                    'data-parsley-min'=>'0.000001',
                    'data-parsley-min-message'=>__('s_form.rate should be over').' %s',
                ], $attributes);
            @endphp
            @break
        @default
    @endswitch
@endisset
<div class="form-group form_icon {{ $name }}" >
    @if ($label)
    <label id="label_{{ $name }}" for="{{ $name }}">
        {{ $label }}
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
                'data-parsley-errors-container' => '#'.$name.'_error',
                'data-parsley-required' => $required,
                'data-parsley-required-message'=>__('s_form.icon validation required'),
            ], $attributes))
        }}
        @yield($name)
    </div>
    <span id="{{ $name.'_error' }}"></span>
    <span class="form-error-cont">{{ ($errors->has($name) ? $errors->first($name) : '') }}</span>
</div>

