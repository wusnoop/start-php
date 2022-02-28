<?php
$result = 0;
if(isset($_SESSION['test'])){
	$answer = parse_ini_file('answers.ini');
	foreach($_SESSION['test'] as $value){
		if(array_key_exists($value, $answer))
		$result += (int)$answer[$value];
	}
	session_destroy();
}
?>
<table width="100%">
	<tr>
	<p>Ваш результат: <?= $result?> из 30</p>
		<td align="left">
		
		</td>
	</tr>
</table>