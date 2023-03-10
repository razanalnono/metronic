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

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function(){
    $(document).on('click','.addAttribute',function(e){
    e.preventDefault();
    let myForm = document.getElementById('addAttributeForm');
    var formData = new FormData(myForm);

    $.ajax({
    url:"<?php echo e(route('add.variants')); ?>",
    method:'post',
    data:formData,
    processData: false,
    contentType: false,
    success:function(res){
    console.log(res);
    if(res.status=='success'){
    
    $('#addModal').modal('hide');
    $('#addAttributeForm')[0].reset();
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

    $(document).on('click','.updateVariantForm',function(){
    let id=$(this).data('id');
    
    $('#up_id').val(id);
    });
         
         //return updated value
         $(document).on('click','.updateVariant',function(e){
             e.preventDefault();
            var formData = new FormData($('#updateVariantForm')[0]);
                $.ajax({
                url:"<?php echo e(route('update.variants')); ?>",
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
                $('#updateVariantForm')[0].reset();
                $('.table').load(location.href+'.table');
                location.reload(true)
                toastr.success('Success messages');
                }
                },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                $('.errMsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
                });
                }
                });
                });


$(document).on('click','.deleteVariant',function(e){
    e.preventDefault();
    let variant_id=$(this).data('id');
    if(confirm('Delete Variant?')){
    $.ajax({
    url:"<?php echo e(route('delete.variant')); ?>",
    method:'post',
    data:{
        "_token": "<?php echo e(csrf_token()); ?>",
    variant_id:variant_id
    },
    
    
    success:function(res){
    //console.log(res);
    if(res.status=='success'){
    location.reload(true)
    toastr.success('Success messages');
    // console.log(res.status);
    // $('.table').load(location.href+'.table');
    // window.reload(true);
    
    }
    
    }
    });
    }
    
    
    })

       
});
</script><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/ProductVariants/attribute.blade.php ENDPATH**/ ?>