@extends('layouts.master')

@section('title', 'Evaluation System Dashboard')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="container-fluid">
        @include('layouts.components.flashmessages')
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalUser }}</h3>

                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="/admin/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$totalCourse}}</h3>

                        <p>Total Course</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <a href="/admin/course" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-pink">
                    <div class="inner">
                        <h3>{{$totalSection}}</h3>

                        <p>Total Section</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-th-list"></i>
                    </div>
                    <a href="/admin/section" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3>{{$totalGroup}}</h3>

                        <p>Total Groups</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-address-book"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
