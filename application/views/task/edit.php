 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            任务管理
            <small>编辑任务</small>
            <div class="pull-right">
                <a href="/task/view/<?php echo $task->id;?>" class="btn btn-danger">返回</a>
            </div>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box box-danger">
            <?php echo form_open(); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="company" class="form_label">公司</label>
                            <select id="company_id" name="company_id" class="form-control">
                                <option value=""> -- 请选择 -- </option>
                                <?php foreach ($companies as $company) :?>
                                <option value="<?php echo $company->id;?>" <?php echo $task->companyId === $company->id ? 'selected="selected"' : '';?>><?php echo $company->name;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tasktype" class="form_label">任务类型</label>
                            <select id="task_type_id" name="task_type_id" class="form-control">
                                <option value=""> -- 请选择 -- </option>
                                <?php foreach ($tasktypes as $type) :?>
                                <option value="<?php echo $type->id;?>" <?php echo $task->tasktypeId === $type->id ? 'selected="selected"' : '';?>><?php echo $type->name;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="taskname" class="form_label">任务名称</label>
                            <input type="text" name="task_name" id="task_name" class="form-control" autocomplete="off" maxlength="255" value="<?php echo $task->taskName;?>" />
                        </div>
                        <div class="form-group">
                            <label for="description" class="form_label">任务描述</label>
                            <textarea name="description" class="form-control"><?php echo $task->description;?></textarea>
                        </div>
<!--                        <div class="form-group">
                            <label for="end_date" class="form_label">End Date</label>
                            <input type="text" name="end_date" id="end_date" class="form-control" autocomplete="off" maxlength="255" value="" />
                        </div>-->
<!--                        <div class="form-group">
                            <label for="priority" class="form_label">Priority</label>
                            <select id="priority" name="priority" class="form-control">
                                <option value=""> -- Select -- </option>
                                <option value="1">High</option>
                                <option value="2">Middle</option>
                                <option value="3">Low</option>
                            </select>
                        </div>-->
                        <div class="form-group">
                            <label for="assigned" class="form_label">任务指派</label>
                            <select id="assigned" name="assigned" class="form-control">
                                <option value=""> -- 请选择 -- </option>
                                <?php foreach ($users as $user) :?>
                                <option value="<?php echo $user->id;?>" <?php echo $task->assigned === $user->id ? 'selected="selected"' : '';?>><?php echo $user->first_name;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <input type="submit" name="submit" value="更新任务" id="submit_button" class="btn btn-danger" />
                    </div>
                </form>
            </div>
        </div>
    </section>