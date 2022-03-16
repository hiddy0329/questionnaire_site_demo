<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ＰＨＰ基礎</title>
</head>
<body>

<?php
  // フォームで送られてきた値を変数に代入
  $nickname = $_POST['nickname'];
  $email = $_POST['email'];
  $opinion = $_POST['opinion'];
  
  // サニタイジング
  $nickname = htmlspecialchars($nickname);
  $email = htmlspecialchars($email);
  $opinion = htmlspecialchars($opinion);
  
  // バリデーション
  if ($nickname == '')
  {
    print 'ニックネームが入力されていません。<br/>';
  }
  else
  {
    print 'ようこそ';
    print $nickname;
    print '様';
    print '<br/>';
  }

  if ($email == '')
  {
    print 'メールアドレスが入力されていません。<br/>';
  }
  else
  {
    print 'メールアドレス:';
    print $email;
    print '<br/>';
  }

  if ($opinion == '')
  {
    print 'ご意見が入力されていません。<br/>';
  }
  else
  {
    print 'ご意見『';
    print $opinion;
    print '』<br/>';
  }

  if ($nickname == '' || $email == '' || $opinion == '')
  {
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  }
  else
  {
    print '<form method="post" action="thanks.php">';
    print '<input type="hidden" name="nickname" value="'.$nickname.'">';
    print '<input type="hidden" name="email" value="'.$email.'">';
    print '<input type="hidden" name="opinion" value="'.$opinion.'">';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';
  }
?>
</body>
</html>
