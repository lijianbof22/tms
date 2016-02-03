 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            任务
            <small>浏览任务</small>
            <div class="pull-right">
                <?php if ($isAdmin): ?>
                <a href="/task/all" class="btn btn-danger">返回任务列表</a>
                <?php endif;?>
                <a href="/dashboard" class="btn btn-danger">返回工作台</a>
                <?php if ($userdata['userId'] === $task->assigned || $isAdmin) :?>
                    <a href="/task/edit/<?php echo $task->id;?>" class="btn btn-warning">编辑任务</a>
                <?php endif;?>
            </div>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width:10%">任务名称:</th>
                                <td style="width:10%"><?php echo $task->taskName;?></td>
                                <th style="width:10%">任务类型:</th>
                                <td style="width:10%"><?php echo $task->tasktypeName;?></td>
                                <th style="width:10%">所属公司:</th>
                                <td style="width:10%"><?php echo $task->companyName;?></td>
                                <th style="width:10%">分配状态:</th>
                                <td style="width:10%"><?php echo $assigned ? $assigned->first_name : '未分配';?></td>
                                <th style="width:10%">进度状态:</th>
                                <td style="width:10%"><?php echo $stageSelect[$task->latest_stage];?></td>
                            </tr>
                            <tr>
                                <th>任务描述:</th>
                                <td colspan="9"><?php echo $task->description;?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="pull-right" style="margin-bottom: 10px;">
                        <?php if ($task->latest_stage === 'pendding' && $userdata['userId'] === $task->assigned) :?>
                            <a href="/task/stage/<?php echo $task->id;?>/processing" class="btn btn-success">开始任务</a>
                        <?php endif;?>
                        <?php if ($task->latest_stage === 'processing' && $userdata['userId'] === $task->assigned) :?>
                            <a href="/task/stage/<?php echo $task->id;?>/checking" class="btn btn-warning">申请检查</a>
                        <?php endif;?>
                        <?php if ($userdata['userId'] === $task->assigned || $isAdmin) :?>
                            <a href="#" class="btn btn-primary" data-toggle='modal' data-target='#tasklog-form'>添加日志</a>
                        <?php endif;?>
                        <?php if ($task->latest_stage === 'checking' && $isAdmin) :?>
                            <a href="/task/stage/<?php echo $task->id;?>/finished" class="btn btn-success">通过检查</a>
                            <a href="/task/stage/<?php echo $task->id;?>/processing" class="btn btn-danger">打回任务</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-9">
                <div class="box box-danger">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <?php foreach ($steps as $index => $step) {?>
                            <li <?php echo $index === 0 ? 'class="active"' : '';?>><a href="#step_<?php echo $index;?>" data-toggle="tab"><?php echo $step->name;?></a></li>
                            <?php }?>
                        </ul>
                        <div class="tab-content">
                            <?php foreach ($steps as $index => $step) {?>
                            <div class="tab-pane  <?php echo $index === 0 ? 'active' : '';?>" id="step_<?php echo $index;?>">
                                <?php echo $step->description;?>
                            </div>
                            <?php }?>
                        </div><!-- /.tab-content -->
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="box box-danger">
                    <?php foreach($logs as $log):?>
                    <div class="small-box bg-gray">
                        <div class="inner">
                            <p>
                                <?php echo $log->note;?>
                            </p>
                            <p style="font-size:12px;"><span><?php echo $log->created_date;?></span><span class="pull-right"><?php echo $log->userName;?></span></p>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>
<div class="modal fade" id="tasklog-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('/task/log/' . $task->id);?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">
                        <b><?php echo $task->tasktypeName?></b>的最新日志
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" name='tasklog' rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <input type="submit" class="btn btn-danger" value="保存日志"/>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>