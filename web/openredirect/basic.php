<?php

$redirect = $_GET['url'];
if (isset($redirect)) {
            header("Location: " . $redirect);
}
else {
            show_source(__FILE__);
}
?>
