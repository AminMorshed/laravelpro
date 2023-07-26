@component('admin.layouts.content', ['title' => 'Create Product'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Home</a>
        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">All the products</a></li>
        <li class="breadcrumb-item active">Create Product</li>
    @endslot

    <div class="row">
        <div class="col-ld-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product creation form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.products.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">title of Product</label>
                            <input type="text" name="title" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="title of Product" value="{{old('title')}}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description of Product</label>
                            <textarea class="form-control" name="description" id="description" cols="15" rows="5">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                            <input type="number" name="price" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Price" value="{{old('price')}}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Inventory</label>
                            <input type="number" name="inventory" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Inventory" value="{{old('inventory')}}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">View count</label>
                            <input type="text" name="view_count" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="View count" value="{{old('view_count')}}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Register products</button>
                        <a href="{{route('admin.products.index')}}" class="btn btn-default float-right">Cancel</a>
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
