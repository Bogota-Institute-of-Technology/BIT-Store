@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card mb-3" style="width: 45rem;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>@lang('es.product.show')</h1>
                </div>
            </div>
            <div class="row no-gutters d-flex align-items-center">
                <div class="col-md-4">
                    <img src="http://127.0.0.1:8000{{ Storage::url($product->image) }}" class="card-img-top" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>@lang('es.product.value')</b> {{ $product->value }}</li>
                        <li class="list-group-item"><b>@lang('es.product.status')</b> {{ $product->status }}</li>
                    </ul>
                </div>
            </div>
            <div class="row no-gutters mb-3">
                <div class="col-md-12 text-center">
                    <a class="btn btn-info" href="/products" >{{ __('es.return') }}<a>
                </div>
            </div>
        </div>
    </div>

@endsection
