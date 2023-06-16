@extends('public.layouts.layout')
@section('title')Epeon - Deliverying Parcels @stop
@section('main')

<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-4 margin-top-20">Excel Preview</h1>
    
    {!! errors( $errors ) !!}
</div>

<div class="column is-12-desktop is-12-tablet is-12-mobile has-text-uppercase" >

{!! Form::open(['url' => action('Sender\Parcels@insert'), 'method'=>'POST', 'class'=>'box']) !!}

<table class="table is-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Area</th>
      <th>Weight</th>
      <th>Cash</th>
      <th>Note</th>
    </tr>
  </thead>
  <tbody>
    @if( count( $data ) > 0 ) 
    @foreach( $data as $p )
    <tr>
      <td>
        {!! Form::text('receiver_name[]', $p['name'], ['class'=>'input is-small', 'required' => 'required'] ) !!}
      </td>
      <td>
        {!! Form::text('receiver_phone[]', $p['phone'], ['class'=>'input is-small', 'required' => 'required', 'min'=>11] ) !!}
      </td>
      <td>
        {!! Form::text('receiver_address[]', $p['address'], ['class'=>'input is-small', 'required' => 'required'] ) !!}
      </td>
      <td>
        <div class="select">
          {!! area_dropdown_html('area_id[]', $p['area']) !!}
        </div>
      </td>
      <td>
        <div class="select">
          {!! Form::select('weight_id[]', \App\Weight::pluck('name', 'id', $p['weight'], ['required' => 'required'] ) ) !!}
        </div>
      </td>
      <td>
        {!! Form::text('cash[]', $p['cash'], ['class'=>'input is-small', 'required' => 'required'] ) !!}
      </td>
      <td>
        {!! Form::text('note[]', $p['note'], ['class'=>'input is-small'] ) !!}
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>

{!! Form::submit('Insert', ['class'=>'button orange-bg orange-border white-text is-rounded'] ) !!}
  
{!! Form::close() !!}

</div>


@stop 

@section('js')
<script>
$(document).ready(function(){

    $('[name="parcel_excel"]').change(function(e){

        let fileName = e.target.files[0].name;

        $('.filename').text(fileName);

    });

});
</script>
@stop