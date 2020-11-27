  
@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-5">
    <a type="submit" class="btn btn-main" href="/products/create"> {{ __('es.product.createProduct') }} </a>
</div>
<div class="card">
    <div class="card-header text-center">
        <h1>@lang('es.product.allProducts')</h1>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">@lang('es.product.name')</th>
                    <th scope="col">@lang('es.product.value')</th>
                    <th scope="col">@lang('es.product.image')</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td> {{$product->name}} </td>
                    <td> {{$product->value}} </td>
                    <td> <img src="{{ url(Storage::url($product->image)) }}" class="img-fluid" style="width: 4.5rem;"> </td>
                    <td>
                        <a type="button" class="btn btn-success" href="/products/{{ $product->id}}"><span class="material-icons">visibility</span></a>
                        <a type="button" class="btn btn-primary" href="/products/{{ $product->id}}/edit"><span class="material-icons">create</span></a>
                        <a type="button" class="btn btn-danger" onclick="deleteMethod('{{ $product->id}}');" ><span  class="material-icons">delete_forever</span></a>
                        <!--<a type="button" class="btn btn-danger" href="/products/{{ $product->id}}/edit"><span class="material-icons">delete</span></a>-->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection