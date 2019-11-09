
@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

</div>
<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Listado de Categorias</h2>
            <a href="{{url('/admin/categories/create')}}" class="btn btn-primary">Nueva Categoria</a>
            <div class="team">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 15%">Nombre</th>
                            <th style="width: 20%">Imagen</th>
                            <th style="width: 20%">Descripcion</th>
                            <th style="width: 40%">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td><img src="{{$category->featured_image_url}}" height="50px"></td>
                            <td>{{ $category->description }}</td>
                            <td class="td-actions">
                                <form method="post" action="{{url('/admin/categories/'.$category->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <a type="button" rel="tooltip" class="btn btn-info btn-simple btn-xs">
                                        <i class="material-icons">info</i>
                                    </a>
                                    <a href="{{url('/admin/categories/'.$category->id.'/edit')}}" title="Editar la categoria" type="button" rel="tooltip" class="btn btn-success btn-simple btn-xs">
                                        <i class="material-icons">edit</i>
                                    </a>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $categories->links() }}
        </div>

    </div>
</div>
@endsection
