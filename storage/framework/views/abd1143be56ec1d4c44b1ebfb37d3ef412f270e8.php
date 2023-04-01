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

    $(document).on('click','.updateStockForm',function(){
    let id=$(this).data('id');
    
    $('#up_id').val(id);

    });
$(document).on('click','.updateStock',function(e){
e.preventDefault();
var formData = new FormData($('#updateStockForm')[0]);
$.ajax({
url:"<?php echo e(route('update.stock',$product->id)); ?>",
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
$('#updateStockForm')[0].reset();
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
</script><?php /**PATH D:\metronic_v7.2.8_2\metronic_v7.2.8\theme\html_laravel\demo1\skeleton\resources\views/stock/stock.blade.php ENDPATH**/ ?>