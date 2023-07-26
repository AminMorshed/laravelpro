@component('admin.layouts.content', ['title' => 'Dashboard'])

    @slot('breadcrumb')
        <li class="breadcrumb-item active">Home</li>
        <li class="breadcrumb-item"><a href="/admin/users">List of users</a></li>
    @endslot

<h2>Admin Panel</h2>

@endcomponent
