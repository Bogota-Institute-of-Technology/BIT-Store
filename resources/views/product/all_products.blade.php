@extends('layouts.app')
@section('content')

<div class="row">
    @if(count($products) == 0)
    <div class="col-12 col-sm-12 m-3 text-center">
        <h1>En el momento no tenemos productos</h1>
    </div>
    @else
    <div class="col-12 col-sm-12 m-3 text-center">
       <h1> Nuestros productos </h1>
    </div>
    @endif
    @foreach ($products as $product)
    <div class="col-12 col-sm-3 m-3">
        <div class="card" style="width: 18rem;">
            <div style="height: 18rem !important; ">
                <img src="{{ url(Storage::url($product->image)) }}" class="card-img-top" alt="..."
                    style="height: 18rem !important;">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text mb-3" style="height: 140px; overflow: hidden;">{{$product->description}}</p>
                <p class="card-text"><b>@lang('es.product.value')</b> {{ $product->value }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection