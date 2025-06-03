<!-- ===================================
     HTML FORMS & PHP PROCESSING
     =================================== -->

<!-- GET METHOD FORM -->
<!DOCTYPE html>
<html lang="en">

<body>
    <form action="index.php" method="get">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Log in">
    </form>
</body>

</html>

<?php
// GET Method - data is appended to URL (visible)
echo $_GET["username"];
echo $_GET["password"];
?>

<!-- POST METHOD FORM -->
<!DOCTYPE html>
<html lang="en">

<body>
    <form action="index.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Log in">
    </form>
</body>

</html>

<?php
// POST Method - data is not visible in URL (more secure)
echo $_POST["username"];
echo $_POST["password"];
?>

<!-- ===================================
     RADIO BUTTONS
     =================================== -->

<form action="index.php" method="post">
    <input type="radio" name="credit_card" value="Visa">Visa<br>
    <input type="radio" name="credit_card" value="Mastercard">Mastercard<br>
    <input type="radio" name="credit_card" value="American Express">American Express<br>
    <input type="submit" name="confirm" value="Confirm">
</form>

<?php
if (isset($_POST["confirm"])) {
    if (isset($_POST["credit_card"])) {
        $credit_card = $_POST["credit_card"];
        echo $credit_card;
    } else {
        echo "Please make a selection";
    }
}
?>

<!-- ===================================
     CHECKBOXES
     =================================== -->

<form action="index.php" method="post">
    <input type="checkbox" name="pizza" value="Pizza">Pizza<br>
    <input type="checkbox" name="burgers" value="Burgers">Burgers<br>
    <input type="checkbox" name="hotdogs" value="Hotdogs">Hotdogs<br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST["pizza"])) {
    echo "You like pizza<br>";
}
if (isset($_POST["burgers"])) {
    echo "You like burgers<br>";
}
if (isset($_POST["hotdogs"])) {
    echo "You like hotdogs<br>";
}
?>

<?php
// ===================================
// MYSQL DATABASE CONNECTION
// ===================================

// Database connection variables
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "myDB";

// Establish connection
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if ($conn) {
    echo "You are connected!";
} else {
    die("Connection failed: " . mysqli_connect_error());
}

// ===================================
// INSERT DATA INTO DATABASE
// ===================================

$sql = "INSERT INTO users (user, password) VALUES ('Spongebob', 'pineapple')";

if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Using prepared statements (safer)
$stmt = mysqli_prepare($conn, "INSERT INTO users (user, password) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $username, $password);

$username = "Patrick";
$password = "rock123";
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// ===================================
// RETRIEVE DATA FROM DATABASE
// ===================================

$sql = "SELECT * FROM users WHERE user = 'Spongebob'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Fetch data
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["id"] . "<br>";
        echo $row["user"] . "<br>";
        echo $row["password"] . "<br>";
        echo $row["reg_date"] . "<br>";
    }
} else {
    echo "No results found";
}

// ===================================
// UPDATE DATA IN DATABASE
// ===================================

$sql = "UPDATE users SET password = 'newpassword123' WHERE user = 'Spongebob'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// ===================================
// DELETE DATA FROM DATABASE
// ===================================

$sql = "DELETE FROM users WHERE user = 'Patrick'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// ===================================
// COMPLETE LOGIN SYSTEM EXAMPLE
// ===================================

// Registration form processing
if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (user, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registration successful";
    } else {
        echo "Registration failed";
    }
    mysqli_stmt_close($stmt);
}

// Login form processing
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE user = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
    mysqli_stmt_close($stmt);
}

// Close database connection
mysqli_close($conn);
?>

<!-- ===================================
     COMPLETE REGISTRATION FORM
     =================================== -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
</head>

<body>
    <h2>Register</h2>
    <form action="register.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="register" value="Register">
    </form>

    <h2>Login</h2>
    <form action="login.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>