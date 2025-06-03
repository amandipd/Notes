<?php
// ===================================
// PHP FUNDAMENTALS & CORE FEATURES
// ===================================

// INTRODUCTION
// PHP = PHP Hypertext Processor

// Basic output
echo "Hello World";
echo "<br>"; // new line in HTML

// ===================================
// VARIABLES
// ===================================

$name = "John";
echo $name;
echo "Hello $name"; // embed variable in string
echo "Price: \$19.99"; // escape dollar sign
$total = $quantity * $price;

// ===================================
// MATH FUNCTIONS
// ===================================

$total = abs(-3); // 3
$total = round(3.99); // 4, also floor(), ceil()
$total = pow($x, $y); // x to the power of y
$total = sqrt($x); // square root
$total = pi(); // pi constant
$total = rand(); // random number up to 2 billion
$total = rand(1, 100); // random between 1-100

// ===================================
// CONDITIONALS
// ===================================

$age = 21;
if ($age >= 18) {
    echo "You may enter this site";
}

// Logical Operators
// && (and), || (or), ! (not)

// Switch statement - more efficient than multiple elseif
$grade = "A";
switch ($grade) {
    case "A":
        echo "You did great";
        break;
    case "B":
        echo "You did good";
        break;
    case "C":
        echo "You did okay";
        break;
    default:
        echo "$grade is not valid";
}

// ===================================
// LOOPS
// ===================================

// For loop
for ($i = 0; $i < 5; $i++) {
    echo "Hello <br>";
}

// While loop
$counter = 0;
while ($counter < 10) {
    $counter++;
    echo $counter . "<br>";
}

// ===================================
// ARRAYS
// ===================================

// Indexed arrays
$foods = array("apple", "orange", "banana", "coconut");
echo $foods[0]; // apple

// Loop through array
foreach ($foods as $food) {
    echo $food . "<br>";
}

// Array functions
array_push($foods, "pineapple", "kiwi"); // add to end
array_pop($foods); // remove last element
array_shift($foods); // remove first element
$reversed_foods = array_reverse($foods); // returns new array
$count = count($foods); // count elements

// Associative Arrays (HashMap)
$capitals = array(
    "USA" => "Washington D.C.",
    "Japan" => "Kyoto",
    "South Korea" => "Seoul",
    "India" => "New Delhi"
);

echo $capitals["USA"]; // Washington D.C.

// Loop through key-value pairs
foreach ($capitals as $key => $value) {
    echo "$key = $value <br>";
}

// Array functions for associative arrays
$keys = array_keys($capitals); // get all keys
$values = array_values($capitals); // get all values
$capitals = array_flip($capitals); // swap keys and values
$capitals = array_reverse($capitals); // reverse order

// ===================================
// ISSET() AND EMPTY()
// ===================================

$username = "john";
echo isset($username); // outputs 1 (true)

if (isset($username)) {
    echo "Username is set";
}

if (empty($username)) { // true if not declared, null, or empty
    echo "Username is empty";
}

// ===================================
// FUNCTIONS
// ===================================

function happy_birthday($first_name)
{
    echo "Happy Birthday to $first_name";
}

happy_birthday("SpongeBob");

// ===================================
// STRING FUNCTIONS
// ===================================

$username = "Bro Code";
$username = strtolower($username); // convert to lowercase
$username = strtoupper($username); // convert to uppercase
$username = str_pad($username, 20, "/"); // pad string
$username = strrev($username); // reverse string
$username = str_shuffle($username); // shuffle characters
$equals = strcmp($username, "Bro Code"); // compare strings (0 if same)
$count = strlen($username); // string length
$count = strpos($username, " "); // find position of character
$firstname = substr($username, 0, 3); // extract substring

$phone = "123-456-7890";
$phone = str_replace("-", "", $phone); // replace characters
echo $phone; // 1234567890

$fullname = explode(" ", $username); // split string into array

// ===================================
// INCLUDE FILES
// ===================================

include("header.html"); // include external file
// Good for including headers and footers in every page

// ===================================
// COOKIES
// ===================================

// Set cookie (name, value, expiration, path)
setcookie("fav_food", "pizza", time() + 86400 * 30, "/"); // 30 days
setcookie("fav_dessert", "ice cream", time() + 0, "/"); // setting time to 0 deletes

// Access cookie
echo $_COOKIE["fav_food"] . "<br>";

if (isset($_COOKIE["fav_food"])) {
    echo "BUY SOME " . $_COOKIE["fav_food"];
}

// ===================================
// SESSIONS
// ===================================

// Sessions store information across multiple pages
session_start();

$_SESSION["username"] = "BroCode";
$_SESSION["password"] = "pizza123";

// Login functionality
if (isset($_POST["login"])) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    header("Location: home.php"); // redirect
}

// Logout functionality
if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: index.php");
}

// ===================================
// $_SERVER SUPERGLOBAL
// ===================================

foreach ($_SERVER as $key => $value) {
    echo "$key = $value <br>";
}

// ===================================
// PASSWORD HASHING
// ===================================

$password = "pizza123";
$hash = password_hash($password, PASSWORD_DEFAULT);

if (password_verify("pizza123", $hash)) {
    echo "Password is correct";
} else {
    echo "Password is incorrect";
}
