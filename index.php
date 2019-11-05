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

                // User input
                // $author = 'Dallas';

                // $sql = 'SELECT * FROM posts WHERE author = ?'; // Query that selects all posts by author
                // $stmt = $pdo->prepare($sql);
                // $stmt->execute([$author]); // Inserts $author where '?' is in $sql
                // $posts = $stmt->fetchAll(); // Fetches all of the posts

                // // var_dump($posts); // Displays an array for all posts with the author of "Dallas"
                // foreach($posts as $post){

                //     echo $post->title . "<br>"; // Displays a list of all posts with the author of "Dallas"

                // }
                
            // Named params

                // User input
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

?>

<!-- HTML Example For # Fetch Single Post # -->
<!-- <h1><?php echo $post->title; ?></h1>

<p><?php echo $post->body; ?></p> -->