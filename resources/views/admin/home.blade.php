@extends('layouts.admin.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 mb-4 mt-1">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="font-weight-bold">{{ __('Dashboard') }}</h4>
        </div>
      </div>
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  {{ __('You are logged in!') }}
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
