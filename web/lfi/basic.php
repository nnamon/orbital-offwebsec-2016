<html>
<head></head>
<body>
<h1>Hackers</h1><br />
<a href="?page=main">Main</a>
<a href="?page=zerocool">Zero Cool</a>
<a href="?page=acidburn">Acid Burn</a>
<!-- we had a page for The Plague but he's gone now -->

<br />
<a href="?src=1">Show source</a>
<br />
<?php
$p = $_GET['page'];
$s = $_GET['src'];
if (isset($p)) {
    chdir("pages");
    include($p . ".php");
    echo "Bio info: " . $bio;
}
else if (isset($s)) {
    show_source(__FILE__);
}
?>

</body>
</html>
