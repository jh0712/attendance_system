{{-- Should include js on template to avoid reloading --}}
{{-- <script src="{{ URL::asset('js/date_picker.js')}}"></script> --}}

<div class="form-group form_date {{ $name }}" >
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
                'placeholder'=>__('s_form.yyyy dd mm'),
                'data-parsley-errors-container' => '#'.$name.'_error',
                'data-parsley-required' => $required,
                'data-parsley-required-message'=>__('s_form.date validation required'),
            ], $attributes))
        }}
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="mdi mdi-calendar"></i>
            </span>
        </div>
        @yield($name)
    </div>
    <span id="{{ $name.'_error' }}"></span>
    <span class="form-error-cont">{{ ($errors->has($name) ? $errors->first($name) : '') }}</span>
</div>

@push('scripts')
@endpush