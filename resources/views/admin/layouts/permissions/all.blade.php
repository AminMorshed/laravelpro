@component('admin.layouts.content', ['title' => 'List of users'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">Home</a></li>
        <li class="breadcrumb-item active">List of users</li>
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>

                    <div class="card-tools d-flex align-items-center">
                        <div class="btn-group-sm mr-2">
                            <a href={{request()->fullUrlWithQuery(['admin' => 1])}} class="btn btn-sm btn-warning">Administrator users</a>
                            <a href={{route('admin.users.create')}} class="btn btn-sm btn-info">Create a new user</a>
                        </div>
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right"
                                       placeholder="Search" value="{{ request('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default" style="height: 31px">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Email status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @if($user->email_verified_at)
                                    <td><span class="badge badge-success">Active</span></td>
                                @else
                                    <td><span class="badge badge-danger">Inactive</span></td>
                                @endif
                                <td>{{$user->created_at->format('y/m/d')}}</td>
                                <td class="d-flex">
                                    <form action="{{route('admin.users.destroy',['user' =>$user->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                       <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                    @can('edit',$user)
                                        <a href="{{ route('admin.users.edit',['user' => $user->id]) }}" class="btn btn-sm btn-outline-info ml-1">Edit</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $users->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent

