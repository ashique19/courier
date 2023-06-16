@extends('public.layouts.layout')
@section('title')Epeon - Deliverying Parcels @stop
@section('main')

<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-4 margin-top-20">Parcel List</h1>
    
    {!! errors( $errors ) !!}
</div>

<div class="column is-12-desktop is-12-mobile has-text-uppercase" >

    <table class="table is-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Receiver</th>
                <th>Address</th>
                <th>Area</th>
                <th>Phone</th>
                <th>Weight</th>
                <th>Cash</th>
                <th>Charge</th>
                <th>COD</th>
                <th>Payment</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if( $parcels->count() > 0 )
            @foreach( $parcels as $parcel )
            <tr>
                <td>{{ $parcel->created_at ? $parcel->created_at->format("M-d") : "" }}</td>
                <td>{{ $parcel->receiver_name }}</td>
                <td>{{ $parcel->receiver_address }}</td>
                <td>{{ $parcel->area ? $parcel->area->name : "" }}</td>
                <td>{{ $parcel->receiver_phone }}</td>
                <td>{{ $parcel->weight ? $parcel->weight->name : "" }}</td>
                <td>{{ $parcel->cash_to_collect }}</td>
                <td>{{ $parcel->charge }}</td>
                <td>{{ $parcel->cod }}</td>
                <td>{{ $parcel->payment }}</td>
                <td>{{ $parcel->status }}</td>
            </tr>
            @endforeach
            {!! $parcels->links()  !!}
            @endif
        </tbody>
    </table>
    
</div>


@stop 