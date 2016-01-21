<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<div id="body">
            <?php echo form_open( '', array( 'class' => 'std-form' ) ); ?>
                <label for="company_name" class="form_label">Task Type Name</label>
		<input type="text" name="tasktype_name" id="tasktype_name" class="form_input" autocomplete="off" maxlength="255" value="" />
		<br />
                <input type="button" value="Add Step" onclick="addNewStep()"/>
                <div id="step_container"></div>
		<input type="submit" name="submit" value="Create Task Type" id="submit_button"  />
            </form>
        </div>
</div>
<script>
    var index = 0;
    function addNewStep()
    {
        $('#step_container').append('<label for="steps" class="form_label">' + (index + 1) + '</label><input type="text" name="steps[' + index + '][name]"/><br><textarea name="steps[' + index + '][description]"></textarea><br>');
        index++;
    }
</script>
