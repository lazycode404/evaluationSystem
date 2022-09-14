@extends('layouts.main')

@section('title')
    Evaluation System
@endsection

<style>
    .back {
        text-decoration: none !important;

    }

    .back:hover {
        color: black;
    }

    .card-text {
        font-size: 14px;
    }

    .section {
        font-size: 11px;
        color: gray;
    }
</style>
<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
    <div class="container">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
    </div>
</nav>
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ url('home/' . $courses->Coursename) }}" class="back"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i> GO BACK</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container mt-4 justify-content-center">
        <div class="row">
            @foreach ($group as $key)
                <div class="col-auto mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <b>
                                <h4>{{ $key->capstoneTitle }}</h4>
                            </b>
                            <p class="card-text">{{ $key->name }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="{{ url('home/' . $courses->Coursename . '/' . $section->Sectionname . '/' . $key->name) }}"
                                class="btn btn-primary">Select</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
