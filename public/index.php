<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        include_once("../app/modules_bl/emailBL.class.php");
        $EmailBL = new EmailBL();
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $result = $EmailBL->ServerValidationMessage($email);
        if(isset($_POST["submit"]))
        {
            echo $result;
            if ($result == "Uspešno ste uneli email i prijavili se na naš newslettter!")
            {
                $EmailBL->InsertEmail();
            } 
        }
    ?>
    <form method="POST" action="#">
        <input type="email" id="email" name="email"> 
        <input type="submit" id="submit" name="submit" value="Pošalji">
    </form>
</body>
</html>