<?php
    class EmailDM
    {
        private $ID_NEWSLETTER_DM;
        private $EMAIL_DM;
        private $INSERT_DATE_DM;
        private $ID_STATUS_DM;

        public function SetEmailAndInsertDateDM($ID_NEWSLETTER_DM, $EMAIL_DM, $INSERT_DATE_DM, $ID_STATUS_DM)      
        {
            $this->ID_NEWSLETTER_DM = $ID_NEWSLETTER_DM;
            $this->EMAIL_DM = $EMAIL_DM;
            $this->INSERT_DATE_DM = $INSERT_DATE_DM;
            $this->ID_STATUS_DM = $ID_STATUS_DM;
        }

        public function SetID_NEWSLETTER_DM($ID_NEWSLETTER_DM)
        {
            $this->ID_NEWSLETTER_DM = $ID_NEWSLETTER_DM;
        }

        public function SetEMAIL_DM($EMAIL_DM)
        {
            $this->EMAIL_DM = $EMAIL_DM;
        }

        public function SetINSERT_DATE_DM($INSERT_DATE_DM)
        {
            $this->INSERT_DATE_DM = $INSERT_DATE_DM;
        }

        public function SetID_STATUS_DM($ID_STATUS_DM)
        {
            $this->ID_STATUS_DM = $ID_STATUS_DM;
        }

        public function GetID_NEWSLETTER_DM()
        {
            return $this->ID_NEWSLETTER_DM;
        }

        public function GetEMAIL_DM()
        {
            return $this->EMAIL_DM;
        }

        public function GetINSERT_DATE_DM()
        {
            return $this->INSERT_DATE_DM;
        }

        public function GetID_STATUS_DM()
        {
            return $this->ID_STATUS_DM;
        }
    }
?>