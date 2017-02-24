<?php
/**
 * Created by PhpStorm.
 * User: tanushreepatra
 * Date: 18/2/17
 * Time: 2:27 PM
 */

$str1 = 'foobardoo';
$str2 = 'foo';
$pos = strpos($str1, $str2);

if ($pos !== false) {
    echo "\"" . $str1 . "\" contains \"" . $str2 . "\"";
} else {
    echo "\"" . $str1 . "\" does not contain \"" . $str2 . "\"";
}

/***********************************************************/
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$.ajax({
        url: 'http://localhost/test/test1.php',
        method: "POST",
        data: {data: JSON.stringify({a: 'a', b: 'b'})},
        //contentType: "application/x-www-form-urlencoded; charset=utf-8"
        dataType:'json'
    });
</script>

/*************************************************************/
A bread with butter cost 1.10 €. The bread is 1€ more expensive then the butter. How much does the butter cost?

Br + Bu = 1.10
and Bu + 1 = Br
then

bu + br = 1.10
bu - br = -1
----------------
2Bu = .10
Bu = .10/2 = .5

prove Bu + Br = 1.10  or .5 + 1.5 = 1.10

/************************************************************/




