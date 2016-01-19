<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<div id="body">
            <?php echo form_open( '', array( 'class' => 'std-form' ) ); ?>
                <label for="company_name" class="form_label">Company Name</label>
		<input type="text" name="company_name" id="company_name" class="form_input" autocomplete="off" maxlength="255" value="" />
		<br />
		<label for="district" class="form_label">District</label>
                <select name="district" id="district">
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
		<br />
		<label for="address" class="form_label">Address</label>
		<input type="text" name="address" id="address" class="form_input" value="" autocomplete="off"/>
		<br />
		<label for="contact" class="form_label">Contact</label>
		<input type="text" name="contact" id="contact" class="form_input" value="" autocomplete="off"/>
		<br />
		<label for="phone" class="form_label">Phone</label>
		<input type="text" name="phone" id="phone" class="form_input" value="" autocomplete="off"/>
		<br />
		<label for="fax" class="form_label">Fax</label>
		<input type="text" name="fax" id="fax" class="form_input" value="" autocomplete="off"/>
		<br />
		<label for="mobile" class="form_label">Mobile</label>
		<input type="text" name="mobile" id="mobile" class="form_input" value="" autocomplete="off"/>
		<input type="submit" name="submit" value="Create Company" id="submit_button"  />
            </form>
        </div>
</div>
