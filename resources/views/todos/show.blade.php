@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                     <a href="{{ url()->previous()}}" class="btn btn-sm btn-info">Go Back</a>
                     <b>Your Todo Is:</b> {{$todos->title}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
