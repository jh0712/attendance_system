<div class="form-group form_otp">
    @if ($label)
    <label id="label_{{ $name }}" for="{{ $name }}">
        {!! $label !!}
    </label>
        @if ($required)
        <span>&nbsp;*</span>
        @endif
    @endif
    <div class="row no-gutters">
        <div class="col col-md-auto">
            {{
                Form::text(
                $name,
                $value,
                array_merge([
                    'class'                 => 'form-control',
                    'id'                    => $name,
                    'data-parsley-required' => $required
                ], $attributes))
            }}
        </div>
        <div class="col-auto pl-1">
            <button id="{{ $name }}_btn" class="btn btn-primary">{{ $button_text }}</button>
        </div>
    </div>
    <span class="form-error-cont">{{ ($errors->has($name) ? $errors->first($name) : '') }}</span>
</div>

@push('scripts')
<script type="text/javascript">
$(function() {
    var intervalMin = 3;
    var intervalSec = 0;
    var intervalId = null;

    $('#{{ $name }}_btn').on('click', function(e) {
        e.preventDefault()
        // check if ref is disabled
        if ($(this).hasClass('disabled')) return

        var mobileNum = $('#{{ $refMobile }}').val()
        if (mobileNum == '' || mobileNum == null) {
            CreateNoty({ type: 'error', text:'{{ __('s_otp.please enter mobile number')  }}'})
            return
        }
        var mobilePrefix = $('#{{ $refPrefix }}').val()
        if (mobilePrefix == '' || mobilePrefix == null) {
            CreateNoty({ type: 'error', text:'{{ __('s_otp.please select mobile country')  }}'})
            return
        }

        $('#{{ $name }}_btn').attr('disabled', true)
        $('#{{ $name }}_btn').addClass('disabled')
        $('#{{ $name }}_btn').html('{{ $button_text }} (' + getIntervalText() + ')')

        axios({
            method: '{{ $sendOtpMethod }}',
            url: '{{ $sendOtpUrl }}',
            data: {
                mobile_prefix: mobilePrefix,
                mobile_number: mobileNum,
            },
        })
        .then(function(res) {
            CreateNoty({ type: 'success', text:'{{ __('s_otp.otp has been sent to mobile number')  }}'})
            // setTimeout(function() {
            //     $('#{{ $name }}_btn').attr('disabled', false)
            //     $('#{{ $name }}_btn').removeClass('disabled')
            // }, 180000) // disable for 3 minutes
            startTimer();

        })
        .catch(function(err) {
            CreateNoty({ type: 'error', text:'{{ __('s_otp.an error occured while sending otp')  }}'})
            $('#{{ $name }}_btn').attr('disabled', false)
            $('#{{ $name }}_btn').removeClass('disabled')
            $('#{{ $name }}_btn').html('{{ $button_text }}')
        })
    })

    function getIntervalText () {
      var sec = intervalSec < 10 ? '0' + intervalSec : intervalSec
      var min = intervalMin < 10 ? '0' + intervalMin : intervalMin
      return min + ':' + sec
    }

    function startTimer () {
      intervalId = setInterval(function () {
        intervalSec -= 1;
        if (intervalSec < 0) {
            intervalSec = 59
            intervalMin -= 1
        }

        $('#{{ $name }}_btn').html('{{ $button_text }} (' + getIntervalText() + ')')

        if (intervalMin < 0) {
          clearInterval(intervalId)
          $('#{{ $name }}_btn').attr('disabled', false)
          $('#{{ $name }}_btn').removeClass('disabled')
          $('#{{ $name }}_btn').html('{{ $button_text }}')
          intervalMin = 3
          intervalSec = 0
        }
      }, 1000)
    }
})
</script>
@endpush