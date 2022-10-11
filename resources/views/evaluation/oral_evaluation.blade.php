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

    textarea {
        border: none !important;
        border-bottom: 2px solid silver !important;
    }

    .leftimage {
        margin-left: 90px;
    }

    .rightimage {
        margin-left: 100px;
    }

    @media print {
        tr.headers {
            background-color: #5BC85B !important;
            -webkit-print-color-adjust: exact;
        }

        @page {
            size: A4;
            margin-top: 18mm;
            margin-bottom: 18mm;

        }

        textarea {
            visibility: hidden;
        }

        .leftimage {
            margin-left: 5px;
        }

        .add {
            margin-left: 120px;
        }

        .rightimage {
            margin-left: 130px;
        }
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
        <div class="card eval py-5">
            <!-- /.card-header -->
            <form
                action="{{ url('home/' . $courses->Coursename . '/' . $section->Sectionname . '/' . $group->name . '/oral_evaluation/submitted') }}"
                method="POST">
                @csrf
                <div class="card-body printable">
                    <table id="example2" class="table">
                        <tr class="trow">
                            <td class="tdow" colspan="2">
                                <img class="leftimage" src=" {{ asset('assets/images/tagslogo.png') }} " height="120"
                                    alt="">
                            </td>
                            <td class="tdow" style="text-align: center;">
                                <p class="add">
                                    Republic of the Philippines <br>
                                    City of Tagaytay <br>
                                    <b>City College of Tagaytay</b><br>
                                    Akle St., Kaybagal South, Tagaytay City 4120 <br>
                                    Tel. Nos. (046) 483-0470 / (046) 483 -0672
                                </p>
                            </td>
                            <td class="tdow" style="" colspan="2">
                                <img class="rightimage" src="{{ asset('assets/images/cctlogo.png') }}" height="120"
                                    alt="">
                            </td>
                        </tr>
                        <tr class="trow">
                            <td class="tdow text-center" colspan="5">
                                <b>RESEARCH PROPOSAL EVALUATION SHEET</b>
                            </td>
                        </tr>
                        <tr class="trow">
                            <td class="tdow" colspan="3"><b style="margin-right: 25px;">Name of the Proponent/s:</b>
                                @foreach ($member as $member)
                                    {{ $loop->first ? ' ' : ' , ' }}
                                    {{ $member->firstname }} {{ $member->lastname }}
                                @endforeach
                            <td class="tdow" colspan="2"><b>Data of Evaluation:</b> {{ date('m/d/Y') }}</td>
                        </tr>
                        <tr class="trow">
                            <td class="tdow" colspan="5"><b style="margin-right: 25px;">Title of the Study:</b>
                                {{ $group->capstoneTitle }}</td>
                        </tr>
                        <tr class="trow">
                            <td class="tdow" colspan="5"><b>Recommendation/s:</b> </td>
                        </tr>
                        <td class="tdow" colspan="5">
                            <textarea name="recommendation" id="" class="form-control" placeholder="Type your recommendation" required></textarea>
                        </td>
                        <tr class="trow">
                            <th class="tdow" colspan="5">
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
                                <tr bgcolor="#5BC85B" class="text-center headers">
                                    <th class="insideTH" width="70%">AREAS OF EVALUATION</th>
                                    <th class="insideTH">4</th>
                                    <th class="insideTH">3</th>
                                    <th class="insideTH">2</th>
                                    <th class="insideTH">1</th>
                                </tr>
                                {{-- CHAPTER 1 --}}
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">CHAPTER 1: THE
                                        PROBLEM
                                        AND IT'S BACKGROUND</td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH1Q1 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Background of the study clearly
                                        explained
                                        the need for the study</td>
                                    <td class="insideTD text-center"><input value="4" name="CH1Q1" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH1Q1" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH1Q1" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH1Q1" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH1Q2 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Gap in the literature related to the
                                        specified topic identified</td>
                                    <td class="insideTD text-center"><input value="4" name="CH1Q2" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH1Q2" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH1Q2" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH1Q2" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH1Q3 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The problem is researchable, clear
                                        and
                                        concise</td>
                                    <td class="insideTD text-center"><input value="4" name="CH1Q3" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH1Q3" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH1Q3" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH1Q3" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH1Q4 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The problem stated is feasible and
                                        researcher’s motivation and interest demonstrated</td>
                                    <td class="insideTD text-center"><input value="4" name="CH1Q4" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH1Q4" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH1Q4" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH1Q4" type="radio"
                                            required></td>
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
                                    <td class="insideTD text-center"><input value="4" name="CH1Q5" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH1Q5" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH1Q5" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH1Q5" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH1Q6 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The problem indicates practical
                                        significance or value to several stakeholders</td>
                                    <td class="insideTD text-center"><input value="4" name="CH1Q6" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH1Q6" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH1Q6" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH1Q6" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH1Q7 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Scope and Limitations</td>
                                    <td class="insideTD text-center"><input value="4" name="CH1Q7" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH1Q7" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH1Q7" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH1Q7" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH1Q8 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Specifies and properly explains the
                                        scope and delimitations</td>
                                    <td class="insideTD text-center"><input value="4" name="CH1Q8" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH1Q8" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH1Q8" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH1Q8" type="radio"
                                            required></td>
                                </tr>


                                {{-- CHAPTER 2 --}}
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">CHAPTER 2: REVIEW
                                        OF
                                        RELATED LITERATURE</td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH2Q1 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Sufficient overview of relevant
                                        research
                                        in particular area is provided</td>
                                    <td class="insideTD text-center"><input value="4" name="CH2Q1" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH2Q1" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH2Q1" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH2Q1" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH2Q2 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Evidence of scholarly skills and
                                        awareness of recent development in the area is shown previous research/own</td>
                                    <td class="insideTD text-center"><input value="4" name="CH2Q2" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH2Q2" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH2Q2" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH2Q2" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH2Q3 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Relationship of the problem to
                                        previous
                                        research/literature is made clear</td>
                                    <td class="insideTD text-center"><input value="4" name="CH2Q3" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH2Q3" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH2Q3" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH2Q3" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH2Q4 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Arranged related topics thematically
                                    </td>
                                    <td class="insideTD text-center"><input value="4" name="CH2Q4" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH2Q4" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH2Q4" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH2Q4" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH2Q5 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Present the synthesis thoroughly
                                    </td>
                                    <td class="insideTD text-center"><input value="4" name="CH2Q5" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH2Q5" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH2Q5" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH2Q5" type="radio"
                                            required></td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">
                                        Theoretical/Conceptual
                                        Framework</td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH2Q6 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Appropriate and essential theory /
                                        concept / phenomenon is clearly stated and systematically integrated</td>
                                    <td class="insideTD text-center"><input value="4" name="CH2Q6" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH2Q6" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH2Q6" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH2Q6" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH2Q7 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Research questions support the main
                                        problem</td>
                                    <td class="insideTD text-center"><input value="4" name="CH2Q7" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH2Q7" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH2Q7" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH2Q7" type="radio"
                                            required></td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Statement of
                                        Hypothesis/Assumptions</td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH2Q8 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Hypothesis is clearly and properly
                                        stated with empirical referents (Qualitative Research has no hypothesis, only
                                        assumption
                                        if necessary)</td>
                                    <td class="insideTD text-center"><input value="4" name="CH2Q8" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH2Q8" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH2Q8" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH2Q8" type="radio"
                                            required></td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Definition of Terms
                                    </td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH2Q9 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The independent and dependent
                                        variables
                                        are correctly identified (Variables in Qualitative research are called phenomena and
                                        it
                                        can only have one or two independent variables)</td>
                                    <td class="insideTD text-center"><input value="4" name="CH2Q9" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH2Q9" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH2Q9" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH2Q9" type="radio"
                                            required></td>
                                </tr>



                                {{-- CHAPTER 3 --}}
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">CHAPTER 3:
                                        METHODOLOGY
                                    </td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Research Design
                                    </td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH3Q1 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Described clearly and appropriate to
                                        the
                                        problem</td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q1" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q1" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q1" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q1" type="radio"
                                            required></td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Research Locale
                                    </td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH3Q2 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The location is clearly specified
                                        including these reasons for the selection</td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q2" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q2" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q2" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q2" type="radio"
                                            required></td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Research Design
                                    </td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH3Q3 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• It is appropriate and clearly
                                        described
                                    </td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q3" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q3" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q3" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q3" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH3Q4 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Adequate sample is determined</td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q4" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q4" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q4" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q4" type="radio"
                                            required></td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Research
                                        Instrument/Tool</td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH3Q5 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Research Instrument is appropriate
                                        and
                                        clearly described</td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q5" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q5" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q5" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q5" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH3Q6 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Validity and Reliability of
                                        instruments
                                        are properly established</td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q6" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q6" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q6" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q6" type="radio"
                                            required></td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Data Collection
                                        Procedure</td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH3Q7 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Procedure is fully described</td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q7" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q7" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q7" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q7" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH3Q8 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Procedure is appropriate to research
                                        design</td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q8" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q8" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q8" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q8" type="radio"
                                            required></td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Statistical
                                        Treatment
                                    </td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH3Q9 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Appropriate, clear and objectively
                                        specified (in qualitative research it is called Content Analysis – use coding and
                                        triangulation)</td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q9" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q9" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q9" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q9" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH3Q10 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Ethical Consideration</td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q10" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q10" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q10" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q10" type="radio"
                                            required></td>
                                </tr>
                                {{-- CH3Q11 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• All relevant aspects of ethical
                                        considerations are well observed and established from the start to the end of the
                                        research </td>
                                    <td class="insideTD text-center"><input value="4" name="CH3Q11" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="3" name="CH3Q11" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="2" name="CH3Q11" type="radio"
                                            required></td>
                                    <td class="insideTD text-center"><input value="1" name="CH3Q11" type="radio"
                                            required></td>
                                </tr>
                            </table>
                            <div class="row p-3">
                                <p>
                                    <b>NOTE:</b> The Grading System of the presentation for individual Grade will be: <br>
                                    <span style="margin-left: 70px"><b>PRESENTATION</b></span>
                                    <span style="margin-left: 80px"><b>SCORE</b></span> <br>
                                    <span style="margin-left: 70px">First Defense</span><span
                                        style="margin-left: 105px">90 - 100</span> <br>
                                    <span style="margin-left: 70px">Re - Appearance</span><span
                                        style="margin-left: 84px">85 - 89</span> <br>
                                    <span style="margin-left: 70px">Re - Defense</span><span style="margin-left: 110px">84
                                        - below</span> <br><br>
                                    <b>Overall Score: </b> <b style="margin-left: 50px">/112</b> <br>
                                    <b>Mean Score: </b> <b style="margin-left:  20px"> </b>
                                </p>
                            </div>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
        </div>
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Individual Grading</h2>
                @foreach ($individual as $indimember)
                    <div class="form-group">
                        <label for="name">{{ $indimember->firstname }} {{ $indimember->lastname }}</label>
                        <input type="hidden" class="form-control" name="name[]" id="name"
                            value="{{ $indimember->id }}">
                        <input type="number" name="grade[]" placeholder="Enter grade" class="form-control">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col text-center">
            <button type="submit" class="btn btn-primary mb-5">SUBMIT</button>
        </div>
        </form>
    </div>
@endsection

@section('scripts')
@endsection
