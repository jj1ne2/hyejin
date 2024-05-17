<?php
include "dbconfig.php";

if (isset($_GET['row']) || isset($_GET['column']) || isset($_GET['valueData'])) {
    $row = $_GET['row'];
    $column = $_GET['column'];
    $valueData = $_GET['valueData'];

    // 행, 열 매칭
    $query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = :row AND TABLE_SCHEMA = 'pivot_test'
            UNION ALL
            SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = :column AND TABLE_SCHEMA = 'pivot_test'
            UNION ALL
            SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = :valueData AND TABLE_SCHEMA = 'pivot_test'"; // UNION: 중복 제거, UNION ALL: 중복 제거 X

    $stmt = $db->prepare($query);

    $stmt->execute(array(':row' => $row, ':column' => $column, ':valueData' => $valueData));

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Array ( [0] => Array ( [TABLE_NAME] => ticket ) [1] => Array ( [TABLE_NAME] => ticket ) [2] => Array ( [TABLE_NAME] => customers ) )

    // 테이블명
    $rowName = $results[0]['TABLE_NAME'];
    $columnName = $results[1]['TABLE_NAME'];
    $valueName = $results[2]['TABLE_NAME'];

    if ($rowName && $columnName) {
        switch (true) {
            case ($rowName === 'ticket' && $columnName === 'ticket' && $valueName === 'ticket'):
                $fromClause = "ticket"; break;

            case ($rowName === 'ticket' && $columnName === 'ticket' && $valueName === 'customers'):
                $fromClause = "ticket INNER JOIN purchase ON ticket.t_no = purchase.t_no INNER JOIN customers ON customers.c_no = purchase.c_no"; break;
 
            case ($rowName === 'customers' && $columnName === 'customers' && $valueName === 'customers'):
                $fromClause = "customers"; break;

            case ($rowName === 'customers' && $columnName === 'customers' && $valueName === 'ticket'):
                $fromClause = "customers INNER JOIN purchase ON customers.c_no = purchase.c_no INNER JOIN ticket ON ticket.t_no = purchase.t_no"; break;

            default:
                $fromClause = "customers INNER JOIN purchase ON customers.c_no = purchase.c_no INNER JOIN ticket ON ticket.t_no = purchase.t_no"; break;
        }

        if ($fromClause !== '') {
             $rowSql = "SELECT DISTINCT $row FROM $rowName"; // 행 출력
             $colSql = "SELECT DISTINCT $column FROM $columnName"; // 열 출력
             $valSql = "SELECT $row AS rowss, $column AS columnss, COUNT($valueData) AS valueData FROM $fromClause GROUP BY $row, $column"; // 기본값

            // $sql = "";

            // 셀렉트 박스를 선택할 때
            if (isset($_GET['queryResult'])) {
                $queryResult = $_GET['queryResult'];

                switch (true) {
                    case ($queryResult === "COUNT"):
                        $valSql = "SELECT $row AS rowss, $column AS columnss, COUNT($valueData) AS valueData FROM $fromClause GROUP BY $row, $column";
                        break;

                    case ($queryResult === "SUM"): 
                        $valSql = "SELECT $row AS rowss, $column AS columnss, SUM($valueData) AS valueData FROM $fromClause GROUP BY $row, $column";
                        break;

                    case ($queryResult === "AVG"):
                        $valSql = "SELECT $row AS rowss, $column AS columnss, AVG($valueData) AS valueData FROM $fromClause GROUP BY $row, $column";
                        break;
                }
            }
        }
    }

    $sqls = [$rowSql, $colSql, $valSql];

    foreach ($sqls as $sql) {
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $array = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $array[] = $row;
        }

        $resultArray[] = $array;
    }

    echo json_encode($resultArray); // JSON_UNESCAPED_UNICODE: 제이슨으로 전달한 문자가 유니코드로 변환될 때 사용할 수 있는 옵션

    // $stmt = $db->prepare($sql);
    // $stmt->execute();

    // $resultArray = [];
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     $resultArray[] = $row;
    // }

    // echo json_encode($resultArray);
}

// 필터
if (isset($_GET['selectedFilter'])) {
    $selectedFilter = $_GET["selectedFilter"];

    $sql = $db->prepare("SELECT TABLE_NAME, COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = :selectedFilter"); 
    $sql->bindParam(':selectedFilter', $selectedFilter, PDO::PARAM_STR);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $tableName = $row['TABLE_NAME'];
        $columnName = $row['COLUMN_NAME'];
    }

    $selectQuery = $db->prepare("SELECT DISTINCT $selectedFilter FROM $tableName");
    $selectQuery->execute();

    $dataQuery = array();
    while ($row = $selectQuery->fetch(PDO::FETCH_ASSOC)) {
        $dataQuery[] = $row[$selectedFilter];
    }
    echo json_encode($dataQuery);

  // 필터 체크박스
  if (isset($_GET['selectedCheck'])) {
    $selectedCheck = json_decode($_GET['selectedCheck'], true);
    echo $selectedCheck;
    $checks = [];

    foreach ($selectedCheck as $check) {
        $stmt = $db->prepare("SELECT DISTINCT $check FROM $tableName");
        $stmt->execute();
        var_dump($stmt->fetchAll());
        echo $stmt->rowCount();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $checks[] = $row[$check];
        }
    }

    echo json_encode($checks); 
 }
} 
?>