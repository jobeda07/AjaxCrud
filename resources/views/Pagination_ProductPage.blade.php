<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $product)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="" class="btn btn-primary Edit-form pr-2 " data-bs-toggle="modal"
                        data-bs-target="#UpdateModal" data-id={{ $product->id }} data-name={{ $product->name }}
                        data-price={{ $product->price }} style="font-size: 18px;"><i class="lar la-edit"></i></a>
                    <a href="" class="btn btn-danger Delete_product" data-id={{ $product->id }}><i
                            class="las la-times-circle" style="font-size: 23px;"></i></a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $products->links() !!}
