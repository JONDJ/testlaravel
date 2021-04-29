@extends('layouts.admin')
@section('table')
<div class="row" class='searchbar'>
    <form>
        <div class="form-group d-flex">
            <input class="form-control me-2" value="{{$_GET['search']??''}}" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </div>
    </form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<thead>
    <tr>
        <th class="cabeceraTabla" data-id="{{ Request::fullUrlWithQuery(['sort' => 'id', 'order' => $order_list])}}">Id <span class="material-icons">unfold_less</span></th>
        <th class="cabeceraTabla" data-id="{{ Request::fullUrlWithQuery(['sort' => 'email', 'order' => $order_list])}}">Email <span class="material-icons">unfold_less</span></th>
        <th class="cabeceraTabla" data-id="{{ Request::fullUrlWithQuery(['sort' => 'name', 'order' => $order_list])}}">Name <span class="material-icons">unfold_less</span></th>
        <th class="cabeceraTabla" data-id="{{ Request::fullUrlWithQuery(['sort' => 'cell_phone', 'order' => $order_list])}}">Cell Phone <span class="material-icons">unfold_less</span></th>
        <th class="cabeceraTabla" data-id="{{ Request::fullUrlWithQuery(['sort' => 'document', 'order' => $order_list])}}">Document <span class="material-icons">unfold_less</span></th>
        <th class="cabeceraTabla" data-id="{{ Request::fullUrlWithQuery(['sort' => 'birth_date', 'order' => $order_list])}}">Birth Date <span class="material-icons">unfold_less</span></th>
        <th>Age</th>
        <th>City</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach($list as $line)
        <tr>
            <td>{{$line->id}}</td>
            <td>{{$line->email}}</td>
            <td>{{$line->name}}</td>
            <td>{{$line->cell_phone}}</td>
            <td>{{$line->document}}</td>
            <td>{{$line->birth_date}}</td>
            <td>{{$line->age}}</td>
            <td>{{$line->city_id}}</td>
            <td>
                <a href="#editModal" class="edit" data-id="{{$line->id}}" data-toggle="modal"><span class="material-icons">mode_edit</span></a>
                <a href="#deleteModal" class="delete" data-id="{{$line->id}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            </td>
        </tr>
    @endforeach
</tbody>
<!-- Edit Modal HTML -->
<div id="addModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="confirm_password" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Cell Phone</label>
                        <input type="text" name="cell_phone" class="form-control">
					</div>					
                    <div class="form-group">
						<label>Document</label>
						<input type="text" name="document" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Birth Date</label>
						<input type="date" name="birth_date" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>City</label>
						<input type="text" name="city_id" list="cities" class="form-control" required>
                        <datalist id="cities">
                        </datalist>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="post" action="">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Cell Phone</label>
						<input type="text" name="cell_phone" class="form-control">
					</div>					
                    <div class="form-group">
						<label>Document</label>
						<input type="text" name="document" class="form-control" disabled>
					</div>
                    <div class="form-group">
						<label>Birth Date</label>
						<input type="date" name="birth_date" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>City</label>     
						<input type="text" name="city_id" list="cities" class="form-control" required>
                        <datalist id="cities">
                        </datalist>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="post" action="">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Delete User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<script src="{{url('js/admin/users.js')}}"></script>
@stop