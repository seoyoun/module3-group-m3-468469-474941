<?php require 'database.php'; 
session_start();?>

<html>
    <head>
        <title>My News Site</title>
        <link href="news-site-styles.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
    
    	<div class="container">
            <div class="newstorysubmit">
                <a href="index.php">Back to Main Page</a>
            </div>
            <h1>Comments</h1>
                <?php
                    $mysqli = connectdb(); 
                    //select all comments associated with a specific newsid
                    $id = $_GET['id']; // get id through query string

                    // work on this!!!!!!!!!!!!!!!!!!!!
                    $allcomments = mysqli_query($mysqli, "SELECT * from stories");

                    echo "<ul>\n";

                    //this prints out all the comments!
                    while($data = mysqli_fetch_array($allcomments)){
                        echo $data['commenttext'];
                ?>
                        <!-- inserting php is like diving in and out of the water
                        while swimming, even if you break out of the tags for a bit
                        the same variables are still accessible in the same file -->
                            
                        <a href="comment-edit.php?id=<?php echo $data['commentid'];?>">Edit Comment</a>
                        <a href="comment-delete.php?id=<?php echo $data['commentid']; ?>">Delete</a>
                <?php
                        echo "</ul>\n";
                    }
                    
                ?>
            

    	</div>

    </body>
</html>