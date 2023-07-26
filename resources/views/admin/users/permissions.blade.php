@component('admin.layouts.content', ['title' => 'Save permission'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">Create user</li>
        <li class="breadcrumb-item"><a href="/admin">Control panel</a></li>
        <li class="breadcrumb-item"><a href="/admin/users">Users panel</a></li>
    @endslot

    @slot('script')
        <script>
            $('#roles').select2({ })
            $('#permissions').select2({ })
        </script>
    @endslot


    <div class="row">
        <div class="col-lg-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Save permission for users</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.users.permissions.store', $user->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Roles</label>
                        <select class="form-control" name="roles[]" id="roles" multiple>
                            @foreach (App\Models\Role::all() as $role)
                                <option value="{{ $role->id }}" {{ in_array($role->id , $user->roles->pluck('id')->toArray() ) ? 'selected' : '' }}>{{ $role->name }}
                                    - {{ $role->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Permissions</label>
                        <select class="form-control" name="permissions[]" id="permissions" multiple>
                            @foreach (App\Models\Permission::all() as $permission)
                                <option value="{{ $permission->id }}" {{ in_array($permission->id , $user->permission->pluck('id')->toArray() ) ? 'selected' : '' }}>{{ $permission->name }}
                                    - {{ $permission->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-left mr-2" style="width: 150px;">
                            Save position
                        </button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-default float-left">Cancel</a>
                    </div>
            </form>
        </div>
    </div>
    </div>
@endcomponent
