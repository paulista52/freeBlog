<?php 
/**
* Controller of posts
* @author Vinícius Becker Bernardini
* @since 13/10/2017
* @updated for filter_input in 28/10/2018
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Using the $_GET to get the operation request
$operation = $_GET['operation'];
switch ($operation) {
	case 'create':
	// Getting the informations using $_POST
	$name = filter_input(INPUT_POST, 'postname');
	$category = filter_input(INPUT_POST,'postcategory');
	$content = filter_input(INPUT_POST, 'postcontent');
	// Instancing the PostsDAO class
	// Passing the values through the constructor
	$p = new PostsDAO($name,$content,$category);
	// Acessing the createPost method to create the post
	$p->createPost();
	// Redirecting to the panel and informing the post has been created
	// Info : cp = created post
	header("Location: ".siteURL().'/freeBlog/view/admin-pages/posts/list-post.php?info=cp');
	break;
	case 'update':
	// Getting the informations using $_POST
	$id = filter_input(INPUT_POST, 'postid');
	$name = filter_input(INPUT_POST, 'postname');
	$category = filter_input(INPUT_POST,'postcategory');
	$content = filter_input(INPUT_POST, 'postcontent');
	// Passing the values through the constructor
	$p = new PostsDAO();
	// Acessing the update post method
	$p->updatePost($id,$name,$content,$category);
	// Redirecting to the panel and informing the post has been updated
	// Info : up = updated post
	header("Location: ".siteURL().'/freeBlog/view/admin-pages/posts/list-post.php?info=up');
	break;
	case 'delete':
	// Getting the post id using superglobal $_GET
	$postID = filter_input(INPUT_GET, 'postID');
	// Instancing the PostsDAO class
	$p = new PostsDAO();
	// Acessing the delete post method to delete post by id
	$p->deletePost($postID);
	// Redirecting to the panel and informing the category has been created
	// Info : dp = deleted post
	header("Location: ".siteURL().'/freeBlog/view/admin-pages/posts/list-post.php?info=dp');
	break;
	// If get invalid operation
	default:
	// Print error message
	echo "Operação inválida";
	break;
}


