 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            公司管理
            <small>创建公司</small>
            <div class="pull-right">
                <a href="/company/all" class="btn btn-danger">返回公司列表</a>
            </div>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box box-danger">
                    <?php echo form_open(); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="company_name" class="form_label">公司名称</label>
                                <input type="text" name="company_name" id="company_name" class="form-control" autocomplete="off" maxlength="255" value="" />
                            </div>
                            <div class="form-group">
                                <label for="district" class="form_label">所在区县</label>
                                <select name="district" id="district" class="form-control">
                                    <option> -- 请选择 -- </option>
                                    <?php foreach ($districts as $district):?>
                                    <option value="<?php echo $district->code;?>"><?php echo $district->name;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address" class="form_label">地址</label>
                                <input type="text" name="address" id="address" class="form-control" value="" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <label for="contact" class="form_label">联系人</label>
                                <input type="text" name="contact" id="contact" class="form-control" value="" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form_label">固定电话</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <label for="fax" class="form_label">传真</label>
                                <input type="text" name="fax" id="fax" class="form-control" value="" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="form_label">移动电话</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" value="" autocomplete="off"/>
                            </div>
                            <?php if ($isAdmin):?>
                            <div class="form-group">
                                <label for="assigned" class="form_label">公司指派</label>
                                <select id="assigned" name="assigned" class="form-control">
                                    <option value=""> -- 请选择 -- </option>
                                    <?php foreach ($users as $user) :?>
                                    <option value="<?php echo $user->id;?>"><?php echo $user->first_name;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <?php endif;?>
                            <input type="submit" name="submit" value="创建公司" id="submit_button" class="btn btn-danger"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
