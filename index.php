<form  method="post">

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
    </div>


</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
require_once 'code/database.php';
$db = new Database();
$db->login($_POST['username'], $_POST['password']);
}

?>