@extends('layouts.master')

@section('title', 'Evaluation System Users')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Oral Proposal Evaluation Results</li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-0">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Evaluator</th>
                                    <th>Group Name</th>
                                    <th>Capstone Title</th>
                                    <th>Course & Section</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($oralEvaluation as $oralEvaluation)
                                    <tr>
                                        <td>{{ $oralEvaluation->evaluator }}</td>
                                        <td>{{ $oralEvaluation->groupName }}</td>
                                        <td>{{ $oralEvaluation->capstoneTitle }}</td>
                                        <td>{{ $oralEvaluation->section }}</td>
                                        <td>{{ date_format($oralEvaluation->created_at, 'm/d/Y g:i A') }}</td>
                                        <td>
                                            <a href="/adviser/oral_evaluation/{{$oralEvaluation->id}}/result" target="_blank" class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>

@endsection
