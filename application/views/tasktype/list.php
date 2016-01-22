 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            任务类型管理
            <small>任务类型列表</small>
            <div class="pull-right">
                <a href="/tasktype/create" class="btn btn-danger">创建任务类型</a>
            </div>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>任务类型</td>
                                    <td>操作</td>
                                </tr>
                            </thead>
                            <?php foreach($tasktypes as $key => $tasktype):?>
                            <tr>
                                <td><?php echo $tasktype->name;?></td>
                                <td>
                                    <a href="/tasktype/edit/<?php echo $tasktype->id;?>">Edit</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</section>
            <a href="/tasktype/all">First</a>
            <?php if ($currentPage > 1):?>
            <a href="/tasktype/all/<?php echo $currentPage - 1;?>">Previous</a>
            <?php endif;?>
            <?php if ($currentPage < ceil($counts / $pageNum)):?>
            <a href="/tasktype/all/<?php echo $currentPage + 1;?>">Next</a>
            <?php endif;?>
            <a href="/tasktype/all/<?php echo ceil($counts / $pageNum);?>">Last</a>
            <input id="goto" type="text" value="<?php $currentPage?>"/>
            <input type="button" onclick="window.location = '/tasktype/all/' + $('#goto').val();" value="Go"/>
