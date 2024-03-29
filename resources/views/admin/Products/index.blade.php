
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
            <a href="{{url('/admin/products/create')}}" class="btn btn-primary">Nuevo producto</a>
            <div class="team">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 15%">Nombre</th>
                            <th style="width: 20%">Descripcion</th>
                            <th style="width: 10%">Categoria</th>
                            <th style="width: 10%">Precio</th>
                            <th style="width: 40%">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->category_name}}</td>
                            <td>&euro;{{ $product->price }}</td>
                            <td class="td-actions">
                                <form method="post" action="{{url('/admin/products/'.$product->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <a href="{{url('/products/'.$product->id)}}" type="button" rel="tooltip" class="btn btn-info btn-simple btn-xs" target="_blank">
                                        <i class="material-icons">info</i>
                                    </a>
                                    <a href="{{url('/admin/products/'.$product->id.'/edit')}}" title="Editar el Producto" type="button" rel="tooltip" class="btn btn-success btn-simple btn-xs">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href="{{url('/admin/products/'.$product->id.'/images')}}" title="Imagenes del Producto" type="button" rel="tooltip" class="btn btn-warning btn-simple btn-xs">
                                        <i class="material-icons">image</i>
                                    </a>
                                    <button title="Eliminar" type="submit" rel="tooltip" class="btn btn-danger btn-simple btn-xs">
                                        <i class="material-icons">close</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $products->links() }}
        </div>

    </div>
</div>
@endsection
