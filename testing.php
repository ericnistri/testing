<?php
include 'header.php';

if(isset($_POST['submit'])) {
    //validate entries
    echo 'form submitted';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <div class="new-user">
        <h2>Create new user</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label>Username:</label>
            <input type="text" name="username">

            <label>Email:</label>
            <input type="text" name="email">

            <input type="submit" name="submit" value="submit">
        </form>
    </div>
    
</body>
</html>