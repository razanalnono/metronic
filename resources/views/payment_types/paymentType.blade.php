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
    $(document).on('click','.addType',function(e){
    e.preventDefault();
    let myForm = document.getElementById('addPaymentTypeForm');
    var formData = new FormData(myForm);

    $.ajax({
    url:"{{ route('add.type') }}",
    method:'post',
    data:formData,
    processData: false,
    contentType: false,
    success:function(res){
    console.log(res);
    if(res.status=='success'){
    
    $('#addModal').modal('hide');
    $('#addPaymentTypeForm')[0].reset();
    $('.table').load(location.href+'.table');
    location.reload(true);
    toastr.success('Success messages');
    toastr.options.timeOut = 9000;
    }
    },error:function(error){
    var formErr=error.responseJSON.errors;
    $('.formErrors').html('');
    for(var err in formErr){
    $('.'+err+'_err').html(formErr[err][0]);
    }
    }
    });
    
    }) 
         
         //return updated value

        $(document).on('click','.updateAttributeForm',function(){
        let id=$(this).data('id');
        let name=$(this).data('name');

        $('#up_id').val(id);
        $('#up_name').val(name);
        });



$(document).on('click','.updateAttribute',function(e){
e.preventDefault();
var formData = new FormData($('#updateAttributeForm')[0]);
$.ajax({
url:"{{ route('update.attribute') }}",
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
$('#updateAttributeForm')[0].reset();
location.reload(true)
toastr.success('Success messages');
$('.table').load(location.href+'.table');
window.reload(true);

}
},error:function(error){
var formErr=error.responseJSON.errors;
$('.formErrors').html('');
for(var err in formErr){
$('.'+err+'_err').html(formErr[err][0]);
}
}
});

})


$(document).on('click','.deleteAttribute',function(e){
    e.preventDefault();
    let attribute_id=$(this).data('id');
    if(confirm('Delete Attribute?')){
    $.ajax({
    url:"{{ route('delete.attribute') }}",
    method:'post',
    data:{
        "_token": "{{ csrf_token() }}",
    attribute_id:attribute_id
    },
    
    
    success:function(res){
    //console.log(res);
    if(res.status=='success'){
    location.reload(true)
    toastr.success('Success messages');
    // console.log(res.status);
    $('.table').load(location.href+'.table');
    window.reload(true);
    
    }
    
    }
    });
    }
    
    
    })

       
});
</script>