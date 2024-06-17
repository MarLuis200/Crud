@extends('personas.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crud Ejemplo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('personas.create') }}"> Crear Nuevo Cliente</a>
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
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($personas as $persona)
        <tr>
            <td>{{ $persona->id }}</td>
            <td>{{ $persona->nombre }}</td>
            <td>{{ $persona->ap }}</td>
            <td>{{ $persona->am }}</td>
            <td>{{ $persona->direccion }}</td>
            <td>{{ $persona->telefono }}</td>
            
            <td>
                <form action="{{ route('personas.destroy',$persona->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('personas.show',$persona->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('personas.edit',$persona->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $personas->links() !!}
      
@endsection