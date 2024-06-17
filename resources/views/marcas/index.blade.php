@extends('marcas.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crud Ejemplo - Marcas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('marcas.create') }}"> Crear Nueva Marca</a>
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
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($marcas as $marca)
        <tr>
            <td>{{ $marca->id }}</td>
            <td>{{ $marca->nombre }}</td>
            <td>{{ $marca->descripcion }}</td>
            <td>
                @if ($marca->imagen)
                    <img src="{{ asset('uploads/'. $marca->imagen) }}" alt="Imagen de la marca" width="100">
                @else
                    <p>No Hay Imagen disponible</p>
                    @endif
            </td>
            <td>
                <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('marcas.show', $marca->id) }}">Mostrar</a>
    
                    <a class="btn btn-primary" href="{{ route('marcas.edit', $marca->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $marcas->links() !!}
      
@endsection