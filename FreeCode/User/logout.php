
<?php
session_start();


$username = $_SESSION[''];


session_destroy();


header("Location: ../UserPage/Home.php");


header("Cache-Control: no-store, no-cache, must-revalidate");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");


echo '<script>
    if (typeof window.history.pushState === "function") {
        window.history.pushState({}, "", "../login.php");
    }
    window.onpopstate = function (event) {
        window.history.pushState({}, "", "../login.php");
    };
</script>';
exit();
?>