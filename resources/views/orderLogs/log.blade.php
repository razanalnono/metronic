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
    $(document).on('click','.addAttribute',function(e){
    e.preventDefault();
    let myForm = document.getElementById('addAttributeForm');
    var formData = new FormData(myForm);

    $.ajax({
    url:"{{ route('add.value') }}",
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
         
         //return updated value

$(document).on('click','.updateValueForm',function(){
let id=$(this).data('id');
let attribute_id = $(this).data('attribute-id');
let value=$(this).data('value');

$('#up_id').val(id);
$('#up_value').val(value);
$('#attribute_id option[value="' + attribute_id + '"]').prop('selected', true);
});



$(document).on('click','.updateValue',function(e){
e.preventDefault();
var formData = new FormData($('#updateValueForm')[0]);
$.ajax({
url:"{{ route('update.value') }}",
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
$('#updateValueForm')[0].reset();
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


$(document).on('click','.deleteValue',function(e){
    e.preventDefault();
    let attributeValue_id=$(this).data('id');
    if(confirm('Delete Value?')){
    $.ajax({
    url:"{{ route('delete.value') }}",
    method:'post',
    data:{
        "_token": "{{ csrf_token() }}",
    attributeValue_id:attributeValue_id
    },
    
    
    success:function(res){
    //console.log(res);
    if(res.status=='success'){
    location.reload(true)
    toastr.success('Success messages');
    // console.log(res.status);

    
    }
    
    }
    });
    }
    
    
    })

       
});
</script>