<?php
    session_destroy();
    if(isset($_COOKIE['user'])){
        setcookie('user', '', time() - 3600);
    }
?>

<script>
    window.location = 'main';
</script>