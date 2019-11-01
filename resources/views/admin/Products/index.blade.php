
@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

</div>
<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Listado de Productos</h2>
            <div class="team">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10%">#</th>
                            <th style="width: 20%">Nombre</th>
                            <th style="width: 20%">Descripcion</th>
                            <th style="width: 10%">Categoria</th>
                            <th style="width: 10%">Precio</th>
                            <th style="width: 30%">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" class="btn btn-info btn-simple btn-xs">
                                    <i class="material-icons">person</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-success btn-simple btn-xs">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger btn-simple btn-xs">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
