@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Roles
                    @can('roles.create')
                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td width="10px">
                                @can('role.show')
                                    <a href="{{ route('roles.show', $p->id) }}" class="btn btn-sm btn-success">Ver</a>
                                @endcan
                                </td>
                                <td width="10px">
                                @can('role.edit')
                                    <a href="{{ route('roles.edit', $p->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                                @endcan
                                </td>
                                <td width="10px">
                                @can('role.destroy')
                                    {!! Form::open(['route' => ['roles.destroy', $p->id],'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close()  !!}
                                @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
