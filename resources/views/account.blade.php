@extends('layouts.app')

@section('content')
<div id="app">
    <account v-bind:user="{{$user}}"></account>
</div>
@endsection
