@extends('layouts.master')

@section('title', 'Evaluation System Users')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <div class="addnew float-right">
                <button class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i>&nbsp;Add
                    User</button>
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
                                    <th>Email</th>
                                    <th width="80">Role</th>
                                    <th width="90">Status</th>
                                    <th width="70">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            @if ($row->role == 0)
                                                <span class="badge badge-primary">System Administrator</span>
                                            @elseif($row->role == 1)
                                                <span class="badge badge-success">Adviser</span>
                                            @elseif($row->role == 2)
                                                <span class="badge badge-info">User</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->role == 0)
                                            @else
                                                <input data-id="{{ $row->id }}" data-size="small" data-width="90"
                                                    class="toggle-class" type="checkbox" data-onstyle="success"
                                                    data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                    data-off="Inactive" {{ $row->status ? 'checked' : '' }}>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->role == 0)
                                            @else
                                                <button class="btn btn-primary btn-sm btnedit"
                                                    value="{{ $row->id }}"><i class="fa fa-edit"
                                                        aria-hidden="true"></i></button>
                                                {{-- <button class="btn btn-danger btn-sm btnreset"
                                                    value="{{ $row->id }}"><i class="fa fa-lock"
                                                        aria-hidden="true"></i></button> --}}
                                            @endif
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
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/users/create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                id="exampleInputPassword1" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="selectRole">Role</label>
                            <select name="role" id="selectRole" class="form-control" required>
                                <option value="">Select Role</option>
                                <option value="1">Adviser</option>
                                <option value="2">User</option>
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


    <!-- EDIT USER MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/user/edit') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="userID" name="userID">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="editName" id="editName">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="editEmail" id="editEmail">
                        </div>
                        <div class="form-group">
                            <label for="editRole">Role</label>
                            <select name="editRole" id="editRole" class="form-control">
                                <option value="1">Adviser</option>
                                <option value="2">User</option>
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

    <!-- RESET PASSWORD MODAL -->
    <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="resetID" name="resetID">
                    Are you sure you want to reset password?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary reset">Yes, Reset!</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.toggle-class').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let userId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('users.update.status') }}',
                    data: {
                        'status': status,
                        'user_id': userId
                    },
                    success: function(data) {
                        //console.log(data.message);
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
            $('.btnedit').click(function(e) {
                e.preventDefault();

                var userID = $(this).val();
                //alert(userID);
                $('#editModal').modal('show');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "/admin/user/edit/" + userID,
                    success: function(response) {
                        if (response.status == 200) {
                            $('#userID').val(response.user.id);
                            $('#editName').val(response.user.name);
                            $('#editEmail').val(response.user.email);
                            $('#editRole').val(response.user.role);
                        }
                    }
                })
            });
        });

        $(document).ready(function(){
            $('.btnreset').click(function(e){
                e.preventDefault();

                $('#resetModal').modal('show');
                var resetID = $(this).val();
                $('#resetID').val(resetID);
            });
        });

        $(document).ready(function(){
            $('.reset').click(function(e){
                e.preventDefault();
                var resetID = $('#resetID').val();
                var pass = '1234';
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{route('users.reset.password')}}',
                    data: {
                        'password': pass,
                        'resetID': resetID
                    },
                    success: function(data){
                        $('#resetModal').modal('hide');
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.options.positionClass = 'toast-top-center';
                        toastr.success(data.message);
                    }
                });
            })
        })
    </script>
@endsection
