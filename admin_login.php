<?php
session_start();
session_destroy();
include('parts/header.php');
?>


<h1>Blog Admin</h1>
<form action="update_post.php" method="post">
    <div>
        <label for="adminEmail">Email: </label>
        <input value="admin@example.com" name="adminEmail" type="email" placeholder="Write Admin Email">
    </div>
    <div>
        <label for="password"> Insert Password:</label>
        <input name="adminPassword" type="password" placeholder="Write Admin password">
    </div>
    <button type="submit" name="sent">Admin login</button>
</form>
<?php include('parts/footer.php'); ?>