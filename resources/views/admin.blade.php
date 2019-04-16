@extends('layouts.adminlayout')

@section('content')

	<dashboard :user="{{ auth()->user() }}"></dashboard>

@endsection
