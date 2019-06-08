@extends('layouts.app')

@section('content')
  <div class="container success-login">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Bienvenue</div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      Vous êtes connectés !
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection



<style>

    .success-login {
        padding: 4em 0;
        height: 50%;
    }

</style>
