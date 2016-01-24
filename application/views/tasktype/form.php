 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            任务类型管理
            <small>创建任务类型</small>
            <div class="pull-right">
                <a href="/tasktype/all" class="btn btn-danger">返回任务类型列表</a>
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
                                <label for="group_name">任务类型名称</label>
                                <input type="text" name="tasktype_name" id="tasktype_name" class="form-control" autocomplete="off" maxlength="255" value="" />
                            </div>
                            
                        </div>
                    </form>
                    <div id="step_container">
                        <div class="box box-solid box-danger">
                            <div class="box-header">
                                <h3 class="box-title">步骤</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-danger btn-sm" onclick="addNewStep()"><i class="fa fa-plus"></i></button>
                                    <button class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="group_name">步骤名称</label>
                                    <input type="text" name="step_name" id="step_name" class="form-control" autocomplete="off" maxlength="255" value="" />
                                </div>
                                <div class="form-group">
                                    <label for="group_name">步骤说明</label>
                                    <textarea name="step_description" id="step_description" class="form-control"></textarea>
                                </div>
                            </div><!-- /.box-body -->
                            <input type="submit" name="submit" value="创建任务类型" id="submit_button" class="btn btn-danger"/>
                        </div><!-- /.box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
    var index = 0;
    function addNewStep()
    {
        var html = '<div class="form-group"><label for="group_name">步骤名称</label><input type="text" name="steps[' + index + '][name]" class="form_input" autocomplete="off" maxlength="255" value="" /></div><div class="form-group"><label for="group_name">步骤描述</label><textarea name="steps[' + index + '][description]" class="form_input"></textarea></div>';
        $('#step_container').append(html);
        index++;
    }
</script>
