@extends('./merchant.merchant_dashboard')
@section('merchant')


<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('merchant.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Category</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.category') }}" class="px-5 btn btn-primary">Add  Category</a>

            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Category Table</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Store Name</th>
                            <th>Category Name</th>


                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                           
                            <td>{{ $item['storelist']['store_name']}}</td>
                            <td>{{ $item->category_name }}</td>


                            <td>
                                <div class="gap-2 btn-group">
                                    <a href="{{ route('edit.category', $item->id) }}" class="px-5 btn btn-success">Edit</a>
                                    <a href="{{ route('delete.category', $item->id) }}" class="px-5 btn btn-danger" id="delete">Delete</a>

                                </div>
                            </td>

                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
    </div>

</div>

@endsection
