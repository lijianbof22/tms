<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<div id="body">
            <?php echo form_open( '', array( 'class' => 'std-form' ) ); ?>
                <label for="company_name" class="form_label">Company Name</label>
		<input type="text" name="company_name" id="company_name" class="form_input" autocomplete="off" maxlength="255" value="<?php echo $company->name;?>" />
		<br />
		<label for="district" class="form_label">District</label>
                <select name="district" id="district">
                    <option> -- Select -- </option>
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
		<br />
		<label for="address" class="form_label">Address</label>
		<input type="text" name="address" id="address" class="form_input" value="<?php echo $company->address;?>" autocomplete="off"/>
		<br />
		<label for="contact" class="form_label">Contact</label>
		<input type="text" name="contact" id="contact" class="form_input" value="<?php echo $company->contact;?>" autocomplete="off"/>
		<br />
		<label for="phone" class="form_label">Phone</label>
		<input type="text" name="phone" id="phone" class="form_input" value="<?php echo $company->phone;?>" autocomplete="off"/>
		<br />
		<label for="fax" class="form_label">Fax</label>
		<input type="text" name="fax" id="fax" class="form_input" value="<?php echo $company->fax;?>" autocomplete="off"/>
		<br />
		<label for="mobile" class="form_label">Mobile</label>
		<input type="text" name="mobile" id="mobile" class="form_input" value="<?php echo $company->mobile;?>" autocomplete="off"/>
                <input type="hidden" name="id" id="id" value="<?php echo $company->id;?>"/>
		<input type="submit" name="submit" value="Update Company" id="submit_button"  />
            </form>
        </div>
</div>
