<?php

session_start();
include("functions/database.php");

$adminEmail = (isset($_POST["adminEmail"]) && is_string($_POST["adminEmail"])) ? $_POST["adminEmail"] : "";
$adminPassword = (isset($_POST["adminPassword"]) && is_string($_POST["adminPassword"])) ? $_POST["adminPassword"] : "";

$admin_info = admin_return($adminEmail);
$admin_login_details = password_verify($adminPassword, $admin_info);
if ($admin_login_details) {
    echo 'verified';
    $_SESSION['adminEmail'] = $adminEmail;
    echo  $adminEmail;
};


if (!isset($_SESSION['adminEmail'])) : ?>


    <a href="admin_login.php">Return to main page</a>

<?php
    include('parts/footer.php');
    exit();
endif;
$posts = fetch_posts();

include('parts/header.php'); ?>

<h1>Blog</h1>
<h2>Admin page</h2>


<?php
if (isset($_POST["id"]) && isset($_POST["finalDelete"])) :

    delete_post($_POST["id"]);
?>

    <h1>Record deleted successfully</h1>
    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">Return to the main page</a>

<?php
    include('parts/footer.php');
    exit();
endif;
?>


<?php
if (isset($_POST["id"]) && isset($_POST["finalUpdate"])) :

    update_post($_POST["id"], $_POST["title"], $_POST["content1"]);

?>
    <h1>Record updated successfully</h1>
    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">Return to the main page</a>
<?php
    include('parts/footer.php');
    exit();
endif;
?>

<?php
if (isset($_POST["id"]) && isset($_POST["update"])) :
?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_POST["id"]); ?>">
        <input name="title" value="<?php echo $_POST["title"]; ?>">
        <textarea name="content1" rows="8"><?php echo htmlspecialchars($_POST["content"]); ?></textarea>
        <button type="submit" name='finalUpdate'>Record update!</button>
    </form>

<?php
    include('parts/footer.php');
    exit();
endif;
?>


<?php
if (isset($_POST["id"]) && isset($_POST["delete"])) :
?>

    <h1><?php echo htmlspecialchars($_POST["title"]); ?></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_POST["id"]); ?>">
        <input type="hidden" name="ok" value="ok">
        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">return to main page</a>
        <button type="submit" name='finalDelete'>Delete record!</button>
    </form>

<?php
    include('parts/footer.php');
    exit();
endif;
?>


<?php foreach ($posts as $post) : ?>


    <h1><?php echo $post["title"]; ?></h1>
    <p><?php echo $post["content"]; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $post["id"]; ?>">
        <input type="hidden" name="title" value="<?php echo $post["title"]; ?>">
        <textarea style='display:none' name="content"><?php echo htmlspecialchars($post["content"]); ?></textarea>
        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><button type="submit" name='update'>Update post</button></a>
        <button type="submit" name='delete'>Delete post</button>

    </form>

<?php
endforeach;
include('parts/footer.php');

?>