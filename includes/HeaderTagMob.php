<header class="headerMob">
    <div class="logo">
        <img src="imgs/roundlogo.png" alt="">
    </div>
    <nav class="navMob">
        <label id="menu"></label>
        <ul class="navUlMob">
            <li class="link indexpageOn"><a href="index.php">Home</a></li>
            <li class="link servicospageOn"><a href="servicos.php">Serviços</a></li>
            <li class="link apppageOn"><a href="app.php">App</a></li>
        </ul>
    </nav>
</header>
<script>
    let menu = document.querySelector("#menu");
    menu.onclick = function() {
        let navUlMob = document.querySelector(".navUlMob")
        if (navUlMob.style.display = "none") {
            navUlMob.style.display = "block"
        } else {
            navUlMob.style.display = "none"
        }
    }
</script>