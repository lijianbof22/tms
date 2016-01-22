 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户管理
            <small>编辑用户</small>
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
                    <?php echo form_open(uri_string());?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="user_name">姓名</label>
                            <?php echo form_input($first_name);?>
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
                        <div class="form-group">
                            <label for="group">群组</label>
                            <?php foreach ($groups as $group):?>
                                <label class="checkbox">
                                <?php
                                    $gID=$group['id'];
                                    $checked = null;
                                    $item = null;
                                    foreach($currentGroups as $grp) {
                                        if ($gID == $grp->id) {
                                            $checked= ' checked="checked"';
                                        break;
                                        }
                                    }
                                ?>
                                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                </label>
                            <?php endforeach?>
                        </div>
                        <input type="submit" value="更新用户" class="btn btn-danger"/>
                    </div>
                    <?php echo form_hidden('id', $user->id);?>
                    <?php echo form_hidden($csrf); ?>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </section>