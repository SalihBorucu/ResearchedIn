@extends('layouts.app')

@section('content')
<div id="app">

    <app-component :user="{{ Auth::user() }}"></app-component>
</div>
@endsection