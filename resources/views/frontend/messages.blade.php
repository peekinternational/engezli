@extends('frontend.layouts.app')
@section('title', 'Messages  ')
@section('styling')

@endsection
@section('content')
  <messages :userdata="{{$user}}"></messages>

@endsection
@section('script')
@endsection
