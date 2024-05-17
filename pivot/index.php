<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="utf-8">
  <title>피벗 테이블</title>
</head>
<style>
  table {
    border-collapse: collapse;
  }

  table td,
  table th {
    border: 1px solid black;
    text-align: center;
  }
</style>

<body>
  <div>
    <table id="ticketTable" style="display: inline-block; margin-right: 20px">
      <caption>티켓 테이블</caption>
      <thead>
        <tr>
          <th>순번</th>
          <th>티켓명</th>
          <th>권종</th>
          <th>가격</th>
          <th>전시/공연시작날짜</th>
          <th>전시/공연종료날짜</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "dbconfig.php";

        $ticketTable = $db->prepare("SELECT * FROM ticket");
        $ticketTable->execute();

        while ($row = $ticketTable->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<td>" . $row['t_no'] . "</td>";
          echo "<td>" . $row['t_name'] . "</td>";
          echo "<td>" . $row['t_type'] . "</td>";
          echo "<td>" . number_format($row['t_price']) . "</td>";
          echo "<td>" . $row['t_sDate'] . "</td>";
          echo "<td>" . $row['t_eDate'] . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <table id="customersTable" style="display: inline-block; margin-right: 20px">
      <caption>고객 테이블</caption>
      <thead>
        <tr>
          <th>순번</th>
          <th>성명</th>
          <th>성별</th>
          <th>주소</th>
          <th>생년월일</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $customersTable = $db->prepare("SELECT * FROM customers");
        $customersTable->execute();

        while ($row = $customersTable->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<td>" . $row['c_no'] . "</td>";
          echo "<td>" . $row['c_name'] . "</td>";
          echo "<td>" . $row['c_gender'] . "</td>";
          echo "<td>" . $row['c_address'] . "</td>";
          echo "<td>" . $row['c_birth'] . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <table id="purchaseTable" style="display: inline-block;">
      <caption>상품 구매 테이블</caption>
      <thead>
        <tr>
          <th>순번</th>
          <th>구매된 티켓키</th>
          <th>구매한 고객키</th>
          <th>구매일</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $purchaseTable = $db->prepare("SELECT * FROM purchase");
        $purchaseTable->execute();

        while ($row = $purchaseTable->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<td>" . $row['p_no'] . "</td>";
          echo "<td>" . $row['t_no'] . "</td>";
          echo "<td>" . $row['c_no'] . "</td>";
          echo "<td>" . $row['t_date'] . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
    <hr />
  </div>

  <?php
  // 기본값 (모든 결과)
  $data = $db->prepare("SELECT * FROM customers c INNER JOIN purchase p ON c.c_no = p.c_no INNER JOIN ticket t ON t.t_no = p.t_no");
  $data->execute();
  ?>

  <table id="resultTable">
    <caption>상품 구매한 고객 테이블</caption>
    <thead>
      <tr>
        <th>순번</th>
        <th>이름</th>
        <th>성별</th>
        <th>생년월일</th>
        <th>주소</th>
        <th>전시명</th>
        <th>전시/공연시작날짜</th>
        <th>전시/공연종료날짜</th>
        <th>권종</th>
        <th>가격</th>
        <th>구매날짜</th>
      </tr>
    </thead>
    <tbody>
      <?php ticketAll($data); ?>
    </tbody>
  </table>
  <hr />

  <span>행</span>
  <select name="row" id="row">
    <option selected disabled>선택없음</option>
    <?php
    $ticket = $db->prepare("SELECT COLUMN_NAME, COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS 
                            WHERE TABLE_NAME = 'ticket' AND TABLE_SCHEMA = 'pivot_test' AND COLUMN_NAME != 't_no'"); // db에 한글로 주석 저장 후 주석이 저장된 컬럼명 불러오기 (순번 컬럼 제외)
    $ticket->execute();
    $columnMapping = [];

    while ($row = $ticket->fetch(PDO::FETCH_ASSOC)) {
      // 각 컬럼의 영어 컬럼명과 주석(한글 컬럼명)을 가져와서 배열에 저장
      $englishName = $row['COLUMN_NAME'];
      $koreanName = $row['COLUMN_COMMENT'];
      $columnMapping[$englishName] = $koreanName;
      echo '<option value="' . $englishName . '">' . $koreanName . '</option>';
    }

    $customers = $db->prepare("SELECT COLUMN_NAME, COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS 
                               WHERE TABLE_NAME = 'customers' AND TABLE_SCHEMA = 'pivot_test' AND COLUMN_NAME != 'c_no'");
    $customers->execute();

    while ($row = $customers->fetch(PDO::FETCH_ASSOC)) {
      $englishName = $row['COLUMN_NAME'];
      $koreanName = $row['COLUMN_COMMENT'];
      $columnMapping[$englishName] = $koreanName;
      echo '<option value="' . $englishName . '">' . $koreanName . '</option>';
    }
    ?>
  </select>&nbsp;&nbsp;


  <span>열</span>
  <select name="column" id="column">
    <option selected disabled>선택없음</option>
    <?php
    $ticket = $db->prepare("SELECT COLUMN_NAME, COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS 
                            WHERE TABLE_NAME = 'ticket' AND TABLE_SCHEMA = 'pivot_test' AND COLUMN_NAME != 't_no'"); // db에 한글로 주석 저장 후 주석이 저장된 컬럼명 불러오기 (순번 컬럼 제외)
    $ticket->execute();
    $columnMapping = [];

    while ($row = $ticket->fetch(PDO::FETCH_ASSOC)) {
      // 각 컬럼의 영어 컬럼명과 주석(한글 컬럼명)을 가져와서 배열에 저장
      $englishColumnName = $row['COLUMN_NAME'];
      $koreanColumnName = $row['COLUMN_COMMENT'];
      $columnMapping[$englishColumnName] = $koreanColumnName;
      echo '<option value="' . $englishColumnName . '">' . $koreanColumnName . '</option>';
    }

    $customers = $db->prepare("SELECT COLUMN_NAME, COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS 
                               WHERE TABLE_NAME = 'customers' AND TABLE_SCHEMA = 'pivot_test' AND COLUMN_NAME != 'c_no'");
    $customers->execute();

    while ($row = $customers->fetch(PDO::FETCH_ASSOC)) {
      $englishColumnName = $row['COLUMN_NAME'];
      $koreanColumnName = $row['COLUMN_COMMENT'];
      $columnMapping[$englishColumnName] = $koreanColumnName;
      echo '<option value="' . $englishColumnName . '">' . $koreanColumnName . '</option>';
    }
    ?>
  </select>&nbsp;&nbsp;


  <span>값</span>
  <select name="valueData" id="valueData">
    <option selected disabled>선택없음</option>
    <?php
    $ticket = $db->prepare("SELECT COLUMN_NAME, COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS 
                            WHERE TABLE_NAME = 'ticket' AND TABLE_SCHEMA = 'pivot_test' AND COLUMN_NAME != 't_no'"); // db에 한글로 주석 저장 후 주석이 저장된 컬럼명 불러오기 (순번 컬럼 제외)
    $ticket->execute();
    $columnMapping = [];

    while ($row = $ticket->fetch(PDO::FETCH_ASSOC)) {
      // 각 컬럼의 영어 컬럼명과 주석(한글 컬럼명)을 가져와서 배열에 저장
      $englishColumnName = $row['COLUMN_NAME'];
      $koreanColumnName = $row['COLUMN_COMMENT'];
      $columnMapping[$englishColumnName] = $koreanColumnName;
      echo '<option value="' . $englishColumnName . '">' . $koreanColumnName . '</option>';
    }

    $customers = $db->prepare("SELECT COLUMN_NAME, COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS 
                               WHERE TABLE_NAME = 'customers' AND TABLE_SCHEMA = 'pivot_test' AND COLUMN_NAME != 'c_no'");
    $customers->execute();

    while ($row = $customers->fetch(PDO::FETCH_ASSOC)) {
      $englishColumnName = $row['COLUMN_NAME'];
      $koreanColumnName = $row['COLUMN_COMMENT'];
      $columnMapping[$englishColumnName] = $koreanColumnName;
      echo '<option value="' . $englishColumnName . '">' . $koreanColumnName . '</option>';
    }
    ?>
  </select>&nbsp;&nbsp;

  <button type="button" id="search_bt">검색</button>&nbsp;&nbsp;&nbsp;&nbsp;

  <select name="queryResult" id="queryResult" style="display:none;">
    <option selected value="COUNT">개수</option>
    <option value="SUM">합계</option>
    <option value="AVG">평균</option>
  </select>&nbsp;&nbsp;&nbsp;&nbsp;

  <span>필터</span>
  <select name="filter" id="filter">
    <option selected disabled>선택없음</option>
    <?php
    $ticket = $db->prepare("SELECT COLUMN_NAME, COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS 
                            WHERE TABLE_NAME = 'ticket' AND TABLE_SCHEMA = 'pivot_test' AND COLUMN_NAME != 't_no'"); // db에 한글로 주석 저장 후 주석이 저장된 컬럼명 불러오기 (순번 컬럼 제외)
    $ticket->execute();
    $columnMapping = [];

    while ($row = $ticket->fetch(PDO::FETCH_ASSOC)) {
      // 각 컬럼의 영어 컬럼명과 주석(한글 컬럼명)을 가져와서 배열에 저장
      $englishColumnName = $row['COLUMN_NAME'];
      $koreanColumnName = $row['COLUMN_COMMENT'];
      $columnMapping[$englishColumnName] = $koreanColumnName;
      echo '<option value="' . $englishColumnName . '">' . $koreanColumnName . '</option>';
    }

    $customers = $db->prepare("SELECT COLUMN_NAME, COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'customers' AND TABLE_SCHEMA = 'pivot_test' AND COLUMN_NAME != 'c_no'");
    $customers->execute();

    while ($row = $customers->fetch(PDO::FETCH_ASSOC)) {
      $englishColumnName = $row['COLUMN_NAME'];
      $koreanColumnName = $row['COLUMN_COMMENT'];
      $columnMapping[$englishColumnName] = $koreanColumnName;
      echo '<option value="' . $englishColumnName . '">' . $koreanColumnName . '</option>';
    }
    ?>
  </select>&nbsp;&nbsp;
  <div id="filterCheck" style="display: inline-block">
    
  </div>
  <br/>

  <table id="resultTable2">
    <span>피벗 테이블</span>
    <tbody></tbody>
  </table>

  <?php
  // 기본값 (모든 결과)
  function ticketAll($data) {
    $idx = 1;
    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      echo "<td>" . ($idx++) . "</td>";
      echo "<td>" . $row['c_name'] . "</td>";
      echo "<td>" . $row['c_gender'] . "</td>";
      echo "<td>" . $row['c_birth'] . "</td>";
      echo "<td>" . $row['c_address'] . "</td>";
      echo "<td>" . $row['t_name'] . "</td>";
      echo "<td>" . $row['t_sDate'] . "</td>";
      echo "<td>" . $row['t_eDate'] . "</td>";
      echo "<td>" . $row['t_type'] . "</td>";
      if ($row['t_price'] == 0) {
        echo "<td>초대권면제</td>";
      } else {
        echo "<td>" . number_format($row['t_price']) . "</td>";
      }
      echo "<td>" . $row['t_date'] . "</td>";
      echo "</tr>";
    }
  }
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#filter option").hide();

      $("#row").change(function () {
        let selectedRow = $(this).val(); // 선택한 행 값 가져와서
        let selectedColumn = $("#column").val();

        $("#column option").show();
        $("#filter option").hide();

        if (selectedRow !== "선택없음") {
          $("#column option[value='" + selectedRow + "']").hide(); // 선택한 행 값과 동일한 열 옵션 숨기기
          $("#filter option[value='" + selectedRow + "']").show(); // 선택한 행 값과 동일한 필터 옵션 보이기
          $("#filter option[value='" + selectedColumn + "']").show()
        }
      });

      $("#column").change(function () {
        let selectedColumn = $(this).val(); // 선택한 행 값 가져와서
        let selectedRow = $("#row").val();

        $("#row option").show();
        $("#filter option").hide();

        if (selectedColumn !== "선택없음") {
          $("#row option[value='" + selectedRow + "']").hide(); // 선택한 행 값과 동일한 열 옵션 숨기기
          $("#filter option[value='" + selectedRow + "']").show(); // 선택한 행 값과 동일한 필터 옵션 보이기
          $("#filter option[value='" + selectedColumn + "']").show()
        }
      });

      // 검색 버튼 클릭 시
      $("#search_bt").click(function () {
        $("#queryResult").show();

        let row = $("#row").val();
        let column = $("#column").val();
        let valueData = $("#valueData").val();

        $.ajax({
          type: "GET",
          url: "search.php",
          data: {
            row: row,
            column: column,
            valueData: valueData
          },
          dataType: "json"
        }).done(function (resultArray) {
          // console.log(resultArray);
          // console.log(resultArray[0]);
          // console.log(resultArray[1]);
          // console.log(resultArray[2]);

          $("#resultTable2 thead tr:first-child").remove();
            fillTable(resultArray);

          $("#filter").change(function () {
            let selectedFilter = $(this).val();

            $.ajax({
              url: "search.php",
              type: "GET",
              data: { selectedFilter: selectedFilter },
            }).done(function(dataQuery) {
              // console.log(dataQuery)
              let data = JSON.parse(dataQuery);
              // console.log(data)
              
              if (selectedFilter !== "선택없음") {
                let str = "";
                data.forEach(function(value) {
                  str += "<input type='checkbox' checked='checked' name='selectedCheck[]' value='" + value + "'/>" + value + "&nbsp;"; 
                });
  
                $("#filterCheck").html(str);
              }
            });
            
          });
        });
      });

      // 셀렉트 박스 선택 시
      $("#queryResult").change(function () {
        let row = $("#row").val();
        let column = $("#column").val();
        let valueData = $("#valueData").val();
        let queryResult = $("#queryResult").val();

        $.ajax({
          type: "GET",
          url: "search.php",
          data: {
            "queryResult": queryResult,
            "row": row,
            "column": column,
            "valueData": valueData
          },
          dataType: "json"
        }).done(function (resultArray) {
          $('input[name="selectedCheck[]"]').prop('checked', false);
          let rowss = resultArray[0];
          let columnss = resultArray[1];
          let valueDatas = resultArray[2];

          let columns = columnss.map(column => Object.values(column)[0]);
          let resultTable = "<table><thead><tr><td></td>";

          columns.forEach(function (column) {
            resultTable += "<td data-ticket='" + column + "'>" + column + "</td>";
          });

          resultTable += "</tr></thead><tbody>";

          rowss.forEach(function (row, rowIndex) {
            let rowData = Object.values(row)[0];
            let rowDataAttr = "data-ticket='" + rowData + "'";

            resultTable += "<tr " + rowDataAttr + ">";
            resultTable += "<td>" + rowData + "</td>";
            columns.forEach(function (col) {
              let cellValue = "";
              valueDatas.forEach(function (valueData) {
                // console.log(valueData)
                // console.log(valueData.rowss)
                // console.log(valueData.columnss)
                if (valueData.rowss === rowData && valueData.columnss === col) {
                  cellValue = valueData.valueData;
                  // console.log(cellValue)
                }
              });
              resultTable += "<td>" + cellValue + "</td>";
            });
            resultTable += "</tr>";
          });

          // 합계
          // console.log(queryResult)
          let str = "";
          if (queryResult == "COUNT") {
            str = "<td>개수</td>";
          } else if (queryResult == "SUM") {
            str = "<td>합계</td>";
          } else if (queryResult == "AVG") {
            str = "<td>평균</td>";
          }
          resultTable += "<tr>" + str;

          columns.forEach(function (col) {
            let total = 0;
            let count = 0;
            valueDatas.forEach(function (valueData) {
              if (valueData.columnss === col) {
                total += parseInt(valueData.valueData);
                count++;
              }
            });
            let statValue = calculateStat(queryResult, total, count);
            if(statValue === "NaN") {
              statValue = "0.00";
            }
            resultTable += "<td>" + statValue + "</td>";  
          });
          resultTable += "</tr>";

          resultTable += "</tbody></table>";

          $("#resultTable2").html(resultTable);
        });
      });

      // 필터 체크박스
      $("#filterCheck").on("change", "input[type='checkbox']", function() {
        let selectedCheck = []; 
        
        $('input[name="selectedCheck[]"]:not(:checked)').each(function() {
          selectedCheck.push($(this).val());
          // console.log("selectCheck"+selectedCheck)
        });

        $("#resultTable2 tr:first td").each(function(){
          let columnIndex = $(this).index();
          let tdText = $(this).text();
          // console.log("tdText"+tdText)

          if (selectedCheck.includes(tdText)) {
            $("#resultTable2 tr td:nth-child(" + (columnIndex + 1) + ")").hide();
          } else {
            $("#resultTable2 tr td:nth-child(" + (columnIndex + 1) + ")").show();
          }
        });

        $("#resultTable2 tr:gt(0)").each(function(index) {
          let tdText = $(this).find("td:first").text();
          let row = $(this);

          if (selectedCheck.includes(tdText)) {
            $(this).hide();
            // 개수 열 다시 계산
            updateTotal();
          } else {
            $(this).show(); 
            updateTotal();
          }
        });
      });

      // 셀렉트 박스 값에 따라 개수, 합계, 평균
      function calculateStat(queryResult, total, count) {
        if (queryResult === "COUNT") {
          return count;
        } else if (queryResult === "SUM") {
          return total;
        } else if (queryResult === "AVG") {
          return (total / count).toFixed(2); // 소수점 둘째 자리에서 반올림
        }
      } 

      let saveTotal = [];

      let rowss, columnss, valueDatas;

      // 데이터 채우는 함수 
      function fillTable(resultArray) {
        // console.log(resultArray)
        rowss = resultArray[0];
        columnss = resultArray[1];
        valueDatas = resultArray[2];

        let columns = columnss.map(column => Object.values(column)[0]);
        let resultTable = "<table><thead><tr><td></td><td>" + columns.join("</td><td>") + "</td></tr></thead><tbody>";  // join(): 배열의 모든 요소를 연결해 문자열로 만듦

        rowss.forEach(function (row, rowIndex) {
          let rowData = Object.values(row)[0];
          let rowDataAttr = "data-ticket='" + rowData + "'"; // 행의 데이터를 식별하는 데이터 속성

          resultTable += "<tr " + rowDataAttr + ">";
          resultTable += "<td>" + rowData + "</td>";
          columns.forEach(function (col) {
            let cellValue = "";
            valueDatas.forEach(function (valueData) {
              if (valueData.rowss === rowData && valueData.columnss === col) {
                cellValue = valueData.valueData;
              }
            });
            resultTable += "<td>" + cellValue + "</td>";
          });
          resultTable += "</tr>";
        });
        let total = 0;

        resultTable += "<tr><td>개수</td>";
        columns.forEach(function (col) {
          let total = 0;
          let count = 0;
          valueDatas.forEach(function (valueData) {
            if (valueData.columnss === col) {
              total += parseInt(valueData.valueData);
              count++;
            }
          });
          let statValue = total;
          saveTotal.push(statValue); // 합계 저장
          resultTable += "<td>" + statValue + "</td>";
          $("#queryResult").val("COUNT"); // 검색할 때마다 셀렉트 박스 기본값으로
          $('input[name="selectedCheck[]"]').prop('checked', true);
        });
        resultTable += "</tr>";
        resultTable += "</tbody></table>";
        $("#resultTable2 tbody").html(resultTable);
      }

      function updateTotal() {
        console.log(saveTotal+"저장됨"); // 3,1,3,0
        newTotal = [];

        let columns = columnss.map(column => Object.values(column)[0]);

        let table = document.getElementById("resultTable2");

        let rowCount = table.rows.length;
        let columnCount = table.rows[2].cells.length;

        let hiddenRowCount = 0;
        for (let i=0; i<table.rows.length; i++) {
          if ($(table.rows[i]).is(":hidden")) {
            hiddenRowCount++;
          }
        }

        let visibleRowCount = rowCount - hiddenRowCount;

        for (let i=1; i<columnCount; i++) { 
          let total = 0;
          for (let j=0; j<visibleRowCount; j++) {
            if (!$(table.rows[j]).is(":hidden")) {
              let cellValue = parseInt(table.rows[j].cells[i].innerHTML);
              if (!isNaN(cellValue)) {
                  total += cellValue;
              }
            }
          }
          table.rows[rowCount-1].cells[i].innerHTML = total;
        }
      }
    });
  </script>
</body>
</html>