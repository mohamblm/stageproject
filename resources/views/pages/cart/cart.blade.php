@extends('layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Cart') }}
    </h2>
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <x-application-logo class="block h-12 w-auto fill-current text-gray-600" />
                    </div>
                    <div class="mt-8 text-2xl">
                        {{ __('Cart Page') }}
                    </div>
                    <div class="mt-6 text-gray-500">
                        {{ __('Cette plateforme a été créée dans le cadre du projet de fin d\'études de la formation de développeur web et web mobile de l\'école O\'clock.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection