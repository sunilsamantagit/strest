<div style="margin-top:20px;border-style: solid;border-width: 1px;padding: 10px 10px 10px;" id="div_<?php echo $count2 ?>" >
  <a href="javascript:void(0);" onclick="closediv('div_<?php echo $count2 ?>','<?php echo $id; ?>', 'count_list');" class="addmoredivclose" style="float:right"><b>X</b></a>
  <div class="spacer" style="margin-top: 10px;"></div>
  <div class="single-column" >
    <label class="question-label">List Content:</label>
    <input style="width:59%;" type="text" name="list_content<?php echo $count2 ?>" id="list_content<?php echo $count2 ?>" value="<?php if(!empty($content)) echo $content; else echo ''; ?>" class="inputinpt" />
  </div>
  <div class="spacer" style="margin-top: 10px;"></div>

  <input type="hidden" id="cont2_id<?php echo $count2 ?>" name="cont2_id<?php echo $count2 ?>"  value="<?php if(!empty($id)) echo $id; else echo 0; ?>" />
  <input type="hidden" id="hidden2_id<?php echo $count2 ?>" name="hidden2_id<?php echo $count2 ?>"  value="" />
</div>
