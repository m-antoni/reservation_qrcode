@extends('layouts.adminlayout')

@section('content')

<div class="mb-3">
	<a href="{{ route('admin.inquiry.create', $inquiry->id) }}">
		<button class="bttn bttn-sm bttn bttn-fill bttn-primary"><i class="fa fa-edit"></i> compose</button>
	</a>
</div>

<div class="row">
	<div class="col-md-6 pt-3">
		<div class="card">
			<div class="card-header bg-dark text-white">
				<h4><i class="fa fa-envelope"></i> Message: </h4>
			</div>
			<div class="card-body">
				{{$inquiry->message}}
			</div>
		</div>
	</div>
		
	<div class="col-md-5 pt-3">
		<div class="card" data-aos="fade-up">
			<div class="card-body">	
				<div class="row">
					<dt class="col-sm-6">Sender:</dt>
					<dd class="col-sm-6"><i class="fa fa-clock-user"></i> {{$inquiry->name}}</dd>
				</div>
				<div class="row">
						<dt class="col-sm-6">Email:</dt>
						<dd class="col-sm-6"><i class="fa fa-clock-user"></i> {{$inquiry->email}}</dd>
					</div>
				<div class="row">
					<dt class="col-sm-6">Created At:</dt>
					<dd class="col-sm-6"><i class="fa fa-clock-o"></i> {{date('M j, Y h:iA', strtotime($inquiry->created_at))}}</dd>
				</div>
				<div class="row justify-content-center mt-3">
					<div class="col-md-6">
						<a href="{{route('admin.inquiry')}}">
							<button class="bttn bttn-sm bttn bttn-fill bttn-primary bttn-block"><i class="fa fa-arrow-left"></i> go back</button>
						</a>
					</div>
					<div class="col-md-6">
						{!!Form::open(['route' => ['admin.inquiry.destroy', $inquiry->id], 'method' => 'DELETE'])!!}
							{{Form::button('<span class="fa fa-close"></span> delete',['type' => 'submit','class' => 'bttm bttn-fill bttn-sm bttn-danger bttn-block'])}}
						{!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection