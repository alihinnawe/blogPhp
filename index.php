<?php require 'functions/database.php' ?>

<?php include 'parts/header.php'; ?>

<table>
    <tr>
        <th>Title</th>
        <th>Content</th>
    </tr>
    <?php

    foreach (fetch_posts() as $post): ?>
        <tr>
            <td class='mt-10'><a href="post.php?id=<?= htmlspecialchars($post['id']) ?>"> <?= htmlspecialchars($post['title']) ?></a></td>
            <td class='mt-10'><?= htmlspecialchars($post['content']) ?></td>
        </tr>
    <?php endforeach;

    ?>
</table>

<?php include 'parts/footer.php'; ?>