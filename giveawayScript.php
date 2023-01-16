<?php

if (isset( $_POST[ 'submit' ])) {
header( "Location: giveaway?finale" );
    exit();
    

    $firstname = trim($_POST[ 'firstname' ]);
    $lastname = trim($_POST[ 'lastname' ]);
    $email = trim($_POST[ 'email' ]);
    if (isset($_POST[ 'gdprChecked' ])) {
        $gdpr = 'true';
    } else {
        $gdpr = 'false';
    }
    if (isset($_POST[ 'rulesChecked' ])) {
        $rules = 'true';
    } else {
        $rules = 'false';
    }

    if (empty($firstname) || empty($lastname) || empty($email) || $rules == 'false') {
        header( "Location: giveaway?first=$firstname&last=$lastname&email=$email&gdpr=$gdpr&rules=$rules" );
        exit();
    }

    if (!preg_match("/^[A-Za-zΑ-Ωα-ωΆ-Ώά-ώίϊΐόάέύϋΰήώΆΈΊΌΎΏΉσυπρτς]+$/", $firstname)) {
        if (!preg_match("/^[A-Za-zΑ-Ωα-ωΆ-Ώά-ώίϊΐόάέύϋΰήώΆΈΊΌΎΏΉσυπρτς]+$/", $lastname)) {
            header( "Location: giveaway?firstnameError&lastnameError&first=$firstname&last=$lastname&email=$email&gdpr=$gdpr&rules=$rules" );
            exit();
        } else {
            header( "Location: giveaway?firstnameError&first=$firstname&last=$lastname&email=$email&gdpr=$gdpr&rules=$rules" );
            exit();
        }
    }
        
    if (!preg_match("/^[A-Za-zΑ-Ωα-ωΆ-Ώά-ώίϊΐόάέύϋΰήώΆΈΊΌΎΏΉσυπρτς]+$/", $lastname)) {
        header( "Location: giveaway?lastnameError&first=$firstname&last=$lastname&email=$email&gdpr=$gdpr&rules=$rules" );
        exit();
    } 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header( "Location: giveaway?emailError&first=$firstname&last=$lastname&email=$email&gdpr=$gdpr&rules=$rules" );
        exit();
    }

    require_once('conn.php');

    $sql = "SELECT * FROM giveaway WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header( "Location: giveaway?error" );
        exit();
    }
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_fetch_assoc($result)) {
        header( "Location: giveaway?emailused&first=$firstname&last=$lastname&email=$email&gdpr=$gdpr&rules=$rules" );
        exit();
    } else {
        $result = true;
    }

    mysqli_stmt_close($stmt);

    if ($result) {
        $sql = "INSERT INTO `giveaway` (`id`, `firstname`, `lastname`, `email`, `gdpr`, `giveaway`) VALUES (NULL, ?, ?, ?, ?, 'Χριστούγεννα 2020 Τζουκόπουλος');";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header( "Location: giveaway?error" );
            exit();
        }
        mysqli_stmt_bind_param($stmt, 'ssss', $firstname, $lastname, $email, $gdpr);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $fullname = $firstname . " " . $lastname;
        require_once('phpmailer.php');
        sendEmail( $email, $fullname );
        header( "Location: giveaway?success" );
    }

    

} else {
    header( "Location: https://www.facebook.com/gsfmusicofficial" ); 
    exit();  
}