@extends('admin.layouts.master')
@section('title')
All roles
@endsection


@section('mycss')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection


@section('myscript')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

@endsection


@section('content')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-gift"></i>
               </div>
               <div class="header-title">
                  <h1>roles</h1>
                  <small>role List</small>
               </div>
            </section>
<div style="display:none;" class="alert alert-sm alert-success msgSuccess">Status Enabled</div>
<div  style="display:none;" class="alert alert-sm alert-danger msgError">Status Disabled</div>
            @includeif('partials.message')
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>All roles</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{route('role.create')}}"> <i class="fa fa-plus"></i> Add role
                                 </a>  
                              </div>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           @if(!$roles->isEmpty())
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sr</th>
                                        <th>Role Name</th>

                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   @foreach($roles as $role)
                                    <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$role->name}}</td>
                                        
                                       <td><input type="checkbox" class="role_status" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" rel="{{$role->id}}" data-offstyle="danger" checked></td>
                                       <td style="display:flex;">
                                           <a href="#"><button type="button" title="View Detail" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{$role->id}}"><i class="fa fa-info-circle"></i></button></a>
                                          <a href="{{route('role.edit',$role->id)}}"><button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button></a>
                                    <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('form-delete{{$role->id}}').submit();"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button></a>
                                 <form id="form-delete{{$role->id}}" action="{{ route('role.destroy',$role->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                       </td>
                                    </tr>
                                      <div class="modal fade" id="myModal{{$role->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{$role->name}} Role</h4>
        </div>
        <div class="modal-body">
         <h4>Permissions:</h4>
         <ul>
            @foreach($role->permissions->pluck('name') as $permission)
            <li>{{$permission}}</li>
            @endforeach
         </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                           @else
                           <p class="text-center alert alert-info">No Record Found</p>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
@endsection