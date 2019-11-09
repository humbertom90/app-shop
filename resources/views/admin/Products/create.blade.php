
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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="post" action="{{ url('/admin/products') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="inputEmail4">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Descripcion corta</label>
                    <input type="text" class="form-control" name="description" placeholder="Descripcion" value="{{old('description')}}">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Categoria del producto</label>
                    <select class="form-control" name="category_id">
                        <option value="7"> General </option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Precio del producto</label>
                    <input type="number" class="form-control" name="price" placeholder="Precio" value="{{old('price')}}">
                </div>

                <textarea type="text" rows="5" class="form-control" name="long_description" placeholder="Descripcion extensa">{{old('long_description')}}</textarea>

                <button type="submit" class="btn btn-primary">Registrar Producto</button>
            </form>
        </div>
    </div>
</div>
@endsection
