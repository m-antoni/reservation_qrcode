@extends('layouts.adminlayout')

@section('content')
  
 <h2 class="text-secondary"><i class="fa fa-users"></i> Logs</h2>

 <div class="row">
 		<div class="col-md-10">
 				<div class="table-responsive-md pt-2">
						<table class="table table-secondary table-hover">
							<tr class="bg-dark text-warning">
								<th>Name</th>
								<th>Time In</th>
								<th>Time Out</th>
								<th>Status</th>
								<th>Time</th>
								<th width="10%">Action</th>
							</tr>
							@if(count($logs) > 0)
								@foreach($logs as $log)
								<tr>
										<td>{{$log->name}}</td>
										<td>{{$log->time_in->format('M j, Y h:iA')}} </td>
										<td>{{($log->time_out ? $log->time_out->format('M j, Y h:iA') : " ")}}</td>
										<td>{{$log->status}}</td>
										<td>{{$log->time_in->diffForHumans($log->time_out)}}</td>
										<td>
												{!!Form::open(['route' => ['admin.log.destroy', $log->id], 'method' => 'DELETE'])!!}
													{{Form::button('delete',['type' => 'submit','class' => 'bttm bttn-fill bttn-sm bttn-danger'])}}
												{!!Form::close()!!}
										</td>
									</tr>	
								@endforeach
							@endif
						</table>
						{{$logs->links()}}
				</div>
 		</div>
 </div>
@endsection
