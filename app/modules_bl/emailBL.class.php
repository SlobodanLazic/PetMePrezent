<?php
    include_once "../app/db/modules/emailDAL.class.php";
    include_once "../app/db/classes/emailDM.class.php";
    include_once "../app/classes_bl/emailBM.class.php";
    
    class EmailBL
    {
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