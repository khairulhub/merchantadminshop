@php
 $allinstructor = App\Models\User::where('role','instructor')->latest()->get();
 
 $totalUsers  = App\Models\User::where('role','user')->latest()->get();
 $totalMerchant  = App\Models\User::where('role','merchant')->latest()->get();


@endphp

@extends('./admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
          
       
            <div class="col">
                <div class="border-0 border-4 card radius-10 border-start border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Merchants </p>
                            <h4 class="my-1 text-success">{{count($totalMerchant)}}</h4>
                               
                            </div>
                            <div class="text-white widgets-icons-2 rounded-circle bg-gradient-ohhappiness ms-auto">
                                <i class='bx bxs-bar-chart-alt-2'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="border-0 border-4 card radius-10 border-start border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Users</p>
                                <h4 class="my-1 text-warning">{{count($totalUsers)}}</h4>
                               
                            </div>
                            <div class="text-white widgets-icons-2 rounded-circle bg-gradient-orange ms-auto">
                                <i class='bx bxs-group'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

       
       





    </div>
@endsection

