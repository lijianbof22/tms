<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<div id="body">
            <?php echo form_open( '', array( 'class' => 'std-form' ) ); ?>
                <label for="company" class="form_label">Company</label>
                <select id="company_id" name="company_id">
                    <option value=""> -- Select -- </option>
                    <?php foreach ($companies as $company) :?>
                    <option value="<?php echo $company->id;?>"><?php echo $company->name;?></option>
                    <?php endforeach;?>
                </select>
                <br />
                <label for="tasktype" class="form_label">Task Type</label>
                <select id="task_type_id" name="task_type_id">
                    <option value=""> -- Select -- </option>
                    <?php foreach ($tasktypes as $type) :?>
                    <option value="<?php echo $type->id;?>"><?php echo $type->name;?></option>
                    <?php endforeach;?>
                </select>
                <br />
                <label for="taskname" class="form_label">Task Name</label>
		<input type="text" name="task_name" id="task_name" class="form_input" autocomplete="off" maxlength="255" value="" />
		<br />
                <label for="description" class="form_label">Task Description</label>
                <textarea name="description"></textarea>
		<br />
                <label for="end_date" class="form_label">End Date</label>
		<input type="text" name="end_date" id="end_date" class="form_input" autocomplete="off" maxlength="255" value="" />
		<br />
                <label for="priority" class="form_label">Priority</label>
                <select id="priority" name="priority">
                    <option value=""> -- Select -- </option>
                    <option value="1">High</option>
                    <option value="2">Middle</option>
                    <option value="3">Low</option>
                </select>
		<br />
                <label for="assigned" class="form_label">Assign To</label>
                <select id="assigned" name="assigned">
                    <option value=""> -- Select -- </option>
                    <?php foreach ($users as $user) :?>
                    <option value="<?php echo $user->id;?>"><?php echo $user->first_name;?> <?php echo $user->last_name;?></option>
                    <?php endforeach;?>
                </select>
		<br />
		<input type="submit" name="submit" value="Create Task Type" id="submit_button"  />
            </form>
        </div>
</div>
