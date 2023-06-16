@extends('public.layouts.layout')
@section('title')Epeon - Deliverying Parcels @stop
@section('main')



<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-size-4 has-text-centered margin-top-50">Pricing</h1>
    
    {!! errors( $errors ) !!}
    
    
</div>

<div class="column is-6-desktop is-offset-3-desktop is-12-tablet is-12-mobile">

    {!! Form::open([ 'url' => action('AdminControllers\Pricings@update' , 1 ), 'method' => 'PATCH' ]) !!}
    <table class="table is-narrow is-bordered is-striped">
        <tbody>
            @if( $zones->count() > 0 && $weights->count() > 0 )
            @foreach( $zones as $zone )
            
            <tr>
                <td class="verticle-middle" rowspan="{{ $weights->count() + 1 }}">{{ $zone->name }}</td>
                
            </tr>
            @foreach( $weights as $weight )
            <tr>
                <td class="verticle-middle">{{ $weight->name }}</td>
                <td>
                    {!! Form::hidden('weight_id[]', $weight->id) !!}
                    {!! Form::hidden('zone_id[]', $zone->id) !!}
                    <input type="text" name="price[]" class="input is-rounded" value="{{ $pricings->where('weight_id', $weight->id)->where('zone_id', $zone->id)->first() ? $pricings->where('weight_id', $weight->id)->where('zone_id', $zone->id)->first()->price : 0 }}">
                </td>
                
            </tr>
            @endforeach
            @endforeach
            @endif
        </tbody>
    </table>

    <p class="has-text-centered">
        {!! Form::submit('Update Pricing', ['class'=> 'button is-info']) !!}
    </p>
    {!! Form::close() !!}

</div>

@stop
        