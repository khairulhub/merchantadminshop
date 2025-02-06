@extends('./admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        {{-- <div class="breadcrumb-title pe-3">All Category</div> --}}
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Merchants List</li>
                </ol>
            </nav>
        </div>
        
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Merchants Table</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Merchants Name</th>
                            <th>Merchants Email</th>
                       
                            <th>Status</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach($merchants as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td>

                            <td>{{ $item->name }}</td>
                           
                            <td>{{ $item->email }}</td>
                          
                            <td>
                                @if($item->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @elseif($item->status == 0)
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                          
                                </form>
                          




                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

@endsection
