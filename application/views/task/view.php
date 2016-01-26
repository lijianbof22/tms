 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            任务
            <small>浏览任务</small>
            <div class="pull-right">
                <a href="/task/all" class="btn btn-danger">返回任务列表</a>
                <a href="/dashboard" class="btn btn-danger">返回工作台</a>
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
                                <td style="width:10%"><?php echo $assigned->first_name;?></td>
                                <th style="width:10%">进度状态:</th>
                                <td style="width:10%"><?php echo $task->latest_stage;?></td>
                            </tr>
                            <tr>
                                <th>任务描述:</th>
                                <td colspan="9"><?php echo $task->description;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
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
        </div>
    </section>