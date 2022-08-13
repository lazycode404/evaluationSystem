@extends('layouts.main')

@section('title')
    Evaluation System
@endsection

<style>
    .rowcontent {
        text-align: center;
    }

    .col-lg-4 {
        display: inline-block;
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
<style>
    #example2 {
        border: none !important;
    }

    .trow {
        border: none !important;
    }

    .tdow {
        border: none !important;
    }

    .equivalent,
    .numerical {
        margin: auto;
    }

    .column {
        float: left;
        width: 50%;
    }
    .sm{
        font-size: 12px;
    }
</style>
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ url('home/' . $courses->Coursename . '/' . $section->Sectionname . '/' . $member->groupName) }}"
                        class="back"><i class="fa fa-arrow-left" aria-hidden="true"></i> GO BACK</a>
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
        <div class="container">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <form
                        action="{{ url('home/' . $courses->Coursename . '/' . $section->Sectionname . '/' . $member->groupName . '/title_evalutaion/submitted') }}"
                        method="POST">
                        @csrf
                        <table id="example2" class="table">
                            <tr class="trow">
                                <td class="tdow" style="text-align: center;" colspan=""><img
                                        src=" {{ asset('assets/images/tagslogo.png') }} " height="90" alt="">
                                </td>
                                <td class="tdow" style="text-align: center;" colspan="1">
                                    <p>
                                        Republic of the Philippines <br>
                                        City of Tagaytay <br>
                                        <b>City College of Tagaytay</b><br>
                                        Akle St., Kaybagal South, Tagaytay City 4120 <br>
                                        Tel. Nos. (046) 483-0470 / (046) 483 -0672
                                    </p>
                                </td>
                                <td class="tdow" style="text-align: center;" colspan="1"><img
                                        src="{{ asset('assets/images/cctlogo.png') }}" height="90" alt=""></td>
                            </tr>
                            <tr class="trow">
                                <td class="tdow" colspan="1"></td>
                                <td class="tdow" style="text-align: center;">
                                    <b>
                                        SCHOOL OF COMPUTER STUDIES <br>
                                        EVALUATION SHEET

                                    </b>
                                </td>
                                <td class="tdow" colspan="1"></td>
                            </tr>
                            <tr class="trow">
                                <td class="tdow" style="text-align: right;" colspan="1"></td>
                                <td class="tdow"><b style="margin-right: 35px;">Name of Ratee: </b>{{ $member->members }}
                                </td>
                                <td class="tdow" style="text-align: center;" colspan="1"></td>
                            </tr>
                            <tr class="trow">
                                <td class="tdow" style="text-align: right;" colspan="1"></td>
                                <td class="tdow" colspan="3"><b style="margin-right: 35px;">Title of Study:
                                    </b>{{ $group->capstoneTitle }}</td>
                            </tr>

                            <tr>
                                <table style="width:80%; margin-left: auto; margin-right: auto;" id="example"
                                    class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">CRITERION</th>
                                            <th style="text-align: center;">WEIGHT (%)</th>
                                            <th style="text-align: center;">RATING (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1. Organization of presentation (topical arrangement)</td>
                                            <td style="text-align: center;">20</td>
                                            <td style="text-align: center;"><input name="q1" type="number" min="0" max="20" class="form-control"
                                                    size="1"></td>
                                        </tr>
                                        <tr>
                                            <td>2. Content of the presentation (depth of the information presented)</td>
                                            <td style="text-align: center;">35</td>
                                            <td style="text-align: center;"><input name="q2" type="number" min="0" max="35" class="form-control"
                                                    size="1"></td>
                                        </tr>
                                        <tr>
                                            <td>3. Composure/Personality (stage presence, attire, projection)</td>
                                            <td style="text-align: center;">5</td>
                                            <td style="text-align: center;"><input name="q3" type="number" min="0" max="5" class="form-control"
                                                    size="1"></td>
                                        </tr>
                                        <tr>
                                            <td>4. Delivery (voice quality, visual aids)</td>
                                            <td style="text-align: center;">10</td>
                                            <td style="text-align: center;"><input name="q4" type="number" min="0" max="10" class="form-control"
                                                    size="1"></td>
                                        </tr>
                                        <tr>
                                            <td>5. Answers to questions</td>
                                            <td style="text-align: center;">30</td>
                                            <td style="text-align: center;"><input name="q5" type="number" min="0" max="30" class="form-control"
                                                    size="1"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2"><b>General Weighted Average:</b></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><b>Numerical: </b></td>
                                            <td>
                                                <p class="numerical"></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><b>Equivalent: </b></td>
                                            <td>
                                                <p class="equivalent"></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="column">
                                        <p style="text-align: left; margin-left:120px;">
                                            Average Rating Legend(%): <br>
                                            95.0 – 100 = Excellent <br>
                                            89.0 – 94.9 = Outstanding <br>
                                            83.0 – 88.9 = Very Satisfactory <br>
                                            77.0 – 82.9 = Satisfactory <br>
                                            75.0 – 76.9 = Fair <br>
                                            below 70 = Poor/Failed <br>
                                        </p>
                                    </div>
                                </div>
                                <br>
                            </tr>
                        </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-primary mb-5 ">SUBMIT</button>
            </div>
            </form>
        </div>
    </div>
@endsection
