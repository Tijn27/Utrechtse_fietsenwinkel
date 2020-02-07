<!-- navbar -->
<style>
    #active_logout{
        color: white;
    }
</style>

<!-- pagina -->
<?php 
    session_unset();

    session_destroy();

    echo '<br><div class="alert alert-success" role="alert">U bent succesvol uitgelogd</div>';
    header("Refresh: 2; url=./index.php?content=login");
    exit();
?>