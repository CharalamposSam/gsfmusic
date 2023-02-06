<?php
    if ( isset( $_GET[ 'private' ] ) && isset( $_GET[ 'admin' ] ) ) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link rel="stylesheet" href="../../css/colors.css">
    <style>
        :root{
        --primary1: #0c657b; 
        --primary2: #67b8cc; 
        --primary3: #8bcbdb;
        --secondary1: #fad667; 
        --secondary2: #e6b557; 
    }
        *{
            box-sizing: border-box;
        }
        body{
            margin:0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #424241;
        }
        main{
            width:100%;
            display: grid;
            place-items: center;
        }
        .menu-logo{
            width: 90vw;
            max-width: 600px;
            height: 70px;
            font-size:30px;
            font-weight: bold;
            padding: 20px;
            font-style: italic;
            background: #adadad;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            margin: 50px 0 0;
            border-bottom:none;
        }
        form{
            background-color: #c0c0c0;
            width: 90vw;
            max-width: 600px;
            text-align: center;
            padding: 30px 0;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            border-top:none;
        }
        input{
            width: 220px;
            height: 40px;
            border:none;
            background-color: transparent;
            outline: none;
            font-size: 15px;
            text-align: center;
            color: black;
        }
        input::placeholder{
            color: black;
        }
        input[type="text"]{
            border-bottom: 2px solid black;
        }
        input[type="password"]::placeholder{
            text-align: center;
        }
        button{
            width: 200px;
            height: 40px;
            border-radius: 10px;
            border: none;
            outline: none;
            background-color: #2edd86;
            font-size: 15px;
            color: var(--primary1);
            cursor:pointer;
            margin-top: 20px; 
        }
        button:hover{
            background-color: #31e28a;
            color: black;
        }
    </style>
</head>
<body>
    <main>
        <div class="menu-logo">
            GSF music
        </div>
        <form action="loginScript.php" method="POST">
            <input type="text" placeholder="Username" name="username" required>
            <br>
            <input type="password" placeholder="Password" name="password" required>
            <br>
            <button type="submit" name="loginSubmit">Submit</button>
        </form>
    </main>
</body>
</html>

<?php
    } else {
        header( "Location: https://www.facebook.com/gsfmusicofficial" );
    }
?>