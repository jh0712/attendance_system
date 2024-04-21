<script src="{{ asset('js/include.js') }}"></script>
@yield('script')

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.js')}}"></script>
{{--<script src="{{ URL::asset('js/app.js')}}"></script>--}}
<!-- App script -->
<script type="text/javascript">
    $(document).ready(function() {
        FormIndex.init();
    });
</script>
@yield('script-bottom')
