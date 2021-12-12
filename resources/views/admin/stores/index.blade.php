@extends('layouts.app')

@section('content')

    @if(!$stores)
        <a href="{{ route('admin.stores.create') }}" class="btn btn-lg btn-success">CRIAR LOJA</a>
    @endif
    <table class="table table-triped">
        <thead>
            <tr>
                <th>#</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th>{{ $stores->id }}</th>
                <th>{{ $stores->name }}</th>
                <th>
                    <a href="{{ route('admin.stores.edit', ['store' => $stores->id]) }}" class="btn btn-sm btn-primary">EDITAR</a>

                    <div class="btn-group">

                        <form action="{{ route('admin.stores.destroy', ['store' => $stores->id]) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                        </form>

                    </div>
                </th>
            </tr>
        </tbody>
    </table>


@endsection
