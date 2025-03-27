@extends('layouts.app')

@section('content')
    {{-- Import the hero section partial --}}
    @include('pages.about.partials.hero')
    @include('pages.about.partials.introduction')
    @include('pages.about.partials.valeurs')
    @include('pages.about.partials.contact')
    
    {{-- Rest of your about page content goes here --}}
@endsection

