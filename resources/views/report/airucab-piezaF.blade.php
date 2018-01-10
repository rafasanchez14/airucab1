@extends('layouts.master')
@section('title','Alas')
@section('content')
@include('layouts.messages')


@foreach($piezasf as $pieza)
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class=""> {{$pieza->nombre_pieza}}</h3>
  </div>
  <div class="panel-body">
    <h4>Descripción:</h4>
  {{$pieza->desc_pieza}}
  </div>
</div>
@endforeach


@endsection
