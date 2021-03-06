@extends('larasnap::layouts.app', ['class' => 'menu-edit'])
@section('title','Menu Management')
@section('content')
	<!-- Page Heading  Start-->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Menu</h1>
	</div>
	<!-- Page Heading End-->
	<!-- Page Content Start-->
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-body">
					<div class="card-body">
						<a href="{{ route('menus.index') }}" title="Back to Menu List" class="btn btn-warning btn-sm"><i aria-hidden="true" class="fa fa-arrow-left"></i> Back to Menu List
						</a>
						<br> <br>
						<form method="POST" action="{{ route('menus.update', $menu->id) }}" class="form-horizontal" autocomplete="off">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="name" class="control-label">Name(Slug)<small class="text-danger required">*</small></label>
										<input name="name" type="text" id="name" class="form-control lower-case" value="{{ old('name', $menu->name) }}">
										@error('name')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="label" class="control-label">Label<small class="text-danger required">*</small></label>
										<input name="label" type="text" id="label" class="form-control" value="{{ old('label', $menu->label) }}">
										@error('label')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="submit" value="Update" class="btn btn-primary">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Content End-->
@endsection