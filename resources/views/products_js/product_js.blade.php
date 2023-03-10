<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
</script>

<script>
    $(document).ready(function(){
        $(document).on('click','.addProduct',function(e){
        e.preventDefault();
        let myForm = document.getElementById('addProductForm');
        var formData = new FormData(myForm);
       formData.append('image', $('#image')[0].files[0]);
        // console.log(name+slug);
    $.ajax({
    url:"{{ route('products.store') }}",
    method:'post',
    data:formData,
    processData: false,
    contentType: false,
    success:function(res){
        console.log(res);
        if(res.status=='success'){

        $('#addModal').modal('hide');
        $('#addProductForm')[0].reset();
        $('.table').load(location.href+'.table');
        location.reload(true);
        toastr.success('Success messages');
        toastr.options.timeOut = 6000;

       // $('#success').addClass('alert alert-sucec')
       // $(".modal-backdrop").remove();
        // window.reload(true);
        
           }
    },error:function(error){
  var formErr=error.responseJSON.errors;
    console.log(error);
    $('.formErrors').html('');
    for(var err in formErr){
    $('.'+err+'_err').html(formErr[err][0]);
    }
    }
});

         })    



//return value

$(document).on('click','.updateProductForm',function(){
let id=$(this).data('id');
let name_en=$(this).data('name_en');
let name_ar=$(this).data('name_ar');
let category_id=$(this).data('category_id');
let quantity=$(this).data('quantity');
let price =$(this).data('price');
let description = $(this).data('description');
let enabled_id = $(this).data('enabled_id')



$('#up_id').val(id);
$('#up_name_en').val(name_en);
$('#up_name_ar').val(name_ar);
$('#up_category_id').val(category_id);
$('#up_quantity').val(quantity);
$('#up_price').val(price);
$('#up_description').val(description);
$('#enabled_id').val(enabled_id);
});

         
      



        //update category
$(document).on('click','.updateProduct',function(e){
        e.preventDefault();
        var formData = new FormData($('#updateProductForm')[0]);
        $.ajax({
        url:"{{ route('update.product') }}",
        method:'post',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success:function(res){
        console.log(res);
        if(res.status=='success'){
        console.log(res.status);
        $('#updateModal').modal('hide');
    //    $('#updateCategoryForm')[0].reset();
        location.reload(true)
        toastr.success('Success messages');
        // $('.table').load(location.href+'.table');
        // window.reload(true);
        
        }
        },error:function(err){
        let error=err.responseJSON;
        $.each(error.errors,function(index,value){
        $('.errMsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
        });
        }
        });
        
        })



    //delete product
$(document).on('click','.deleteProduct',function(e){
        e.preventDefault();
        let product_id=$(this).data('id');
        console.log(product_id);
        
        if(confirm('Delete Product?')){
        $.ajax({
        url:"{{ route('delete.product') }}",
        method:'post',
        data:{
            "_token": "{{ csrf_token() }}",
        product_id:product_id
        },
        
        success:function(res){
        console.log(res);
        if(res.status=='success'){
        location.reload(true)
        console.log(res.status);
        // $('.table').load(location.href+'.table');
        // window.reload(true);
        
        }
        }
        });
        }
        
        })

    })
            
            

</script>