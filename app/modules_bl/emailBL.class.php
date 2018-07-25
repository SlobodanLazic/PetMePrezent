<?php
    include_once "../app/db/modules/emailDAL.class.php";
    include_once "../app/db/classes/emailDM.class.php";
    include_once "../app/classes_bl/emailBM.class.php";
    
    class EmailBL
    {
        
        public function ServerValidationMessage($email)
        {
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(is_array($email) || is_numeric($email) || is_bool($email) || is_float($email) || is_file($email) || is_dir($email) || is_int($email))
                {
                    return $emailfalseMsg;
                }
                else
                {
                    $emailtrueMsg = "Uspešno ste uneli email i prijavili se na naš newslettter!";
                    $emailfalseMsg = "Morate uneti ispravnu email adresu!";
                    $emptyemailfieldMsg = "Unesite email!";                    
                    $emailduplicatedMsg = "Vi ste se već prijavili na naš newletter sa ovom email adresom";
                    $email=trim(strtolower($email));
                    
                    if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false && $email != "")
                    {
                        return $emailtrueMsg;
                    }
                    else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false && $email != "")
                    {
                        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
                        return (preg_match($pattern, $email) === 1) ? $emailtrueMsg : $emailfalseMsg;
                    }
                    else if($email == "")
                    {
                        return $emptyemailfieldMsg;
                    }
                    else if(in_array($email,$this->GetEmail))
                    {
                        return $emailduplicatedMsg;
                    }
                }
            }
            else
            {
                return "Došlo je do greške.Molimo pokušajte opet.";
            }
            
        }

        public function InsertEmail()
        { 
                $id_newsletter = "";
                $email = $_POST["email"];
                $insertedDate = date("d-M-Y H:i:s");
                $id_status = 1;
                
                $emailBM = new EmailBM();
                $emailBM->SetEmailAndInsertDateBM($id_newsletter, $email, $insertedDate, $id_status);
                $emailDM = $this->MapEmailBM2DM($emailBM);
                
                $emailDAL = new EmailDAL();
                $id = $emailDAL->InsertEmailDAL($emailDM);
            
        }

        private function MapEmailBM2DM($emailBM)
        {
            $emailDM = new EmailDM();
            $emailDM->SetEmailAndInsertDateDM(  $emailBM->GetID_NEWSLETTER_BM(),
                                                $emailBM->GetEMAIL_BM(),
                                                $emailBM->GetINSERT_DATE_BM(),
                                                $emailBM->GetID_STATUS_BM()
                                            );
            return $emailDM;
        }

        public function GetEmail()
        {
            $emailDAL = new EmailDAL();
            $emailsDM = $emailDAL->GetEmailDAL();

            $emails = $this->MapEmailDM2BM($emailsDM);

            return $emails;
        }

        private function MapEmailDM2BM($emailsDM)
        {
            if(isset($emailsDM) && $emailsDM != null && count($emailsDM) > 0)
            {
                foreach($emailsDM as $emailDM)
                {
                    $emailBM = new EmailBM();
                    $emailBM->SetEMAIL_BM($emailDM->GetEMAIL_DM());
                    $emails[] = $emailBM;
                }
            }

            return isset($emails) ? $emails : null;
        }
    }
?>