<?php
 $query="Select * from Pembimbing";
 //echo "<option value =>".$nama."</td>";
//$homepage = file_get_contents('http://www.google.com/');

//echo $homepage;
//echo "blabla  ".$page;
//$homepage = "Normies<h1>Pepe</h1>";
$homepage = file_get_contents("http://www.man1garut.sch.id/guru.php?id=dbguru");
//echo $homepage;
$idx = strpos($homepage,"<table  cellspacing=\"1\" cellpadding=\"2\" class=\"art-article\" width=\"100%\" >");
$idp = strpos($homepage,"</table>",$idx);
$length = strlen("<table  cellspacing=\"1\" cellpadding=\"2\" class=\"art-article\" width=\"100%\" >");
echo $idx." ".$idp;
//echo "<table>".substr($homepage,$idx+$length,$idp-$idx)."</table>";
$data=substr($homepage,$idx+$length,$idp-$idx);
$dapieces=explode("<td valign=top ><center>",$data);
//var_dump($dapieces); //2 5 8> tiap 3
$i=0;
$arr=array();
$idxarr=0;
foreach($dapieces as $node){
    if($i>1 && ($i+1)%3 ==0){
	$input = $node.explode("</td>");
	var_dump($input);
        $arr[$idxarr]=$node;
        $idxarr++;
    }
    $i++;
}
var_dump($arr);