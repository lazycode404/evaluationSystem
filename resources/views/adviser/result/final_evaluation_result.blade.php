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
<style>

    .trow {
        border: none !important;
    }

    .tdow {
        border: none !important;
    }

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
        body * {
            visibility: hidden;
        }

        @page {
            size: A4;
        }

        .printable,
        .printable * {
            visibility: visible;
        }
        .headers{
            background-color: #5BC85B!important;
            -webkit-print-color-adjust: exact; 
        }
    }
</style>
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <button onclick="window.print();" class="btn btn-success btn-sm print float-sm-right"><i
                            class="fa fa-print" aria-hidden="true"></i>Print</button>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
        <div class="container">
            <div class="card">
                <!-- /.card-header -->
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
                                <b>RESEARCH PROPOSAL FINAL EVALUATION SHEET</b>
                            </td>
                        </tr>
                        <tr class="trow">
                            <td class="tdow" colspan="3"><b style="margin-right: 25px;">Name of the Proponent/s:</b>
                                @foreach($member as $member)
                                {{ $loop->first ? ' ' : ' , ' }}
                                    {{ $member->firstname }} {{$member->lastname}}
                                @endforeach
                            <td class="tdow" colspan="2"><b>Data of Evaluation:</b> {{ date('m/d/Y') }}</td>
                        </tr>
                        <tr class="trow">
                            <td class="tdow" colspan="5"><b style="margin-right: 25px;">Title of the Study:</b>
                                {{ $result->capstoneTitle }}</td>
                        </tr>
                        <tr class="trow">
                            <td class="tdow" colspan="5"><b>Recommendation/s:</b> </td>
                        </tr>
                        <td class="tdow" colspan="5">
                            <p>{{$result->recommendation}}</p>
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
                                    <td class="insideTD text-center">@if($result->CH1Q1 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH1Q1 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH1Q1 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH1Q1 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH1Q2 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Gap in the literature related to the
                                        specified topic identified</td>
                                    <td class="insideTD text-center">@if($result->CH1Q2 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH1Q2 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH1Q2 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH1Q2 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH1Q3 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The problem is researchable, clear
                                        and
                                        concise</td>
                                        <td class="insideTD text-center">@if($result->CH1Q3 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q3 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q3 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q3 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH1Q4 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The problem stated is feasible and
                                        researcher’s motivation and interest demonstrated</td>
                                        <td class="insideTD text-center">@if($result->CH1Q4 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q4 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q4 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q4 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                        <td class="insideTD text-center">@if($result->CH1Q5 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q5 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q5 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q5 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH1Q6 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The problem indicates practical
                                        significance or value to several stakeholders</td>
                                        <td class="insideTD text-center">@if($result->CH1Q6 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q6 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q6 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q6 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH1Q7 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Scope and Limitations</td>
                                    <td class="insideTD text-center">@if($result->CH1Q7 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH1Q7 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH1Q7 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH1Q7 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH1Q8 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Specifies and properly explains the
                                        scope and delimitations</td>
                                        <td class="insideTD text-center">@if($result->CH1Q8 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q8 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q8 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH1Q8 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                        <td class="insideTD text-center">@if($result->CH2Q1 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q1 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q1 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q1 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH2Q2 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Evidence of scholarly skills and
                                        awareness of recent development in the area is shown previous research/own</td>
                                        <td class="insideTD text-center">@if($result->CH2Q2 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q2 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q2 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q2 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH2Q3 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Relationship of the problem to
                                        previous
                                        research/literature is made clear</td>
                                        <td class="insideTD text-center">@if($result->CH2Q3 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q3 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q3 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q3 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH2Q4 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Arranged related topics thematically
                                    </td>
                                    <td class="insideTD text-center">@if($result->CH2Q4 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH2Q4 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH2Q4 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH2Q4 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH2Q5 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Present the synthesis thoroughly
                                    </td>
                                    <td class="insideTD text-center">@if($result->CH2Q5 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH2Q5 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH2Q5 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH2Q5 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                        <td class="insideTD text-center">@if($result->CH2Q6 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q6 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q6 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q6 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH2Q7 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Research questions support the main
                                        problem</td>
                                        <td class="insideTD text-center">@if($result->CH2Q7 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q7 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q7 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q7 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                        <td class="insideTD text-center">@if($result->CH2Q8 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q8 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q8 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q8 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                        <td class="insideTD text-center">@if($result->CH2Q9 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q9 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q9 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH2Q9 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                        <td class="insideTD text-center">@if($result->CH3Q1 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q1 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q1 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q1 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                        <td class="insideTD text-center">@if($result->CH3Q2 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q2 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q2 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q2 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                    <td class="insideTD text-center">@if($result->CH3Q3 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q3 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q3 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q3 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH3Q4 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Adequate sample is determined</td>
                                    <td class="insideTD text-center">@if($result->CH3Q4 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q4 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q4 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q4 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                        <td class="insideTD text-center">@if($result->CH3Q5 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q5 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q5 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q5 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH3Q6 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Validity and Reliability of
                                        instruments
                                        are properly established</td>
                                        <td class="insideTD text-center">@if($result->CH3Q6 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q6 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q6 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q6 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                    <td class="insideTD text-center">@if($result->CH3Q7 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q7 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q7 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q7 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH3Q8 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Procedure is appropriate to research
                                        design</td>
                                        <td class="insideTD text-center">@if($result->CH3Q8 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q8 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q8 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q8 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                        <td class="insideTD text-center">@if($result->CH3Q9 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q9 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q9 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q9 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH3Q10 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Ethical Consideration</td>
                                    <td class="insideTD text-center">@if($result->CH3Q10 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q10 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q10 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH3Q10 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH3Q11 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• All relevant aspects of ethical
                                        considerations are well observed and established from the start to the end of the
                                        research </td>
                                        <td class="insideTD text-center">@if($result->CH3Q11 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q11 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q11 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH3Q11 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>




                                {{-- CHAPTER 4 --}}
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">CHAPTER 4: RESULTS
                                        AND
                                        DISCUSSION
                                    </td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH4Q1 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The research methodology is highly
                                        suitable or achieving the study objectives</td>
                                        <td class="insideTD text-center">@if($result->CH4Q1 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q1 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q1 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q1 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH4Q2 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Procedures are described in great
                                        detail
                                    </td>
                                    <td class="insideTD text-center">@if($result->CH4Q2 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH4Q2 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH4Q2 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH4Q2 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH4Q3 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The selected methods for data
                                        analysis
                                        are highly suitable</td>
                                        <td class="insideTD text-center">@if($result->CH4Q3 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q3 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q3 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q3 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH4Q4 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The research methodology is good for
                                        achieving the study objectives</td>
                                        <td class="insideTD text-center">@if($result->CH4Q4 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q4 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q4 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q4 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH4Q5 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Procedures are described in details
                                    </td>
                                    <td class="insideTD text-center">@if($result->CH4Q5 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH4Q5 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH4Q5 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH4Q5 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH4Q6 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The selected methods for data
                                        analysis
                                        are good</td>
                                        <td class="insideTD text-center">@if($result->CH4Q6 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q6 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q6 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q6 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH4Q7 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The research methodology is
                                        satisfactory
                                        for achieving the study objectives</td>
                                        <td class="insideTD text-center">@if($result->CH4Q7 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q7 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q7 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q7 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH4Q8 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• Procedures are described in general
                                        terms</td>
                                        <td class="insideTD text-center">@if($result->CH4Q8 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q8 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q8 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q8 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                {{-- CH4Q9 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The selected methods for data
                                        analysis
                                        are suitable</td>
                                        <td class="insideTD text-center">@if($result->CH4Q9 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q9 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q9 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH4Q9 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>




                                {{-- CHAPTER 5 --}}
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">CHAPTER 5: SUMMARY,
                                        CONCLUSIONS, AND RECOMMMENDATIONS</td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Summary</td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH5Q1 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The expected key findings of the
                                        study
                                        are very clearly stated</td>
                                        <td class="insideTD text-center">@if($result->CH5Q1 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH5Q1 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH5Q1 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH5Q1 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Conclusions</td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH5Q2 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The expected findings are highly
                                        consistent with the objectives of the study</td>
                                        <td class="insideTD text-center">@if($result->CH5Q2 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH5Q2 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH5Q2 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                        <td class="insideTD text-center">@if($result->CH5Q2 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                </tr>
                                <tr>
                                    <td class="insideTD" style="font-weight: bold; padding-left: 10px">Recommendations
                                    </td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                    <td class="insideTD"></td>
                                </tr>
                                {{-- CH5Q3 --}}
                                <tr>
                                    <td class="insideTD" style="padding-left: 10px">• The recommendations are clearly
                                        stated
                                    </td>
                                    <td class="insideTD text-center">@if($result->CH5Q3 == 4) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH5Q3 == 3) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH5Q3 == 2) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
                                    <td class="insideTD text-center">@if($result->CH5Q3 == 1) <i class="fa fa-check" aria-hidden="true"></i>@endif</td>
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
                                    <b>Overall Score: </b>&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$result->overallScore}}/160</b> <br>
                                    <b>Mean Score: </b>&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$result->meanScore}} </b>
                                </p>
                            </div>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
