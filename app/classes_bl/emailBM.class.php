<?php
    class EmailBM
    {
        private $ID_NEWSLETTER_BM;
        private $EMAIL_BM;
        private $INSERT_DATE_BM;
        private $ID_STATUS_BM;

        public function SetEmailAndInsertDateBM($ID_NEWSLETTER_BM, $EMAIL_BM, $INSERT_DATE_BM, $ID_STATUS_BM)      
        {
            $this->ID_NEWSLETTER_BM = $ID_NEWSLETTER_BM;
            $this->EMAIL_BM = $EMAIL_BM;
            $this->INSERT_DATE_BM = $INSERT_DATE_BM;
            $this->ID_STATUS_BM = $ID_STATUS_BM;
        }

        public function SetID_NEWSLETTER_BM($ID_NEWSLETTER_BM)
        {
            $this->ID_NEWSLETTER_BM = $ID_NEWSLETTER_BM;
        }

        public function SetEMAIL_BM($EMAIL_BM)
        {
            $this->EMAIL_BM = $EMAIL_BM;
        }

        public function SetINSERT_DATE_BM($INSERT_DATE_BM)
        {
            $this->INSERT_DATE_BM = $INSERT_DATE_BM;
        }

        public function SetID_STATUS_BM($ID_STATUS_BM)
        {
            $this->ID_STATUS_BM = $ID_STATUS_BM;
        }

        public function GetID_NEWSLETTER_BM()
        {
            return $this->ID_NEWSLETTER_BM;
        }

        public function GetEMAIL_BM()
        {
            return $this->EMAIL_BM;
        }

        public function GetINSERT_DATE_BM()
        {
            return $this->INSERT_DATE_BM;
        }

        public function GetID_STATUS_BM()
        {
            return $this->ID_STATUS_BM;
        }
    }
?>