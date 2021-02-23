@extends('frontend.layouts.app')
@section('title', 'Messages  ')
@section('styling')
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
@endsection
@section('content')
  <messages :userdata="{{$user}}"></messages>

@endsection
@section('script')
@endsection
