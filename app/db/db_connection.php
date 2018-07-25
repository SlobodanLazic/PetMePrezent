<?php
    require_once("../app/db/util.php");

    class DBConn
    {
        private static $conn;

        private static function openConnection()
        {
            self::$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        }

        private static function closeConnection()
        {
            self::$conn->close();
        }

        public static function Insert($query, $params)
        {
            self::openConnection();
            
            $stmt = self::$conn->prepare($query);
            if ($stmt === false)
            {
                $resultArray["errno"] = self::$conn->errno;
                $resultArray["error"] = self::$conn->error;
            }
            else
            {
                call_user_func_array(array($stmt, 'bind_param'), $params);
                $stmt->execute();
                if(self::$conn->errno > 0)
                {
                    $resultArray["errno"] = self::$conn->errno;
                    $resultArray["error"] = self::$conn->error;
                }
                else
                {
                    $resultArray["insert_id"] = self::$conn->insert_id;
                }
            }
            
            $stmt->close();
            self::closeConnection();

            return isset($resultArray) ? $resultArray : null;
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