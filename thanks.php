<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ＰＨＰ基礎</title>
</head>
<body>
  <?php
    try {
    // データベースへ接続
    $dsn = 'mysql:dbname=phpkiso;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $opinion = $_POST['opinion'];

    $nickname = htmlspecialchars($nickname);
    $email = htmlspecialchars($email);
    $opinion = htmlspecialchars($opinion);

    print $nickname;
    print '様<br/>';
    print 'ご意見ありがとうございました。<br/>';
    print '頂いたご意見『';
    print $opinion;
    print '』<br/>';
    print $email;
    print 'にメールを送りましたのでご確認ください。<br/>';
    print '<a href="ichiran.php">アンケート一覧へ</a>';

    $mail_sub = 'アンケートを受け付けました。';
    $mail_body = $nickname."様へ\nアンケートご協力ありがとうございました。";
    $mail_body = html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
    $mail_head = 'From: xxx@xxx.co.jp';
    mb_language('Japanese');
    mb_internal_encoding("UTF-8");
    mb_send_mail($email, $mail_sub, $mail_body, $mail_head);

    // データベースへ保存
    $sql = 'INSERT INTO anketo (nickname, email, opinion) VALUES ("'.$nickname.'", "'.$email.'", "'.$opinion.'")';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    // データベース切断
    $dbh = null;
    }
    catch(PDOException $e)
    {
      print 'ただいま障害により大変ご迷惑をお掛けしております。';
    }
  ?>
</body>
</html>
