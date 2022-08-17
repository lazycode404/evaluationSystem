@extends('layouts.master')

@section('title', 'Evaluation System Users')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Members</li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <div class="addnew float-right">
                <button class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i>&nbsp;Add
                    Member</button>
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
                                    <th width="300">Group Name</th>
                                    <th width="80">Section</th>
                                    <th width="70">Course</th>
                                    <th width="90">Status</th>
                                    <th width="8">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member as $member)
                                    <tr>
                                        <td>{{ $member->members }}</td>
                                        <td>{{ $member->groupName }}</td>
                                        <td>{{ $member->section }}</td>
                                        <td>{{ $member->course }}</td>
                                        <td><input data-id="{{ $member->id }}" data-size="small" data-width="90"
                                                class="toggle-class" type="checkbox" data-onstyle="success"
                                                data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                data-off="Inactive" {{ $member->status ? 'checked' : '' }}></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm editbtn" value={{ $member->id }}>
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


    <!-- ADD USER MODAL -->
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
                <form action="{{ url('admin/member/create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Members Name</label> <small style="color: gray"> (separate name with ','
                                comma)</small>
                            <input type="text" class="form-control" name="membersName" id="membersName"
                                placeholder="Enter name" required>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Group Name</label>
                            <select class="form-control" name="groupName" aria-label="Default select example">
                                <option selected>Choose Group Name</option>
                                @foreach ($group as $group)
                                    <option value="{{ $group->name }}">{{ $group->name }}</option>
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


    <!-- EDIT MEMBER MODAL -->
    <div class="modal fade" id="editMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/member/edit') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="memberID" name="memberID">
                        <div class="form-group">
                            <label for="name">Members Name</label> <small style="color: gray"> (separate name with ','
                                comma)</small>
                            <input type="text" class="form-control" name="editMembername" id="editMembername"
                                placeholder="Enter name" required>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Group Name</label>
                            <select class="form-control" name="editGroupname" id="editGroupname" aria-label="Default select example">
                                <option selected>Choose Group Name</option>
                                @foreach ($groups as $groups)
                                    <option value="{{ $groups->name }}">{{ $groups->name }}</option>
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
        // let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        // elems.forEach(function(html) {
        //     let switchery = new Switchery(html, {
        //         size: 'small'
        //     });
        // });

        $(document).ready(function() {
            $('.toggle-class').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let memberID = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('member.update.status') }}',
                    data: {
                        'status': status,
                        'memberID': memberID
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

        $(document).ready(function(){
            $('.editbtn').click(function(e){
                e.preventDefault();

                var memberID = $(this).val();
                $('#editMember').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();

                $('#memberID').val(memberID);
                $('#editMembername').val(data[0]);
                $('#editGroupname').val(data[1]).attr('selected',true);


                
                // console.log(data);
                // console.log(memberID);
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
