@extends('frontend.layouts.app')
@section('title', 'Messages  ')
@section('styling')
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
@endsection
@section('content')
<div id="app">
  <example-component :userdata="{{$user}}"></example-component>
</div>

@endsection
@section('script')
@endsection
