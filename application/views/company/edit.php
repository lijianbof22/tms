 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            公司管理
            <small>编辑公司</small>
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
                                <input type="text" name="company_name" id="company_name" class="form-control" autocomplete="off" maxlength="255" value="<?php echo $company->name;?>" />
                            </div>
                            <div class="form-group">
                                <label for="district" class="form_label">所在区县</label>
                                <select name="district" id="district" class="form-control">
                                    <option> -- 选择 -- </option>
                                    <option value="heping" <?php echo $company->district == "heping" ? 'selected="selected"' : '';?>>和平</option>
                                    <option value="hedong" <?php echo $company->district == "hedong" ? 'selected="selected"' : '';?>>河东</option>
                                    <option value="hexi" <?php echo $company->district == "hexi" ? 'selected="selected"' : '';?>>河西</option>
                                    <option value="hebei" <?php echo $company->district == "hebei" ? 'selected="selected"' : '';?>>河北</option>
                                    <option value="nankai" <?php echo $company->district == "nankai" ? 'selected="selected"' : '';?>>南开</option>
                                    <option value="hongqiao" <?php echo $company->district == "hongqiao" ? 'selected="selected"' : '';?>>红桥</option>
                                    <option value="xiqing" <?php echo $company->district == "xiqing" ? 'selected="selected"' : '';?>>西青</option>
                                    <option value="wuqing" <?php echo $company->district == "wuqing" ? 'selected="selected"' : '';?>>武清</option>
                                    <option value="dongli" <?php echo $company->district == "dongli" ? 'selected="selected"' : '';?>>东丽</option>
                                    <option value="jinnan" <?php echo $company->district == "jinnan" ? 'selected="selected"' : '';?>>津南</option>
                                    <option value="tanggu" <?php echo $company->district == "tanggu" ? 'selected="selected"' : '';?>>塘沽</option>
                                    <option value="dagang" <?php echo $company->district == "dagang" ? 'selected="selected"' : '';?>>大港</option>
                                    <option value="hangu" <?php echo $company->district == "hangu" ? 'selected="selected"' : '';?>>汉沽</option>
                                    <option value="jinghai" <?php echo $company->district == "jinghai" ? 'selected="selected"' : '';?>>静海</option>
                                    <option value="baodi" <?php echo $company->district == "baodi" ? 'selected="selected"' : '';?>>宝坻</option>
                                    <option value="jixian" <?php echo $company->district == "jixian" ? 'selected="selected"' : '';?>>蓟县</option>
                                </select>                            
                            </div>
                            <div class="form-group">
                                <br />
                                <label for="address" class="form_label">地址</label>
                                <input type="text" name="address" id="address" class="form-control" value="<?php echo $company->address;?>" autocomplete="off"/>               
                            </div>
                            <div class="form-group">
                                <br />
                                <label for="contact" class="form_label">联系人</label>
                                <input type="text" name="contact" id="contact" class="form-control" value="<?php echo $company->contact;?>" autocomplete="off"/>               
                            </div>
                            <div class="form-group">
                                <br />
                                <label for="phone" class="form_label">固定电话</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $company->phone;?>" autocomplete="off"/>               
                            </div>
                            <div class="form-group">
                                <br />
                                <label for="fax" class="form_label">传真</label>
                                <input type="text" name="fax" id="fax" class="form-control" value="<?php echo $company->fax;?>" autocomplete="off"/>               
                            </div>
                            <div class="form-group">
                                <br />
                                <label for="mobile" class="form_label">移动电话</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $company->mobile;?>" autocomplete="off"/>               
                            </div>
                            <input type="hidden" name="id" id="id" value="<?php echo $company->id;?>"/>
                            <input type="submit" name="submit" value="更新公司" id="submit_button" class="btn btn-danger" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
