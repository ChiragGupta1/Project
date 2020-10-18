<?php

/**
 * Connecting to database
 *
 * PHP version 7.2.33.0
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @author   CHIRAG <chirag26oct@gmail.com>
 * @license  https://github.com/License.txt License
 * @link     http://localhost/html/
 */

$siteurl = "http://localhost/Training/MyProject/";

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "chirag26";
$dbname = "store";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>

<script>
  function filterFunction() {
    lowestValue = $('#skip-value-lower').html();
    highestValue = $('#skip-value-upper').html();

    $("#lowest_price").val(lowestValue);
    $("#highest_price").val(highestValue);

    
  }
</script>