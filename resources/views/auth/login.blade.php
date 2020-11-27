  @extends('layouts.app')
  @section('content')
  <div class=" flex flex-col items-center ">
      <div class=" card flex items-center p-5" style="width: 50%;">
          <div>
              <img src="{{ url(Storage::url('page/icon-admin.png')) }}" class="w-20 h-20">
          </div>

          <x-jet-validation-errors class="mb-4" />

          @if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600">
              {{ session('status') }}
          </div>
          @endif

          <form method="POST" action="{{ route('login') }}" style="width: 90%;">
              @csrf

              <div class="form-row mb-3">
                  <label class="col-12 col-sm-12 col-form-label" for="email">{{ __('Email') }}</label>
                  <input id="email" type="email" class="col-12 col-sm-12 form-control @error('email') is-invalid @enderror"
                      name="email" value="{{ old('email') }}" autofocus>
              </div>

              <div class="form-row mb-3">
                  <label class="col-12 col-sm-12 col-form-label" for="password">{{ __('Password') }}</label>
                  <input id="password" type="password" class="col-12 col-sm form-control @error('password') is-invalid @enderror"
                      name="password" value="{{ old('password') }}" autofocus>
              </div>


              <div class="form-group row mb-0 text-center">
                  <div class="col-md offset-md">
                      <button type="submit" class="btn btn-main">
                          Iniciar sesión
                      </button>
                  </div>
              </div>
          </form>
      </div>
  </div>
  @endsection