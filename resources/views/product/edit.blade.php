@extends('layouts.app')
@section('content')


    <?php
    //php artisan storage:link -> Para que podamos utiliza el storage
    //$contents = Storage::url('php9B37.tmp.jpg'); //Para que podamos obtener las imagenes.
    ?>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 45rem;">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h2 class="float-left">{{ __('es.product.registerProduct') }}</h2>
                    </div>
                    <div class="col-4"> <a class="float-right btn btn-secondary" href="/products">{{ __('es.return') }}</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form method="POST" class="needs-validation" action="/products/{{ $product->id }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @csrf
                    @method('put')

                    <div class="form-row mb-5">
                        <label for="image" class="col-12 col-sm-2 col-form-label">@lang('es.product.image')</label>
                        <div class="col-12 col-sm-6">
                            <input type="file" class="form-control" name="bookcover"
                                class="form-control @error('filename') is-invalid @enderror"
                                value="{{ old('filename') }}" />
                            <input type="hidden" class="form-control" name="idUser" value="{{ Auth::user()->id }}" />
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4">
                            <input type="hidden" value="{{ $product->image }}" id="precious_image" name="precious_image">
                            <img src="{{ url(Storage::url($product->image)) }}" class="img-fluid">
                        </div>
                    </div>

                    <div class="form-row mb-5">
                        <label for="name" class="col-12 col-sm-2 col-form-label">@lang('es.product.name')</label>
                        <div class="col-12 col-sm-10">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $product->name) }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-5">
                        <label for="description"
                            class="col-12 col-sm-2 col-form-label">{{ __('es.product.description') }}</label>
                        <div class="col-12 col-sm-10">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                name="description"
                                autocomplete="description">{{ old('description', $product->description) }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-5">
                        <label for="value" class="col-12 col-sm-2 col-form-label">@lang('es.product.value')</label>
                        <div class="col-12 col-sm-10">
                            <input id="value" type="number" class="form-control @error('value') is-invalid @enderror"
                                name="value" value="{{ old('value', $product->value) }}" autocomplete="value" autofocus>

                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-5">
                        <label for="status" class="col-12 col-sm-2 col-form-label">@lang('es.product.status')</label>
                        <div class="col-12 col-sm-10">
                            <select id="status" class="form-control @error('status') is-invalid @enderror" name="status"
                                value="{{ old('status') }}">
                                <option value="active">Activo</option>
                                <option value="inactive">Inactivo</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row mb-0 text-center">
                        <div class="col-md offset-md">
                            <button type="submit" class="btn btn-main">
                                {{ __('es.register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
