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
                    <form action="{{ url('adviser/member/update') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <a href="#" class="justify-content-end btn btn-success btn-sm" data-toggle="modal"
                                data-target="#archiveModal" data-backdrop="static" data-keyboard="false"><i
                                    class="fa fa-archive" aria-hidden="true"></i>&nbsp;Archived Members</a>
                            <button type="submit" class="btn btn-danger btn-sm float-right"><i class="fa fa-caret-down"
                                    aria-hidden="true"></i> Archived</button>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th width="300">Group Name</th>
                                        <th width="80">Section</th>
                                        <th width="70">Course</th>
                                        <th width="50">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($member as $member)
                                        <tr>
                                            <td><input type="checkbox" name="ids[{{ $member->id }}]"
                                                    value="{{ $member->id }}"></td>
                                            <td>{{ $member->members }}</td>
                                            <td>{{ $member->groupName }}</td>
                                            <td>{{ $member->section }}</td>
                                            <td>{{ $member->course }}</td>
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
                    </form>
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
                <form action="{{ url('adviser/member/create') }}" method="POST">
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
                <form action="{{ url('adviser/member/edit') }}" method="POST">
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
                            <select class="form-control" name="editGroupname" id="editGroupname"
                                aria-label="Default select example">
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

    <!-- VIEW ARCHIVE MEMBER MODAL -->
    <div class="modal fade" id="archiveModal" tabindex="-1" role="dialog" aria-labelledby="archiveModal"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="archiveModal">Archive Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card m-0">
                        <form action="{{ url('adviser/member/unarchived') }}" method="POST" id="disableEnter">
                            @csrf
                            <div class="card-header">
                                <input type="text" class="col-md-3 form-control" style="position: absolute"
                                    id="search" name="search" placeholder="Search Members Name">
                                <button type="submit" class="btn btn-danger btn-sm float-right">Unarchived</button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th width="300">Group Name</th>
                                            <th width="80">Section</th>
                                            <th width="70">Course</th>
                                        </tr>
                                    </thead>
                                    <tbody class="archivedclass">
                                        @foreach ($archived as $archived)
                                            <tr>
                                                <td><input type="checkbox" name="unarchivedIDS[{{ $archived->id }}]"
                                                        value="{{ $archived->id }}"></td>
                                                <td>{{ $archived->members }}</td>
                                                <td>{{ $archived->groupName }}</td>
                                                <td>{{ $archived->section }}</td>
                                                <td>{{ $archived->course }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody id="content" class="searchdata"></tbody>
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
            $('.editbtn').click(function(e) {
                e.preventDefault();

                var memberID = $(this).val();
                $('#editMember').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();

                $('#memberID').val(memberID);
                $('#editMembername').val(data[1]);
                $('#editGroupname').val(data[2]).attr('selected', true);

                // console.log(data);
                // console.log(memberID);
            });
        });

        $(document).ready(function() {
            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 4000);
        });

        $('#search').on('keyup', function(e) {

            $value = $(this).val();

            console.log($value);

            if ($value) {
                $('.archivedclass').hide();
                $('.searchdata').show();
            } else {
                $('.archivedclass').show();
                $('.searchdata').hide();
            }
            $.ajax({
                type: 'GET',
                url: '{{ route('member.search') }}',
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
