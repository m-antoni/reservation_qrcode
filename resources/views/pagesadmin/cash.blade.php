@extends('layouts.adminlayout')

@section('content')
  
 <h2 class="text-secondary"><i class="fa fa-money"></i> Cash Only</h2>

 <div class="row">
 		<div class="col-md-12">
 				<div class="table-responsive-md pt-2">
						<table class="table table-secondary table-hover">
							<tr class="bg-dark text-warning">
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Status</th>
								<th width="10%">Action</th>
							</tr>
							@if(count($cashes) > 0)
								@foreach($cashes as $cash)
								<tr>
										<td>{{$cash->name}}</td>
										<td>{{$cash->email}}</td>
										<td>{{$cash->phone}}</td>
										<td>{{$cash->date->format('M j, Y h:iA')}}</td>
										<td>{{$cash->amount}}</td>
										<td>{{$cash->status}}</td>
										<td>
											@if($cash->status == 'unpaid')
													<form action="{{route('admin.cash.approved')}}" method="POST">
														@csrf
														<input type="hidden" name="id" value="{{$cash->id}}">
														<input type="hidden" name="name" value="{{$cash->name}}">
														<input type="hidden" name="email" value="{{$cash->email}}">
														<input type="hidden" name="phone" value="{{$cash->phone}}">
														<input type="hidden" name="date" value="{{$cash->date}}">
														<input type="hidden" name="amount" value="{{$cash->amount}}">
														<input type="hidden" name="token" value="{{$cash->token}}">
														<button type="submit" class="bttm bttn-fill bttn-sm bttn-success">approve</button>
													</form>
											@else	
													{!!Form::open(['route' => ['admin.cash.destroy', $cash->id], 'method' => 'DELETE'])!!}
														{{Form::button('remove',['type' => 'submit','class' => 'bttm bttn-fill bttn-sm bttn-danger'])}}
													{!!Form::close()!!}
											@endif
										</td>
									</tr>	
								@endforeach
							@endif
						</table>
						{{$cashes->links()}}
				</div>
 		</div>
 </div>
@endsection
