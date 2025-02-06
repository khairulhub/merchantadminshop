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
                    <li class="breadcrumb-item active" aria-current="page">Edit Product List</li>
                </ol>
            </nav>
        </div>
 
    </div>
    <!--end breadcrumb-->
    

    <div class="row">
        <div class="mx-auto col-xl-10">
            
            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="mb-4">Edit Product
                    </h5>
                    <form id="myForm" action="{{ route('update.productlist') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $productlist->id }}">
                     
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Store Name</label>
                            <select class="mb-3 form-select col-md-6" aria-label="Default select example" name="store_id">
                                <option selected="" disabled>Open this select menu</option>
                                @foreach ($storelist as $list )  
                                <option value="{{ $list->id }}" {{ $list->id == $productlist->store_id ? 'selected' : '' }}>{{ $list->store_name }}</option>
                                @endforeach
                            
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">category Name</label>
                            <select class="mb-3 form-select col-md-6" aria-label="Default select example" name="category_id">
                                <option selected="" disabled>Open this select menu</option>
                                @foreach ($categorylist as $list )  
                                <option value="{{ $list->id }}" {{ $list->id == $productlist->category_id ? 'selected' : '' }}>{{ $list->category_name }}</option>
                                @endforeach
                            
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="input1" name="product_name" value="{{ $productlist->product_name }}">
                        </div>
                        <div class="col-md-6">
                            
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




{{-- 
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
</script> --}}



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_id: {
                    required : true,
                }, 
                subcategory_name: {
                    required : true,
                }, 
                
            },
            messages :{
                category_id: {
                    required : 'Please select Category Name',
                }, 
                subcategory_name: {
                    required : 'Please Select sub category name',
                }, 
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection