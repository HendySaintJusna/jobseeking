@extends('layouts.app')

@section('content')
<div id="app">
    <application v-bind:application="{{$application}}" v-bind:myjobpost="{{$myjobpost}}"></application>
</div>
@endsection
