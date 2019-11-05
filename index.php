<?php 

    $host = 'localhost';
    $user = 'root';
    $password = '123456';
    $dbname = 'pdoposts';

    // Set DSN (Data Source Name)
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // For example: Positional params (with limitations)

    ## PDO Query ##

        // $stmt = $pdo->query('SELECT * FROM posts');

        // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        //     echo $row['title'] . '<br>';
            
        // }

        // while($row = $stmt->fetch(PDO::FETCH_OBJ)){

        //     echo $row->title . '<br>';
            
        // }

    ## Prepared Statements (prepare & execute) ##

        // Unsafe
        // $sql = "SELECT * FROM posts WHERE author = '$author'";

        # Fetch multiple posts (positional params & named params) #

            // Positional params

                // // User input
                // $author = 'Dallas';

                // $sql = 'SELECT * FROM posts WHERE author = ?'; // Query that selects all posts by author
                // $stmt = $pdo->prepare($sql);
                // $stmt->execute([$author]); // Inserts $author where '?' is in $sql
                // $posts = $stmt->fetchAll(); // Fetches all of the posts

                // // var_dump($posts); // Displays an array for all posts with the author of "Dallas"
                // foreach($posts as $post){

                //     echo $post->title . "<br>"; // Displays a list of all posts with the author of "Dallas"

                // }

            // Positional params (with limitations)

                // User input
                $author = 'Dallas';
                $is_published = true;
                $limit = 1;

                $sql = 'SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT ?'; // Query that selects all posts by author and that are published
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$author, $is_published, $limit]);
                $posts = $stmt->fetchAll(); // Fetches all of the posts

                foreach($posts as $post){

                    echo $post->title . "<br>"; // Displays only one post with the author of "Dallas"

                }
                
            // Named params

                // // User input
                // $author = 'Dallas';
                // $is_published = true;

                // $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published'; // Query that selects all posts by author and if they have been published
                // $stmt = $pdo->prepare($sql);
                // $stmt->execute(['author' => $author, 'is_published' => $is_published]);
                // $posts = $stmt->fetchAll(); // Fetches all of the posts

                // // var_dump($posts); // Displays an array for all posts with the author of "Dallas" and that have been published
                // foreach($posts as $post){

                //     echo $post->title . "<br>"; // Displays a list of all posts with the author of "Dallas" and that have been published

                // }

        # Fetch Single Post #

            // // User input
            // $id = 1;

            // $sql = 'SELECT * FROM posts WHERE id = :id'; // Query that selects all posts by author and if they have been published
            // $stmt = $pdo->prepare($sql);
            // $stmt->execute(['id' => $id]);
            // $post = $stmt->fetch(); // Fetches only on item

            // echo $post->body; // Outputs "This is post one!" (Note: HTML alternative below)

        # Get Row Count #

            // // User input
            // $author = 'Dallas';

            // $stmt = $pdo->prepare('SELECT * FROM POSTS WHERE author = ?');
            // $stmt->execute([$author]);
            // $postCount = $stmt->rowCount();

            // echo $postCount; // Outputs the total amount of rows where the author is "Dallas" so 3

        # Insert Data #

            // // Data to be inserted in the database
            // $title = 'Post Five';
            // $body = 'This will be post five';
            // $author = 'Chocula';

            // $sql = 'INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)';
            // $stmt = $pdo->prepare($sql);
            // $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);

            // echo 'Post Added'; // Confirms the post has been added to the database

        # Update Data #

            // // Data to be updated in the database
            // $id = '1';
            // $body = 'This post has been updated!';

            // $sql = 'UPDATE posts SET body = :body WHERE id = :id';
            // $stmt = $pdo->prepare($sql);
            // $stmt->execute(['body' => $body, 'id' => $id]);

            // echo 'Post Updated'; // Confirms the post has been updated in the database

        # Delete Data #

            // // Data to be updated in the database
            // $id = '5';
            // $body = 'This post has been deleted!';

            // $sql = 'DELETE FROM posts WHERE id = :id';
            // $stmt = $pdo->prepare($sql);
            // $stmt->execute(['id' => $id]);

            // echo 'Post Deleted'; // Confirms the post has been deleted from the database

        # Search Data #

            // //Data to be searched for
            // $search = '%post%';
            // $search = '%four%'; // Will only search for posts with the title of 'four'
            // $search = '%n%'; // Will only search for posts with 'n' in the title (Post One)

            // $sql = 'SELECT * FROM posts WHERE title LIKE ?';
            // $stmt = $pdo->prepare($sql);
            // $stmt->execute([$search]);
            // $posts = $stmt->fetchAll();

            // foreach($posts as $post){

            //     echo $post->title . '<br>'; // Outputs a list of all available posts titles

            // }

?>

<!-- HTML Example For # Fetch Single Post # -->
<!-- <h1><?php echo $post->title; ?></h1>

<p><?php echo $post->body; ?></p> -->