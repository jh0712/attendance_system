@if (isset($exclude))
{{ (request()->is($route) && !request()->is($exclude)) ? $class : '' }}
@else
{{ (request()->is($route)) ? $class : '' }}
@endif