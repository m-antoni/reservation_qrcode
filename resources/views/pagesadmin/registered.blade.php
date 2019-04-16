@extends('layouts.adminlayout')

@section('content')

<h2 class="text-secondary"><i class="fa fa-database"></i> Sign-up</h2>
<div class="row">
		<div class="col-md-10">
				<div class="table-responsive-sm pt-2">
					<table class="table table-secondary table-hover">
						<tr class="bg-dark text-warning">
							<th>Name</th>
							<th>Email</th>
			        <th>Phone</th>
			        <th>Amount</th>
							<th width="10%" style="text-align: center;">Action</th>
						</tr>
						@if(count($registered) > 0)
							@foreach($registered as $reserve)
								<tr>
									<td>{{$reserve->name}}</td>
									<td>{{$reserve->email}}</td>
		              <td>{{$reserve->phone}}</td>
		              <td>{{$reserve->amount}}</td>
									<td>
										<table class="table-sm">
												<td>
													<a href="{{route('admin.registered.show', $reserve->id)}}">
													<button class="bttn bttn-fill bttn-sm bttn-primary">
														view</button>
													</a>
												</td>
												<td>
													{!!Form::open(['route' => ['admin.registered.destroy', $reserve->id], 'method' => 'DELETE'])!!}
														{{Form::button('delete',['type' => 'submit','class' => 'bttm bttn-fill bttn-sm bttn-danger'])}}
													{!!Form::close()!!}
												</td>
										</table>	
									</td>
								</tr>	
							@endforeach
						@endif
					</table>
				</div>
					<!-- PAGINATION LINKS -->
					{{$registered->links()}}
		</div>
</div>
@endsection