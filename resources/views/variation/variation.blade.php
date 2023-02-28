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
$(document).on('click','.addVariation',function(e){
e.preventDefault();
let myForm = document.getElementById('addVariationForm');
var formData = new FormData(myForm);
formData.append('image', $('#image')[0].files[0]);
// console.log(name+slug);
$.ajax({
url:"{{ route('add.variation') }}",
method:'post',
data:formData,
processData: false,
contentType: false,
success:function(res){
console.log(res);
if(res.status=='success'){

$('#addModal').modal('hide');
$('#addVariationForm')[0].reset();
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
         


$(document).on('click','.updateVariation',function(e){
e.preventDefault();
var formData = new FormData($('#updateVariationForm')[0]);
$.ajax({
url:"{{ route('update.variation') }}",
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
// $('#updateCategoryForm')[0].reset();
location.reload(true)
toastr.success('Success messages');
// $('.table').load(location.href+'.table');
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


$(document).on('click','.deleteVariation',function(e){
e.preventDefault();
let variation_id=$(this).data('id');
console.log(variation_id);

if(confirm('Delete Variation?')){
$.ajax({
url:"{{ route('delete.variation') }}",
method:'post',
data:{
"_token": "{{ csrf_token() }}",
variation_id:variation_id,
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