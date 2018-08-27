<?php

class database {

    /////// DATABASE BACKUP VARIABLE /////
    var $tables = array();
    var $output;
    var $droptableifexists = false;
    var $mysql_error;

    ////// END DATABASE BACKUP VARIABLE /////

    function filterData($data) {
        $data = trim(htmlentities(strip_tags($data)));
        if (get_magic_quotes_gpc())
            $data = stripslashes($data);
        // MainConfig::connectDB();
        $data = mysql_real_escape_string($data);
        // MainConfig::closeDB();
        return $data;
    }

    function autoGenaratePassword($length = 7) {
        $password = "";
        $possible = "0123456789bcdfghjkmnpqrstvwxyz"; //no vowels
        $i = 0;
        while ($i < $length) {
            $char = substr($possible, mt_rand(0, strlen($possible) - 1), 1);
            if (!strstr($password, $char)) {
                $password .= $char;
                $i++;
            }
        }
    }

    function PasswordHash($pwd, $salt = null) {
        if ($salt === null) {
            $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
        } else {
            $salt = substr($salt, 0, SALT_LENGTH);
        }
        return $salt . sha1($pwd . $salt);
    }

    function checkAdmin() {
        if ($_SESSION['user_level'] == ADMIN_LEVEL) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_level']);
        unset($_SESSION['HTTP_USER_AGENT']);
        return 1;
    }

    function page_protect() {
        session_start();
        /* Secure against Session Hijacking by checking user agent */
        if (isset($_SESSION['HTTP_USER_AGENT'])) {
            if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
                $this->logout();
                exit;
            }
        }
    }

    ////////////////////////// DATABASE BACKUP /////////////////////////////
    function list_tables() {
        $return = true;
        $this->tables = array();
        $sql = mysql_query("SHOW TABLES");

        while ($row = mysql_fetch_array($sql)) {
            array_push($this->tables, $row[0]);
        }
        return $return;
    }

    function list_values($tablename) {
        $sql = mysql_query("SELECT * FROM $tablename");
        $this->output .= "\n\n-- Dumping data for table: $tablename\n\n";
        while ($row = mysql_fetch_array($sql)) {
            $broj_polja = count($row) / 2;
            $this->output .= "INSERT INTO `$tablename` VALUES(";
            $buffer = '';
            for ($i = 0; $i < $broj_polja; $i++) {
                $vrednost = $row[$i];
                // echo "<pre>$vrednost</pre>";
                if (!is_integer($vrednost)) {
                    $vrednost = "'" . mysql_real_escape_string($vrednost) . "'";
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
        $sql = mysql_query("SHOW CREATE TABLE {$tablename}");
        if ($sql) {
            $row = mysql_fetch_array($sql);
            $this->output .= $row[1];
            $this->output .= ";\n\n";
        } else {
            $this->output .= "-- Error in getting create of `{$tablename}`";
        }
    }
}
