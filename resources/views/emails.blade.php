@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Email</div>
                <div class="card-body">
                <div class="row" class='searchbar'>
                    <form method="post">
                        <div class="form-group d-flex">
                            @csrf
                            <input class="form-control me-2" name="subject" type="text" placeholder="Subject" required>
                            <input class="form-control me-2" name="email" type="email" placeholder="Email" required>
                            <textarea class="form-control me-2" name="message" required>Message</textarea>
                            <button class="btn btn-outline-success" type="submit">Send</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">OutBox</div>
                <div class="card-body">
                <div class="row">
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Created</th>
                        </thead>
                        <tbody>
                            @foreach($list as $line)
                                <tr>
                                    <td>{{$line->id}}</td>
                                    <td>{{$line->subject}}</td>
                                    <td>{{$line->email}}</td>
                                    <td>{{$line->message}}</td>
                                    <td>{{\Config('enums.email_status')[$line->status]}}</td>
                                    <td>{{$line->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
