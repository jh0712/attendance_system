<div class="{{ isset($attributes['group_class_b']) ? $attributes['group_class_b'] : 'col-md-6' }}">
  <div class="form-group row no-gutters form_moblie_number">
    @if ($label)
      <label id="label_{{ $number_name }}" class="col-12" for="{{ $number_name }}">
        {!! $label !!}
        @if ($required)
          <span>&nbsp;*</span>
        @endif
      </label>
    @endif
    <div class="col">
      {{ Form::input(
          'hidden',
          $name,
          $value,
          array_merge(
              [
                  'class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : ''),
                  'id' => $name,
              ],
              $attributes,
          ),
      ) }}
      {{ Form::text(
          $number_name,
          $number,
          array_merge(
              [
                  'placeholder' => __('s_form.mobile number'),
                  'class' => 'form-control',
                  'id' => $number_name,
                  'data-parsley-errors-container' => '#' . $name . '_number_error',
                  'data-parsley-required' => $required,
                  'data-parsley-required-message' => __('s_form.mobile number validation required'),
                  'data-parsley-type' => 'number',
                  'data-parsley-type-message' => __('s_form.mobile number validation format'),
              ],
              $attributes,
          ),
      ) }}
    </div>
    @yield($number_name)
    <span class="w-100" id="{{ $number_name . '_error' }}"></span>
    <span class="form-error-cont"> {{ $errors->has($number_name) ? $errors->first($number_name) : '' }} </span>
    <span id="{{ $number_name . '_number_error' }}"></span>
    <span class="form-error-cont"> {{ $errors->has($number_name) ? $errors->first($number_name) : '' }} </span>
  </div>
</div>
@push('scripts')
  <script src="{{ asset('js/intlTelInput.min.js') }}"></script>
  <script type="text/javascript">
    $(function() {
      var country_code = $('#{{ $name }}');
      var mobile = document.getElementById('{{ $number_name }}');

      var iti = window.intlTelInput(mobile, {
        initialCountry: "auto",
        separateDialCode: true,
        utilsScript: "{{ asset('js/intltel/utils.js') }}" // just for formatting/placeholders etc
      });
      if (mobile.value) {
        iti.setNumber('+' + country_code.val() + mobile.value);
      }
      mobile.addEventListener("countrychange", function() {
        // do something with iti.getSelectedCountryData()
        // console.log(iti.getSelectedCountryData());
        if (iti.getSelectedCountryData()?.dialCode) {
          country_code.val(iti.getSelectedCountryData().dialCode);
        } else {
          country_code.val('');
        }
      });

      $('#{{ $name }},#{{ $number_name }}').parsley({
        classHandler: function(el) {
          return el.$element.closest('div');
        },
        triggerAfterFailure: 'change changed.bs.select',
        trigger: 'change',
      });
    });
  </script>
@endpush
