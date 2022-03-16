<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ＰＨＰ基礎</title>
</head>
<body>
  <?php
    // データベース接続
    $dsn = 'mysql:dbname=phpkiso;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    
    //データを全部くださいという指令文
    $sql = 'SELECT * FROM anketo WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
    // $stmtに格納されたデータを取り出し表示する
    while(1)
    {
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rec == false)
      {
        break;
      }
      print $rec['code'];
      print $rec['nickname'];
      print $rec['email'];
      print $rec['opinion'];
      print '<br/>';
    }

    // データベース切断
    $dbh = null;

    print '<br/>';
    print '<a href="menu.html">メニューに戻る</a>';

  ?>
</body>
</html>
