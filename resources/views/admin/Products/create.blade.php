
@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Registrar nuevo producto</h2>
            <form method="post" action="{{ url('/admin/products') }}">
                @csrf
                <div class="form-group">
                    <label for="inputEmail4">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Descripcion corta</label>
                    <input type="text" class="form-control" name="Description" placeholder="Descripcion">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Precio del producto</label>
                    <input type="number" class="form-control" name="price" placeholder="Precio">
                </div>

                <textarea type="text" rows="5" class="form-control" name="long_description" placeholder="Descripcion extensa"></textarea>

                <button type="submit" class="btn btn-primary">Registrar Producto</button>
            </form>
        </div>
    </div>
</div>
@endsection
