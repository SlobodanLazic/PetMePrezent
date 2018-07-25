<?php
    require_once("../app/db/db_connection.php");
    include_once("../app/db/classes/emailDM.class.php");

    class EmailDAL
    {
        public function InsertEmailDAL($email)
        {
            $query = "  INSERT INTO NEWSLETTER(ID_NEWSLETTER,EMAIL,INSERT_DATE,ID_STATUS)
                        VALUES (?,?,?,?)";

            $idNewsletterParam = $email->GetID_NEWSLETTER_DM();
            $emailParam = $email->GetEMAIL_DM();
            $insertDateParam = $email->GetINSERT_DATE_DM();
            $idStatusParam = $email->GetID_STATUS_DM();
            
            $params[] = "issi";
            $params[] = &$idNewsletterParam;
            $params[] = &$emailParam;
            $params[] = &$insertDateParam;
            $params[] = &$idStatusParam;

            $resultArray = DBConn::Insert($query, $params);
            
            $id = -1;
            if(isset($resultArray) && $resultArray != null)
            {
                if (count($resultArray) == 1)
                {
                    $id = $resultArray["insert_id"];
                }
                else if (count($resultArray) == 2)
                {
                    $errorMsg = $resultArray["error"];
                    $errorLogFilePath = "../app/errorlog.txt";
                    error_log($errorMsg,3,$errorLogFilePath);
                }
            }

            return $id;
        }

        public function GetEmailDAL()
        {
            $query = "  SELECT n.EMAIL
                        FROM NEWSLETTER n
                        ";
            $emailsArray = DBConn::Select($query);
            if ($emailsArray != null && is_array($emailsArray) && count($emailsArray) > 0)
            {
                $emailDM = new EmailDM();
                $emailDM->SetEMAIL_DM($emailsArray["EMAIL"]);
                $emailsDM[] = $emailDM;
            }

            return isset($emailsDM) ? $emailsDM : null;
        }
    }
?>