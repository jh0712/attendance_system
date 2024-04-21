{{-- Should include those css and js --}}
{{-- <link href="{{ asset('assets/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css"> --}}
{{-- <script src="{{ asset('assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::asset('assets/pages/lightbox.js')}}"></script>
 --}}

<div class="form-group form_file_upload">
    @if ($label)
    <label id="label_{{ $name }}" for="{{ $name }}">
        {!! $label !!}
    </label>
        @if ($required)
        <span>&nbsp;*</span>
        @endif
    @endif
    <div class="input-upload-cont">
        {{
            Form::input(
                'file',
                $name,
                $value,
                array_merge([
                    'class'=>'form-control '.($errors->has($name) ? 'is-invalid' : ''),
                    'id' => $name,
                    'data-parsley-required' => $required,
                    'style' => 'display: none;',
                    'data-parsley-errors-container' => '#container_errors',
                ], $attributes))
        }}
        <label for="{{ $name }}" class="btn btn-primary custom-file-upload-btn">{{ __('s_form.choose file')}}</label>
        <span id="file_text_{{ $name }}">{{ __('s_form.no file chosen') }}</span>
        <span id="file_text_{{ $name }}_error"></span>
        <span id="container_errors"></span>
    </div>
    <span class="form-error-cont">{{ ($errors->has($attributes['errorkey']??$name) ? $errors->first($attributes['errorkey'] ??$name) : '') }}</span>
</div>

@push('scripts')
<script type="text/javascript">
    $(function() {
        $('input[name={{ $name }}]').on('change',function(){
            var status = true;
            @if (isset($attributes['function']))
                status = {{ $attributes['function'] }}($(this).val());
            @endif

            if(status == true){
                var text = $(this).val();
                $('#file_text_{{ $name }}').text(text.split("\\").pop());
            }else{
                $(this).val('');
                $('#file_text_{{ $name }}').text('{{ __('s_form.no file chosen') }}');
                $('#file_text_{{ $name }}_error').text('{{ $attributes['function_error_msg']??'' }}');
            }
        })
    });
</script>
@endpush


