<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>生成密码</title>
</head>
<body>
<form method="post" action="encode.php">
请在这里输入PHP代码：
<textarea name="php"></textarea>
<input type="submit" />
</form>
</body>
</html>


<?php
// header("Content-Type:text/html; charset=UTF-8");
if (isset($_POST['php'])) {
	$code = <<<php
	{$_POST['php']}
php;
	$code = base64_encode(gzcompress($code));
	$myfile = fopen('./code.txt','r');
	// var_dump($myfile);die;
	$txt = fread($myfile,filesize('./code.txt'));
	fclose($myfile);
	$a = ['ˆ','…','‰','†','€','‹','š','Š','ž','—','˜','œ','Ž','›','„','™','ƒ','“','’','‡','Œ','Ÿ','•','‚'];
	$b = ['$a','$y','$E','$Z','$F','$N','$K','$L','$AZ','$AF','$SZ','$HZ','$ZF','$ZZ','$GG','$EE','$BA','$BB','$BC','$BD'];

	foreach ($b as $key => $value) {
		$c[$key] = '$';
		for($i = 0;$i <= $key ;$i++)
		{
			$c[$key] = $c[$key].$a[array_rand($a)];
		}
	}
	for($i = 0;$i <= 2 ;$i++)
	{
		@$fu = $fu?$fu.$a[array_rand($a)]:$a[array_rand($a)];
	}

	$txt = str_replace($b,$c,$txt);
	$txt = str_replace('funss',$fu,$txt);
	$txt = str_replace('%function%',$code,$txt);
	$mynewfile = fopen('./new.php','w');
	fwrite($mynewfile, '<?php '."\r\n");
	fwrite($mynewfile, '//code加密 制作者QQ492663515 蜂蝶旋舞'."\r\n");
	fwrite($mynewfile, $txt."\r\n");
	fwrite($mynewfile, ' ?>');
	fclose($mynewfile);
	echo '生成文件成功，请在目录的new.php文件';
	}

?>