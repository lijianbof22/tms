 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户管理
            <small>编辑群组</small>
            <div class="pull-right">
                <a href="/auth" class="btn btn-danger">返回用户列表</a>
            </div>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box box-danger">
                    <?php echo form_open(current_url());?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="group_name">名称</label>
                            <?php echo form_input($group_name);?>
                        </div>  
                        <div class="form-group">
                            <label for="description">描述</label>
                            <?php echo form_input($group_description);?>
                        </div>
                        <input type="submit" value="更新群组" class="btn btn-danger"/>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </section>