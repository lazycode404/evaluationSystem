@extends('layouts.master')

@section('title', 'Evaluation System Section')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Section</li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <div class="addnew float-right">
                <button class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i>&nbsp;Add
                    Section</button>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Course</th>
                                    <th width="90">Status</th>
                                    <th width="8">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($section as $row)
                                    <tr>
                                        <td>{{ $row->Sectionname }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td>{{ $row->sectionCourse }}</td>
                                        <td>
                                            <input data-id="{{ $row->id }}" data-size="small" data-width="90"
                                                class="toggle-class" type="checkbox" data-onstyle="success"
                                                data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                data-off="Inactive" {{ $row->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm editbtn" value="{{ $row->id }}">
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


    <!-- ADD SECTION MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/section/create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="sectionname" id="sectionname"
                                placeholder="Enter section name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="sectiondesc"
                                placeholder="Enter section description" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course</label>
                            <select class="form-control" name="sectioncourse" aria-label="Default select example">
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



    <!-- EDIT SECTION MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/section/edit') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="sectionID" name="sectionID">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="editSectionname" id="editSectionname"
                                placeholder="Enter section name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" class="form-control" id="editSectiondesc" name="editSectiondesc"
                                placeholder="Enter section description" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course</label>
                            <select class="form-control" id="editsectioncourse" name="editsectioncourse"
                                aria-label="Default select example">
                                <option selected>Choose Course</option>
                                @foreach ($courses as $courses)
                                    <option value="{{ $courses->Coursename }}">{{ $courses->description }}</option>
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
                let sectionID = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('section.update.status') }}',
                    data: {
                        'status': status,
                        'sectionID': sectionID
                    },
                    success: function(data) {
                        console.log(data.message);
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.options.positionClass = 'toast-top-center';
                        toastr.success(data.message);
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.editbtn').click(function(e) {
                e.preventDefault();

                var sectionID = $(this).val();
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();

                // console.log(data);
                // console.log(sectionID);

                $('#sectionID').val(sectionID);
                $('#editSectionname').val(data[0]);
                $('#editSectiondesc').val(data[1]);
                $('#editsectioncourse').val(data[2]).attr('selected', true);
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
