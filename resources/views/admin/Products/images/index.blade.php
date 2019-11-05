
@extends('layouts.app')

@section('title', 'Imagenes de Producto')

@section('body-class', 'landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

</div>
<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Imagenes del producto " {{ $product->name }} "</h2>

            <div class="card">

                <div class="card-body">Panel Content


                    <form method="post" action="{{url('/admin/products/'. $product->id .'/images')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="photo" required>
                        <button type="submit" class="btn btn-primary">Subir nueva imagen</button>
                        <a href="{{url('/admin/products/')}}" class="btn btn-default">Volver al listado de productos</a>
                    </form>

                </div>
            </div>



            <div class="row">
                @foreach($images as $image)
                    <div class="col-md-4">
                        <div class="card">

                            <div class="card-body">Panel Content
                                <img src="{{ $image->Url }}" width="300">
                                <button type="submit" class="btn btn-danger">Eliminar</button>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
</div>
@endsection
