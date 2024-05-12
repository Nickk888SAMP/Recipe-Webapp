@extends('layouts.master')

@php
    $user = Auth::user();
@endphp

@section('content')
    @include('home.hero')
    @include('home.categories')
    @include('home.best-recipes')
    @include('home.recipe-roulette')
@endsection