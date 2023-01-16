<?php
    $errorExist = false;
    $rulesWasChecked = 'false';
    $gdprWasChecked = 'false';
    $firstnameError = false;
    $lastnameError = false;
    $emailError = 'false';
    $emailused = 'false';
    if ( isset($_GET['first']) && isset($_GET['last']) && isset($_GET['email']) && isset($_GET['gdpr']) && isset($_GET['rules']) ) {
        $errorExist = true;
    }

    if ( isset($_GET['rules']) ) {
        $rulesWasChecked = $_GET['rules'];
    } 

    if ( isset($_GET['gdpr']) ) {
        $gdprWasChecked = $_GET['gdpr'];
    }

    if ( isset($_GET['firstnameError']) ) {
        $firstnameError = true;
    }

    if ( isset($_GET['lastnameError']) ) {
        $lastnameError = true;
    } 

    if ( isset($_GET['emailError']) ) {
        $emailError = 'true';
    } 

    if ( isset($_GET['emailused']) ) {
        $emailused = 'true';
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSF Music | Giveaway</title>
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/giveaway.css">
    <meta property="og:title" content="Giveaway" />
    <meta property="og:type" content="website" />
    <!-- <meta property="fb:page_id" content="405011660817186" /> -->
    <meta property="og:url" content="gsfmusic.link/giveaway" />
    <meta property="og:image" content="https://gsfmusic.link/images/giveaway-og.jpg" />
    <meta property="og:description" content="Κερδίστε τους 2 νέους ψηφιακούς δίσκους του Νίκου Τζουκόπουλου 'Ψάχνωντας τα
                παλιά' και 'Ταξίδι στο" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FVMQWKX4DJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FVMQWKX4DJ');
    </script>
</head>

<body>
 <?php if ( isset($_GET['finale']) ) { ?>
    <div class="completeMessage">
        <div>
            <?php if ( isset($_GET['success']) ) { ?>
                <p>
                    Η εγγαφή σας ολοκληρώθηκε με επιτυχία!
                    <br>
                    Ένα email έχει σταλεί για επιβεβαίωση.
                </p>
                <button style="background-color: #16c60c;">Νίκος Τζουκόπουλος</button>
            <?php } ?>

            <?php if ( isset($_GET['error']) ) { ?>
                <p>
                    Κάτι πήγε λάθος. Παρακαλούμε επικοινωνήστε με τον διαχειριστή!
                </p>
                <button style="color: #7d0d0d;">Κλείσιμο</button>
            <?php } ?>
            
             <?php if ( isset($_GET['finale']) ) { ?>
                <p>
                    Ο διαγωνισμός έχει λήξει. 
                    Βρείτε όλα τα άλμπουμ του <br>Νίκου Τζουκόπουλου με ένα click:
                </p>
                <button style="background-color: #16c60c;">Νίκος Τζουκόπουλος</button>
            <?php } ?>
        </div>
    <?php } ?>
    </div>
    <div class="preloader">
        <div>
            <img class="logo" src="icons/logo.png" alt="GSF Music">
        </div>
    </div>

    <nav>
        <a href="" title="GSF Music">
            <img class="logo" src="icons/logo.png" alt="GSF Music">
        </a>
        <a href="https://www.gsfrecords.com" title="e-shop">
            <img class="logo" src="icons/nav-eshop.png" alt="eshop">
        </a>
        <a href="https://www.facebook.com/gsfmusicofficial" title="Facebook">
            <img class="logo" src="icons/facebook.png" alt="facebook">
        </a>
        <a href="https://www.youtube.com/channel/UCUTJlf84CFiq-eUU0M6Vf3A?sub_confirmation=1%C2%A8" title="Facebook">
            <img class="logo" src="icons/youtube-icon.png" alt="youtube">
        </a>
    </nav>

    <main>
        <div class="rulesCont">
           <h2>Όροι & Κανόνες</h2>

            <p>
                Δηλώστε συμμετοχή για τον διαγωνισμό μόνο μέσω της σελίδας gsfmusic.link/giveaway
                <br><br>
                Δηλώστε συμμετοχή μέχρι την Τετάρτη 6/01/2021
                <br><br>
                Για την συμμετοχή στον διαγωνισμό δεν απαιτείται καμία οικονομική συναλλαγή
                <br><br>
                Κάθε συμμετοχή κερδίζει 21% έκπτωση για αγορές από το e-shop μας: <a href="https://gsfrecords.com"
                    target="_blank">www.gsfrecords.com</a>
                <br><br>
                Η έκπτωση ισχύει για όλο τον Ιανουάριο
                <br><br>
                Δικαίωμα στον διαγωνισμό έχουν μόνο όσοι είναι άνω των 18 ετών.
                <br><br>
                Ο διαγωνισμός ισχύει μόνο για την Ελλάδα.
                <br><br>
                Το δώρο θα αποσταλεί με το ταχυδρομείο και δεν θα επιβαρυνθείτε με τα μεταφορικά.
                <br><br>
                Ο διαγωνισμός αφορά μόνο φυσικά πρόσωπα και κάθε φυσικό πρόσωπο έχει δικαίωμα να συμμετέχει μία φορά
                στον διαγωνισμό. Η
                συμμετοχή με πολλαπλά email δεν επιτρέπεται.
                <br><br>
                Το δώρο είναι 2 ψηφιακοί δίσκοι και δεν μπορεί να αλλάξει.
                <br><br>
                Ο νικητής θα ανακοινωθεί την επόμενη της λήξης του διαγωνισμού, στη σελίδα μας στο
                <a href="https://www.facebook.com/gsfmusicofficial" target="_blank">Facebook</a>
                <br><br>
                Διατηρούμε το δικαίωμα να ακυρώσουμε την συμμετοχή οποιουδήποτε χρήστη χωρίς προειδοποίηση.
                <br><br>
                Διατηρούμε το δικαίωμα να τροποποιήσουμε τους όρους και τους κανόνες τους διαγωνισμού χωρίς
                προειδοποίηση
            </p>

            <h2>GDPR</h2>
            <h3>ΔΗΛΩΣΗ ΣΥΓΚΑΤΑΘΕΣΗΣ</h3>
            <p>Σύμφωνα με τον Κανονισμό της Ε.Ε. 679/2016 για την Προστασία των Προσωπικών Δεδομένων, χρειαζόμαστε
                τη
                ρητή
                συγκατάθεσή σας για να μπορούμε να επικοινωνήσουμε μαζί σας και να πράξουμε τα δέοντα αναφορικά με τον
                σκοπό
                της
                επικοινωνίας μας.
            </p>

            <h3>Πηγή Πληροφόρησης</h3>
            <p>Συλλέγουμε τα προσωπικά σας δεδομένα ΜΟΝΟ από εσάς προσωπικά, με βάση τις
                προσκομιζόμενες
                από εσάς
                πληροφορίες.
            </p>

            <h3>Ποια προσωπικά δεδομένα συλλέγουμε και επεξεργαζόμαστε.</h3>
            <p>Σας ζητάμε όνομα, επώνυμο και e-mail για τη συμμετοχή σας στο διαγωνισμό αυτό και για να σας ενημερώσουμε για
                επόμενους διαγωνισμούς ή για την κυκλοφορία νέων μουσικών έργων.
            </p>

            <h3>Διαβίβαση δεδομένων</h3>
            <p>ΔΕΝ θα διαβιβάσουμε, εκχωρήσουμε, πουλήσουμε ή με οποιοδήποτε άλλο τρόπο διαθέσουμε με ή χωρίς αντάλλαγμα
                τα στοιχεία σας.
            </p>

            <h3>Χρόνος διατήρησης δεδομένων</h3>
            <p>Θα διατηρήσουμε τα δεδομένα σας για τα επόμενα 10 χρόνια. Με το πέρας του διαγωνισμού θα χρησιμοποιούμε
                το email σας για να σας ενημερώνουμε για επόμενους διαγωνισμούς ή για νέα άλμπουμ.
                Σε κάθε τέτοιο Mail Θα υπάρχει η επιλογή της διαγραφής των στοιχείων σας από τη λίστα μας.
                <br><br>
                Εφόσον δεν επιθυμείτε, να διατηρήσουμε τα στοιχεία σας, για τους παράπανω σκοπούς, θα διαγραφούν μετά τη λήξη της προσφοράς μας για αγορές από το e-shop μας την 1η Φευρουαρίου.
                Εάν δεν επιθυμέιτε να διατηρήσουμε τα στοιχεία σας μέχρι τότε θα πρέπει να μας στείλετε email στο giveaway@gsfmusic.link για να διαγραφούν άμεσα.
            </p>

            <h3>Τα δικαιώματά σας</h3>
            <p>Δικαιούστε να ζητήσετε την επικαιροποίηση των προσωπικών σας δεδομένων οποιδήποτε στιγμή.<br>
                Δικαιούστε να ζητήσετε τη διαγραφή των δεδομένων σας από τα αρχεία μας οποιδήποτε στιγμή.
            </p>

            <button>Κλείσιμο</button>

        </div>
        <div class="header">
            <img class="mainLogo" src="icons/logo.png" alt="GSF Music">
            <h2>
                Κερδιστε<br class="brDesktop"> τους 2 νέους<br class="brMobile"> ψηφιακούς δίσκους<br class="brDesktop"> του Νίκου Τζουκόπουλου
                <p>Με τη συμμετοχή σας στον διαγωνισμό, κρδίζετε 21% έκπτωση για την επόμενη αγορά σας από το <a
                        target="_blank" href="https:gsfrecords.com">e-shop</a> μας
                </p>
            </h2>
        </div>

        <div class="gift">
            <img class="giftImg1" src="images/covers/733.jpg" alt="Gift 1">
            <img class="giftImg2" src="images/covers/734.jpg" alt="Gift 2">
            <a href="https://gsfrecords.com/pegasus/products01/show00.php?code=4000413&pcode=SHOW_PROD4000413" target="_blank" class="cd1" href="">Μάθε περισσότερα</a>
            <a href="https://gsfrecords.com/pegasus/products01/show00.php?code=4000414&pcode=SHOW_PROD4000414" target="_blank" class="cd2" href="">Μάθε περισσότερα</a>
        </div>
        <div class="subscribeCont">
                 <div class="subscibeButtons">
                <a target="_blank" href="https://www.facebook.com/nikostzoukopoulos">
                    <div class="subscribeTzouko">
                        <img class="circle" src="images/artists/tzoukopoulos.jpg" alt="tzoukopoulos">
                        <img class="facebook-logo-long" src="icons/facebook-logo-long.png" alt="facebook">
                    </div>
                </a>
                <a target="_blank" href="https://www.facebook.com/gsfmusicofficial">
                    <div class="subscribeGsf">
                        <img class="circle" src="icons/logo.png" alt="logo">
                        <img class="facebook-logo-long" src="icons/facebook-logo-long.png" alt="facebook">
                    </div>
                </a>
                <a target="_blank"
                    href="https://www.youtube.com/channel/UCUTJlf84CFiq-eUU0M6Vf3A">
                    <div class="subscribeYouTube">
                        <img class="circle" src="icons/logo.png" alt="logo">
                        <img class="youtube-logo-long" src="icons/youtube-logo-long.png" alt="youtube">
                    </div>
                </a>
            </div>
            <div class="formCont">
                <form action="giveawayScript.php" method="post">
                    <label id="firstnameLabel" for="firstname">* Όνομα:</label>
                    <br class="brMobile">
                    <input type="text" id="firstname" name="firstname" maxlength="25" <?php if(isset($_GET['first'])) { echo 'value="'. $_GET['first'] .'"'; }?>>
                    <br class="br">
                    <label id="lastnameLabel" for="lastname">* Επίθετο:</label>
                    <br class="brMobile">
                    <input type="text" id="lastname" name="lastname" maxlength="25" <?php if(isset($_GET['last'])) { echo 'value="'. $_GET['last'] .'"'; }?>>
                    <br>
                    <label class="emailLabel" id="emailLabel" for="email">* Email:</label>
                    <br class="brMobile">
                    <input type="email" id="email" name="email" maxlength="50" <?php if(isset($_GET['email'])) { echo 'value="'. $_GET['email'] .'"'; }?>>
                    <br>
                    <input type="checkbox" id="gdprChecked" name="gdprChecked" value="true" <?php if($gdprWasChecked == "true") { echo 'checked'; }?>>
                    <label for="gdprChecked">Διάβασα το GDPR και δίνω την συγκατάθεση μου</label>
                    <br><class="brMobile">
                    <input type="checkbox" id="rulesChecked" name="rulesChecked" value="true" <?php if($rulesWasChecked == "true") { echo 'checked'; }?>>
                    <label for="rulesChecked">Συμφωνώ με τους όρους και τους κανόνες*</label>
                    <br>
                    <input type="submit" id="submit" name="submit" disabled>
                </form>
            </div>
            <span class="rules">
                Όροι & κανόνες - GDPR
            </span>
        </div>
    </main>

    <script>
        //preloader
        const preloader = document.querySelector('.preloader')

        window.addEventListener('load', () => {

            setTimeout(() => {
                preloader.style.opacity = '0'
                body.style.overflowY = 'auto'
            }, 300)

            setTimeout(() => {
                preloader.style.display = 'none'
            }, 500)
        })

        const youtube = document.querySelector('.subscribeYouTube'),
            body = document.querySelector('body')
        youtube.addEventListener('click', () => {
            console.log('object');
        })

        // Open Rules
        const rules = document.querySelector('.rules'),
            closeRulesCont = document.querySelector('.rulesCont button'),
            rulesCont = document.querySelector('.rulesCont'),
            subscribeCont = document.querySelector('.subscribeCont'),
            gift = document.querySelector('.gift'),
            formCont = document.querySelector('.formCont'),
            subscibeButtons = document.querySelector('.subscibeButtons'),
            links = document.querySelectorAll('.subscibeButtons a'),
            header = document.querySelector('.header')

        let linksClicked = 0,
            rulesOpened = false

        rules.addEventListener('click', () => {
            rulesCont.style.display = 'block'
            rulesCont.style.height = 20 + gift.clientHeight + subscribeCont.clientHeight + 'px'
            rulesCont.style.top = 20 + header.clientHeight + 'px'
            window.scrollTo(0, 0)
            rulesOpened = true
        })
        closeRulesCont.addEventListener('click', () => {
            rulesCont.scrollTop = 0
            rulesCont.style.display = 'none'
        })
        links.forEach(function (link) {
            link.addEventListener('click', function () {
                setTimeout(() => {
                    this.classList.add('visited')
                }, 1000)
                linksClicked++
                if (linksClicked == 3) {
                    if (!rulesOpened) rulesCont.style.display = 'block'
                    formCont.style.display = 'block'
                    rulesCont.style.height = 20 + gift.clientHeight + subscribeCont.clientHeight + 'px'
                    rulesCont.style.top = 20 + header.clientHeight + 'px'
                    document.addEventListener("visibilitychange", function () {
                        if (!document.hidden) {
                            setTimeout(() => {
                                window.scrollTo(0, 0)
                            }, 250)
                        }
                    })
                    subscibeButtons.style.display = 'none'
                }
            }, { once: true })
        })


       

        // Error handling
        const firstname = document.querySelector('#firstname'),
            lastname = document.querySelector('#lastname'),
            firstnameLabel = document.querySelector('#firstnameLabel'),
            lastnameLabel = document.querySelector('#lastnameLabel'),
            email = document.querySelector('#email'),
            emailLabel = document.querySelector('#emailLabel')
        let onlyLetters = /^[a-zA-Zα-ωΑ-Ωά-ώΆ-ΏίϊΐόάέύϋΰήώΆΈΊΌΎΏΉ]+$/


        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            return re.test(String(email).toLowerCase())
        }


        firstname.addEventListener('focusout', function () {
            if (this.classList.contains('error')) {
                if (firstname.value == '' || firstname.value == null) {
                    firstname.classList.add('error')
                    firstnameLabel.classList.add('firstnameLabel')
                    firstnameLabel.setAttribute('data-error', 'Εισάγετε το όνομα σας')
                } else if (!firstname.value.match(onlyLetters) && !firstname.value == '') {
                    firstname.classList.add('error')
                    firstnameLabel.classList.add('firstnameLabel')
                    firstnameLabel.setAttribute('data-error', 'Μη έγκυρος χαρακτήρας')
                } else {
                    firstname.classList.remove('error')
                    firstnameLabel.classList.remove('firstnameLabel')
                }
            }
        })
        lastname.addEventListener('focusout', function () {
            if (this.classList.contains('error')) {
                if (lastname.value == '' || lastname.value == null) {
                    lastname.classList.add('error')
                    lastnameLabel.classList.add('lastnameLabel')
                    lastnameLabel.setAttribute('data-error', 'Εισάγετε το επίθετο σας')
                } else if (!lastname.value.match(onlyLetters) && !lastname.value == '') {
                    lastname.classList.add('error')
                    lastnameLabel.classList.add('lastnameLabel')
                    lastnameLabel.setAttribute('data-error', 'Μη έγκυρος χαρακτήρας')
                } else {
                    lastname.classList.remove('error')
                    lastnameLabel.classList.remove('lastnameLabel')
                }
            }
        })
        email.addEventListener('focusout', function () {
            if (this.classList.contains('error')) {
                console.log(this);
                if (email.value == '' || email.value == null) {
                    email.classList.add('error')
                    emailLabel.classList.add('emailLabel')
                    emailLabel.setAttribute('data-error', 'Εισάγετε το email σας')
                } else if (!validateEmail(email.value)) {
                    email.classList.add('error')
                    emailLabel.classList.add('emailLabel')
                    emailLabel.setAttribute('data-error', 'Μη αποδεκτός τύπος email')
                } else {
                    email.classList.remove('error')
                    emailLabel.classList.remove('emailLabel')
                }
            }
        })





        // Cannot submit if not aggred with rules
        const rulesChecked = document.querySelector('#rulesChecked'),
            form = document.querySelector('form'),
            submitBtn = document.querySelector('#submit')

        rulesChecked.addEventListener('change', () => {
            if (rulesChecked.checked) {
                submitBtn.disabled = false
                submitBtn.style.cursor = 'pointer'
            } else {
                submitBtn.disabled = true
                submitBtn.style.cursor = 'not-allowed'
            }
        }) 
         form.addEventListener('submit', (e) => {
            if (firstname.classList.contains('error')) {
                firstname.classList.remove('error')
                firstnameLabel.classList.remove('firstnameLabel')
            }

            if (lastname.classList.contains('error')) {
                lastname.classList.remove('error')
                lastnameLabel.classList.remove('lastnameLabel')
            }

            if (email.classList.contains('error')) {
                email.classList.remove('error')
                emailLabel.classList.remove('emailLabel')
            }

            if (!rulesChecked.checked) {
                e.preventDefault()
            }

            if (email.value == '' || email.value == null) {
                e.preventDefault()
                email.classList.add('error')
                emailLabel.classList.add('emailLabel')
                emailLabel.setAttribute('data-error', 'Εισάγετε το email σας')
            } else if (!validateEmail(email.value)) {
                e.preventDefault()
                email.classList.add('error')
                emailLabel.classList.add('emailLabel')
                emailLabel.setAttribute('data-error', 'Μη αποδεκτός τύπος email')
            }

            if (firstname.value == '' || firstname.value == null) {
                e.preventDefault()
                firstname.classList.add('error')
                firstnameLabel.classList.add('firstnameLabel')
                firstnameLabel.setAttribute('data-error', 'Εισάγετε το όνομα σας')
            } else if (!firstname.value.match(onlyLetters) && !firstname.value == '') {
                e.preventDefault()
                firstname.classList.add('error')
                firstnameLabel.classList.add('firstnameLabel')
                firstnameLabel.setAttribute('data-error', 'Μη έγκυρος χαρακτήρας')
            }

            if (lastname.value == '' || lastname.value == null) {
                e.preventDefault()
                lastname.classList.add('error')
                lastnameLabel.classList.add('lastnameLabel')
                lastnameLabel.setAttribute('data-error', 'Εισάγετε το επίθετο σας')
            } else if (!lastname.value.match(onlyLetters) && !lastname.value == '') {
                e.preventDefault()
                lastname.classList.add('error')
                lastnameLabel.classList.add('lastnameLabel')
                lastnameLabel.setAttribute('data-error', 'Μη έγκυρος χαρακτήρας')
            }
        })

        /* formCont.style.display = 'block'
        subscibeButtons.style.display = 'none'
        submitBtn.disabled = false */

        document.querySelector('.completeMessage button').addEventListener('click', () => {
            //document.querySelector('.completeMessage').style.display = 'none'
            window.location.href = 'https://www.gsfmusic.link/tzoukopoulos'
        })
    </script>
    <?php 
        
        if ($errorExist) { ?>
        
            <script>

                
                window.scrollTo(0,document.body.scrollHeight)
                
                formCont.style.display = 'block'
                subscibeButtons.style.display = 'none'
                

                <?php
                    if ( $rulesWasChecked == "true" ) { ?>
                        submitBtn.disabled = false
                        submitBtn.style.cursor = 'pointer'
                  <?php  }
                ?>

                <?php 
                    if ( $firstnameError == 'true' ) { ?>
                        firstname.classList.add('error')
                        firstnameLabel.classList.add('firstnameLabel')
                        firstnameLabel.setAttribute('data-error', 'Μη έγκυρος χαρακτήρας')
                  <?php  }
                ?>

                <?php 
                    if ( $_GET['first'] == '' || $_GET['first'] == null ) { ?>
                        firstname.classList.add('error')
                        firstnameLabel.classList.add('firstnameLabel')
                        firstnameLabel.setAttribute('data-error', 'Εισάγετε το όνομα σας')
                  <?php  }
                ?>


                <?php 
                    if ( $lastnameError == 'true' ) { ?>
                        lastname.classList.add('error')
                        lastnameLabel.classList.add('lastnameLabel')
                        lastnameLabel.setAttribute('data-error', 'Μη έγκυρος χαρακτήρας')
                  <?php  }
                ?>

                <?php 
                    if ( $_GET['last'] == '' || $_GET['last'] == null ) { ?>
                        lastname.classList.add('error')
                        lastnameLabel.classList.add('lastnameLabel')
                        lastnameLabel.setAttribute('data-error', 'Εισάγετε το επίθετο σας')
                  <?php  }
                ?>

                <?php 
                    if ( $emailError == 'true' ) { ?>
                        email.classList.add('error')
                        emailLabel.classList.add('emailLabel')
                        emailLabel.setAttribute('data-error', 'Μη αποδεκτός τύπος email')
                  <?php  }
                ?>

                <?php 
                    if ( $_GET['email'] == '' || $_GET['email'] == null ) { ?>
                        email.classList.add('error')
                        emailLabel.classList.add('emailLabel')
                        emailLabel.setAttribute('data-error', 'Εισάγετε το email σας')
                  <?php  }
                ?>

                <?php 
                    if ( $emailused == 'true' ) { ?>
                        email.classList.add('error')
                        emailLabel.classList.add('emailLabel')
                        emailLabel.setAttribute('data-error', 'Το email χρησιμοποιείται')
                  <?php  }
                ?>
            </script>
      <?php }
    ?>
</body>

</html>