 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            任务类型管理
            <small>编辑任务类型</small>
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
                    <?php echo form_open('', array('id' => 'tasktype-form')); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="group_name">任务类型名称</label>
                                <input type="text" name="tasktype_name" id="tasktype_name" class="form-control" autocomplete="off" maxlength="255" value="<?php echo $tasktype->name;?>" />
                            </div>
                            
                        </div>
                    </form>
                    <div id="step_container" style="padding: 10px;">
                        <?php if ($tasktypesteps) :?>
                        <?php foreach($tasktypesteps as $step):?>
                        <div class="box box-solid box-danger">
                            <div class="box-header">
                                <h3 class="box-title"><?php echo $step->name;?></h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="group_name">步骤名称</label>
                                    <input type="text" name="step_name" id="step_name" class="form-control" autocomplete="off" maxlength="255" value="<?php echo $step->name;?>" onchange="jQuery(this).parents('.box:first').find('.box-title:first').html(jQuery(this).val());"/>
                                </div>
                                <div class="form-group">
                                    <label for="group_name">步骤说明</label>
                                    <textarea name="step_description" id="step_description" class="form-control"><?php echo $step->description;?></textarea>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                    <div class="box-footer">
                        <input type="button" name="addnewstep" value="增加步骤" id="addnew_button" class="btn btn-warning" onclick="addNewStep()"/>
                        <input type="button" name="submit" value="创建任务类型" id="submit_button" class="btn btn-danger pull-right" onclick="submitForm()"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
    var index = 0;
    function addNewStep()
    {
        var html = '<div class="box box-solid box-danger">'+
                            '<div class="box-header">'+
                                '<h3 class="box-title">步骤</h3>'+
                                '<div class="box-tools pull-right">'+
                                    '<button class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>'+
                                    '<button class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>'+
                                '</div>'+
                            '</div>'+
                            '<div class="box-body">'+
                                '<div class="form-group">'+
                                    '<label for="group_name">步骤名称</label>'+
                                    '<input type="text" name="step_name" id="step_name" class="form-control" autocomplete="off" maxlength="255" value=""  onchange="jQuery(this).parents(\'.box:first\').find(\'.box-title:first\').html(jQuery(this).val());"/>'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="group_name">步骤说明</label>'+
                                    '<textarea name="step_description" id="step_description" class="form-control"></textarea>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
        $('#step_container').append(html);
        index++;
    }

    function submitForm()
    {
        var steps_name = jQuery('input[name=step_name]');
        var steps_description = jQuery('textarea[name=step_description]');
        for (var index = 0; index < steps_name.length; index++) {
            if(jQuery(steps_name[index]).val() !== '') {
                var hidName = jQuery('<input type="hidden" name="steps[' + index + '][name]" value="' + jQuery(steps_name[index]).val() + '"/>');
                var hidDesc = jQuery('<input type="hidden" name="steps[' + index + '][description]" value="' + jQuery(steps_description[index]).val() + '"/>');
                jQuery('form#tasktype-form').append(hidName).append(hidDesc);
            }
        }
        jQuery('form#tasktype-form').submit();
    }
</script>
