<?php
session_start();

// Function to clean user input
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = preg_replace('/[^a-zA-Z0-9@.]/', '', $data); // Custom cleaning using preg_replace()
    return $data;
}

// Check if user is logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // If logged in, show welcome message and logout link
    echo "<h1>Hello, ".$_SESSION['username']."!</h1><br>";
    echo '<a href="ch13.php?action=logout">Logout</a>';
} else {
    // If not logged in, show login form
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = clean_input($_POST['username']);
        $password = clean_input($_POST['password']);

        // Check credentials
        if($username === 'admin' && $password === 'password') {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: ".$_SERVER['PHP_SELF']);
        } else {
            $error = "Invalid username or password.";
        }
    }
}
// Logout --- does not work
if(isset($_GET['action']) && $_GET['action'] === 'logout') {
    // Unset all session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect to the same page
    header("location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if(isset($error)) echo $error."<br>"; ?>
    <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) { ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    <?php } ?>
</body>
</html>

