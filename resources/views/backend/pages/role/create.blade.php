@extends('backend.layouts.master')
@section('title')
    Role Create Page - Admin Panel
@endsection

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Role Create</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li><span>All Roles</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create New Role</h4>
                        @include('backend.layouts.partials.message')
                        <form action="{{route('admin.roles.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Role Name">

                            </div>

                            <div class="form-group">
                                <label for="name">Permission</label>
                                @foreach($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" name="permissions[]" class="form-check-input" id="exampleCheck1{{$permission->id}}" value="{{$permission->name}}">
                                        <label class="form-check-label" for="exampleCheck1{{$permission->id}}">{{$permission->name}}</label>
                                    </div>
                                    @endforeach


                            </div>



                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Create Role</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
