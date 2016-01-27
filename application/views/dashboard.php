 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            工作台
            <small>我的任务</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-4">
                <div class="box box-solid box-info box-pedding">
                    <div class="box-header">
                        <h3 class="box-title">未开始</h3>
                    </div>
                    <div class="box-body">
                        <?php if (isset($tasks['pendding'])) {?>
                        <?php foreach ($tasks['pendding'] as $task) {?>
                        <div class="small-box bg-gray">
                            <div class="inner">
                                <p>
                                    <label style="min-width: 50px;text-align: center;background-color: #999;color:#fff;"><?php echo $task->id;?></label>
                                    <label><?php echo $task->taskName?></label>
                                </p>
                                <p><label>公司：</label><?php echo $task->companyName;?></p>
                            </div>
                            <div class="bigicon" style="cursor: pointer;" onclick="window.location = '/task/view/<?php echo $task->id;?>'">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="box box-solid box-success box-processing">
                    <div class="box-header">
                        <h3 class="box-title">进行中</h3>
                    </div>
                    <div class="box-body">
                        <?php if (isset($tasks['processing'])) {?>
                        <?php foreach ($tasks['processing'] as $task) {?>
                        <div class="small-box bg-gray">
                            <div class="inner">
                                <p>
                                    <label style="min-width: 50px;text-align: center;background-color: #999;color:#fff;"><?php echo $task->id;?></label>
                                    <label><?php echo $task->taskName?></label>
                                </p>
                                <p><label>公司：</label><?php echo $task->companyName;?></p>
                            </div>
                            <div class="bigicon" style="cursor: pointer;" onclick="window.location = '/task/view/<?php echo $task->id;?>'">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="box box-solid box-warning box-checking">
                    <div class="box-header">
                        <h3 class="box-title">待检查</h3>
                    </div>
                    <div class="box-body">
                        <?php if (isset($tasks['checking'])) {?>
                        <?php foreach ($tasks['checking'] as $task) {?>
                        <div class="small-box bg-gray">
                            <div class="inner">
                                <p>
                                    <label style="min-width: 50px;text-align: center;background-color: #999;color:#fff;"><?php echo $task->id;?></label>
                                    <label><?php echo $task->taskName?></label>
                                </p>
                                <p><label>公司：</label><?php echo $task->companyName;?></p>
                            </div>
                            <div class="bigicon" style="cursor: pointer;" onclick="window.location = '/task/view/<?php echo $task->id;?>'">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>