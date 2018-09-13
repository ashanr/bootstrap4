<?php
error_reporting(E_ALL); // Enabling Error Reporting
ini_set('display_errors', 1);
require_once './config/dbc.php'; // Database Configuration File
require_once './class/systemSetting.php'; // Database Query Settings File
$system = new setting();
/**
 * Get a database backup based on the initial selection query
 *
 */
class MySQLDump {

    var $tables = array();
    var $connected = false;
    var $output;
    var $droptableifexists = false;
    var $mysql_error;

    function connect($host, $user, $pass, $db) {
        $return = true;
//        $conn = @mysqli_connect($host, $user, $pass);
        $conn= MainConfig::connectDB();
        $link = MainConfig::conDB();
   
        $seldb = @mysqli_select_db($link,$db) or die(mysqli_error($link));
        if (!$seldb) {
             echo 'Error 3 '.mysqli_error($link);
//            $this->mysql_error = mysqli_error($link;
            $return = false;
        }
        $this->connected = $return;
        return $return;
    }

    function list_tables() {
        $return = true;
        if (!$this->connected) {
            $return = false;
        }
        $this->tables = array();
        $conn= MainConfig::connectDB();
        $link = MainConfig::conDB();
        $sql = mysqli_query($link,"SHOW TABLES");

        while ($row = mysqli_fetch_array($sql)) {
            array_push($this->tables, $row[0]);
        }
        return $return;
    }

    function list_values($tablename) {
        $conn= MainConfig::connectDB();
        $link = MainConfig::conDB();
        $sql = mysqli_query($link,"SELECT * FROM $tablename");
        $this->output .= "\n\n-- Dumping data for table: $tablename\n\n";
        while ($row = mysqli_fetch_array($sql)) {
            $broj_polja = count($row) / 2;
            $this->output .= "INSERT INTO `$tablename` VALUES(";
            $buffer = '';
            for ($i = 0; $i < $broj_polja; $i++) {
                $vrednost = $row[$i];
                // echo "<pre>$vrednost</pre>";
                if (!is_integer($vrednost)) {
                    $vrednost = "'" . mysqli_real_escape_string($link,$vrednost) . "'";
                }
                $buffer .= $vrednost . ', ';
            }
            $buf = substr($buffer, 0, count($buffer) - 3);
            $this->output .= $buf . ");\n";
        }
    }

    function dump_table($tablename) {
        $this->output = "";
        $this->get_table_structure($tablename);
        $this->list_values($tablename);
    }

    function get_table_structure($tablename) {
        $this->output .= "\n\n-- Dumping structure for table: `{$tablename}`\n\n";
        if ($this->droptableifexists) {
            $this->output .= "DROP TABLE IF EXISTS `{$tablename}`;\n";
        }
        $conn= MainConfig::connectDB();
        $link = MainConfig::conDB();
        $sql = mysqli_query($link,"SHOW CREATE TABLE {$tablename}");
        if ($sql) {
            $row = mysqli_fetch_array($sql);
            $this->output .= $row[1];
            $this->output .= ";\n\n";
        } else {
            $this->output .= "-- Error in getting create of `{$tablename}`";
        }
    }

}