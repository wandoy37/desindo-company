<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('atlantis/img/user.png') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a href="{{ route('dashboard.index') }}">
                        <span class="">
                            {{ Auth::user()->username }}
                        </span>
                        <small class="text-dark">
                            <i class="fas fa-circle text-success"></i>
                            Online
                        </small>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MENU NAVIGATION</h4>
                </li>
                <li class="nav-item {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(2) == 'postingan' ? 'active' : '' }}">
                    <a href="{{ route('post.index') }}">
                        <i class="fas fa-newspaper"></i>
                        <p>Postingan</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(2) == 'project' ? 'active' : '' }}">
                    <a href="{{ route('project.index') }}">
                        <i class="fab fa-palfed"></i>
                        <p>Projects</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(2) == 'pengaturan-website' ? 'active' : '' }}">
                    <a href="{{ route('pengaturan.index') }}">
                        <i class="icon-globe"></i>
                        <p>Pengaturan Website</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
