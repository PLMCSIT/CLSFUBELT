@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Create new Permission</h3>
		</div>
		<div class="box-body">
			<form action="{{url('permissions/store')}}" method = "post">
				{!! csrf_field() !!}
				<div class="form-group">
				<label for="">Permission</label>
					<input type="text" name = "name" class = "form-control" placeholder = "Name">
					<input type="text" name = "display_name" class = "form-control" placeholder = "Display Name">
					<input type="text" name = "description" class = "form-control" placeholder = "Description">
				</div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Create</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
