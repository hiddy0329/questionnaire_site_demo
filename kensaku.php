<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ＰＨＰ基礎</title>
</head>
<body>
  <?php
    $code = $_POST['code'];

    // データベース接続
    $dsn = 'mysql:dbname=phpkiso;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password);
    
    //データを全部くださいという指令文
    $sql = 'SELECT * FROM anketo WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $code;
    $stmt->execute($data);
    
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
  ?>
</body>
</html>
