@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios

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
                            @foreach ($users as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td width="10px">
                                @can('users.show')
                                    <a href="{{ route('users.show', $p->id) }}" class="btn btn-sm btn-success">Ver</a>
                                @endcan
                                </td>
                                <td width="10px">
                                @can('users.edit')
                                    <a href="{{ route('users.edit', $p->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                                @endcan
                                </td>
                                <td width="10px">
                                @can('users.destroy')
                                    {!! Form::open(['route' => ['users.destroy', $p->id],'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close()  !!}
                                @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
