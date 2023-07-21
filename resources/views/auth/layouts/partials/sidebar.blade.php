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
                <li class="nav-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'postingan' ? 'active' : '' }}">
                    <a href="{{ route('post.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Postingan</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
