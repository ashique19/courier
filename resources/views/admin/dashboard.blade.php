@extends('public.layouts.layout')
@section('title')Epeon - Deliverying Parcels @stop
@section('main')



<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-size-4 has-text-centered margin-top-50">Admin Dashboard</h1>
    
    {!! errors( $errors ) !!}
    
    
</div>

<div class="column is-12-desktop is-12-mobile">

    <div class="tile is-ancestor">
        <a href="{{ action('AdminControllers\Zones@index') }}" class="button is-large blue-bg white-text">Zones</a>
        <a href="{{ action('AdminControllers\Areas@index') }}" class="button is-large green-bg white-text">Areas</a>
        <a href="{{ action('AdminControllers\Weights@index') }}" class="button is-large red-bg white-text">Weights</a>
        <a href="{{ action('AdminControllers\Pricings@index') }}" class="button is-large orange-bg white-text">Pricing</a>
        <a href="#" class="button is-large navy-bg white-text">Senders</a>
        <a href="#" class="button is-large black-bg white-text">Ground Team</a>
        <a href="#" class="button is-large yellow-bg white-text">Hub</a>
    </div>


</div>

@stop
        