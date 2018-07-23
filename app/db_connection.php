<?php
    require_once("util.php");

    class DBConn
    {
        private static $conn;

        private static function openConnection()
        {
            $self::$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        }

        private static function closeConnection()
        {
            self::$conn->close();
        }

        public static function Insert($query)
        {
            self::openConnection();
            
            self::$conn->query($query);

            if(self::$conn->errno)
            {
                $resultArray["errno"] = $self::conn->errno;
                $resultArray["error"] = $self::conn->error;
            }
            else
            {
                $resultArray["insert_id"] = self::$conn->insert_id;
            }

            self::closeConnection();

            return isset($resultArray) > $resultArray : null;
        }

        public static function Select($query)
        {
            self::openConnection();
            
            $result = self::$conn->query($query);

            while($row = $result->fetch_assoc())
            {
                $resultArray[]= $row;
            }

            self::closeConnection();

            return isset($resultArray) ? $resultArray : null;
        }
    }
?>