<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
        <a href="{{ route('dashboard') }}" class="mb-0 brand-icon">
            <span class="logo-icon"><i class="bi bi-building fs-4"></i></span>
            <span class="logo-text">Aashi Venture</span>
        </a>
        <ul class="menu-list flex-grow-1 mt-3">
            <li>
                <a class="m-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="icofont-home fs-5"></i> <span>Dashboard</span>
                </a>
            </li>
           <li class="collapsed">
            <a class="m-link {{ request()->routeIs('categories') ? 'active' : '' }} {{ request()->routeIs('categories.create') ? 'active' : '' }} {{ request()->routeIs('categories.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-categories" href="javascript:void(0);">
                <i class="icofont-layers fs-5"></i> <span>Categories</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
            </a>
            <ul class="sub-menu collapse" id="menu-categories">
                <li><a class="ms-link {{ request()->routeIs('categories') ? 'active' : '' }}" href="{{ route('categories') }}">List</a></li>
                <li><a class="ms-link {{ request()->routeIs('categories.create') ? 'active' : '' }}" href="{{ route('categories.create') }}">Add</a></li>
            </ul>
        </li>
        <li class="collapsed">
            <a class="m-link {{ request()->routeIs('sub_categories') ? 'active' : '' }} {{ request()->routeIs('sub_categories.create') ? 'active' : '' }} {{ request()->routeIs('sub_categories.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-sub-categories" href="javascript:void(0);">
                <i class="icofont-ui-folder fs-5"></i> <span>Sub-Categories</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
            </a>
            <ul class="sub-menu collapse" id="menu-sub-categories">
                <li><a class="ms-link {{ request()->routeIs('sub_categories') ? 'active' : '' }}" href="{{ route('sub_categories') }}">List</a></li>
                <li><a class="ms-link {{ request()->routeIs('sub_categories.create') ? 'active' : '' }}" href="{{ route('sub_categories.create') }}">Add</a></li>
            </ul>
        </li>
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('banners') ? 'active' : '' }} {{ request()->routeIs('banners.create') ? 'active' : '' }} {{ request()->routeIs('banners.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-banners" href="javascript:void(0);">
                    <i class="icofont-image fs-5"></i> <span>Banners</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse" id="menu-banners">
                    <li><a class="ms-link {{ request()->routeIs('banners') ? 'active' : '' }}" href="{{ route('banners') }}">List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('banners.create') ? 'active' : '' }}" href="{{ route('banners.create') }}">Add</a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('partners') ? 'active' : '' }} {{ request()->routeIs('partners.create') ? 'active' : '' }} {{ request()->routeIs('partners.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-partners" href="javascript:void(0);">
                    <i class="icofont-badge fs-5"></i> <span>Trusted Partners</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse" id="menu-partners">
                    <li><a class="ms-link {{ request()->routeIs('partners') ? 'active' : '' }}" href="{{ route('partners') }}">List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('partners.create') ? 'active' : '' }}" href="{{ route('partners.create') }}">Add</a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('workspaces') ? 'active' : '' }} {{ request()->routeIs('workspaces.create') ? 'active' : '' }} {{ request()->routeIs('workspaces.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-workspaces" href="javascript:void(0);">
                    <i class="icofont-industries-1 fs-5"></i> <span>Workspace</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse" id="menu-workspaces">
                    <li><a class="ms-link {{ request()->routeIs('workspaces') ? 'active' : '' }}" href="{{ route('workspaces') }}">List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('workspaces.create') ? 'active' : '' }}" href="{{ route('workspaces.create') }}">Add</a></li>
                </ul>
            </li>
            {{-- Add this <li> inside your sidebar's <ul class="menu-list">, after the Workspace item --}}
            <li class="collapsed">
                <a class="m-link {{ request()->routeIs('branches') ? 'active' : '' }} {{ request()->routeIs('branches.create') ? 'active' : '' }} {{ request()->routeIs('branches.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-branches" href="javascript:void(0);">
                    <i class="icofont-location-pin fs-5"></i> <span>Contact Branches</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse" id="menu-branches">
                    <li><a class="ms-link {{ request()->routeIs('branches') ? 'active' : '' }}" href="{{ route('branches') }}">List</a></li>
                    <li><a class="ms-link {{ request()->routeIs('branches.create') ? 'active' : '' }}" href="{{ route('branches.create') }}">Add</a></li>
                </ul>
            </li>
            <li class="collapsed">
            <a class="m-link {{ request()->routeIs('blogs') ? 'active' : '' }} {{ request()->routeIs('blogs.create') ? 'active' : '' }} {{ request()->routeIs('blogs.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-blogs" href="javascript:void(0);">
                <i class="icofont-news fs-5"></i> <span>Blog Posts</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
            </a>
            <ul class="sub-menu collapse" id="menu-blogs">
                <li><a class="ms-link {{ request()->routeIs('blogs') ? 'active' : '' }}" href="{{ route('blogs') }}">List</a></li>
                <li><a class="ms-link {{ request()->routeIs('blogs.create') ? 'active' : '' }}" href="{{ route('blogs.create') }}">Add</a></li>
            </ul>
        </li>
            <li class="collapsed">
            <a class="m-link {{ request()->routeIs('settings') ? 'active' : '' }} {{ request()->routeIs('settings.create') ? 'active' : '' }} {{ request()->routeIs('settings.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-settings" href="javascript:void(0);">
                <i class="icofont-gear fs-5"></i> <span>Settings</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
            </a>
            <ul class="sub-menu collapse" id="menu-settings">
                <li><a class="ms-link {{ request()->routeIs('settings') ? 'active' : '' }}" href="{{ route('settings') }}">List</a></li>
                <li><a class="ms-link {{ request()->routeIs('settings.create') ? 'active' : '' }}" href="{{ route('settings.create') }}">Add</a></li>
            </ul>
        </li>
            {{-- more modules get added here as we build them out --}}
        </ul>
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>
