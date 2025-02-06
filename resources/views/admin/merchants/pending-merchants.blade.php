@extends('./admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Merchants Pending List</li>
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
                            <th>Role</th>
                      
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @elseif($item->status == 0)
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('update.userrole') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $item->id }}">
                                    <select class="form-select" name="role" onchange="this.form.submit()">
                                        <option value="user" {{ $item->role == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="merchant" {{ $item->role == 'merchant' ? 'selected' : '' }}>Merchant</option>
                                    </select>
                                </form>
                            </td>
                         
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
