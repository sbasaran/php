<?php 

function sqlGenerator($total, $constant){
	//$total = 0;
	//$constant = 1500;
	$remained = $total%$constant;
	$multiplier = floor($total/$constant);
	echo "count:".$total."<br>";
	echo "multiplier".$multiplier."<br>";
	echo "remained".$remained."<br>";
	$sqlArr=array();
	for($i=1;$i<=$multiplier;$i++){
		$sqlArr[] = "rownum >= ". ((($i-1)==0)?0:($constant*($i-1)) )." and rownum < ". $constant*$i ."<br>";
	}
	//last one
	$sqlArr[] =  "rownum >= ". ($constant*($multiplier)) ." and rownum <= ".(($constant*$multiplier)+$remained)."<br>";
	return $sqlArr;
}

print_r(sqlGenerator(10000,1000));

?>