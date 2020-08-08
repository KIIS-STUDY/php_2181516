<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ろくまる農園</title>
    </head>
    <body>

        <?php

        try
        {
            require_once('../common/common.php');

            $post = sanitize($_POST);
            $staff_code = $post['code'];
            $staff_name = $post['name'];
            $staff_pass = $post['pass'];

            $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
            $dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'UPDATE mst_staff SET name=?, password=? WHERE code=?';
            $stmt = $dbh ->prepare($sql);
            $data[] = $staff_name;
            $data[] = $staff_pass;
            $data[] = $staff_code;
            $stmt ->execute($data);

            $dbh = null;

        }
        catch (Exception $e)
        {
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }

        ?>

        修正しました。<br />
        <br />
        <a href="staff_list.php">戻る</a>

    </body>
</html>
