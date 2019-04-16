@extends('layouts.userlayout')

@section('content')
 
   	<h2 class="text-secondary">Welcome {{Auth::user()->name}}</h2>
  	
  	<userindex></userindex>

@endsection

   