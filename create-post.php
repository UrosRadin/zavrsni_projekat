<main role="main" class="container">
    <div class="row">
            <?php 
                include ('header.php');
                include ('sidebar.php');
                include ('db.php')
            ?>  
        <!-- ovde ce ici forma za kreiranje posta -->
    <?php 
    if(isset($_POST['submit'])) {
        $body = $_POST['Body'];
        $title = $_POST['Title'];
        $author = $_POST['Author'];

        if(!empty($body) || empty($title) || empty($author)) {
            echo("Nisu svi podaci popunjeni");
        } else {
            $currentDate = date('Y-m-d h:i');
            $sql = "INSERT INTO posts (Body, Title, Author, Created_at) VALUES('$body', '$title', '$author', '$currentDate')";

            $statement = $connection->prepare($sql);
            $statement->execute();

            header("Location: ./index.php");
        }
    }
    ?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">
    <title>Vivify Academy Blog - Homepage</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="va-l-page va-l-page--homepage">

<?php
    include('header.php');
    ?>
    <div class="form-wrapper">
    <h1 class="c-p-title"> Create new post </h1>
    <form action="create-post.php" method="POST" id="posts">
        <ul class="flex-outer">
            <li>
                <label for="Title">Title</label>
                <input type="text" id="Title" name="Title" placeholder="Enter title">
            </li>
            <li>
                <label for="category">Author</label>
                <input type="text" name="category" id="category" placeholder="Enter Category">
            </li>
            <li>
                <label for="Body">Body</label>
                <textarea name="Body" placeholder="Enter body" rows="10" id="bodyPosts"></textarea><br>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>
</div> <?php include('footer.php'); ?>  </div>
</main>

