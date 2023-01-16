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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="create enable">Create</div>
        <div class="fetch">Fetch</div>
    </nav>
    <form action="createLink.php" method="post">

        <div class="code">
            <label for="code">Code: </label>
            <input type="text" id="Code" name="code">
            <div class="btn"></div>
        </div>
        <div>
            <label for="spotify">Spotify: </label>
            <input type="text" id="spotify" name="spotify">
            <div class="btn"></div>
        </div>
        <div>
            <label for="spotify">Youtube: </label>
            <input type="text" id="youtube" name="youtube">
            <div class="btn"></div>
        </div>
        <div>
            <label for="apple">Apple: </label>
            <input type="text" id="apple" name="apple">
            <div class="btn"></div>
        </div>
        <div>
            <label for="amazon">Amazon: </label>
            <input type="text" id="amazon" name="amazon">
            <div class="btn"></div>
        </div>
        <div>
            <label for="deezer">Deezer: </label>
            <input type="text" id="deezer" name="deezer">
            <div class="btn"></div>
        </div>
        <div>
            <label for="tidal">Tidal: </label>
            <input type="text" id="tidal" name="tidal">
            <div class="btn"></div>
        </div>
        <div>
            <label for="soundcloud">soundcloud: </label>
            <input type="text" id="soundcloud" name="soundcloud">
            <div class="btn"></div>
        </div>
        <div>
            <label for="cd">CD: </label>
            <input type="text" id="cd" name="cd">
            <div class="btn"></div>
        </div>

        <button type="submit" name="submit">Submit</button>

    </form>

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
            <label for="soundcloud1">soundcloud: </label>
            <input type="text" id="soundcloud1">
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


    <script>
        const createCont = document.querySelector('form'),
            fetchCont = document.querySelector('main'),
            createTab = document.querySelector('nav .create'),
            fetchTab = document.querySelector('nav .fetch'),
            spotify = document.querySelector('#spotify1'),
            youtube = document.querySelector('#youtube1'),
            apple = document.querySelector('#apple1'),
            amazon = document.querySelector('#amazon1'),
            deezer = document.querySelector('#deezer1'),
            tidal = document.querySelector('#tidal1'),
            soundcloud = document.querySelector('#soundcloud1'),
            cd = document.querySelector('#cd1'),
            fetchBtn = document.querySelector('#fetchBtn'),
            code = document.querySelector('#code1'),
            openAll = document.querySelector('.openAll'),
            copyBtns = Array.from(document.querySelectorAll('.copyBtn')),
            openBtns = Array.from(document.querySelectorAll('.openBtns'))

        createTab.addEventListener('click', () => {
            createTab.classList.add('enable')
            fetchTab.classList.remove('enable')

            createCont.style.display = 'flex'
            fetchCont.style.display = 'none'
        })

        fetchTab.addEventListener('click', () => {
            fetchTab.classList.add('enable')
            createTab.classList.remove('enable')

            fetchCont.style.display = 'flex'
            createCont.style.display = 'none'
        })


        code.addEventListener('keyup', e => {
            if (e.keyCode === 13) {
                fetchTheData()
            }
        })

        fetchBtn.addEventListener('click', fetchTheData)

        function fetchTheData() {
            spotify.value = ''
            youtube.value = ''
            apple.value = ''
            amazon.value = ''
            deezer.value = ''
            tidal.value = ''
            soundcloud.value = ''
            cd.value = ''
            fetch('fetch.php?code=' + code.value)
                .then(res => res.json())
                .then(data => {

                    console.log(data);
                    data[0].spotify ? spotify.value = 'gsfmusic.gr/spotify/' + data[0].code : spotify.value = ''
                    data[0].youtube ? youtube.value = 'gsfmusic.gr/youtube/' + data[0].code : youtube.value = ''
                    data[0].apple ? apple.value = 'gsfmusic.gr/apple/' + data[0].code : apple.value = ''
                    data[0].amazon ? amazon.value = 'gsfmusic.gr/amazon/' + data[0].code : amazon.value = ''
                    data[0].deezer ? deezer.value = 'gsfmusic.gr/deezer/' + data[0].code : deezer.value = ''
                    data[0].tidal ? tidal.value = 'gsfmusic.gr/tidal/' + data[0].code : tidal.value = ''
                    data[0].soundcloud ? soundcloud.value = 'gsfmusic.gr/soundcloud/' + data[0].code : soundcloud.value = ''
                    data[0].cd ? cd.value = 'gsfmusic.gr/cd/' + data[0].code : cd.value = ''
                })
        }

        copyBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                let link = this.parentElement.parentElement.children[1]
                link.select()
                link.setSelectionRange(0, 99999)
                document.execCommand('copy')

            })
        })
        
        openBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                let link = this.parentElement.parentElement.children[1].value
                let url = "https://" + link
                window.open(url, '_blank').focus()
            })
        })
        
        openAll.addEventListener('click', function () {
            openBtns.forEach(btn => {
                let link = btn.parentElement.parentElement.children[1].value
                if (link == null || link == '') return
                let url = "https://" + link
                window.open(url, '_blank').focus()   
            })
        })



    </script>
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