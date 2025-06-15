@extends('layouts.app')

@section('content')
    @include('user.hero')
    @include('user.about') 
    @include('user.service')
    @include('user.filter')
    @include('user.featured')
    @include('user.review')
@endsection 
