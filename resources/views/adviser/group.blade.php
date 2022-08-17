@extends('layouts.master')

@section('title', 'Evaluation System Group')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Group</li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <div class="addnew float-right">
                <button class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i>&nbsp;Add
                    Group</button>
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
                    <div class="card-header">
                        <a href="#" class="justify-content-end" data-toggle="modal" data-target="#archiveModal"
                            data-backdrop="static" data-keyboard="false">Archive</a>
                    </div>
                    <div class="card-body" id="updateCARD">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th width="700">Capstone Title</th>
                                    <th width="80">Section</th>
                                    <th width="70">Course</th>
                                    <th width="90">Status</th>
                                    <th width="8">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->capstoneTitle }}</td>
                                        <td>{{ $row->section }}</td>
                                        <td>{{ $row->course }}</td>
                                        <td>
                                            <input data-id="{{ $row->id }}" data-size="small" data-width="90"
                                                class="toggle-class" type="checkbox" data-onstyle="success"
                                                data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                data-off="Inactive" {{ $row->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm editbtn" value={{ $row->id }}>
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </button>
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


    <!-- ADD GROUP MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('adviser/group/create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Group Name</label>
                            <input type="text" class="form-control" name="groupname" id="groupname"
                                placeholder="Enter group name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Capstone Title</label>
                            <textarea type="text" class="form-control" name="capstoneTitle" id="capstoneTitle" placeholder="Enter Capstone Title"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Section</label>
                            <select class="form-control" aria-label="Default select example" name="groupsection">
                                <option selected>Select Section</option>
                                @foreach ($section as $section)
                                    <option value="{{ $section->Sectionname }}">{{ $section->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Course</label>
                            <select class="form-control" aria-label="Default select example" name="groupcourse">
                                <option selected>Select Course</option>
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
                <form action="{{ url('adviser/group/edit') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="groupID" name="groupID">
                        <div class="form-group">
                            <label for="name">Group Name</label>
                            <input type="text" class="form-control" name="editGroupname" id="editGroupname"
                                placeholder="Enter group name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Capstone Title</label>
                            <textarea type="text" class="form-control" size="50" name="editcapstoneTitle" id="editcapstoneTitle"
                                placeholder="Enter Capstone Title" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Section</label>
                            <select class="form-control" aria-label="Default select example" name="editGroupSection"
                                id="editGroupSection">
                                <option selected>Select Section</option>
                                @foreach ($section1 as $section1)
                                    <option value="{{ $section1->Sectionname }}">{{ $section1->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Course</label>
                            <select class="form-control" aria-label="Default select example" name="editgroupcourse"
                                id="editgroupcourse">
                                <option selected>Select Course</option>
                                @foreach ($course1 as $course1)
                                    <option value="{{ $course1->Coursename }}">{{ $course1->description }}</option>
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
                    <h5 class="modal-title" id="archiveModal">Archive Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th width="700">Capstone Title</th>
                                <th width="80">Section</th>
                                <th width="70">Course</th>
                                <th width="90">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archive as $archive)
                                <tr>
                                    <td>{{ $archive->name }}</td>
                                    <td>{{ $archive->capstoneTitle }}</td>
                                    <td>{{ $archive->section }}</td>
                                    <td>{{ $archive->course }}</td>
                                    <td>
                                        <input data-id="{{ $archive->id }}" data-size="small" data-width="90"
                                            class="toggle-class" type="checkbox" data-onstyle="success"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                            data-off="Inactive" {{ $archive->status ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html, {
                size: 'small'
            });
        });

        $(document).ready(function() {
            $('.toggle-class').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let groupID = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('group.update.status') }}',
                    data: {
                        'status': status,
                        'groupID': groupID
                    },
                    success: function(data) {
                        console.log(data.message);
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.options.positionClass = 'toast-top-center';
                        toastr.success(data.message);
                        location.reload();
                    }
                });
            });
        });


        $(document).ready(function() {
            $('.editbtn').click(function(e) {
                e.preventDefault();

                var groupID = $(this).val();
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#groupID').val(groupID);
                $('#editGroupname').val(data[0]);
                $('#editcapstoneTitle').val(data[1]);
                $('#editGroupSection').val(data[2]).attr('selected', true);
                $('#editgroupcourse').val(data[3]).attr('selected', true);

                // console.log(data);
                console.log(groupID);
            });
        });


        $(document).ready(function() {
            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 3000);
        });
    </script>
@endsection
