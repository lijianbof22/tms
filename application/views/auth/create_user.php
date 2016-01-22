 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户管理
            <small>创建用户</small>
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
                    <?php echo form_open("auth/create_user");?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="user_name">姓名</label>
                            <?php echo form_input($first_name);?>
                        </div>  
                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <?php echo form_input($email);?>
                        </div>  
                        <div class="form-group">
                            <label for="phone">电话</label>
                            <?php echo form_input($phone);?>
                        </div>  
                        <div class="form-group">
                            <label for="password">密码</label>
                            <?php echo form_input($password);?>
                        </div>  
                        <div class="form-group">
                            <label for="password_confirm">密码确认</label>
                            <?php echo form_input($password_confirm);?>
                        </div>
                        <input type="submit" value="创建用户" class="btn btn-danger"/>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </section>