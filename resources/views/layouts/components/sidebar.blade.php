<!-- Brand Logo -->
<a href="#" class="brand-link">
    <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Evaluation System</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('assets/dist/img/149071.png')}}" class="img-circle elevation-1" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">
                {{Str::upper(Auth::user()->name)}}
            </a>
            @if(Auth::user()->role == 0)
            <span class="text-success">SYSTEM ADMINISTRATOR</span>
            @elseif(Auth::user()->role == 1)
            <span class="text-success">ADVISER</span>
            @endif
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (Auth::user()->role == 0)
                <li class="nav-item">
                    <a href="/admin/dashboard"
                        class="nav-link {{ 'admin/dashboard' == request()->path() ? 'active' : '' }}">
                        <i class="fa fa-tachometer-alt nav-icon" aria-hidden="true"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/user" class="nav-link {{ 'admin/user' == request()->path() ? 'active' : '' }}">
                        <i class="fa fa-user nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/course" class="nav-link {{ 'admin/course' == request()->path() ? 'active' : '' }}">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>Course</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/section"
                        class="nav-link {{ 'adviser/section' == request()->path() ? 'active' : '' }}">
                        <i class="fa fa-th-list nav-icon"></i>
                        <p>Section</p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 1)
                <li class="nav-item">
                    <a href="/adviser/group"
                        class="nav-link {{ 'adviser/group' == request()->path() ? 'active' : '' }}">
                        <i class="fa fa-address-book nav-icon"></i>
                        <p>Group</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/adviser/member"
                        class="nav-link {{ 'adviser/member' == request()->path() ? 'active' : '' }}">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Member</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('adviser/title_proposal_evaluation') ? 'active menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('adviser/title_proposal_evaluation') ? 'active menu-open' : '' }}">
                        <i class="nav-icon fa fa-file-alt" aria-hidden="true"></i>
                        <p>
                            Evaluation Results
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/adviser/title_proposal_evaluation"
                                class="nav-link {{ 'adviser/title_proposal_evaluation' == request()->path() ? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Title Proposal Evaluation</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
