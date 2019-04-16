@extends('layouts.adminlayout')

@section('content')

<div class="col-md-6 offset-md-3 pt-3">
	<h3 class="text-secondary"><i class="fa fa-send"></i> Reply</h3><hr>
	{!! Form::open(['route' => 'admin.inquiry.send', 'method' => 'POST']) !!}
		<div class="form-group row">
			{{Form::label('name', 'To:', ['class' => 'col-md-2'])}}
			{{Form::text('to', $inquiry->email,['class' => 'form-control col-md-10'])}}
		</div>
<!-- 		<div class="form-group row">
			{{Form::label('subject', 'Subject:', ['class' => 'col-md-2'])}}
			{{Form::text('subject', null,['class' => 'form-control col-md-10'])}}
		</div> -->
		<div class="form-group row">
			{{Form::label('body', 'Message:', ['class' => 'col-md-2'])}}
			{{Form::textarea('message', null, ['class' => 'form-control col-md-10', 'rows' => '5'])}}
		</div>
		<div class="form-group row">
			<span class="col-md-2"></span>
			{{Form::button('Submit', ['class' => 'bttn bttn-fill bttn-primary bttn-md bttn-block col-md-10', 'type' => 'submit'])}}
		</div>
	{!! Form::close() !!}
	<hr>
</div>
@endsection