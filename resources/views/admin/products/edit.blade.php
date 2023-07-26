@component('admin.layouts.content', ['title' => 'Edit product'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">Home</a>
        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">All the products</a></li>
        <li class="breadcrumb-item active">Edit products</li>
    @endslot

    <div class="row">
        <div class="col-ld-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit product form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.products.update', $product->id)}}"
                      method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">title of product</label>
                            <input type="text" name="title" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Title of access" value="{{old('title' , $product->title )}}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description of product</label>
                            <input type="text" name="description" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Description of product" value="{{old('description' , $product->description)}}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                            <input type="text" name="price" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Price" value="{{old('price' , $product->price )}}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Inventory</label>
                            <input type="text" name="inventory" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="Inventory" value="{{old('inventory' , $product->inventory )}}">
                        </div>
                        <div class="form-group form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">view count</label>
                            <input type="text" name="view_count" class="form-control form-control mb-3" id="inputEmail3"
                                   placeholder="View count" value="{{old('view_count' , $product->view_count )}}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Edit products</button>
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
