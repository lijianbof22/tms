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
                                    <td>手机</td>
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
                                <td>
                                    <a href="/company/edit/<?php echo $company->id;?>">编辑</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <a href="/company/all">First</a>
                        <?php if ($currentPage > 1):?>
                        <a href="/company/all/<?php echo $currentPage - 1;?>">Previous</a>
                        <?php endif;?>
                        <?php if ($currentPage < ceil($counts / $pageNum)):?>
                        <a href="/company/all/<?php echo $currentPage + 1;?>">Next</a>
                        <?php endif;?>
                        <a href="/company/all/<?php echo ceil($counts / $pageNum);?>">Last</a>
                        <input id="goto" type="text" value="<?php $currentPage?>"/>
                        <input type="button" onclick="window.location = '/company/all/' + $('#goto').val();" value="Go"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
