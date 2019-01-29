<?php 

function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER By id DESC";
	$result = mysqli_query($conn, $sql) or die ("Error in Selecting " . mysqli_error($conn));;
	
	$posts = array();
	
	while ($row = $result->fetch_assoc()) {
	$posts[] = $row;
	}
	
	return $posts;
	}
function getPublishedNews() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM news WHERE published=true ORDER By id DESC";
	$result = mysqli_query($conn, $sql) or die ("Error in Selecting " . mysqli_error($conn));;
	
	$news = array();
	
	while ($row = $result->fetch_assoc()) {
	$news[] = $row;
	}
	
	return $news;
	}
function getPost($slug){
	global $conn;

	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug'";
	$result = mysqli_query($conn, $sql);

	$post = mysqli_fetch_assoc($result);
	return $post;
}
function getNews($slug){
	global $conn;
	$news_slug = $_GET['news-slug'];
	$sql = "SELECT * FROM news WHERE slug='$news_slug' AND published=true";
	$result = mysqli_query($conn, $sql);
}

function setComments($conn){
    if(isset($_POST['comment-submit'])){
		$user = $_POST['username'];
        $comment = $_POST['comment_text'];
		$post = $_POST['post_title'];
         $sql = "INSERT INTO comments (body, created_at, user, post) VALUES ('$comment', now(), '$user', '$post')";
		 $result = mysqli_query($conn,$sql);
		 if ($result){
			 header('location: comment.php?success=comment_posted');
			 exit();
		 }
    }
}
function getComments($conn){
		if (isset($_GET['post-slug'])) {
			$post = $_GET['post-slug'];
		}
		if($post == 'forest-runner'){
		 $sql = "SELECT * FROM comments WHERE post='FOREST RUNNER'ORDER BY created_at DESC LIMIT 10";
		}
		elseif($post == 'python-quiz'){
		$sql = "SELECT * FROM comments WHERE post='PYTHON QUIZ' ORDER BY created_at DESC LIMIT 10";
		}
		 $result = mysqli_query($conn,$sql);
		 while($row = mysqli_fetch_assoc($result)){
            echo "<div class='comment-wrap'><p class='author'>Username: ";
			echo $row['user'].'<br>';
			echo "</p>";
			echo $row['created_at'].'<br>';
			echo '<hr><br>';
			echo "<p class='comment_body'>";
			echo $row['body'];
			echo "</p>";
            echo "</div>";
            
    }
}
?>