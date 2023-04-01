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
    $(document).on('click','.createPermission',function(e){
    e.preventDefault();
    let myForm = document.getElementById('createPermissionForm');
    var formData = new FormData(myForm);

    $.ajax({
    url:"<?php echo e(route('permissions.store')); ?>",
    method:'post',
    data:formData,
    processData: false,
    contentType: false,
    success:function(res){
    console.log(res);
    if(res.status=='success'){
    
    $('#addModal').modal('hide');
    $('#createPermissionForm')[0].reset();
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
    
    $(document).on('click','.updatePermissionForm',function(){
    let id=$(this).data('id');
   
    
    
    $('#up_id').val(id);
  
    });
    
    
    
    //update category
    $(document).on('click','.updatePermission',function(e){
    e.preventDefault();
    var formData = new FormData($('#updatePermissionForm')[0]);
    $.ajax({
    url:"<?php echo e(route('permissions.update')); ?>",
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
    $('#updatePermissionForm')[0].reset();
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


    $(document).on('click','.deletePermission',function(e){
        e.preventDefault();
        let permission_id=$(this).data('id');
        // alert(category_id);
        if(confirm('Delete Permission?')){
        $.ajax({
        url:"<?php echo e(route('permissions.destroy')); ?>",
        method:'post',
        data:{
        "_token": "<?php echo e(csrf_token()); ?>",
        permission_id:permission_id
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
</script><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/admin/permissions/permission.blade.php ENDPATH**/ ?>