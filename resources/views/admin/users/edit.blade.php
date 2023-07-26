@component('admin.layouts.content', ['title' => 'Edit User'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Home</a>
        <li class="breadcrumb-item"><a href="/admin/users">List of users</a></li>
        <li class="breadcrumb-item active">Edit user</li>
    @endslot

    <div class="row">
        <div class="col-ld-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User edit form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.users.update',['user' => $user->id])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <input type="text" name="name" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <input type="email" name="email" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control mb-3"
                                   id="inputPassword3"
                                   placeholder="Password">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputPasswordRepeat" class="col-sm-2 col-form-label">Repeat Password</label>
                            <input type="password" name="password_confirmation" class="form-control form-control mb-3"
                                   id="inputPasswordRepeat"
                                   placeholder="Repeat Password">
                        </div>
                        @if(! $user->hasVerifiedEmail())
                            <div class="form-check">
                                <input type="checkbox" name="verify" class="form-check-input" id="verify">
                                <label class="form-check-label" for="verify">The account must be active</label>
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Edit user</button>
                        <a href="{{route('admin.users.index')}}" class="btn btn-default float-right">Cancel</a>
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
