@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           
            <ol class="breadcrumb" align="center">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add Employee</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- right column -->
            <div class="col-md-8 col-md-offset-1">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">ADD USER</h3>
                        </div>
                        <form class="form-horizontal" action="{{ route('users.store')}}" method="post" enctype="multipart/form-data" data-parsley-validat >
                            <div class="box-body">
                                {{ csrf_field() }}
                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-sm-4 control-label">Name</label>
                                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Enter Name" value="{{old('name')}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            
                                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-5">
                            <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Enter Email" value="{{old('email')}}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div> 


                                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                    <label for="mobile" class="col-sm-4 control-label">Mobile</label>
                                    <div class="col-sm-5">
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                               placeholder="Enter Mobile" value="{{old('mobile')}}">
                                        @if ($errors->has('mobile'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div> 

                            <div class="box-footer">               
                                <button type="submit" name="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection