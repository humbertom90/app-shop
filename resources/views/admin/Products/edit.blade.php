
@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Editar producto</h2>
            <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
                @csrf
                <div class="form-group">
                    <label for="inputEmail4">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Descripcion corta</label>
                    <input type="text" class="form-control" name="Description" placeholder="Descripcion" value="{{$product->description}}">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Precio del producto</label>
                    <input type="number" step="0.01" class="form-control" name="price" placeholder="Precio" value="{{$product->price}}">
                </div>

                <textarea type="text" rows="5" class="form-control" name="long_description" placeholder="Descripcion extensa">{{$product->long_description}}</textarea>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="{{url('/admin/products')}}" class="btn btn-default">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
