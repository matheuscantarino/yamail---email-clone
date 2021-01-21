<?php
    session_start();
    $_SESSION['user'] = 'Matheus';
    $user = $_SESSION['user'];
    include('connection.php');
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM messages WHERE contact = '{$user}'";
    $result = mysqli_query($conn,$sql) or die("Error returning data");
    $resultado = 10000;
    //echo number_format(($post['preçoreal'] * 0.5),2,",",".");
    //$valor_descontado = $total - ($total / 100 * $pctm)
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
                    <?php while ($register = mysqli_fetch_array($result)) {
                        $usersend = $register['user'];
                        $contact = $register['contact'];
                        $emailmsg = $register['emailmsg'];
                        $subjectt = $register['subjectt'];
                        $messageid = $register['messagesid'];

                    if ($user == $contact) {
                        $message = $emailmsg;
                        $destinatário = $contact;
                        $remetente = $usersend;
                        $messagesid = $messageid;
                        $subject = $subjectt;

                        ?><html><div class = "mailwindow"><a href="receivedemail.php?id=<?php echo $register['messagesid']; ?>"><?php echo substr($register['user'] . '|' . '&nbsp&nbsp' . $register['subjectt'], 0, 40); ?></a></div><br><?php
                    }
                    }?>
                </div>
                <div class = "boxmessages">
                    
                </div>
        </div>
    </body>
</html>