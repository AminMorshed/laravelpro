@component('admin.layouts.content', ['title' => 'Roles'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">Control panel</a></li>
        <li class="breadcrumb-item active">Roles</li>
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Roles</h3>

                    <div class="card-tools d-flex align-items-center">
                        <div class="btn-group-sm mr-2">
                            @can('create-role')
                                <a href={{route('admin.roles.create')}} class="btn btn-sm btn-info">Create new role</a>
                            @endcan
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
                            <th>Role type name</th>
                            <th>Description of role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->label}}</td>
                                <td class="d-flex">
                                    @can('delete-role')
                                        <form action="{{route('admin.permissions.destroy',$role->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    @endcan

                                    @can('edit-role')
                                        <a href="{{ route('admin.roles.edit',$role->id) }}"
                                           class="btn btn-sm btn-outline-info ml-1">Edit</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $roles->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent

