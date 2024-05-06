@extends('rollcall::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('rollcall.name') !!}</p>
@endsection
