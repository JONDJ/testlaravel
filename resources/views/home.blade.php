@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        <li><strong>EMAIL: </strong>{{Auth::user()->email}}</li>
                        <li><strong>NAME: </strong>{{Auth::user()->name}}</li>
                        <li><strong>CELL PHONE: </strong>{{Auth::user()->cell_phone}}</li>
                        <li><strong>DOCUMENT: </strong>{{Auth::user()->document}}</li>
                        <li><strong>BIRTH DATE: </strong>{{Auth::user()->birth_date}}</li>
                        <li><strong>CITY: </strong>{{Auth::user()->city_id}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
