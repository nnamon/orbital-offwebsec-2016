<html>
<head></head>
<body>

<a href="?file=one">One</a>
<a href="?file=two">Two</a>
<a href="?file=three">Three</a>
<a href="?file=four">Four</a>
<a href="?file=five">Five</a>

<br />
<a href="?src=1">Show source</a>
<?php
$f = $_GET['file'];
$s = $_GET['src'];
if (isset($f)) {
    echo "Number Ascii Art++";
    echo "<pre>"
    echo file_get_contents("nums/" . $f);
    echo "</pre>"
}
else if (isset($s)) {
    show_source(__FILE__);
}
?>

</body>
</html>
