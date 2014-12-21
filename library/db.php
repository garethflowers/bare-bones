<?php

/**
 * DB Class
 *
 * Handles database connectivity and querying
 */
class Db {

    /**
     * @var Db
     */
    private static $connection;

    /**
     * @var resource
     */
    private $resource;

    /**
     * Construct new Db
     */
    private function __construct() {
        $conn = 'host=' . DB_SERVER;
        $conn .= ' dbname=' . DB_NAME;
        $conn .= ' user=' . DB_USER;
        $conn .= ' password=' . DB_PASS;

        $this->resource = pg_connect($conn);
    }

    /**
     * Access the current database connection
     * @return Db
     */
    public static function connection() {
        if (!isset(self::$connection)) {
            $c = __CLASS__;
            self::$connection = new $c();
        }

        return self::$connection;
    }

    /**
     * Execute a database query and return the result
     * @param string $query
     * @param bool $redirect redirect to error page on failure
     * @return bool
     */
    public function execQuery($query) {
        if (!$this->resource) {
            return NULL;
        }

        $result = pg_query($this->resource, $query);

        if (!$result) {
            return NULL;
        }

        return $result;
    }

    /**
     * Execute a query and any rows
     * @param string $query
     * @return array
     */
    public function getData($query, $associative = TRUE) {
        if (empty($query)) {
            return NULL;
        }

        if (!$this->resource) {
            return NULL;
        }

        $result = pg_query($this->resource, $query);

        if (!$result) {
            return NULL;
        }

        $data = array();

        while ($row = pg_fetch_array($result, NULL, PGSQL_NUM)) {
            $rowdata = array();

            foreach ($row as $index => $value) {
                switch (pg_field_type($result, $index)) {
                    case 'int2':
                        $value = intval($value);
                        break;
                    case 'int4':
                        $value = intval($value);
                        break;
                    case 'int8':
                        $value = intval($value);
                        break;
                    case 'float4':
                        $value = floatval($value);
                        break;
                    case 'float8':
                        $value = floatval($value);
                        break;
                    case 'numeric':
                        $value = floatval($value);
                        break;
                    case 'money':
                        $value = floatval($value);
                        break;
                    case 'bool':
                        $value = ($value == 't');
                        break;
                }

                if ($associative) {
                    $rowdata[pg_field_name($result, $index)] = $value;
                } else {
                    $rowdata[$index] = $value;
                }
            }

            $data[] = $rowdata;
        }

        return $data;
    }

    public function getDataRow($query, $associative = TRUE) {
        $data = $this->getData($query, $associative);

        if (count($data) > 0) {
            return $data[0];
        }

        return null;
    }

    /**
     * @param mixed $value
     * @return string
     */
    public static function formatStr($value) {
        if (empty($value)) {
            return "''";
        }

        return "'" . pg_escape_string(utf8_encode(trim($value))) . "'";
    }

    /**
     * @param mixed $value
     * @return string
     */
    public static function formatInt($value) {
        if (!is_numeric($value)) {
            return 'NULL';
        }

        return strval(intval($value)) . '::INTEGER';
    }

    /**
     * @param mixed $value
     * @return string
     */
    public static function formatFloat($value) {
        if (!is_numeric($value)) {
            return 'NULL';
        }

        return strval(floatval($value)) . '::NUMERIC';
    }

    /**
     * @param mixed $value
     * @return string
     */
    public static function formatDate($value) {
        if (empty($value) || count(explode('-', $value)) != 3) {
            return 'NULL';
        }

        return vsprintf('\'%04d-%02d-%02d\'', array_reverse(explode('-', $value))) . '::DATE';
    }

    /**
     * @param mixed $value
     * @return string
     */
    public static function formatTimestamp($value) {
        if (empty($value) || $value == '--') {
            return 'NULL';
        }

        return '\'' . $value . '\'::TIMESTAMP';
    }

    /**
     * @param mixed $value
     * @return string
     */
    public static function formatBool($value) {
        if (!is_bool($value)) {
            return 'NULL';
        }

        if ($value) {
            return 'TRUE';
        }

        return 'FALSE';
    }

}
