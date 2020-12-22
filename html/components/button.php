<div class="row">
  <div class="col">
  <div class="d-flex justify-content-center">
    <button
      href="#"
      class="btn btn-wider w-100 <?php echo $style;?>"
      id = "btn_<?php echo $id;?>"
      onclick="$('body').trigger('next', ['<?php echo $id;?>']); if ('<?php echo $text ?>' === 'Finish Study')$('body').trigger('finished');  $('#<?php echo $hide ?>').hide().promise().done(() => {if (!excluded) $('#<?php echo $show ?>').show()});"
      <?php if($disabled) echo ' disabled';?>>
        <?php echo $text ?>
    </button>
    </div>
  </div>
</div>
