@extends('ventas.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ver venta</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> Back</a>
        </div>
    </div>
</div>
   
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Producto Vendido:</strong>
            {{ $venta->producto_vendido }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Costo:</strong>
            {{ $venta->costo }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cantidad:</strong>
            {{ $venta->cantidad }}
        </div>
    </div>
</div>
@endsection

