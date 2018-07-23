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
        include_once("../app/emailBL.php");
        $EmailBL = new EmailBL;
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $result = $EmailBL->ValidateEmail($email);
        if(isset($_POST["submit"]))
        {
            echo $result;
        }
    ?>
    <form method="POST" action="#">
        <input type="email" id="email" name="email"> 
        <input type="submit" id="submit" name="submit" value="Pošalji">
    </form>
</body>
</html>