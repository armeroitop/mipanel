@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    Roles
                    @can('roles.create')
                        <a href="{{route('roles.create')}}" 
                        class="btn btn-sm btn-primary float-right">
                        Crear
                        </a>
                    @endcan

                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Role</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($roles as $role)
                                <tr>
                                    <td scope="row"> {{$role->id}}</td>
                                    <td>             {{$role->name}}</td>
                                    <td width="10px">
                                        @can('roles.show')
                                            <a href="{{route('roles.show', $role->id)}}" class="btn btn-sm btn-outline-primary float-right">
                                            Ver
                                            </a>
                                        @endcan
                                    </td>                                    
                                    <td width="10px">
                                        @can('roles.edit')
                                            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-sm btn-outline-primary float-right">
                                            Editar
                                            </a>
                                        @endcan
                                    </td>                                    
                                    <td width="10px">
                                        @can('roles.destroy')
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm float-right">Eliminar</button>
                                            </form>
                                        @endcan
                                    </td>                                    
                                </tr>
                                
                             @endforeach
                           
                        </tbody>
                    </table>
                    {{$roles->render()}}
                   
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
