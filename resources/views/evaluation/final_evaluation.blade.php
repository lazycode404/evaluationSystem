@extends('layouts.main')

@section('title')
    Evaluation System
@endsection

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
    .trow {
        border: none !important;
    }

    .tdow {
        border: none !important;
    }


    .sm {
        font-size: 12px;
    }

    .insideTable,
    .insideTH,
    .insideTD {
        border: 1px solid black;
        border-collapse: collapse;
    }
    textarea{
        border: none!important;
        border-bottom: 2px solid silver!important; 
    }
</style>

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ url('home/' . $courses->Coursename . '/' . $section->Sectionname . '/' . $group->name) }}"
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
        <div class="card eval">
            <!-- /.card-header -->
            <div class="card-body printable">
                <table id="example2" class="table">
                    <tr class="trow">
                        <th colspan="4" class="text-center tdow">RESEARCH PROPOSAL FINAL EVALUATION SHEET</th>
                    </tr>
                    <tr class="trow">
                        <td class="tdow" width="70%"><b style="margin-right: 25px;">Name of the Proponent/s:</b> {{ $member->members }}</td>
                        <td class="tdow"><b>Data of Evaluation:</b> {{date('m/d/Y')}}</td>
                        <td class="tdow"></td>
                        <td class="tdow"></td>
                    </tr>
                    <tr class="trow">
                        <td class="tdow"></td>
                        <td class="tdow"></td>
                        <td class="tdow"></td>
                        <td class="tdow"></td>
                    </tr>
                    <tr class="trow">
                        <td class="tdow" colspan="4"><b style="margin-right: 25px;">Title of the Study:</b> {{ $group->capstoneTitle }}</td>
                    </tr>
                    <tr class="trow">
                        <td class="tdow" colspan="4"><b>Recommendation/s:</b> </td>
                    </tr>
                    <td class="tdow" colspan="4">
                        <textarea name="" id="" class="form-control" placeholder="Type your recommendation"></textarea>
                    </td>
                    <tr class="trow">
                        <th class="tdow">
                            <p>Scale of Rating: <br></p>
                            <p style="text-align: left; margin-left:120px;">
                                4 - Competent (Requirement evidently exceeded)<br>
                                3 - Acceptance (Requirement evidently exceeded)<br>
                                2 - Needs Improvement (Requirement evidently incomplete)<br>
                                1 - Unacceptable (Requirement lacks evidence)<br>
                            </p>
                        </th>
                    </tr>
                    <tr>
                        <table style="width: 100%" class="insideTable">
                            <tr bgcolor="#5BC85B" class="text-center">
                                <th class="insideTH" width="70%">AREAS OF EVALUATION</th>
                                <th class="insideTH">4</th>
                                <th class="insideTH">3</th>
                                <th class="insideTH">2</th>
                                <th class="insideTH">1</th>
                            </tr>
                            <tr>
                                <td class="insideTD" style="font-weight: bold; padding-left: 10px">CHAPTER 1: THE PROBLEM
                                    AND IT'S BACKGROUND</td>
                                <td class="insideTD"></td>
                                <td class="insideTD"></td>
                                <td class="insideTD"></td>
                                <td class="insideTD"></td>
                            </tr>
                            {{-- CH1Q1 --}}
                            <tr>
                                <td class="insideTD" style="padding-left: 10px">• Background of the study clearly explained
                                    the need for the study</td>
                                <td class="insideTD text-center"><input name="CH1Q1" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q1" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q1" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q1" type="radio" required></td>
                            </tr>
                            {{-- CH1Q2 --}}
                            <tr>
                                <td class="insideTD" style="padding-left: 10px">• Gap in the literature related to the
                                    specified topic identified</td>
                                <td class="insideTD text-center"><input name="CH1Q2" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q2" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q2" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q2" type="radio" required></td>
                            </tr>
                            {{-- CH1Q3 --}}
                            <tr>
                                <td class="insideTD" style="padding-left: 10px">• The problem is researchable, clear and
                                    concise</td>
                                <td class="insideTD text-center"><input name="CH1Q3" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q3" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q3" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q3" type="radio" required></td>
                            </tr>
                            {{-- CH1Q4 --}}
                            <tr>
                                <td class="insideTD" style="padding-left: 10px">• The problem stated is feasible and
                                    researcher’s motivation and interest demonstrated</td>
                                <td class="insideTD text-center"><input name="CH1Q4" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q4" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q4" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q4" type="radio" required></td>
                            </tr>
                            <tr>
                                <td class="insideTD" style="font-weight: bold; padding-left: 10px">Significance of the
                                    Study</td>
                                <td class="insideTD"></td>
                                <td class="insideTD"></td>
                                <td class="insideTD"></td>
                                <td class="insideTD"></td>
                            </tr>
                            {{-- CH1Q5 --}}
                            <tr>
                                <td class="insideTD" style="padding-left: 10px">• The reason why the study needs to be
                                    conducted is explained</td>
                                <td class="insideTD text-center"><input name="CH1Q5" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q5" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q5" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q5" type="radio" required></td>
                            </tr>
                            {{-- CH1Q6 --}}
                            <tr>
                                <td class="insideTD" style="padding-left: 10px">• The problem indicates practical
                                    significance or value to several stakeholders</td>
                                <td class="insideTD text-center"><input name="CH1Q6" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q6" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q6" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q6" type="radio" required></td>
                            </tr>
                            {{-- CH1Q7 --}}
                            <tr>
                                <td class="insideTD" style="padding-left: 10px">• Scope and Limitations</td>
                                <td class="insideTD text-center"><input name="CH1Q7" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q7" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q7" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q7" type="radio" required></td>
                            </tr>
                            {{-- CH1Q8 --}}
                            <tr>
                                <td class="insideTD" style="padding-left: 10px">• Specifies and properly explains the scope and delimitations</td>
                                <td class="insideTD text-center"><input name="CH1Q8" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q8" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q8" type="radio" required></td>
                                <td class="insideTD text-center"><input name="CH1Q8" type="radio" required></td>
                            </tr>
                        </table>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

@section('scripts')
@endsection
