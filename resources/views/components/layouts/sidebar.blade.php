<div>
    @can('create post')
    <div class="mb-4">
        <small class="d-block text-secondary mb-2 text-uppercase"> <strong> Posts</strong></small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                Create New Post
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data Table Post</a>
        </div>
    </div>
    @endcan

    @can('create category')
    <div class="mb-4">
        <small class="d-block text-secondary mb-2 text-uppercase"> <strong>Categories</strong> </small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                Create New Category
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data Table Category</a>
        </div>
    </div>
    @endcan


    @can('show user')
    <div class="mb-4">
        <small class="d-block text-secondary mb-2 text-uppercase"> <strong>Users</strong> </small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                Create New User
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data Table User</a>
        </div>
    </div>
    @endcan

    @can('assign permission')
    <div class="mb-4">
        <small class="d-block text-secondary mb-2 text-uppercase"> <strong>Role & Permission</strong> </small>
        <div class="list-group">
            <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action">Roles</a>
            <a href="{{ route('permissions.index') }}" class="list-group-item list-group-item-action">Permissions</a>
            <a href="{{ route('assign.create') }}" class="list-group-item list-group-item-action">Assign Permission</a>
            <a href="{{ route('assign.user.create') }}" class="list-group-item list-group-item-action">Permission to Users</a>

        </div>
    </div>
    @endcan

    <div class="mb-4">
        <small class="d-block text-secondary mb-2 text-uppercase"> <strong>Logout</strong> </small>
        <div class="list-group">

            <a class="list-group-item list-group-item-action" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

</div>