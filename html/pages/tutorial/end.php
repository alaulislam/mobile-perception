<div class="row">
   <div class="col">
      <h2>Thank you for your participation</h2>
      <p>You completed the experiment. Click the button below,
      <div class="mt-1 d-flex justify-content-center">
         <a class="btn btn-primary btn-lg"  href="<?php echo $COMPLETION_URL;?>" role="button"
            target="_BLANK"><strong>Click me!</strong></a>
      </div>
      </br>to report your task completion to the Prolific system.</p>
   </div>
</div>

<script>
$(document).ready(function() {
   $("#btn_<?php echo $id;?>").hide();

});
</script>
