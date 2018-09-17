<?php

//include_once  '../config/dbc.php';
include_once (str_replace("\\", "/", __DIR__) . '/../config/dbc.php');

class setting {

    function Prepare_insert($table, $data, $db = FALSE) {
        //INSERT INTO [table](fields) VALUES()
        if (empty($data)) {
            return FALSE;
        }
        $fks = array();
        foreach (array_keys($data) as $kv) {
            $fks[] = sprintf("`%s`", mysqli_real_escape_string($kv));
        }

        $fvals = array();
        foreach (array_values($data) as $fv) {
//        if (is_numeric($fv)) {
//            if (is_float($fv)) {
//                $fvals[] = sprintf("%f", floatval($fv));
//            }
//        }
//        if (is_null($fv)) {
//            $fvals[] = "NULL";
//        }
//        if (is_string($fv)) {
            if (strstr($fv, "`")) {
                $fv = str_replace("`", "", $fv);
                $fvals[] = sprintf("%s", mysqli_real_escape_string($fv));
            } else {
                $fvals[] = sprintf("'%s'", mysqli_real_escape_string($fv));
            }

//        }
        }
        $q = "INSERT INTO ";
        if ($db) {
            $q .= sprintf("`%s`.", mysqli_real_escape_string($db));
        }
        $q .= sprintf("`%s` (%s) VALUES(%s)", mysqli_real_escape_string($table), implode(", ", $fks), implode(", ", $fvals));
        return $q;
    }

    function prepareSelectQueryForJSON($query) {
        $data = array();
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        MainConfig::closeDB();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function prepareSelectQueryForJSONSingleData($query) {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $query) or die(mysqli_error());
        MainConfig::closeDB();
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }

    function prepareSelectQuaryForAllData($query) {
        $data = array();
        MainConfig::connectDB();
       $link = MainConfig::conDB();
        $result = mysqli_query($link,$query) or die(mysqli_error());
        MainConfig::closeDB();
        while ($row = mysql_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function getNextAutoIncrementID($table) {
        MainConfig::connectDB();
       $link = MainConfig::conDB();
        $result = mysqli_query($link,$query) or die(mysqli_error());
        MainConfig::closeDB();
        $row = mysql_fetch_array($result);
        return $nextId = $row['Auto_increment'];
    }

    function getFirstKey($arr) {
        reset($arr);
        return key($arr);
    }

    function prepareAjaxSelectBox($array, $value_name, $data_name, $selectedValue = false, $error_msg = ' -- No Data Found -- ') {
        if (!empty($array)) {
            foreach ($array as $data) {
                if (isset($selectedValue) && $data[$value_name] == $selectedValue) {
                    echo '<option value="' . $data[$value_name] . '" selected>' . $data[$data_name] . '</option>';
                } else {
                    echo '<option value="' . $data[$value_name] . '">' . $data[$data_name] . '</option>';
                }
            }
        } else {
            echo '<option value="0">' . $error_msg . '</option>';
        }
    }

    function autoRedict($redirectPath, $time) {
        echo '<script type="text/javascript">
		window.setTimeout(function() {
		window.location.href = "' . $redirectPath . '";
		},' . $time . ')
             </script>';
    }

    function prepareSelectQuery($query) {
        $data = array();
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        MainConfig::closeDB();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function prepareCommandQuery($query, $successMsg, $errorMsg) {
        $link = MainConfig::conDB();
        $save = mysqli_query($link, $query);
        if (isset($save) && $save) {
            echo '<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> ' . $successMsg . ' </div>';
        } else {
            echo '<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong> ' . $errorMsg . ' </div>';
        }
    }

    function prepareCommandQuerySpecial($query) {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $save = mysqli_query($link, $query);
        MainConfig::closeDB();
        if (isset($save) && $save) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function prepareCommandQueryForAlertify($query, $successMsg, $errorMsg) {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $save = mysqli_query($link, $query)or die(mysqli_error($link));
        MainConfig::closeDB();
        if (isset($save) && $save) {
            echo json_encode(array(array("msgType" => 1, "msg" => $successMsg)));
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => $errorMsg)));
        }
    }

    function prepareQueryCount($tableName) {
        $count = 0;
        $query = "SELECT COUNT(*) as count FROM " . $tableName;
        $countData = $this->getSelectQuaryForAllData($query);
        return $countData[0]['count'];
    }

    function prepareRowQuntQuary($query) {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $data = mysqli_query($link, $query);
        $count = mysqli_num_rows($link, $data);
        MainConfig::closeDB();
        return $count;
    }

    function prepareQueryCountByCondition($tableName, $colName, $colValue) {
        $count = 0;
        $query = "SELECT COUNT(*) as count FROM " . $tableName . " WHERE " . $colName . " = '" . $colValue . "'";
        $countData = $this->prepareSelectQuaryForAllData($query);
        return $countData[0]['count'];
    }

    function getCountByQuery($query) {
        $count = 0;
        MainConfig::connectDB();

        $link = MainConfig::conDB();
        $queryResult = mysqli_query($link, $query);
        $count = mysqli_num_rows($queryResult);
        MainConfig::closeDB();
        return $count;
    }

}
