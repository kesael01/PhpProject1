<?php 
require '../admin/lib/php/pgConnect.php'; 
//require '../admin/lib/php/classes/Connexion.class.php';
$id_client=0; 
if(!empty($_GET['id_client'])){ $id=$_REQUEST['id_client']; } 
if(!empty($_POST)){ $id_client= $_POST['id_client'];
	$pdo = Connexion::getInstance($dsn,$user,$pass);
 //$pdo=Database::connect(); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "DELETE FROM client  WHERE id_client = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_client));
        header("Location: index.php");
    
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<link href="css/bootstrap.min.css" rel="stylesheet">
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
	</head>
	 
	<body>

		<br />
		<div class="container">
			 
		<br />
		<div class="span10 offset1">

		<br />
		<div class="row">

		<br />
		<h3>Supprimer un Client</h3>
		<p>

		</div>
		<p>
						   
		<br />
			<form class="form-horizontal" action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
								  <input type="hidden" name="id_client" value="<?php echo $id_client;?>"/>
								  
			Etes-vous sur de vouloir supprimer ?

			<br />
			<div class="form-actions">
									  <button type="submit" class="btn btn-danger">Yes</button>
									  <a class="btn" href="index.php">No</a>
			</div>
			<p>

			</form>
			<p>
		</div>
		<p>

						 
		</div>
		<p>
		<!-- /container -->
		  </body>
</html>