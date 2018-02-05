<?php
?>
<form action="" method="post">
<table width="50%" border="0">
<tr>
<td><h3>Credit Card</h3></td>
</tr>
<tr>
	<td>Credit Card No</td>
<td><input type="text" name="credit_card_no" required min="16" max="16"></td>
</tr>
</table>
<input type="submit" value="Validate" name="s">
</form>
<?php

if($_POST){

	$card_number = str_replace(" ",'', $_POST['credit_card_no']);

   
	    $card_number_checksum = '';

	    foreach (str_split(strrev((string) $card_number)) as $i => $d) {
	        $card_number_checksum .= $i %2 !== 0 ? $d * 2 : $d;
	    }

	     if(array_sum(str_split($card_number_checksum)) % 10 === 0){
	     	echo "Credit Card ".$card_number." is valid.";
	     }else{
	     	echo "Credit Card ".$card_number." is not valid.";
	     }
	

   
}