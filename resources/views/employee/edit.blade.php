@extends('larasnap::layouts.app', ['class' => 'menu-create'])
@section('title','Menu Management')
@section('content')
	<!-- Page Heading  Start-->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Add Menu</h1>
	</div>
	<!-- Page Heading End-->
	<!-- Page Content Start-->
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-body">
					<div class="card-body">
						<a href="{{ route('employees.index') }}" title="Back to Menu List" class="btn btn-warning btn-sm"><i aria-hidden="true" class="fa fa-arrow-left"></i> Back to Menu List
						</a>
						<br> <br>
                        <form class="table row col-xl-9" style="margin-left:200px" method="post" action="{{route('employees.update')}}" enctype="multipart/form-data" >
                         @csrf
                         @method('put')
                         <div class="row">
                         <div class="col-xl-12  text-center mb-4">
                         <h4>Register<h4>
                        </div>
                        <input type="hidden" name="id" value="{{$employee['id'] }}" />
                        <div class="col-xl-6">
                            <lable for="first_name">FirstName</lable></div>
                            <div class="col-xl-6 mb-4 text-danger">
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $employee->first_name) }}"/>
                                @if($errors->has('first_name'))
                                 {{ $errors->first('first_name') }}
                                 @endif
                             </div>
            <div class="col-xl-6 ">
            <lable for="last_name">LastName</lable></div>
            <div class="col-xl-6 mb-4 text-danger">
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $employee->last_name) }}"/>
            @if($errors->has('last_name'))
                {{ $errors->first('last_name') }}
            @endif
            </div>
            <div class="col-xl-6">
            <lable for="gender">Gender</lable></div>
            <div class="col-xl-6 mb-4">
            <input type="radio" name="gender" value="male" {{$employee['gender'] == 'male' ? 'checked' : '' }} />Male
            <input type="radio" name="gender" value="female" {{$employee['gender'] == 'female' ? 'checked': '' }} />Female
            @if($errors->has('gender'))
                {{ $errors->first('gender') }}
            @endif
            </div>
            <div class="col-xl-6">
            <lable for="city">CityName</lable></div>
            <div class="col-xl-6 mb-4 text-danger">
            <input type="text" name="city" class="form-control"  value="{{ old('city', $employee->city) }}"/>
            @if($errors->has('city'))
                {{ $errors->first('city') }}
            @endif
            </div>
            <div class="col-xl-6">
            <lable for="phone_number">PhoneNumber</lable></div>
            <div class="col-xl-6 mb-4 text-danger">
            <input type="number" name="phone_number" class="form-control" value="{{ old('phone_number', $employee->phone_number) }}"/>
            @if($errors->has('phone_number'))
                {{ $errors->first('phone_number') }}
            @endif
            </div>
            <div class="col-xl-6">
            <lable for="date_of_birth">Date-Of-Birth</lable></div>
            <div class="col-xl-6 mb-4 text-danger">
            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $employee->date_of_birth) }}"/>
            @if($errors->has('date_of_birth'))
                {{ $errors->first('date_of_birth') }}
            @endif
            </div>
            <div class="col-xl-6">
            <lable for="email">Email</lable></div>
            <div class="col-xl-6 mb-4 text-danger">
            <input type="text" name="email" class="form-control" value="{{ old('email', $employee->email) }}"/>
            @if($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
            </div>
            <div class="col-xl-6">
            <lable for="password">Password</lable></div>
            <div class="col-xl-6 mb-4 text-danger">
            <input type="password" name='password' class="form-control" value="{{old('password')}}"/>
            @if($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
            </div>
            <div class="col-xl-6">
            <lable for="confirm_password">Confirm Password</lable></div>
            <div class="col-xl-6 mb-4">
            <input type="password" name="confirm_password" class="form-control" value="{{old('confirm_passwors')}}"/>
            </div>
            <div class="col-xl-6">
            <lable>Submit</lable></div>
            <div class="col-xl-6 mb-4">
            <input type="submit" value="update" class="btn btn-primary"/></div>
            </div>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        @endsection
