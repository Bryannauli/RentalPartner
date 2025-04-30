@extends('layouts.app')

@section('content')
    @include('landing.hero')
    @include('landing.about')
   
    @include('landing.service')
    @include('landing.filter')
    @include('landing.featured')
    
@endsection
