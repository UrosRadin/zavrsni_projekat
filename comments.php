<?php include ('db.php');
 function getCommentsByPostId($id) {
    $sql = "SELECT Author, Text FROM comments WHERE comments.posts_id = $id";
    $statement = $this->connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    return $statement->fetchAll();
}   
?>