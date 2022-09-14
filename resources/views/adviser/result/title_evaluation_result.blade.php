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

    .sm {
        font-size: 12px;
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
    }
</style>

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6 text-right">

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
            <div class="card printable">
                <!-- /.card-header -->
                <div class="card-body ">
                    <table id="example2" class="table">
                        <tr class="trow">
                            <td class="tdow" style="text-align: center;" colspan="1"><img
                                    src=" {{ asset('assets/images/tagslogo.png') }} " height="125" alt="">
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
                                    src="{{ asset('assets/images/cctlogo.png') }}" height="125" alt=""></td>
                            <td class="tdow" colspan="1"></td>
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
                            <td class="tdow" colspan="1"></td>
                            <td class="tdow" colspan="1"></td>
                        </tr>
                        <tr class="trow">
                            <td class="tdow" colspan="3"><b style="margin-right: 35px; margin-left:100px;">Name of
                                    Ratee:
                                </b>
                                @foreach ($member as $member)
                                    {{ $loop->first ? ' ' : ' , ' }}
                                    {{ $member->firstname }} {{ $member->lastname }}
                                @endforeach
                            </td>
                        </tr>
                        <tr class="trow">
                            <td class="tdow" colspan="3"><b style="margin-right: 35px; margin-left:100px;">Title of
                                    Study:
                                </b>{{ $result->capstoneTitle }}</td>
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
                                        <td style="text-align: center;">{{ $result->Q1 }}</td>
                                    </tr>
                                    <tr>
                                        <td>2. Content of the presentation (depth of the information presented)</td>
                                        <td style="text-align: center;">35</td>
                                        <td style="text-align: center;">{{ $result->Q2 }}</td>
                                    </tr>
                                    <tr>
                                        <td>3. Composure/Personality (stage presence, attire, projection)</td>
                                        <td style="text-align: center;">5</td>
                                        <td style="text-align: center;">{{ $result->Q3 }}</td>
                                    </tr>
                                    <tr>
                                        <td>4. Delivery (voice quality, visual aids)</td>
                                        <td style="text-align: center;">10</td>
                                        <td style="text-align: center;">{{ $result->Q4 }}</td>
                                    </tr>
                                    <tr>
                                        <td>5. Answers to questions</td>
                                        <td style="text-align: center;">30</td>
                                        <td style="text-align: center;">{{ $result->Q5 }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2"><b>General Weighted Average:</b></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><b>Numerical: </b></td>
                                        <td>
                                            <p class="numerical">{{ $result->numerical }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><b>Equivalent: </b></td>
                                        <td>
                                            <p class="equivalent">{{ $result->equivalent }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="column p-5">
                                    <p style="text-align: left; margin-left:70px;">
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
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
