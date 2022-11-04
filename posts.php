<?php
    include ('db.php');
    include ('comments.php');
?>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-12 blog-main">
            <div class="blog-post">
            <?php
                $sql = "SELECT Id, Title, Body, Author, Created_at FROM posts ORDER BY Created_at DESC";
                $statement = $connection->prepare($sql);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $posts = $statement->fetchAll();
            ?>

            <?php foreach ($posts as $post) { ?>
                <article class="blog-post">
                    <header>
                        <h1 class="blog-post-title">
                            <a href="single_post.php?post_id=<?php echo($post['Id']) ?>">
                            <?php echo($post['Title']); ?></a>
                        </h1>
                        <div class="blog-post-meta">
                            <?php 
                                echo($post['Created_at']);?> by 
                                <?php echo($post['Author']);
                            ?>
                        </div>
                    </header>
                    <div>
                        <p class="blog-post"><?php echo($post['Body']); ?></p>
                    </div>
                </article>
            <?php } ?>
            <ul>
            <?php $comments = $dbManagement->getCommentsByPostId($_GET['post_id']); ?>
            <?php foreach ($comments as $comment) { ?>
                <li>
                    <h6><b><?php echo "$comment[Author]"; ?></b></h6>
                    <h5><?php echo "$comment[Text]"; ?></h5>
            </li>
            <hr>
            <?php } ?>
            </ul>
            </div>
        </div>
    </div>
</main>
