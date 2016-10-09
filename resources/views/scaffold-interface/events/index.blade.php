@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>All Events</h3>
		</div>
		<div class="box-body">
			<a href="{{url('events/create')}}" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i> New</a>
			<table class="table table-striped">
				<head>
					<th>Events</th>
					<th>Actions</th>
				</head>
				<tbody>
					@foreach($events as $event)
					<tr>
						<td>{{$event->event_title}}</td>
						<td>
							<a href="{{url('/events/edit')}}/{{$event->id}}" class = "btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="{{url('/events/delete')}}/{{$event->id}}" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection
