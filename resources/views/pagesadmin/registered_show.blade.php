@extends('layouts.adminlayout')

@section('content')

<a href="{{  route('admin.registered')}}"> 
    <button class="bttn bttn-fill bttn-default bttn-sm">
        <i class="fa fa-arrow-left"></i> go back
    </button>
</a>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="text-secondary"><i class="fa fa-edit"></i> Sign-up Information</h3 class="text-secondary">
        <table id="registration_details" class="table table-striped table-hover table-bordered bg-dark text-warning">
            <tr>
                <th><i class="fa fa-user"></i> Name</th>
                <td>{{$registered->name}}</td>
            </tr>
            <tr>
                <th><i class="fa fa-envelope"></i> Email</th>
                <td>{{$registered->email}}</td>
            </tr>
            <tr>
                <th><b><i class="fa fa-calendar"></i> Reservation Date</b></th>
                <th>{{$registered->date->format('M j, Y h:iA')}}</th>
            </tr>
            <tr>
                <th><b><i class="fa fa-calendar"></i> Booking Date:</b></th>
                <th>{{$registered->created_at->format('M j, Y h:iA')}}</th>
            </tr>
            <tr>
                <th><i class="fa fa-phone"></i> Contact</th>
                <th>{{$registered->phone}}</th>
            </tr>
            <tr>
                <th><i class="fa fa-credit-card-alt"></i> Payment</th>
                <th>{{$registered->amount}}</th>
            </tr>
        </table>
            {!!Form::open(['route' => ['admin.registered.destroy', $registered->id], 'method' => 'DELETE'])!!}
                {{Form::button('DELETE NOW',['type' => 'submit','class' => 'bttm bttn-fill bttn-sm bttn-danger bttn-block'])}}
            {!!Form::close()!!}
    </div>
</div>
@endsection