<?php

/*
 * 
 * 

 			stdClass Object
            [STOCKCODE] => 002Z18
            [DESC] => STRIPPING SINGLE SLOT 1800MM ZINC P
            [RECRETEX] => 31.8200
            [RECRETINC] => 35.0000
            [WIDTH] => 0.00
            [DEPTH] => 0.00
            [HEIGHT] => 0.00
            [FIELD1] => 
            [SMALPIC] => 
            [STKIND1] => Y
            [WEIGHT] => 0.0000
            [STKQOH1] => 0.00
            [WEBGROUP1] => SUBGROUP1
 * 
 * 
 * */
class Products_Option {

	public $clientkey = 'MileEndOptionsAPIPass123498765';

	public $url = "http://api.officefurniture.net.au/OptionsAPI/Options.API";

	public $imgurl=  "http://images.officefurniture.net.au/Pictures";
	
	
	
	public $ps = array();
	
	public function __construct() {
		
	}

	public function init() {
		
	}
	
	
	
	public function  get_web_group($webgroup){
		$xml = '<?xml version="1.0" encoding="utf-8" ?><request clientKey="MileEndOptionsAPIPass123498765"><table name="DRWGRP" sortBy="WEBGROUP" maxRecords="0" FirstRecord="1">
		    <fields>
		      <field>WEBGROUP</field>
		      <field>DESC</field>
		      <field>PICFILE</field>
		      <field>PARGROUP1</field>
		    </fields>
		    <conditions>
				<condition field="WEBGROUP" type="equals">'.$webgroup.'</condition>
		    </conditions>
		  </table>
		</request>';		
		$headers = array(
				"Content-type: text/xml",
				"Content-length: " . strlen($xml),
				"Connection: close",
		);
				
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		while (true):
		
			$data = curl_exec($ch);
			
			if(curl_errno($ch)){
				//print curl_error($ch);
				//exit;
			}else{
				curl_close($ch);
				break;
			}
			
		endwhile;
		
		$xml = simplexml_load_string($data);
		
	
		
		$web = new stdClass();
		foreach ($xml->table->records->record as  $key => $record) {   
				
				foreach ($record->field as $k=> $field){
					$attr = $field->attributes()->__toString();
					$val = $field->__toString();
					$web->$attr = $val;
				}
		}   
		
		return $web;
		
	}
	
	
	public function getwebgroupimg($img){
		
		if(!empty($img)){
			$img = str_replace("Q:\\","",$img);
			$img = str_replace("\\","/",$img);
		}
		
		return $this->imgurl.'/'.$img;
		
	}
	
	
	
	
	public function get_product($start=1,$end=10 ) {
		
		$data = $this->getProductOption($start,$end);
		
		$xml = simplexml_load_string($data);

		foreach ($xml->table->records->record as  $key => $record) {   
				$p = new stdClass();
				foreach ($record->field as $k=> $field){
					$attr = $field->attributes()->__toString();
					$val = $field->__toString();
					$p->$attr = $val;
				}
				$this->ps[] = $p;
		}   
		
		
		return $this->ps;
	}
	
	public function getProductOption($start=1, $end=10){
		
		$xml = '<?xml version="1.0" encoding="utf-8"?><request clientKey="MileEndOptionsAPIPass123498765"><table name="STOCK" sortBy="STOCKCODE" maxRecords="'.$end.'" FirstRecord="'.$start.'" ><fields><field>STOCKCODE</field><field>DESC</field><field>QDESC</field><field>RECRETEX</field><field>RECRETINC</field><field>WIDTH</field><field>DEPTH</field><field>HEIGHT</field><field>FIELD1</field><field>FIELD4</field><field>SMALPIC</field><field>STKIND1</field><field>WEIGHT</field><field>STKQOH1</field><field>WEBGROUP1</field></fields><conditions><condition field="STKIND1" type="equals">Y</condition></conditions></table></request>';		
		$headers = array(
				"Content-type: text/xml",
				"Content-length: " . strlen($xml),
				"Connection: close",
		);
				
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		while (true):
		
			$data = curl_exec($ch);
			
			if(curl_errno($ch)){
				//print curl_error($ch);
				//exit;
			}else{
				curl_close($ch);
				break;
			}
			
		endwhile;
		return $data;
	}
	
	
	public function getProductOptionforCode($code){
	
	  /*
	   * $xml_one = '<?xml version="1.0" encoding="utf-8"?><request clientKey="MileEndOptionsAPIPass123498765"><table name="STOCK" sortBy="STOCKCODE" maxRecords="5" FirstRecord="1" ><fields><field>STOCKCODE</field><field>DESC</field><field>RECRETEX</field><field>RECRETINC</field><field>WIDTH</field><field>DEPTH</field><field>HEIGHT</field><field>FIELD1</field><field>SMALPIC</field><field>STKIND1</field><field>WEIGHT</field><field>STKQOH1</field><field>WEBGROUP1</field></fields><conditions><condition field="STKIND1" type="equals">Y</condition><condition field="WEBGROUP1" type="greaterThan"></condition></conditions></table></request>';
	  */
	  $xml_one = '<?xml version="1.0" encoding="utf-8"?><request clientKey="MileEndOptionsAPIPass123498765"><table name="STOCK" sortBy="STOCKCODE" maxRecords="0" FirstRecord="1" ><fields><field>STOCKCODE</field><field>DESC</field><field>QDESC</field><field>RECRETEX</field><field>RECRETINC</field><field>WIDTH</field><field>DEPTH</field><field>HEIGHT</field><field>FIELD1</field><field>FIELD4</field><field>SMALPIC</field><field>STKIND1</field><field>WEIGHT</field><field>STKQOH1</field><field>WEBGROUP1</field></fields><conditions><condition field="STOCKCODE" type="equals">'.$code.'</condition></conditions></table></request>';
		
		
		$headers = array(
				"Content-type: text/xml",
				"Content-length: " . strlen($xml_one),
				"Connection: close",
		);
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_one);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
		$data = curl_exec($ch);
		
	
		if(curl_errno($ch)){
			print curl_error($ch);exit;
		}else{
			curl_close($ch);
		}
		
		$xml = simplexml_load_string($data);
		$p = new stdClass();
		if($xml->table->records->record){
			foreach ($xml->table->records->record as  $key => $record) {   
					
					foreach ($record->field as $k=> $field){
						$attr = $field->attributes()->__toString();
						$val = $field->__toString();
						$p->$attr = $val;
					}
			}   
		}
		return $p;
		
	}
	
	
	public function get_product_special_prices ($code){
		$xml = '<?xml version="1.0" encoding="utf-8" ?>
				<request clientKey="MileEndOptionsAPIPass123498765">
				  <table name="DRCONT" sortBy="STOCKCODE" maxRecords="10" FirstRecord="1">
				     <fields>
				      <field>ACCDE</field>
				      <field>STOCKCODE</field>
				      <field>FROM</field>
				      <field>TODATE</field>
				      <field>PRICE_INC</field>
				      <field>PRICE_EX</field>
				    </fields>
				    <conditions>
				      <condition field="STOCKCODE" type="equals">'.$code.'</condition>
				    </conditions>
				  </table>
				</request>';
		$headers = array(
				"Content-type: text/xml",
				"Content-length: " . strlen($xml),
				"Connection: close",
		);
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
		$data = curl_exec($ch);
		
		if(curl_errno($ch)){
			print curl_error($ch);exit;
		}else{
			curl_close($ch);
		}
	
		$xml = simplexml_load_string($data);
		$pi = new stdClass();
		foreach ($xml->table->records->record as  $key => $record) {
			foreach ($record->field as $k=> $field){
				$attr = $field->attributes()->__toString();
				$val = $field->__toString();
				$pi->$attr = $val;
			}
		}
		return $pi;
	
	}
	
		public function get_product_related ($code){
		$xml = '<?xml version="1.0" encoding="utf-8" ?>
				<request clientKey="MileEndOptionsAPIPass123498765">
				  <table name="DRMERC" sortBy="STOCKCODE" maxRecords="10" FirstRecord="1">
				    <fields>
					  	<field>LINKCODE1</field>
						<field>LINKCODE2</field>
						<field>LINKCODE3</field>
						<field>LINKCODE4</field>
						<field>LINKCODE5</field>
						<field>LINKCODE6</field>
						<field>LINKCODE7</field>
						<field>LINKCODE8</field>
						<field>LINKCODE9</field>
						<field>LINKCODE10</field>
				    </fields>
				    <conditions>
				      <condition field="STOCKCODE" type="equals">'.$code.'</condition>
				    </conditions>
				  </table>
				</request>';
		$headers = array(
				"Content-type: text/xml",
				"Content-length: " . strlen($xml),
				"Connection: close",
		);
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
		$data = curl_exec($ch);
	
		$xml = simplexml_load_string($data);
	
	
	
		$pi = new stdClass();
	
		$related =  array();
	
		foreach ($xml->table->records->record as  $key => $record) {
			foreach ($record->field as $k=> $field){
				$attr = $field->attributes()->__toString();
				$val = $field->__toString();
				$pi->$attr = $val;
	
				if($val && $attr !='STOCKCODE'){
					$image = $this->get_product_img($val);
					$related[] = array(
									'code'=>$val ,
									'image'=>$image
								 );
					
				}
			}
		}
		return $related;
	
	}
	public function get_product_img ($code){
		$xml = '<?xml version="1.0" encoding="utf-8" ?>
				<request clientKey="MileEndOptionsAPIPass123498765">
				  <table name="DRMERC" sortBy="STOCKCODE" maxRecords="10" FirstRecord="1">
				    <fields>
				      <field>LINKIMG1</field>
				      <field>LINKIMG2</field>
					  <field>LINKIMG3</field>
					  <field>LINKIMG4</field>
					  <field>LINKIMG5</field>
					  <field>LINKIMG6</field>
					  <field>LINKIMG7</field>	
					  <field>LINKIMG8</field>	
					  <field>LINKIMG9</field>	
					  <field>LINKIMG10</field>	
				    </fields>
				    <conditions>
				      <condition field="STOCKCODE" type="equals">'.$code.'</condition>
				    </conditions>
				  </table>
				</request>';
		$headers = array(
				"Content-type: text/xml",
				"Content-length: " . strlen($xml),
				"Connection: close",
		);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		$data = curl_exec($ch);
	   
		$xml = simplexml_load_string($data);
		$pi = new stdClass();

		$img_array =  array();

		foreach ($xml->table->records->record as  $key => $record) {
			foreach ($record->field as $k=> $field){
				$attr = $field->attributes()->__toString();
				$val = $field->__toString();
				$pi->$attr = $val;

				if($val && $attr !='STOCKCODE'){
					$img_array[] = $this->getwebgroupimg($val);
				}
			}
		}

		return $img_array;
		
	}
	public function get_product_color ($code){
		$xml = '<?xml version="1.0" encoding="utf-8" ?>
				<request clientKey="MileEndOptionsAPIPass123498765">
				  <table name="DRMERC" sortBy="STOCKCODE" maxRecords="10" FirstRecord="1">
				    <fields>
				      <field>STOCKCODE</field>
		
				      <field>LINKCODE1</field>
				      <field>LINKCODE2</field>
				      <field>LINKCODE3</field>
				    </fields>
				    <conditions>
				      <condition field="STOCKCODE" type="equals">'.$code.'</condition>
				    </conditions>
				  </table>
				</request>';
		$headers = array(
				"Content-type: text/xml",
				"Content-length: " . strlen($xml),
				"Connection: close",
		);
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
		$data = curl_exec($ch);
		 
		$xml = simplexml_load_string($data);
		$pi = new stdClass();
		foreach ($xml->table->records->record as  $key => $record) {
	
			foreach ($record->field as $k=> $field){
				$attr = $field->attributes()->__toString();
				$val = $field->__toString();
				$pi->$attr = $val;
			}
		}
		return $pi;
	
	}
	
	/*
	 * 
	 * Auto insert product category 
	 * 
	 * 
	 * 
	 * 
	 * */
	public function  get_web_groups(){
		$xml = '<?xml version="1.0" encoding="utf-8" ?><request clientKey="MileEndOptionsAPIPass123498765"><table name="DRWGRP" sortBy="WEBGROUP" maxRecords="0" FirstRecord="1">
		    <fields>
		      <field>WEBGROUP</field>
		      <field>DESC</field>
		      <field>PICFILE</field>
		      <field>PARGROUP1</field>
		    </fields>
		    <conditions>
		    </conditions>
		  </table>
		</request>';
		$headers = array(
				"Content-type: text/xml",
				"Content-length: " . strlen($xml),
				"Connection: close",
		);
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
		$data = curl_exec($ch);
		if(curl_errno($ch)){
			print_r (curl_error($ch));exit;
		}else{
			curl_close($ch);
		}
	
		$xml = simplexml_load_string($data);
	
	
	
		$webs =array();
		foreach ($xml->table->records->record as  $key => $record) {
			$web = new stdClass();
			foreach ($record->field as $k=> $field){
				$attr = $field->attributes()->__toString();
				$val = $field->__toString();
				$web->$attr = $val;
			}
			$webs[] = $web;
		}
	
		return $webs;
	
	}

        public function get_product_details($code)
        {
             $xml_one = <<<_xml
<?xml version="1.0" encoding="utf-8"?>
    <request clientKey="MileEndOptionsAPIPass123498765">
        <table name="STOCK" sortBy="STOCKCODE" maxRecords="0" FirstRecord="1" >
            <fields>
                <field>STOCKCODE</field>
                <field>DESC</field>
                <field>QDESC</field>
                <field>RECRETEX</field>
                <field>RECRETINC</field>
                <field>WIDTH</field>
                <field>DEPTH</field>
                <field>HEIGHT</field>
                <field>FIELD1</field>
                <field>FIELD4</field>
                <field>SMALPIC</field>
                <field>STKIND1</field>
                <field>WEIGHT</field>
                <field>STKQOH1</field>
                <field>WEBGROUP1</field>
            </fields>
            <conditions>
                <condition field="STOCKCODE" type="equals">{$code}</condition>
            </conditions>
        </table>
        <table name="DRCONT" sortBy="STOCKCODE" maxRecords="10" FirstRecord="1">
            <fields>
                <field>ACCDE</field>
                <field>STOCKCODE</field>
                <field>FROM</field>
                <field>TODATE</field>
                <field>PRICE_INC</field>
                <field>PRICE_EX</field>
           </fields>
           <conditions>
                <condition field="STOCKCODE" type="equals">{$code}</condition>
           </conditions>
        </table>
        <table name="DRMERC" sortBy="STOCKCODE" maxRecords="10" FirstRecord="1">
            <fields>
                <field>LINKIMG1</field>
                <field>LINKIMG2</field>
                <field>LINKIMG3</field>
                <field>LINKIMG4</field>
                <field>LINKIMG5</field>
                <field>LINKIMG6</field>
                <field>LINKIMG7</field>	
                <field>LINKIMG8</field>	
                <field>LINKIMG9</field>	
                <field>LINKIMG10</field>
                <field>LINKCODE1</field>
                <field>LINKCODE2</field>
                <field>LINKCODE3</field>
                <field>LINKCODE4</field>
                <field>LINKCODE5</field>
                <field>LINKCODE6</field>
                <field>LINKCODE7</field>
                <field>LINKCODE8</field>
                <field>LINKCODE9</field>
                <field>LINKCODE10</field>
            </fields>
            <conditions>
                <condition field="STOCKCODE" type="equals">{$code}</condition>
            </conditions>
        </table>
    </request>
_xml;
		
		$headers = array(
				"Content-type: text/xml",
				"Content-length: " . strlen($xml_one),
				"Connection: close",
		);
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_one);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
		$data = curl_exec($ch);
		
	
		if(curl_errno($ch)){
			print curl_error($ch);exit;
		}else{
			curl_close($ch);
		}

                $xml = simplexml_load_string($data);

		$p = new stdClass();
		if($xml->table){
                    foreach ($xml->table as $table) {
                        if ($table->records->record) {
                            foreach ($table->records->record as  $key => $record) {   
                                foreach ($record->field as $k=> $field){
                                    $attr = $field->attributes()->__toString();
                                    $val = $field->__toString();
                                    $p->$attr = $val;
                                }
                            }
                        }
                    }
		}
		return $p;
        }
	
}

?>