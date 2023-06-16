@extends('public.layouts.layout')
@section('title')Epeon - Deliverying Parcels @stop
@section('main')

<div class="column is-12-desktop is-12-mobile has-text-uppercase" >
    <h1 class="title is-4 margin-top-20">Upload Parcel Excel</h1>
    
    {!! errors( $errors ) !!}
</div>

<div class="column is-4-desktop is-offset-4-desktop is-12-tablet is-12-mobile has-text-uppercase" >

{!! Form::open(['url' => action('Sender\Parcels@upload'), 'method'=>'POST', 'class'=>'box', 'enctype' => "multipart/form-data"]) !!}

<div class="field">
  <div class="file is-boxed is-expanded">
    <label class="file-label">
      <input class="file-input" type="file" name="parcel_excel" accept=".csv">
      <span class="file-cta">
        <span class="file-icon">
          <i class="fas fa-cloud-upload-alt"></i>
        </span>
        <span class="file-label filename">
          Select File (excel or csv)
        </span>
      </span>
    </label>
  </div>
</div>

{!! Form::submit('Upload', ['class'=>'button orange-bg orange-border white-text is-rounded'] ) !!}

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