@extends('public.layouts.layout')
@section('title')Epeon - Deliverying Parcels @stop
@section('main')



<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-size-4 has-text-centered margin-top-50">My Price Chart</h1>
    
    {!! errors( $errors ) !!}
    
    
</div>

<div class="column is-6-desktop is-offset-3-desktop is-12-tablet is-12-mobile">

    <table class="table is-narrow is-bordered is-striped">
        <tbody>
            @if( $zones->count() > 0 && $weights->count() > 0 )
            @foreach( $zones as $zone )
            
            <tr>
                <td class="verticle-middle" rowspan="{{ $weights->count() + 1 }}">{{ $zone->name }}</td>
                <td></td>
                <td class="font-weight-700">BDT</td>
                <td class="font-weight-700">COD %</td>
                <td class="font-weight-700">COD Threshold</td>
            </tr>
            @foreach( $weights as $weight )
            <tr>
                <td class="verticle-middle">{{ $weight->name }}</td>
                @if( $pricings->where('weight_id', $weight->id)->where('zone_id', $zone->id)->first() )
                <td>
                    {{ $pricings->where('weight_id', $weight->id)->where('zone_id', $zone->id)->first()->price }}
                </td>
                <td>
                    {{ $pricings->where('weight_id', $weight->id)->where('zone_id', $zone->id)->first()->cod_percentage }}
                </td>
                <td>
                    {{ $pricings->where('weight_id', $weight->id)->where('zone_id', $zone->id)->first()->cod_above }}
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
        