@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Edit Role</h3>
		</div>
		<div class="box-body">
			<form action="{{url('roles/update')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "role_id" value = "{{$role->id}}">
				<div class="form-group">
				<label for="">Role</label><br>
					Name <input type="text" name = "name" class = "form-control" placeholder = "Name" value = "{{$role->name}}"><br>
					Display Name <input type="text" name = "display_name" class = "form-control" placeholder = "Display Name" value = "{{$role->display_name}}"> <br>
					Description <input type="text" name = "description" class = "form-control" placeholder = "Description" value = "{{$role->description}}"> <br>
				</div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Update</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3>{{$role->name}} Permissions</h3>
				</div>
				<div class="box-body">
					<form action="{{url('roles/addPermission')}}" method = "post">
						{!! csrf_field() !!}
						<input type="hidden" name = "role_id" value = "{{$role->id}}">
						<div class="form-group">
							<select name="permission_name" id="" class = "form-control">
								@foreach($permissions as $permission)
								<option value="{{$permission}}">{{$permission}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<button class = 'btn btn-primary'>Add permission</button>
						</div>
					</form>
					<table class = 'table'>
						<thead>
							<th>Permission</th>
							<th>Action</th>
						</thead>
						<tbody>
						@if(!empty($roles))
							@foreach($roles as $rolevar)
								@if($rolevar->id == $role->id)
									@if(!empty($rolevar->perms))
										@foreach($rolevar->perms as $rolepermissions)
											<tr>
												<td>{{$rolepermissions->name}}</td>
												<td><a href="{{url('roles/revokePermission')}}/{{str_slug($rolepermissions->name,'-')}}/{{$role->id}}" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
											</tr>
										@endforeach
									@else
										No Permission
									@endif
								@endif
							@endforeach
						@endif
						</tbody>
					</table>
				</div>
			</div>
		 </div>
	   </div>
	</div>

</section>
@endsection

