<?php
require_once 'xro-inc.php';

class adminEntry {

  	var $queryin; // SQL insert query
	var $into;	// result of insert
	var $reqid;  // mysql_insert_id
	var $feel; // the MYSQL_RESULT
	var $currentdata; // MYSQL_ASSOC ARRAY (in arry form)

function insertData($t, $h1,$p1, $h2, $p2, $ftitle, $form, $ltitle, $list, $pagename) {
	global $t;
	echo $t." ".$h1." ".$p1." ".$h2." ".$p2." ".$ftitle." and more... should have gone into the database ya know";
	require_once 'db_link.php';
	$this->queryin = "INSERT INTO $t VALUES('','$h1', '$p1', '$h2', '$p2', '$ftitle','$form', '$ltitle', '$list', '$pagename');";
		$this->into = mysql_query($this->queryin,$dblink) or die(mysql_error());
		$this->reqid = mysql_insert_id();
			echo "This is the record id: <br />&nbsp;".$this->reqid;
		$this->look = "SELECT * FROM $t where cont_id=$this->reqid;";
		$this->feel = mysql_query($this->look, $dblink) or die(mysql_error());
		$this->currentdata = mysql_fetch_array($this->feel, MYSQL_ASSOC);
		print_r($this->currentdata);
	
	return $this->currentdata;
	echo "<p>From inside of the func</p>";

}
}

?>
