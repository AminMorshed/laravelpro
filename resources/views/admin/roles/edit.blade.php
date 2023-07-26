@component('admin.layouts.content', ['title' => 'Edit role'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Home</a>
        <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">All the roles</a></li>
        <li class="breadcrumb-item active">Edit role</li>
    @endslot

    @slot('script')
        <script>
            $('#permissions').select2({ })
        </script>
    @endslot

    <div class="row">
        <div class="col-ld-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Role edit form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.roles.update', $role->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Type of role </label>
                            <input type="text" name="name" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Type of roles" value="{{old('name',$role->name)}}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description of role</label>
                            <input type="text" name="label" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Description of roles" value="{{old('label',$role->label)}}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Access</label>
                            <select class="form-control" name="permissions[]" id="permissions" multiple>
                                @foreach(\App\Models\Permission::all() as $permission)
                                    <option value="{{$permission->id}}"{{in_array($permission->id ,$role->permissions->pluck('id')->toArray()) ? 'selected' : ''}}>{{$permission->name}} - {{$permission->label}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Edit role</button>
                        <a href="{{route('admin.roles.index')}}" class="btn btn-default float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>

                <style>
                    .form-group.row {
                        margin-bottom: 0;
                    }

                    .form-group.row label {
                        text-align: right;
                        white-space: nowrap;
                        text-overflow: ellipsis;
                    }
                </style>

            </div>
        </div>
    </div>

@endcomponent
