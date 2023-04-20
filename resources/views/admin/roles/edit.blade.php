@extends('admin.layouts.master')
@section('title')
Edit role
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-tasks"></i>
               </div>
               <div class="header-title">
                  <h1>Edit role</h1>
                  <small>Edit roles</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     @includeif('partials.message')
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{route('role.index')}}"> 
                              <i class="fa fa-list"></i>  View roles </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-10" method="POST" action="{{route('role.update',$role->id)}}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                 <label>Role Name</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter role Name" name="name" value="{{$role->name}}" id="name" required>
                              </div>
                              <div class="row">
                                 <h4 class="text-center">Admin Site Permissions</h4>
            <div class="col-lg-4">
      <label for="name">User Permissions</label>
      @foreach($permissions as $permission)
           @if($permission->for=='user')
           
            <p><input name="permission[]" value="{{ $permission->id }}" @if($role->permissions->pluck('id')->contains($permission->id)) checked @endif type="checkbox">  {{ $permission->name }}</p>
           
           @endif
      @endforeach
            </div>
            <div class="col-lg-4">
      <label for="name">Product Permissions</label>
      @foreach($permissions as $permission)
           @if($permission->for=='product')
           <p><input name="permission[]" value="{{ $permission->id }}" @if($role->permissions->pluck('id')->contains($permission->id)) checked @endif type="checkbox">  {{ $permission->name }}</p>
           @endif
      @endforeach
            </div>
            
              <div class="col-lg-4">
      <label for="name">Category Permissions</label>
      @foreach($permissions as $permission)
           @if($permission->for=='category')
           <p><input name="permission[]" value="{{ $permission->id }}" @if($role->permissions->pluck('id')->contains($permission->id)) checked @endif type="checkbox">  {{ $permission->name }}</p>
           @endif
      @endforeach
            </div>
              <div class="col-lg-4">
      <label for="name">Coupon Permissions</label>
      @foreach($permissions as $permission)
           @if($permission->for=='coupon')
           <p><input name="permission[]" value="{{ $permission->id }}" @if($role->permissions->pluck('id')->contains($permission->id)) checked @endif type="checkbox">  {{ $permission->name }}</p>
           @endif
      @endforeach
            </div>
              <div class="col-lg-4">
      <label for="name">Role Permissions</label>
      @foreach($permissions as $permission)
           @if($permission->for=='role')
           <p><input name="permission[]" value="{{ $permission->id }}" @if($role->permissions->pluck('id')->contains($permission->id)) checked @endif type="checkbox">  {{ $permission->name }}</p>
           @endif
      @endforeach
            </div>
            <div class="col-lg-4">
      <label for="name">Permission Permissions</label>
      @foreach($permissions as $permission)
           @if($permission->for=='permission')
           <p><input name="permission[]" value="{{ $permission->id }}" @if($role->permissions->pluck('id')->contains($permission->id)) checked @endif type="checkbox">  {{ $permission->name }}</p>
           @endif
      @endforeach
            </div>
            @foreach($permissions as $permission)
            @if($permission->for=="other")
            <?php $continue="set" ?>
@else

            @endif
            @endforeach
           <?php if(isset($continue)): ?>
               <div class="col-lg-4">
      <label for="name">Other Permissions</label>
      @foreach($permissions as $permission)
           @if($permission->for=='other')
           <p><input name="permission[]" value="{{ $permission->id }}" @if($role->permissions->pluck('id')->contains($permission->id)) checked @endif type="checkbox">  {{ $permission->name }}</p>
           @endif
      @endforeach
            </div>
            

            <?php endif; ?>
         </div>
        
                           
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Update role">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
@endsection

@section('myscript')

@endsection