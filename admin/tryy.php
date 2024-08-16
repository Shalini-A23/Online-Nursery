
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<form action="abc" method="POST">
        <input type="hidden" name="p_id" id="p_id" value="<?php echo $rows['p_id']; ?>">
        <button class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()">
            <i class="fa fa-archive"></i>
                Archive
        </button>
</form>
<script type="text/javascript">
  function archiveFunction() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "Once you delete you cannot retrieve it",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, archive it!",
  cancelButtonText: "Cancel",
  closeOnConfirm: false,
},
function(isConfirmed){
  if (isConfirmed) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}
</script>