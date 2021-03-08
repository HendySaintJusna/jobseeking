@extends('layouts.app')

@section('content')
<div id="app">
    <search country="{{$country}}" v-bind:jobs="{{$jobs}}" city={{$city}} search={{$search}}
    ></search>
</div>
@endsection
