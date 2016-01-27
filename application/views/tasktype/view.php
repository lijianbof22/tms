 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            任务类型
            <small>任务类型列表</small>
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
                                <th style="width:10%">任务类型名称:</th>
                                <td style="width:10%"><?php echo $tasktype->name;?></td>
                                <td style="width:80%">&nbsp;</td>
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