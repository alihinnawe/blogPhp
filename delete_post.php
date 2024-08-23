<?php
include("functions/database.php");

$posts = fetch_posts();

include('parts/header.php'); ?>

<h1>Blog</h1>
<h2>Admin page</h2>

<?php
if (isset($_POST["id"]) && isset($_POST["sent1"])) :

    delete_post($_POST["id"]);
?>

    <h1>Record deleted successfully</h1>


    </form>

<?php
    include('parts/footer.php');
    exit();
endif;
?>



<?php
if (isset($_POST["id"]) && isset($_POST["sent"])) :
?>

    <h1><?php echo htmlspecialchars($_POST["title"]); ?></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_POST["id"]); ?>">
        <input type="hidden" name="ok" value="ok">
        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">return to main page</a>
        <button type="submit" name='sent1'>Delete record!</button>
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
        <button type="submit" name='sent'>Delete</button>
    </form>

<?php
endforeach;
include('parts/footer.php');
?>