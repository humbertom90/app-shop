
@extends('layouts.app')

@section('title', 'Resultados de busqueda')

@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
    <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">

                        <div class="name">
                            <h3 class="title">Resultados de busqueda</h3>
                        </div>

                        @if (session('notification'))
                        <div class="alert alert-success" role="alert">
                            {{ session('notification') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="description text-center">
                <p>Se encontraron {{$products->count()}} resultados para el termino {{$query}}</p>
            </div>

        <div class="team text-center">
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="team-player">

                        <div class="col-md-6 ml-auto mr-auto">
                            <img src="{{$product->featured_image_url}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                        </div>
                        <h4 class="card-title">
                            <a href="{{url('/products/'.$product->id)}}">{{$product->name}}</a>

                        </h4>
                        <div class="card-body">
                            <p class="card-description">{{$product->description}}</p>
                        </div>


                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                {{$products->links()}}
            </div>
        </div>


    </div>
</div>
@endsection


