<?php
    include_once("emailDAL.php");
    
    class EmailBL
    {
        private $id_newsletter;
        private $email;
        private $insert_date;

        public function ValidateEmail($email)
        {
            $emptyemailfieldMsg = "Unesite email!";
            $emailfalseMsg = "Morate uneti ispravnu email adresu!";
            $emailtrueMsg = "Uspešno ste uneli email i prijavili se na naš newslettter!";
            $emailduplicatedMsg = "Vi ste se već prijavili na naš newletter sa ovom email adresom";
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(is_array($email) || is_numeric($email) || is_bool($email) || is_float($email) || is_file($email) || is_dir($email) || is_int($email))
                {
                    return $emailfalseMsg;
                }
                else
                {
                
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
                    /*else if()
                    {
                        return $emailduplicatedMsg;
                    }*/
                }
            }
            else
            {
                return "";
            }
            
        }

        public function SetEmailandInsertDate($email)
        {
            $validatedEmail = $this->ValidateEmail($email);
            
            if ($validatedEmail == $emailtrueMsg)
            {
                $this->id_newsletter = $id_newsletter;
                $this->email = $email;
                $this->insert_date = date("d-M-Y H:i:s");
            }
        }
    }
?>