@extends('layouts.adminlayout')

@section('content')
	<div class="col-md-12">
			<h2 class="text-secondary"><i class="fa fa-send"></i> Inquiries</h2> 
			<div class="table-responsive-sm pt-2">
				<table class="table table-secondary table-hover">
					<tr class="bg-dark text-warning">
						<th>Name</th>
						<th>Email</th>
						<th>Message</th>
						<th width="10%" style="text-align: center;">Action</th>
					</tr>
					@if(count($inquiries) > 0)
						@foreach($inquiries as $inquiry)
						<tr>
								<td>{{$inquiry->name}}</td>
								<td>{{$inquiry->email}}</td>
								<td>{{substr($inquiry->message, 0 ,70)}} {{strlen($inquiry->message) > 50 ? " ..." : ""}}</td>
								<td>
									<table class="table-sm">
										<td>
											<a href="{{route('admin.inquiry.show', $inquiry->id)}}">
												<button class="bttn bttn-fill bttn-sm bttn-primary">
													view</button>
											</a>
										</td>
										<td>
											{!!Form::open(['route' => ['admin.inquiry.destroy', $inquiry->id], 'method' => 'DELETE'])!!}
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
			{{$inquiries->links()}}
	</div>
@endsection