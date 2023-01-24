<?php
    if ( isset( $_GET[ 'private' ] ) && isset( $_GET[ 'admin' ] ) ) {
    session_start();
    if(isset($_SESSION['userId'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSF music links</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/create.css">
    <link rel="stylesheet" href="css/fetch.css">
    <script src="app.js" defer></script>
</head>

<body>
    <nav>
        <div class="create enable">Create</div>
        <div class="fetch">Fetch</div>
    </nav>
    <!-- Create -->
    <form action="createLink.php" method="post">

        <div class="code">
            <label for="code">Code: </label>
            <input type="text" id="Code" name="code">
        </div>
        <div class="fields">
            <label for="spotify">Spotify: </label>
            <input type="text" id="spotify" name="spotify">
        </div>
        <div class="fields">
            <label for="spotify">Youtube: </label>
            <input type="text" id="youtube" name="youtube">
        </div>
        <div class="fields">
            <label for="apple">Apple: </label>
            <input type="text" id="apple" name="apple">
        </div>
        <div class="fields">
            <label for="amazon">Amazon: </label>
            <input type="text" id="amazon" name="amazon">
        </div>
        <div class="fields">
            <label for="deezer">Deezer: </label>
            <input type="text" id="deezer" name="deezer">
        </div>
        <div class="fields">
            <label for="tidal">Tidal: </label>
            <input type="text" id="tidal" name="tidal">
        </div>
        <div class="fields">
            <label for="cd">CD: </label>
            <input type="text" id="cd" name="cd">
            
        </div>
        <div class="tracksDuration">
            <div>
                <label for="tracks">Tracks: </label>
                <input type="text" id="tracks" name="tracks">
                
            </div>
            <div>
                <label for="duration">Duration: </label>
                <input type="text" id="duration" name="duration">
                
            </div>
        </div>
        

        <button type="submit" name="submit">Submit</button>

    </form>
    <!-- Fetch -->
    <main>
        <div class="code">
            <label for="code1">Code: </label>
            <input type="text" id="code1">
            <div class="btn"><button id="fetchBtn">></button></div>
            <div class="btn"><button class="copyBtn openAll">open</button></div>
        </div>
        <div>
            <label for="spotify1">Spotify: </label>
            <input type="text" id="spotify1">
            <div class="btn btn1"><button class="copyBtn copyBtns">copy</button></div>
            <div class="btn"><button class="copyBtn openBtns">open</button></div>
        </div>
        <div>
            <label for="youtube1">Youtube: </label>
            <input type="text" id="youtube1">
            <div class="btn btn1"><button class="copyBtn copyBtns">copy</button></div>
            <div class="btn"><button class="copyBtn openBtns">open</button></div>
        </div>
        <div>
            <label for="apple1">Apple: </label>
            <input type="text" id="apple1">
            <div class="btn btn1"><button class="copyBtn copyBtns">copy</button></div>
            <div class="btn"><button class="copyBtn openBtns">open</button></div>
        </div>
        <div>
            <label for="amazon1">Amazon: </label>
            <input type="text" id="amazon1">
            <div class="btn btn1"><button class="copyBtn copyBtns">copy</button></div>
            <div class="btn"><button class="copyBtn openBtns">open</button></div>
        </div>
        <div>
            <label for="deezer1">Deezer: </label>
            <input type="text" id="deezer1">
            <div class="btn btn1"><button class="copyBtn copyBtns">copy</button></div>
            <div class="btn"><button class="copyBtn openBtns">open</button></div>
        </div>
        <div>
            <label for="tidal1">Tidal: </label>
            <input type="text" id="tidal1">
            <div class="btn btn1"><button class="copyBtn copyBtns">copy</button></div>
            <div class="btn"><button class="copyBtn openBtns">open</button></div>
        </div>
        <div>
            <label for="cd1">CD: </label>
            <input type="text" id="cd1">
            <div class="btn btn1"><button class="copyBtn copyBtns">copy</button></div>
            <div class="btn"><button class="copyBtn openBtns">open</button></div>
        </div>
    </main>


    
</body>

</html>

<?php
    } else {
        header( "Location: login.php?private&admin" );
    }
    } else {
        header( "Location: https://www.facebook.com/gsfmusicofficial" );
    }
?>