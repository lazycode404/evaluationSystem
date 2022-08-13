<!-- Brand Logo -->
<a href="#" class="brand-link">
    <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Evaluation System</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/admin/dashboard"
                    class="nav-link {{ 'admin/dashboard' == request()->path() ? 'active' : '' }}">
                    <i class="fa fa-tachometer nav-icon"></i>
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
                <a href="/admin/section" class="nav-link {{ 'admin/section' == request()->path() ? 'active' : '' }}">
                    <i class="fa fa-th-list nav-icon"></i>
                    <p>Section</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/group" class="nav-link {{ 'admin/group' == request()->path() ? 'active' : '' }}">
                    <i class="fa fa-address-book nav-icon"></i>
                    <p>Group</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/member" class="nav-link {{ 'admin/member' == request()->path() ? 'active' : '' }}">
                    <i class="fa fa-users nav-icon"></i>
                    <p>Member</p>
                </a>
            </li>

            <li class="nav-item {{(request()->is('admin/title_proposal_evaluation')) ? 'active menu-open' : ''}}">
                <a href="#" class="nav-link {{(request()->is('admin/title_proposal_evaluation')) ? 'active menu-open' : ''}}">
                    <i class="nav-icon fa fa-file-text-o"></i>
                    <p>
                        Evaluation Results
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/title_proposal_evaluation" class="nav-link {{ 'admin/title_proposal_evaluation' == request()->path() ? 'active' : '' }}">
                            <i class="fa fa-circle nav-icon"></i>
                            <p>Title Proposal Evaluation</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
