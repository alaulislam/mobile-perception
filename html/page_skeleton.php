<div id="<?php echo $id ?>">
  <?php include $page ?>
  <input type="hidden" id="page_<?php echo $id;?>" value="<?php echo $page_number;?>"</input>
  <?php $text = $button; $style = ($text == "Next") ? "btn-success" : "btn-primary" ; $hide = $id; $show = $next; $disabled = $disabled; include "components/button.php" ?>
</div>


