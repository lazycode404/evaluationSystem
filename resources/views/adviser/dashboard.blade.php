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
                <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3>{{$totalGroup}}</h3>

                        <p>Total Groups</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-address-book"></i>
                    </div>
                    <a href="/adviser/group" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$totalTItleEvalResult}}</h3>

                        <p>Title Evaluation Proposal Results</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-alt"></i>
                    </div>
                    <a href="/adviser/title_proposal_evaluation" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$totalFinalEval}}</h3>

                        <p>Final Evaluation Proposal Results</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-alt"></i>
                    </div>
                    <a href="/adviser/final_proposal_evaluation" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Proposal Evaluation Results</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-alt"></i>
                    </div>
                    <a href="/adviser/final_proposal_evaluation" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
