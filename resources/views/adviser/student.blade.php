@extends('layouts.master')

@section('title', 'Evaluation System Students')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Student</li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <div class="addnew float-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-backdrop="static"
                    data-keyboard="false"><i class="fa fa-plus"></i>&nbsp;Add
                    Student</button>
                {{-- <button class="btn btn-success"><i class="fa fa-file-excel"></i>&nbsp;Import Student</button> --}}
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="container-fluid">
        @include('layouts.components.flashmessages')
        <div class="row">
            <div class="col-12">
                <div class="card m-0">
                    <form action="{{ url('adviser/student/update') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <a href="#" class="justify-content-end btn btn-success btn-sm" data-toggle="modal"
                                data-target="#archiveModal" data-backdrop="static" data-keyboard="false"><i
                                    class="fa fa-archive" aria-hidden="true"></i>&nbsp;Archived Students</a>
                            <button type="submit" class="btn btn-danger btn-sm float-right"><i class="fa fa-caret-down"
                                    aria-hidden="true"></i> Archived</button>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th colspan="6">STUDENT INFO</th>
                                        <th colspan="3">GRADE</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th width="25"></th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Group</th>
                                        <th width="100">Section</th>
                                        <th width="100">Course</th>
                                        <th width="100">Title Proposal</th>
                                        <th width="100">Oral Defense</th>
                                        <th width="170px">Final Reasearch Propsal</th>
                                        <th width="8">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student as $student)
                                        <tr>
                                            <td class="text-center"><input type="checkbox" name="ids[{{ $student->id }}]"
                                                    value="{{ $student->id }}"></td>
                                            <td>{{ $student->firstname }}</td>
                                            <td>{{ $student->lastname }}</td>
                                            <td>{{ $student->group }}</td>
                                            <td>{{ $student->section }}</td>
                                            <td>{{ $student->course }}</td>
                                            <td>{{ $student->titleProposalGrade }}</td>
                                            <td>{{ $student->oralProposalGrade }}</td>
                                            <td>{{ $student->finalProposalGrade }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm editbtn" value={{ $student->id }}>
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal-xl {
            max-width: 90% !important;
        }
    </style>
    <!-- ADD STUDENT MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('adviser/student/create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Firstname</label>
                            <input type="text" class="form-control" name="firstName" id="firstName"
                                placeholder="Enter firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Lastname</label>
                            <input type="text" class="form-control" name="lastName" id="lastName"
                                placeholder="Enter lastname" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Group</label>
                            <select class="form-control" name="group" aria-label="Default select example" required>
                                <option selected>Choose Group</option>
                                @foreach ($group as $group)
                                    <option value="{{ $group->name }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Section</label>
                            <select class="form-control" name="section" aria-label="Default select example" required>
                                <option selected>Choose Section</option>
                                @foreach ($section as $section)
                                    <option value="{{ $section->Sectionname }}">{{ $section->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course</label>
                            <select class="form-control" name="course" aria-label="Default select example" required>
                                <option selected>Choose Course</option>
                                @foreach ($course as $course)
                                    <option value="{{ $course->Coursename }}">{{ $course->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT GROUP MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('adviser/student/edit') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="studentID" name="studentID">
                        <div class="form-group">
                            <label for="name">Firstname</label>
                            <input type="text" class="form-control" name="editFirstname" id="editFirstname"
                                placeholder="Enter student firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Lastname</label>
                            <input type="text" class="form-control" name="editLastname" id="editLastname"
                                placeholder="Enter student firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Group</label>
                            <select class="form-control" aria-label="Default select example" name="editStudentGroup"
                                id="editStudentGroup">
                                @foreach ($studentGroup as $studentGroup)
                                    <option value="{{ $studentGroup->name }}">{{ $studentGroup->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Section</label>
                            <select class="form-control" aria-label="Default select example" name="editStudentSection"
                                id="editStudentSection">
                                @foreach ($studentSection as $studentSection)
                                    <option value="{{ $studentSection->Sectionname }}">{{ $studentSection->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Course</label>
                            <select class="form-control" aria-label="Default select example" name="editStudentCourse"
                                id="editStudentCourse">
                                @foreach ($studentCourse as $studentCourse)
                                    <option value="{{ $studentCourse->Coursename }}">{{ $studentCourse->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- VIEW ARCHIVE GROUP MODAL -->
    <div class="modal fade" id="archiveModal" tabindex="-1" role="dialog" aria-labelledby="archiveModal"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="archiveModal">Archived Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card m-0">
                        <form action="{{ url('adviser/student/unarchive') }}" method="POST" id="disableEnter">
                            @csrf
                            <div class="card-header">
                                <input type="text" class="col-md-3 form-control" style="position: absolute"
                                    id="search" name="search" placeholder="Search Student Name">
                                <button type="submit" class="btn btn-danger btn-sm float-right">Unarchived</button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    @if ($countArchived > 0)
                                        <thead class="text-center">
                                            <tr>
                                                <th colspan="6">STUDENT INFO</th>
                                                <th colspan="3">GRADE</th>
                                            </tr>
                                            <tr>
                                                <th width="25"></th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th width="280">Group</th>
                                                <th width="80">Section</th>
                                                <th width="90">Course</th>
                                                <th width="127">Title Proposal</th>
                                                <th width="115">Oral Defense</th>
                                                <th width="200">Final Reasearch Propsal</th>
                                            </tr>
                                        </thead>
                                        <tbody class="archiveclass">
                                            @foreach ($archived as $archived)
                                                <tr>
                                                    <td class="text-center"><input type="checkbox"
                                                            name="unarchiveIDS[{{ $archived->id }}]"
                                                            value="{{ $archived->id }}">
                                                    </td>
                                                    <td>{{ $archived->firstname }}</td>
                                                    <td>{{ $archived->lastname }}</td>
                                                    <td>{{ $archived->group }}</td>
                                                    <td>{{ $archived->section }}</td>
                                                    <td>{{ $archived->course }}</td>
                                                    <td>{{ $archived->titleProposalGrade }}</td>
                                                    <td>{{ $archived->oralProposalGrade }}</td>
                                                    <td>{{ $archived->finalProposalGrade }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tbody id="content" class="searchdata"></tbody>
                                    @else
                                        <h2 class="text-center">No Data Found</h2>
                                    @endif
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 4000);
        });

        $(document).ready(function() {
            $('.editbtn').click(function(e) {
                e.preventDefault();

                var studentID = $(this).val();
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#studentID').val(studentID);
                $('#editFirstname').val(data[1]);
                $('#editLastname').val(data[2]);
                $('#editStudentGroup').val(data[3]).attr('selected', true);
                $('#editStudentSection').val(data[4]).attr('selected', true);
                $('#editStudentCourse').val(data[5]).attr('selected', true);

                //console.log(data);
                //console.log(studentID)
            })
        });

        $('#search').on('keyup', function() {
            $value = $(this).val();

            // console.log($value);

            if ($value) {
                $('.archiveclass').hide();
                $('.searchdata').show();

            } else {
                $('.archiveclass').show();
                $('.searchdata').hide();
            }
            $.ajax({
                type: 'GET',
                url: '{{ URL::to('adviser/student/search') }}',
                data: {
                    'search': $value
                },

                success: function(data) {
                    $('#content').html(data);
                }
            })
        })

        $('#disableEnter').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;

            if (keyCode == 13) {
                e.preventDefault();
                return false;
            }
        })
    </script>
@endsection
