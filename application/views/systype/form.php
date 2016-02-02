 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            区县管理
            <small>创建区县</small>
            <div class="pull-right">
                <a href="/systype/all/district" class="btn btn-danger">返回区县列表</a>
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
                                <label for="district_name">区县名称</label>
                                <input type="text" name="systype_name" id="systype_name" class="form-control" autocomplete="off" maxlength="255" value="" />
                            </div>
                            <div class="form-group">
                                <label for="district_code">区县代码</label>
                                <input type="text" name="code" id="code" class="form-control" autocomplete="off" maxlength="255" value="" />
                            </div>
                            <input type="submit" name="submit" value="创建区县" id="submit_button" class="btn btn-danger"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>