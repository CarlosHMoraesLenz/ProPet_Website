<script>
    let index = document.querySelector(".indexpageOn");
    let servicos = document.querySelector(".servicospageOn");
    let app = document.querySelector(".apppageOn");

    index.onclick = function() {
        window.location.href("index.php");
    }

    servicos.onclick = function() {
        window.location.href("servicos.php");
    }

    app.onclick = function() {
        window.location.href("app.php");
    }
</script>