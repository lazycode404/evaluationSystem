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
                    <a href="/home" class="back"><i class="fa fa-arrow-left" aria-hidden="true"></i> GO BACK</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
        <div class="content">
            <div class="container d-flex justify-content-center">
                <div class="row">
                    <!-- /.col-md-6 -->
                    @foreach ($section as $section)
                        @if ($section->status == 1)
                            <div class="col-lg-4 col-4 mx-auto">
                                <div class="card text-center" style="width: 18rem;">
                                    <div class="card-body">
                                        <b>
                                            <h2>{{ $section->description }}</h2>
                                        </b>
                                        <a href="{{ url('home/' . $courses->Coursename . '/' . $section->Sectionname) }}"
                                            class="btn btn-primary">Select</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
