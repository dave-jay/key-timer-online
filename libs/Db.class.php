<?php

define('DB_HOST', 'localhost');
define('DB_PASSWORD', '');
define('DB_UNAME', 'root');
define('DB_NAME', 'keytime_timer');

/**
 * Database Class:
 * 
 * Normal DB class with singleton pattern
 * 
 * @author Dave Jay <dave.jay90@gmail.com>
 * @version 1.0
 * @package KeyTimer
 * @since May 28, 2013
 * 
 */
class Db {
    # holds singleton object

    private static $db;
    # holds link
    public $_link;

    # constructor

    public function __construct() {
        $this->_link = mysql_connect(DB_HOST, DB_UNAME, DB_PASSWORD) or trigger_error(mysql_error(), 1024);
        mysql_select_db(DB_NAME) or trigger_error(mysql_error(), 1024);
        mysql_query("SET NAMES 'utf8'");
    }

    # singleton

    public static function __d() {
        if (!isset($db)) {
            self::$db = new Db();
        }
        return self::$db;
    }

    # fire query

    public function query($query) {
        if ($res = mysql_query($query))
            return $res;
        else {
            d(mysql_error());
            back_trace();
            d($query);
            exit;
        }
    }

    function delete_query($table, $condition) {
        $db = Db::__d();
        $db->query("delete from {$table} where {$condition} ");
        return mysql_affected_rows();
    }

    /**
     * wrapper function for update query
     * @author Dave Jay
     * @since May 28, 2013
     * @param String $table
     * @param Array $array list of fields
     * @param String $where where condition
     * @return Integer return number rows updated
     * @package KeyTimer
     * 
     */
    function update_query($table, $fields, $condition) {
        $db = Db::__d();

        if (!empty($fields)) {
            $set_string = array();
            $fields['modified_at'] = _mysqlDate();

            foreach ($fields as $field_name => $field_value) {
                $set_string[] = "  `{$field_name}` = '{$field_value}'  ";
            }
            $set_string = implode(",", $set_string);
            $query = " update {$table} set {$set_string} where {$condition} ";
            $db->query($query);

            return mysql_affected_rows();
        }
        return false;
    }

    /**
     * wrapper function for insert query
     * @author Dave Jay
     * @since May 28, 2013
     * @param String $table
     * @param Array $array list of fields

     * @return Integer return number rows inserted
     * @package KeyTimer
     * 
     */
    function insert_query($table, $fields) {

        $db = Db::__d();

        if (!empty($fields)) {
            $value_string = array();
            //$fields['created_at'] = $fields['modified_at'] = _mysqlDate();

            foreach ($fields as $field_name => $field_value) {
                $value_string[] = " '{$field_value}' ";
            }

            $fields_string = " ( `" . implode("`, `", array_keys($fields)) . "` ) ";

            $value_string = " ( " . implode(",", $value_string) . " ) ";

            $query = " INSERT INTO {$table} {$fields_string} values {$value_string}";
            $db->query($query);

            return mysql_insert_id();
        }
        return false;
    }

    public function format_data($result, $field = NULL, $second_field = NULL, $third_field = NULL) {
        $data_array = array();
        if ($result) {
            while ($array = mysql_fetch_assoc($result)) {
                $t = array();
                foreach ($array as $field_name => $value) {
                    //$t[$field_name] = utf8_encode($value);				
                    $t[$field_name] = ($value);
                }
                if (isset($field)) {
                    if (isset($second_field)) {
                        if (isset($third_field)) {
                            $data_array[$t[$field]][$t[$second_field]][$t[$third_field]] = $t;
                        } else {
                            $data_array[$t[$field]][$t[$second_field]] = $t;
                        }
                    } else {
                        $data_array[$t[$field]][] = $t;
                    }
                } else {
                    $data_array[] = $t;
                }
            }
        }
        return $data_array;
    }

}

function d($arr, $hideStyle = "block") {
    if (is_array($arr) || is_object($arr)) {
        print "<pre style='display:{$hideStyle}'>" . "...";
        print_r($arr);
        print "</pre>";
    } else {
        print "<div class='debug' style='display:{$hideStyle}'>Debug:<br>$arr</div>";
    }
}

function back_trace() {
    $array = debug_backtrace();
    $output = 'Execution Backtrace:<br><ul>';
    foreach ($array as $debug_data) {
        $output .= "<li><b> " . $debug_data['file'] . "</b> [ Line : <b>" . $debug_data['line'] . "</b> ] <br></li>";
    }
    $output .= '</ul>';
    d($output);
}

?>