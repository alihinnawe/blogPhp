
<?php
$city_name = "";
$datensaetze = [];
try {
    $db = new PDO(
        "mysql:dbname=blog;host=localhost;charset=utf8",
        "blog",
        "X"
    );
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "SELECT * FROM posts";
    $statement = $db->query($sql);
    $datensaetze = $statement->fetchAll();
} catch (PDOException $e) {
    echo 'Fehler: ' . htmlspecialchars($e->getMessage());
    exit();
}

function fetch_posts()

{
    global $db;
    $sql = "SELECT * FROM posts; ";
    return $db->query($sql);
}

function fetch_post($id)

{

    global $db;
    $sql = "SELECT * FROM posts where id=:id; ";
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    return  $query->fetch();
}

function fetch_insert_post($title, $content)
{
    global $db;
    $params = ["title" => $title, "content" => $content];
    $sql = "INSERT INTO posts (title, content) VALUES (:title, :content);";
    $query_insert = $db->prepare($sql);
    $query_insert->execute($params);
}

// function fetch_insert_post($title, $content)
// {
//     global $db;
//     $sql = "INSERT INTO posts (title, content) VALUES (?, ?);";
//     $query_insert = $db->prepare($sql);
//     $query_insert->execute([$title, $content]);
// }

// function fetch_insert_post($title, $content)
// {
//     global $db;
//     $sql = "INSERT INTO posts (title, content) VALUES (:title, :content);";
//     $query_insert = $db->prepare($sql);

//     // Explicitly bind the parameters
//     $query_insert->bindParam(':title', $title);
//     $query_insert->bindParam(':content', $content);

//     // Execute the query
//     $query_insert->execute();
// }

function delete_post($id)
{
    global $db;
    $sql = "DELETE FROM posts where posts.id= :id;";
    $query_delete = $db->prepare($sql);
    $query_delete->bindParam(':id', $id);
    $query_delete->execute();
}

function update_post($id, $title, $content)
{
    global $db;
    $sql = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
    $query_update = $db->prepare($sql);
    $query_update->bindParam(':title', $title);
    $query_update->bindParam(':content', $content);
    $query_update->bindParam(':id', $id);
    $query_update->execute();
}

function admin_return($adminEmail)
{
    global $db;
    $sql = "SELECT password FROM `admin` WHERE user_name = :adminEmail";

    $query = $db->prepare($sql);
    $query->bindParam(':adminEmail', $adminEmail);
    $query->execute();

    // Fetch the password as a string
    $password = $query->fetch();

    // Optionally, log or handle a case where no result is found

    return $password;
}
