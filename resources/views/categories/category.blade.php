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
{{-- first Brian way --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function(){
    $(document).on('click','.addCategory',function(e){
    e.preventDefault();
    let myForm = document.getElementById('addCategoryForm');
    var formData = new FormData(myForm);

    $.ajax({
    url:"{{ route('add.category') }}",
    method:'post',
    data:formData,
    processData: false,
    contentType: false,
    success:function(res){
    console.log(res);
    if(res.status=='success'){
    
    $('#addModal').modal('hide');
    $('#addCategoryForm')[0].reset();
    $('.table').load(location.href+'.table');
    location.reload(true);
    toastr.success('Success messages');
    toastr.options.timeOut = 9000;
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
         
         //return updated value
         $(document).on('click','.updateCategoryForm',function(){
            let id=$(this).data('id');
            let name_en=$(this).data('name_en');
            let name_ar=$(this).data('name_ar');
            let parent_id=$(this).data('parent_id');


            $('#up_id').val(id);
            $('#up_name_en').val(name_en);
            $('#up_name_ar').val(name_ar);
            $('#up_parent_id').val(parent_id);
                 });



        //update category
        $(document).on('click','.updateCategory',function(e){
        e.preventDefault();
        var formData = new FormData($('#updateCategoryForm')[0]);     
   $.ajax({
        url:"{{ route('update.category') }}",
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
        $('#updateCategoryForm')[0].reset();
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


        //delete category
        $(document).on('click','.deleteCategory',function(e){
        e.preventDefault();
        let category_id=$(this).data('id');
        // alert(category_id);
        if(confirm('Delete Category?')){
            $.ajax({
                        url:"{{ route('delete.category') }}",
                        method:'post',
                        data:{
                                category_id:category_id
                        },
                        

                success:function(res){
                //console.log(res);
                if(res.status=='success'){
                    location.reload(true)
                    toastr.success('Success messages');
                  //  console.log(res.status);
                 //   $('.table').load(location.href+'.table');
                // window.reload(true);

                }

            }
        });
            }
       
        
        })  
     });
</script>