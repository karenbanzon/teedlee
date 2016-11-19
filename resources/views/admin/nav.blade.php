<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {!! Html::image(\Auth::user()->avatar, '', ['class' => "img-circle"]) !!}
            </div>
            <div class="pull-left info">
                <p>{!! \Auth::user()->firstname.' '.\Auth::user()->lastname !!}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{!! url('admin') !!}"><i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{!! url('admin/user') !!}"><i class="fa fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="{!! url('admin/contest') !!}"><i class="fa fa-trophy"></i>
                    <span>Contests</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-cloud-upload"></i>
                    <span>Submissions</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! url('admin/submissions/submitted') !!}">
                            New
                        </a>
                    </li>
                    <li>
                        <a href="{!! url('admin/submissions/internal_voting') !!}">
                            Internal Voting
                        </a>
                    </li>
                    <li>
                        <a href="{!! url('admin/submissions/public_voting') !!}">
                            Public Voting
                        </a>
                    </li>
                    <li>
                        <a href="{!! url('admin/submissions/orig_artwork') !!}">
                            Awaiting Artwork
                        </a>
                    </li>
                    <li>
                        <a href="{!! url('admin/submissions/publication') !!}">
                            For Publication
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{!! url('logout') !!}"><i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
            <li>
                <a href="{!! url('') !!}"><i class="fa fa-home"></i>
                    <span class="text-warning text-bold">Go to Main Site</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>