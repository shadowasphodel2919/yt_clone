<?php include 'Parts/header.php';
require_once ("Parts/classes/VideoDetailsFormProvider.php");?>
<div class="panel">
    <?php 
    $formp=new VideoDetailsFormProvider($con);
    echo $formp->CreateUploadForm();
    ?>
</div>  
<script>
$("form").submit(function() {
    $("#loadingModal").modal("show");
});
</script>



<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        Please wait. This might take a while.
        <img src="images/icons/loading-spinner.gif">
      </div>

    </div>
  </div>
</div>


<?php include 'Parts/footer.php';?>