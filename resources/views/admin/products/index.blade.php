@extends('layouts.app')

@section('content')

    <a href="{{ route('admin.products.create') }}" class="btn btn-lg btn-success">CRIAR PRODUTO</a>
    <table class="table table-triped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $p)
                <tr>
                    <th>{{ $p->id }}</th>
                    <th>{{ $p->name }}</th>
                    <th>R$ {{ number_format($p->price, 2, ',', '.') }}</th>
                    <th>{{ $p->store->name }}</th>
                    <th>
                        <a href="{{ route('admin.products.edit', ['product' => $p->id]) }}" class="btn btn-sm btn-primary">EDITAR</a>

                        <div class="btn-group">

                            <form action="{{ route('admin.products.destroy', ['product' => $p->id]) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                            </form>

                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}

@endsection
