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
                                <label for="district" class="form_label">District</label>
                                <select name="district" id="district" class="form-control">
                                    <option> -- Select -- </option>
                                    <option value="heping">和平</option>
                                    <option value="hedong">河东</option>
                                    <option value="hexi">河西</option>
                                    <option value="hebei">河北</option>
                                    <option value="nankai">南开</option>
                                    <option value="hongqiao">红桥</option>
                                    <option value="xiqing">西青</option>
                                    <option value="wuqing">武清</option>
                                    <option value="dongli">东丽</option>
                                    <option value="jinnan">津南</option>
                                    <option value="tanggu">塘沽</option>
                                    <option value="dagang">大港</option>
                                    <option value="hangu">汉沽</option>
                                    <option value="jinghai">静海</option>
                                    <option value="baodi">宝坻</option>
                                    <option value="jixian">蓟县</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address" class="form_label">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <label for="contact" class="form_label">Contact</label>
                                <input type="text" name="contact" id="contact" class="form-control" value="" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form_label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <label for="fax" class="form_label">Fax</label>
                                <input type="text" name="fax" id="fax" class="form-control" value="" autocomplete="off"/>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="form_label">Mobile</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" value="" autocomplete="off"/>
                            </div>
                            <input type="submit" name="submit" value="创建公司" id="submit_button" class="btn btn-danger"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
