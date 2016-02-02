 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            区县管理
            <small>区县列表</small>
            <div class="pull-right">
                <a href="/systype/create/district" class="btn btn-danger">创建区县</a>
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
                                    <td>区县名称</td>
                                    <td>区县代码</td>
                                    <td>操作</td>
                                </tr>
                            </thead>
                            <?php foreach($systypes as $key => $systype):?>
                            <tr>
                                <td><?php echo $systype->name;?></td>
                                <td><?php echo $systype->code;?></td>
                                <td>
                                    <a href="/systype/edit/district/<?php echo $systype->id;?>">编辑</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <?php if (ceil($counts / $pageNum) > 1):?>
                        <a href="/systype/all/district">首页</a>
                        <?php if ($currentPage > 1):?>
                        <a href="/systype/all/district/<?php echo $currentPage - 1;?>">上一页</a>
                        <?php endif;?>
                        <?php if ($currentPage < ceil($counts / $pageNum)):?>
                        <a href="/systype/all/district/<?php echo $currentPage + 1;?>">下一页</a>
                        <?php endif;?>
                        <a href="/systype/all/district/<?php echo ceil($counts / $pageNum);?>">尾页</a>
                        <input id="goto" type="text" value="<?php echo $currentPage?>" style="width:30px;"/>
                        <input type="button" onclick="window.location = '/systype/all/district/' + $('#goto').val();" value="Go" style="width:40px;"/>
                    <?php endif;?>
            </div>
        </div>
    </div>
</section>
