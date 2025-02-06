{{-- @php
 $allinstructor = App\Models\User::where('role','instructor')->latest()->get();
 $totalOrders = App\Models\Order::get();
 $setting = App\Models\SiteSetting::find(1);
 $totalAmount = App\Models\Payment::sum('total_amount');//need to change for count amount
 $totalStudents  = App\Models\User::where('role','user')->latest()->get();
 $totalInstructor  = App\Models\User::where('role','instructor')->latest()->get();
 $courses = App\Models\Course::withCount('orders')->get();


    $courseNames = $courses->pluck('course_title')->toArray();
    $courseCounts = $courses->pluck('orders_count')->toArray();
@endphp --}}

@extends('./merchant.merchant_dashboard')
@section('merchant')
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="border-0 border-4 card radius-10 border-start border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Orders</p>
                                {{-- <h4 class="my-1 text-info">{{count($totalOrders)}}</h4> --}}
                                {{-- <p class="mb-0 font-13">+2.5% from last week</p> --}}
                            </div>
                            <div class="text-white widgets-icons-2 rounded-circle bg-gradient-blues ms-auto"><i
                                    class='bx bxs-cart'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="border-0 border-4 card radius-10 border-start border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Amount</p>
                                {{-- <h4 class="my-1 text-danger">{{$setting->currency}}{{$totalAmount}}</h4> --}}
                                {{-- <p class="mb-0 font-13">+5.4% from last week</p> --}}
                            </div>
                            <div class="text-white widgets-icons-2 rounded-circle bg-gradient-burning ms-auto">
                                <i class='bx bxs-wallet'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="border-0 border-4 card radius-10 border-start border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Students </p>
                            {{-- <h4 class="my-1 text-success">{{count($totalStudents)}}</h4> --}}
                                {{-- <p class="mb-0 font-13">-4.5% from last week</p> --}}
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
                                <p class="mb-0 text-secondary">Total Customers</p>
                                {{-- <h4 class="my-1 text-warning">{{count($totalInstructor)}}</h4> --}}
                                {{-- <p class="mb-0 font-13">+8.4% from last week</p> --}}
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

