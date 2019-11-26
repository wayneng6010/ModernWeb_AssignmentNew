<?php
session_start();
session_destroy();
$_SESSION['uLogout'] = "success";
if (null !== (filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_SANITIZE_URL))) {
    header("Location: " . filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_SANITIZE_URL));
} else {
    header('Location: ../index.php');
}
?>