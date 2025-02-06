@extends('./merchant.merchant_dashboard')
@section('merchant')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
   
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Store List</li>
                </ol>
            </nav>
        </div>
      
    </div>
    <!--end breadcrumb-->
    

    <div class="row">
        <div class="mx-auto col-xl-10">
            
            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="mb-4">Edit 
                        Store List
                    </h5>
                    <form id="myForm" action="{{ route('update.storelist') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id"  value="{{ $storelist-> id}}" >

                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Store Name</label>
                            <input type="text" class="form-control" id="input1" name="store_name" value="{{ $storelist-> store_name}}" >
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image" class="form-label">Store Image / Photo</label>
                            <input class="form-control" type="file" id="image"  name="photo">
                        </div>
                        
                       <div class="col-md-6">
                        <img id="showImage" src="{{ asset($storelist-> photo) }}"
                                                alt="Admin" class="p-1 mt-2 rounded-circle bg-primary" width="60">
                       </div>
                      
                        <div class="col-md-12">
                            <div class="gap-3 d-md-flex d-grid align-items-center">
                                <button type="submit" class="px-4 btn btn-primary">Submit</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>

      


        </div>
    </div>


   
</div>





<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>





@endsection