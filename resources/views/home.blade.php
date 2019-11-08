
@extends('layouts.app')

@section('title', 'App Shop | Dashboard')

@section('body-class', 'landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto">
                    <h2 class="title">Dashboard</h2>

                    @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification') }}
                    </div>
                    @endif

                    <ul class="nav nav-pills nav-pills-icons" role="tablist">
                        <!--
                            color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                        -->
                        <li class="nav-item" >
                            <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i>
                                Carrito de compras
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                                <i class="material-icons">list</i>
                                Pedidos realizados
                            </a>
                        </li>
                    </ul>

                    <p>Tu carrito de compras presenta {{auth()->user()->cart->details->count()}} productos</p>


                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10%">#</th>
                            <th style="width: 15%">Nombre</th>
                            <th style="width: 20%">Precio</th>
                            <th style="width: 10%">Cantidad</th>
                            <th style="width: 10%">Subtotal</th>
                            <th style="width: 25%">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(auth()->user()->cart->details as $detail)
                        <tr>
                            <td>
                                <img src="{{ $detail->product->featured_image_url }}" height="50 px">
                            </td>
                            <td>
                                <a href="{{url('/products/'.$detail->product->id)}}">{{ $detail->product->name }}</a>
                            </td>
                            <td>$ {{ $detail->product->price }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->quantity * $detail->product->price }}</td>
                            <td class="td-actions">
                                <form method="post" action="{{url('/cart')}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                    <a href="{{url('/products/'.$detail->product->id)}}" target="_blank" type="button" rel="tooltip" class="btn btn-info btn-simple btn-xs" title="Ver producto">
                                        <i class="material-icons">info</i>
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



                    <form method="post" action="{{url('/order')}}">
                        {{csrf_field()}}
                        <button class="btn btn-primary btn-round">
                            <i class="material-icons">done</i> Realizar pedido
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection


