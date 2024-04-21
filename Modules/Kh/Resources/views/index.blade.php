@extends('kh::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('kh.name') !!}
    </p>
@endsection
