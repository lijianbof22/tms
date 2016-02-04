 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            公司管理
            <small>公司列表</small>
            <div class="pull-right">
                <a href="/company/create" class="btn btn-danger">创建公司</a>
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
                                    <td>公司名称</td>
                                    <td>所在区县</td>
                                    <td>联系人</td>
                                    <td>固定电话</td>
                                    <td>移动电话</td>
                                    <?php if ($isAdmin):?>
                                    <td>指派状态</td>
                                    <?php endif;?>
                                    <td>操作</td>
                                </tr>
                            </thead>
                            <?php foreach($companies as $key => $company):?>
                            <tr>
                                <td><?php echo $company->name;?></td>
                                <td><?php echo $districts[$company->district];?></td>
                                <td><?php echo $company->contact;?></td>
                                <td><?php echo $company->phone;?></td>
                                <td><?php echo $company->mobile;?></td>
                                <?php if ($isAdmin):?>
                                <td><?php echo $company->userName;?></td>
                                <?php endif;?>
                                <td>
                                    <a href="/company/edit/<?php echo $company->id;?>">编辑</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php if (ceil($counts / $pageNum) > 1):?>
                            <a href="/company/all">首页</a>
                            <?php if ($currentPage > 1):?>
                            <a href="/company/all/<?php echo $currentPage - 1;?>">上一页</a>
                            <?php endif;?>
                            <?php if ($currentPage < ceil($counts / $pageNum)):?>
                            <a href="/company/all/<?php echo $currentPage + 1;?>">下一页</a>
                            <?php endif;?>
                            <a href="/company/all/<?php echo ceil($counts / $pageNum);?>">尾页</a>
                            <input id="goto" type="text" value="<?php echo $currentPage?>" style="width:30px;"/>
                            <input type="button" onclick="window.location = '/company/all/' + $('#goto').val();" value="Go" style="width:40px;"/>
                        <?php endif ;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
