@extends('ventas.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ventas</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('ventas.create') }}"> Crear nueva venta</a>
        </div>
    </div>
</div>
   
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
  
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Producto Vendido</th>
        <th>Costo</th>
        <th>Cantidad</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($ventas as $venta)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $venta->producto_vendido }}</td>
        <td>{{ $venta->costo }}</td>
        <td>{{ $venta->cantidad }}</td>
        <td>
            <form action="{{ route('ventas.destroy',$venta->id) }}" method="POST">
   
                <a class="btn btn-info" href="{{ route('ventas.show',$venta->id) }}">Show</a>
    
                <a class="btn btn-primary" href="{{ route('ventas.edit',$venta->id) }}">Edit</a>
   
                @csrf
                @method('DELETE')
      
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
  
{!! $ventas->links() !!}
@endsection
