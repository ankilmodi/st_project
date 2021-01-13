@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb" align="center">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">User View</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- right column -->
            <div class="col-md-8 col-md-offset-1">
                <div class="row">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">User details</h3>
                        </div>
                           
                        <div class="box-body">
                         
                         <div class="form-group">
                                <label for="first_name" class="col-sm-4 control-label">Name</label>
                            <div class="col-sm-5">
                                <label for="first_name" class="col-sm-4 control-label">{{$user->name}}</label>
                            </div>
                            </div>

                             <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-5">    
                                <label for="email" class="col-sm-4 control-label">{{$user->email}}</label>
                             </div>   
                            </div> 
                            <div class="form-group">
                                <label for="phone" class="col-sm-4 control-label">Phone</label>
                            <div class="col-sm-5">    
                                 <label for="phone" class="col-sm-4 control-label">{{$user->mobile}}</label>
                             </div> 
                            </div> 
                </div>
                </div>
            </div>
        </section>
    </div>
@endsection