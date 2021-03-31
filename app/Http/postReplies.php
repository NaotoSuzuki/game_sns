<?php
// POSTメソッドでリクエストした値を取得
$name = $_POST['name'];
$price = $_POST['price'];

// データベース接続
// $host = localhostで動かなければipアドレスを記載
$host = 'localhost';
// データベース名
$dbname = 'game_sns';
// ユーザー名
$dbuser = 'naoto';
// パスワード
$dbpass = 'password';

// データベース接続クラスPDOのインスタンス$dbhを作成する
try {
    $dbh = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $dbuser, $dbpass);
// PDOExceptionクラスのインスタンス$eからエラーメッセージを取得
} catch (PDOException $e) {
    // 接続できなかったらvar_dumpの後に処理を終了する
    var_dump($e->getMessage());
    exit;
}

// データ追加用SQL
// 値はバインドさせる
$sql = "INSERT INTO replies(thread_id, post_id , reply) VALUES(?, ?, ?)";
// SQLをセット
$stmt = $dbh->prepare($sql);
// SQLを実行
$stmt->execute(array($thread_id, $post_id, $reply));

// 先ほど追加したデータを取得
// idはlastInsertId()で取得できる
$last_id = $dbh->lastInsertId();
// データ追加用SQL
// 値はバインドさせる
$sql = "SELECT id, thread_id, post_id , replye FROM replies WHERE id = ?";
// SQLをセット
$stmt = ($dbh->prepare($sql));
// SQLを実行
$stmt->execute(array($last_id));

// あらかじめ配列$productListを作成する
// 受け取ったデータを配列に代入する
// 最終的にhtmlへ渡される
$productList = array();

// fetchメソッドでSQLの結果を取得
// 定数をPDO::FETCH_ASSOC:に指定すると連想配列で結果を取得できる
// 取得したデータを$productListへ代入する
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $replies_array[] = array(
        'id'    => $row['id'],
        'thread_id'  => $row['thread_id'],
        'post_id' => $row['post_id'],
        'reply' => $row['reply']
    );
}

// ヘッダーを指定することによりjsonの動作を安定させる
header('Content-type: application/json');
// htmlへ渡す配列$productListをjsonに変換する
echo json_encode($productList);
