<div class="form-group row form_radio">
    @if($label)
        <label id="label_{{ $name }}" class="col-12" for="{{ $name }}">
            {!! $label !!}
            @if ($required)
            <span>&nbsp;*</span>
            @endif
        </label>
    @endif

    <div class="col-12 pr_shift">
    @foreach($options as $val => $key)
        <div class="custom-control custom-radio  {{ $isVerticalAligned ? 'custom-control-display' : 'custom-control-inline' }}">
            @php($checked = (!is_null($value) && $val == $value) ? 'checked' : '')
            {!!
                Form::radio(
                    $name,
                    $val,
                    $checked,
                    array_merge([
                        'class'                 => 'custom-control-input '.($errors->has($key) ? 'is-invalid' : ''),
                        'id'                    => $name . '_' . $key,
                        'data-parsley-required' => $required,
                        'data-parsley-errors-container' => '#'.$name.'_error'
                    ], $attributes))
            !!}
            <label class="custom-control-label text-capitalize {{$name. '_' . $key.'_label'}}" for="{{ $name . '_' . $key }}">{!! $key !!}</label>
        </div>
    @endforeach
    @yield($name)
    </div>

    @if (isset($attributes['data-parsley-errors-container']))
    <span class="col-12" id={{ str_replace('#', '', $attributes['data-parsley-errors-container']) }}></span>
    @else
    <span class="col-12" id="{{ $name.'_error' }}"></span>
    @endif


    <span class="invalid-feedback col-12" style="display: {{ $errors->has($name) ? 'block' : 'none' }}">{{ $errors->has($name) ? $errors->first($name) : '' }}</span>
    <span class="form-error-cont col-12"> {{ ($errors->has($name) ? $errors->first($name) : '') }} </span>

</div>
