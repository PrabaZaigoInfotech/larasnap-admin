@extends('larasnap::layouts.app', ['class' => 'menu-index'])
@section('title','Menu Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Lists</h1>
</div>
<!-- Page Heading End-->				  
<!-- Page Content Start-->				  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
               <form  method="POST" action="" id="list-form" class="form-inline my-2 my-lg-0" autocomplete="off">
                  @method('POST')
                  @csrf
                  <div class="col-md-2 pad-0">
                     @canAccess('menus.create')
                     <a href="{{ route('employees.create') }}" title="Add New Menu" class="btn btn-primary btn-sm"><i aria-hidden="true" class="fa fa-plus"></i> Add New Employee
                     </a>
                     @endcanAccess
                  </div>
                  <!-- list filters -->
                  
                  <!-- list filters -->
                  <br> <br> 
                  <div class="table-responsive">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>FirstName</th>
                              <th>LastName</th>
                              <th>Gender</th>
                              <th>CityName</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                        @forelse($employee as $employees)
                           <tr>
                              <td>{{ $employees->id }}</td>
                              <td>{{ $employees->first_name }}</td>
                              <td>{{ $employees->last_name }}</td>
                              <td>{{ $employees->gender }}</td>
                              <td>{{ $employees->city }}</td>
                              <td>{{ $employees->phone_number }}</td>
                              <td>{{ $employees->email }}</td>
                              <td>
								 @showData('menu', $employees->name)
                                 @canAccess('menus.edit')
                                 <a href="{{ route('employees.edit', $employees->id) }}" title="Edit Menu"><button class="btn btn-primary btn-sm" type="button"><i aria-hidden="true" class="fa fa-pencil-square-o"></i></button></a>
                                 @endcanAccess
                                 @canAccess('menus.destroy')
                                 <a href="#" onclick="return individualDelete({{ $employees->id}})" title="Delete Menu"><button class="btn btn-danger btn-sm" type="button"><i aria-hidden="true" class="fa fa-trash"></i></button></a>
                                 @endcanAccess
								 @endshowData
                              </td>
                           </tr>
                        @empty
                           <tr>
                              <td class="text-center" colspan="12">No Menu found!</td>
                           </tr>
                        @endforelse
                     </tbody>
                     </table>
                     <div class="pagination">
                        {{ $employee->links() }}
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