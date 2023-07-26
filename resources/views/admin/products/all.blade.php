@component('admin.layouts.content', ['title' => 'Products'])

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">Control panel</a></li>
        <li class="breadcrumb-item active">Products</li>
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools d-flex align-items-center">
                        <div class="btn-group-sm mr-2">
                                <a href={{route('admin.products.create')}} class="btn btn-sm btn-info">Create new
                                products</a>
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
                            <th>Products title</th>
                            <th>Description of products</th>
                            <th>Price</th>
                            <th>Inventory</th>
                            <th>View count</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->inventory}}</td>
                                <td>{{$product->view_count}}</td>
                                <td class="d-flex">
                                        <form action="{{route('admin.products.destroy',$product->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>

                                        <a href="{{ route('admin.products.edit',$product->id) }}"
                                           class="btn btn-sm btn-outline-info ml-1">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $products->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent

