<?php
include("functions/database.php");

$ok = false;
if (isset($_POST['sent'])) {

    $title = (isset($_POST["title"]) && is_string($_POST["title"]))
        ? $_POST["title"] : "";
    $title = htmlspecialchars($title);
    $content = (isset($_POST["content"]) && is_string($_POST["content"]))
        ? $_POST["content"] : "";
    $content = htmlspecialchars($content);

    if (!empty(trim($title)) && !empty(trim($content))) {

        fetch_insert_post($title, $content);
        $ok = true;
    }
}
include('parts/header.php'); ?>

<h1>Blog</h1>
<h2>Eintrag erstellen</h2>

<?php if (!$ok) : ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Titel</label>
            <input name="title" class="form-control" id="title" placeholder="Bitte einen Titel eingeben!">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Inhalt</label>
            <textarea class="form-control" id="content" name="content" rows="8" placeholder="Bitte den Inhalt hier eingeben!"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-3" name="sent">Submit</button>
    </form>
    <div class="alert alert-warning">
        <strong>Hinweis!</strong> Bitte alle Felder ausfüllen.
    </div>
<?php else : ?>

    <div class="alert alert-success">
        <strong>Danke!</strong> Eintrag gespeichert.
    </div>

<?php
endif;
include('parts/footer.php');
?>