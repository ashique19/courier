@extends('public.layouts.layout')
@section('title')Epeon - Deliverying Parcels @stop
@section('main')

<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-4 margin-top-20">Add New Parcel</h1>
    
    {!! errors( $errors ) !!}
</div>

<div class="column is-12-desktop is-12-mobile has-text-uppercase" >

    <p class="text-right">
        <a href="{{ action('Sender\Parcels@upload') }}" class="button is-small white-text orange-bg orange-border">Upload Excel</a>
    </p>

    {!! \Form::open(['url' => action('Sender\Parcels@store'), 'class'=> 'columns is-multiline' ]) !!}

    <div class="field column is-4-desktop is-12-mobile">
        <label class="label">Receiver Name</label>
        <div class="control">
            <input class="input" type="text" name="receiver_name" placeholder="Name" autofocus required >
        </div>
    </div>
    
    <div class="field column is-4-desktop is-12-mobile">
        <label class="label">Address</label>
        <div class="control">
            <input class="input" type="text" name="receiver_address" placeholder="Address" required  >
        </div>
    </div>
    
    <div class="field column is-4-desktop is-12-mobile">
        <label class="label">Phone</label>
        <div class="control">
            <input class="input" type="text" name="receiver_phone" placeholder="Phone Number" required  >
        </div>
    </div>

    <div class="field column is-4-desktop is-12-mobile">
        <label class="label">Area</label>
        <div class="control">
            <div class="select is-fullwidth">
            <select name="area_id" required>
                <option value="">-Select Area-</option>
                @if( $zones->count() > 0 )
                @foreach( $zones as $zone )
                <optgroup label="{{ $zone->name }}">
                    @if( $zone->areas->count() > 0 )
                    @foreach( $zone->areas as $area )
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                    @endforeach
                    @endif
                </optgroup>
                @endforeach
                @endif
            </select>
            </div>
        </div>
    </div>

    <div class="field column is-4-desktop is-12-mobile">
        <label class="label">Cash to collect</label>
        <div class="control">
            <input name="cash_to_collect" class="input" type="text" placeholder="Cash" value="0"  required >
        </div>
    </div>

    <div class="field column is-4-desktop is-12-mobile">
        <label class="label">Weight</label>
        <div class="control">
            <div class="select is-fullwidth">
            {!! Form::select('weight_id', $weights, null, ['required'=>'required']) !!}
            </div>
        </div>
    </div>

    <div class="field column is-12-desktop is-12-mobile">
        <div class="control padding-left-20">
            <label class="checkbox">
            <input type="checkbox" name="agree_terms"  required >
            I agree to the <a href="#">terms and conditions</a>
            </label>
        </div>
    </div>

    <div class="field column is-12-desktop is-12-mobile">
        <div class="control">
            <button class="button is-link">Submit</button>
        </div>
    </div>

    {!! Form::close() !!}
    
</div>


@stop 