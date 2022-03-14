<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ＰＨＰ基礎</title>
</head>
<body>

<?php
  $nickname = $_POST['nickname'];
  if ($nickname == '')
  {
    print 'ニックネームが入力されていません';
  }
  else
  {
    print 'ようこそ';
    print $nickname;
    print '様';
  }
?>
</body>
</html>
