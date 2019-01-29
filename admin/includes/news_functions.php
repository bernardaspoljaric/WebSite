<?php 
$news_id = 0;
$isEditingNews = false;
$published = 0;
$title = "";
$news_slug = "";
$body = "";
$featured_image = "";

function getAllNews()
{
	global $conn;

	if ($_SESSION['user']['role'] == "Admin") {
		$sql = "SELECT * FROM news";
	} elseif ($_SESSION['user']['role'] == "User") {
		$user_id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM news WHERE user_id=$user_id";
	}
	$result = mysqli_query($conn, $sql);
	$news = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_news = array();
	foreach ($news as $post) {
		$post['User'] = getNewsAuthorById($post['user_id']);
		array_push($final_news, $post);
	}
	return $final_news;
}

function getNewsAuthorById($user_id)
{
	global $conn;
	$sql = "SELECT username FROM users WHERE id=$user_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		return mysqli_fetch_assoc($result)['username'];
	} else {
		return null;
	}
}

if (isset($_POST['create_news'])) { createNews($_POST); }

if (isset($_GET['edit-news'])) {
	$isEditingNews = true;
	$news_id = $_GET['edit-news'];
	editNews($news_id);
}

if (isset($_POST['update_news'])) {
	updateNews($_POST);
}

if (isset($_GET['delete-news'])) {
	$news_id = $_GET['delete-news'];
	deleteNews($news_id);
}

function createNews($request_values)
	{
		global $conn, $errors, $title, $featured_image, $topic_id, $body, $published;
		$title = esc($request_values['title']);
		$body = htmlentities(esc($request_values['body']));
		if (isset($request_values['publish'])) {
			$published = esc($request_values['publish']);
		}
		
		$news_slug = makeSlug($title);
		
		if (empty($title)) { array_push($errors, "Potreban naziv."); }
		if (empty($body)) { array_push($errors, "Potreban sadržaj."); }
		
	  	$featured_image = $_FILES['featured_image']['name'];
	  	if (empty($featured_image)) { array_push($errors, "Početna slika potrebna."); }
	  	
	  	$target = "../static/images/" . basename($featured_image);
	  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
	  		array_push($errors, "Neuspješno učitavanje slike.");
	  	}
		
		$news_check_query = "SELECT * FROM news WHERE slug='$news_slug' LIMIT 1";
		$result = mysqli_query($conn, $news_check_query);

		if (mysqli_num_rows($result) > 0) { 
			array_push($errors, "Već postoji novost sa tim nazivom.");
		}
		
		if (count($errors) == 0) {
			$query = "INSERT INTO news (user_id, title, slug, image, body, published, created_at, updated_at) VALUES(1, '$title', '$news_slug', '$featured_image', '$body', $published, now(), now())";
			if(mysqli_query($conn, $query)){
				$_SESSION['message'] = "Uspješno objavljena novost.";
				header('location: news.php');
				exit(0);
			}
		}
	}
	function editNews($role_id)
	{
		global $conn, $title, $news_slug, $body, $published, $isEditingNews, $news_id;
		$sql = "SELECT * FROM news WHERE id=$role_id LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$news = mysqli_fetch_assoc($result);
		$title = $news['title'];
		$body = $news['body'];
		$published = $news['published'];
	}

	function updateNews($request_values)
	{
		global $conn, $errors, $news_id, $title, $featured_image, $topic_id, $body, $published;

		$title = esc($request_values['title']);
		$body = esc($request_values['body']);
		$news_id = esc($request_values['news_id']);
		$news_slug = makeSlug($title);

		if (empty($title)) { array_push($errors, "Potreban naslov."); }
		if (empty($body)) { array_push($errors, "Potreban sadržaj."); }

		if (isset($_POST['featured_image'])) {

		  	$featured_image = $_FILES['featured_image']['name'];
		  	// image file directory
		  	$target = "../static/images/" . basename($featured_image);
		  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
		  		array_push($errors, "Neuspješno učitavanje slike.");
		  	}
		}

		if (count($errors) == 0) {
			$query = "UPDATE news SET title='$title', slug='$news_slug', views=0, image='$featured_image', body='$body', published=$published, updated_at=now() WHERE id=$news_id";
			}
			$_SESSION['message'] = "Uspješno uređivanje objave.";
			header('location: news.php');
			exit(0);
		}
	function deleteNews($news_id)
	{
		global $conn;
		$sql = "DELETE FROM news WHERE id=$news_id";
		if (mysqli_query($conn, $sql)) {
			$_SESSION['message'] = "Novost obrisana.";
			header("location: news.php");
			exit(0);
		}
	}
?>