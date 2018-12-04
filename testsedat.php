<?php 

function sqlGeneratorNonDecreasingData($total, $constant){
	$remained = $total%$constant;
	$multiplier = floor($total/$constant);
	//echo "count:".$total."<br>";
	//echo "multiplier".$multiplier."<br>";
	//echo "remained".$remained."<br>";
	$sqlArr=array();
	for($i=1;$i<=$multiplier;$i++){
		$sqlArr[] = " R >= ". ((($i-1)==0)?0:($constant*($i-1)) )." and R < ". $constant*$i ;
	}
	//last one
	$sqlArr[] =  " R >= ". ($constant*($multiplier)) ." and R <= ".(($constant*$multiplier)+$remained);
	return $sqlArr;
}
function sqlGeneratorDecreasingData($total, $constant){
	$remained = $total%$constant;
	$multiplier = floor($total/$constant);
	//echo "count:".$total."<br>";
	//echo "multiplier".$multiplier."<br>";
	//echo "remained".$remained."<br>";
	$sqlArr=array();
	for($i=1;$i<=$multiplier;$i++){ 
		$sqlArr[] = " R >= 0 and R < ". $constant ;
	}
	//last one
	$sqlArr[] =  " R >= 0 and R <= ".$remained;
	return $sqlArr;
}

?>
