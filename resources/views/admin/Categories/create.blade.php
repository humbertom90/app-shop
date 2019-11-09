
@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Registrar nueva categoria</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="post" action="{{ url('/admin/categories') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="inputEmail4">Nombre de la categoria</label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{old('name')}}">
                </div>

                <textarea type="text" rows="5" class="form-control" name="description" placeholder="Descripcion de la categoria">{{old('long_description')}}</textarea>

                <button type="submit" class="btn btn-primary">Registrar Categoria</button>
                <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
