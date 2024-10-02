<?php 
if (strpos($_SERVER['REQUEST_URI'], '/album/') !== false || strpos($_SERVER['REQUEST_URI'], '/eshoppp/') !== false) {
    $basePath = "../";
} else {
    $basePath = '';
}
?>


<link rel="stylesheet" href="<?php echo $basePath; ?>css/header.css" />

<header>
    <a href="https://gsfmusic.gr" title="GSF Music" class="logo" class="iconHover">
        <img src="<?php echo $basePath; ?>icons/GSF_logo_white.png" alt="Αρχική">
    </a>
    <a target="_blank" href="https://www.gsfrecords.com" title="E-shop" class="iconHover">
        <img src="<?php echo $basePath; ?>icons/nav-eshop.png" alt="eshop">
    </a>
    <a target="_blank" href="https://www.facebook.com/gsfmusicofficial" title="Facebook" class="iconHover">
        <img src="<?php echo $basePath; ?>icons/facebook.png" alt="facebook">
    </a>
    <a target="_blank" href="https://www.instagram.com/gsfmusicofficial/" title="Instagram" class="iconHover">
        <img src="<?php echo $basePath; ?>icons/instagram.png" alt="youtube">
    </a>
    <a target="_blank" href="https://www.youtube.com/channel/UCUTJlf84CFiq-eUU0M6Vf3A?sub_confirmation=1%C2%A8" title="YouTube" class="iconHover">
        <img src="<?php echo $basePath; ?>icons/youtube-icon.png" alt="youtube">
    </a>
    <a target="_blank" href="https://www.tiktok.com/@gsfmusic" title="TikTOk" class="iconHover">
        <img src="<?php echo $basePath; ?>icons/tiktok-icon.png" alt="tiktok">
    </a>
    <a href="" title="Email" class="emailMenuIcon">
        <img src="<?php echo $basePath; ?>icons/email.png" alt="email">
        <span class="emailTag">csamouridis@gsfmusic.gr</span>
    </a>
</header>

<link rel="stylesheet" href="<?php echo $basePath; ?>css/cart.css" />

<div class="cart">
    <a href="">
    <span class="quantity">0</span>&nbsp;<span class="item">προϊόν</span>&nbsp;στο καλάθι&nbsp;&nbsp;&nbsp;&nbsp;<span class="ckeckout">Ταμείο &#8594;</span>
    </a>
</div>

<script src="../js/cart.js" defer></script>