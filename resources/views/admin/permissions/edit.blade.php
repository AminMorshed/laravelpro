@component('admin.layouts.content', ['title' => 'Edit access'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Home</a>
        <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">All the access</a></li>
        <li class="breadcrumb-item active">Edit access</li>
    @endslot

    <div class="row">
        <div class="col-ld-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit access form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.permissions.update', $permission->id)}}"
                      method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Type of access </label>
                            <input type="text" name="name" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Type of access" value="{{old('name' , $permission->name )}}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description of access</label>
                            <input type="text" name="label" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Description of access" value="{{old('label' , $permission->label )}}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Edit access</button>
                        <a href="{{route('admin.permissions.index')}}" class="btn btn-default float-right">Cancel</a>
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
