<div class="pagination-cont" id="{{ $id }}"></div>

@push('scripts')
<script type="text/javascript">
  $(function() {
    
    var current_page = {!! $current_page !!};
    var last_page = {!! $last_page !!};
    
    if (current_page > 1) {
      $('#{{ $id }}').append('<div class="prev">{{ __("s_pagination.previous") }}</div>');
    }

    if (last_page > 8) {
      if (current_page >= 5 && current_page < (last_page - 5)) {
        $('#{{ $id }}').append('<div>1</div>');
        $('#{{ $id }}').append('<div class="more-icon"><i data-feather="more-horizontal"></i></div>');
        for (var i = current_page; i <= (current_page + 2); i++) {
          if (i === current_page) $('#{{ $id }}').append('<div class="active">' + i + '</div>');
          else $('#{{ $id }}').append('<div>' + i + '</div>');
        }
        $('#{{ $id }}').append('<div class="more-icon"><i data-feather="more-horizontal"></i></div>');
        $('#{{ $id }}').append('<div>' + (last_page - 1) + '</div>');
        $('#{{ $id }}').append('<div>' + last_page + '</div>');
      } else if (current_page < 5) {
        for (var i = 1; i <= 5; i++) {
          if (i === current_page) $('#{{ $id }}').append('<div class="active">' + i + '</div>');
          else $('#{{ $id }}').append('<div>' + i + '</div>');
        }
        $('#{{ $id }}').append('<div class="more-icon"><i data-feather="more-horizontal"></i></div>');
        $('#{{ $id }}').append('<div>' + (last_page - 1) + '</div>');
        $('#{{ $id }}').append('<div>' + last_page + '</div>');
      } else if (current_page >= (last_page - 5)) {
        $('#{{ $id }}').append('<div>1</div>');
        $('#{{ $id }}').append('<div class="more-icon"><i data-feather="more-horizontal"></i></div>');      
        for (var i = (last_page - 5); i <= last_page; i++) {
          if (i === current_page) $('#{{ $id }}').append('<div class="active">' + i + '</div>');
          else $('#{{ $id }}').append('<div>' + i + '</div>');
        }
      }
    } else {
      for (var i = 1; i <= last_page; i++) {
        if (i === current_page) $('#{{ $id }}').append('<div class="active">' + i + '</div>');
        else $('#{{ $id }}').append('<div>' + i + '</div>');
      }
    }

    if (current_page != last_page) {
      $('#{{ $id }}').append('<div class="next">{{ __("s_pagination.next") }}</div>');
    }


    $('#{{ $id }} div:not(.more-icon):not(.next):not(.prev)').on('click', function(e) {
      e.preventDefault();
      if ($(this).hasClass('active') || $(this).hasClass('disabled')) {
        return;
      }
      $('#{{ $id }} div').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
@endpush