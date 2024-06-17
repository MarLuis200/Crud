@extends('ventas.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Sale</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
<form action="{{ route('ventas.update', $venta->id) }}" method="POST">
    @csrf
    @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Producto Vendido:</strong>
                <input type="text" name="producto_vendido" value="{{ $venta->producto_vendido }}" class="form-control" placeholder="Producto Vendido">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Costo:</strong>
                <input type="number" step="0.01" name="costo" value="{{ $venta->costo }}" class="form-control" placeholder="Costo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cantidad:</strong>
                <input type="number" name="cantidad" value="{{ $venta->cantidad }}" class="form-control" placeholder="Cantidad">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
