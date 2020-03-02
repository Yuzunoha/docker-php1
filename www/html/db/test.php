<?php

function createPdo()
{
    try {
        $pdo = new PDO('mysql:host=db;dbname=db_test2;charset=utf8', 'root', 'secret',
            array(PDO::ATTR_EMULATE_PREPARES => false)
        );
    } catch (PDOException $e) {
        exit('データベース接続失敗。' . $e->getMessage());
    }
    return $pdo;
}

function main()
{
    echo "<pre>";

    try {
        $pdo = createPdo();

        // SQL作成
        $sql = "SELECT * FROM table_test";

        // SQL実行
        $stmt = $pdo->query($sql);

        // 取得したデータを出力
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print_r($row);
        }
    } catch (Exception $e) {
        exit('クエリ失敗。' . $e->getMessage());
    }

}

main();
