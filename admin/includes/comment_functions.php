<?php 
function getComments($conn, $title){
    if($title == 'FOREST RUNNER'){
     $sql = "SELECT * FROM comments WHERE post='FOREST RUNNER'ORDER BY created_at DESC";
    }
    elseif($title == 'PYTHON QUIZ'){
    $sql = "SELECT * FROM comments WHERE post='PYTHON QUIZ' ORDER BY created_at DESC";
    }
    
     $result = mysqli_query($conn,$sql);
     while($row = mysqli_fetch_assoc($result)){
        echo "<div class='comment-wrap'><p class='author'>Username: ";
        echo $row['user'].'<br>';
        echo 'Post: ' .$row['post'].'<br>';
        echo "</p>";
        echo $row['created_at'].'<br>';
        echo '<hr><br>';
        echo "<p class='comment_body'>";
        echo $row['body'];
        echo "</div></p>";
        
}
}
?>