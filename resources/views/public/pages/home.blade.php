@extends('public.layouts.layout')
@section('title'){{ settings('application_name') }} - {{ settings('application_slogan') }} @stop

@section('bodyClass') blue-bg home @stop
@section('main')


    <div class="column is-12-desktop is-12-mobile home-banner columns is-multiline">

        <div class="column is-6-desktop is-offset-3-desktop is-12-tablet is-12-mobile">
            <h1 class="title is-1 font-weight-100 margin-top-100">Epeon Courier</h1>
            <h2 class="subtitle is-5 font-weight-100">We deliver from <b>Person to Person</b> and <b>Business to Person</b></h2>

            {!! Form::open(['class'=> 'padding-top-20']) !!}
            <div class="field has-addons">
                <div class="control is-expanded">
                    <input class="input is-rounded" type="text" placeholder="Enter Receiver's Phone Number">
                </div>
                <div class="control">
                    <a class="button is-rounded orange-bg orange-border white-text">
                        Track Delivery
                    </a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <img src="/public/img/public/1.png" alt="Epeon courier service" class="is-pulled-right">
    </div>


    <div class="column is-12-desktop is-12-mobile">

        <hr class="margin-top-30 margin-bottom-30">   
        <h2 class="subtitle is-2 font-weight-100 has-text-left">
            Features
            <hr class="width-100 orange-bg">
        </h2>
        <ul class="has-text-left">
            <li class="feature-list box transparent-bg">
                <i class="fas fa-store orange-text"></i>
                <span>E-commerce Delivery</span>
            </li>
            <li class="feature-list box transparent-bg">
                <i class="fas fa-people-carry red-text"></i>
                <span>Person to Person delivery</span>
            </li>
            <li class="feature-list box transparent-bg">
                <i class="fas fa-door-open black-text"></i>
                <span>Door to Door pickup and delivery</span>
            </li>
            <li class="feature-list box transparent-bg">
                <i class="fas fa-headset yellow-text"></i>
                <span>Customer Support</span>
            </li>
            <li class="feature-list box transparent-bg">
                <i class="fas fa-binoculars green-text"></i>
                <span>Parcel Tracking</span>
            </li>
        </ul>

    </div>

    <div class="column is-12-desktop is-12-mobile">

        <hr class="margin-top-30 margin-bottom-30">   

        <h2 class="subtitle is-2 font-weight-100 has-text-left">
            Pricing
            <hr class="width-100 orange-bg">
        </h2>

        <table class="table is-narrow is-bordered is-striped">
            <tbody>
                @if( zones()->count() > 0 && weights()->count() > 0 )
                @foreach( zones() as $zone )
                
                <tr>
                    <td class="verticle-middle" rowspan="{{ weights()->count() + 1 }}">{{ $zone->name }}</td>
                    <td class="font-weight-700">Weight</td>
                    <td class="font-weight-700">Delivery Charge (BDT)</td>
                    <td class="font-weight-700 verticle-middle" rowspan="{{ weights()->count() + 1 }}">
                    {{ env('COD_PERCENTAGE') }}% COD applicable on cash collection of above BDT {{ env('COD_ABOVE') }} on individual order
                    </td>
                </tr>
                @foreach( weights() as $weight )
                <tr>
                    <td class="verticle-middle">{{ $weight->name }}</td>
                    @if( pricings()->where('weight_id', $weight->id)->where('zone_id', $zone->id)->count() > 0 )
                    <td>
                        {{ pricings()->where('weight_id', $weight->id)->where('zone_id', $zone->id)->first()->price }}
                    </td>

                    @endif
                </tr>
                @endforeach
                @endforeach
                @endif
            </tbody>
        </table>

    </div>
    



@stop
        