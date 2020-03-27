@extends('layouts.app')

@section('content')
<div id="app">
    {{-- NEED TO CHECK IF LINKS EXIST BEFORE BINDING --}}
    <app-component :user="{{ Auth::user() }}" :links="{{Auth::user()->link}}"></app-component>
</div>
@endsection