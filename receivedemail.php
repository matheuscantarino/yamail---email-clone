<?php
    session_start();
    include('connection.php');
    $_SESSION['user'] = 'Matheus';
    $user = $_SESSION['user'];
    $id = $_GET['id'];
    $sql = "SELECT * FROM messages WHERE contact = '{$user}'";
    $result = mysqli_query($conn,$sql) or die("Error returning data");
?>
<?php 
    while ($register = mysqli_fetch_array($result)) {
        $usersend = $register['user'];
        $contact = $register['contact'];
        $emailmsg = $register['emailmsg'];
        $subjectt = $register['subjectt'];
        $messageid = $register['messagesid'];
        if ($id == $messageid) {
            $message = $emailmsg;
            echo $message;
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/main.css">
        <title>yA-Mail - Mailbox</title>
    </head>
    <body>
        <div class = "boxbody">
            <h2>yA-Mail</h2>
            <div class = "leftbox"><hr>
                <div class = "boxwrite">
                    <h3>Write E-mail</h3>
                </div>
            </div>
        </div>
    </body>
</html>
