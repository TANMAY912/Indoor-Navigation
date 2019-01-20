<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$target_dir = "images/";
$target_file = $target_dir.basename($_FILES["myimage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$upload_image=$_FILES['myimage'] ['tmp_name'];
// $row= $_FILES['myimage']['name'];
$filename=$_FILES["myimage"]["name"];
$extension=end(explode(".", $filename));
$row=$_POST["name"] .".".$extension;
move_uploaded_file($_FILES['myimage']['tmp_name'],$row);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["myimage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>
<script type="text/javascript">
	var nav = "trial.php?RN=" + "<?php echo $row ?>" ;
	window.location.href =nav;
</script>
<p  style="text-align:center">1. <script> document.write('<a href="' + nav + '">Navigation</a>'); </script></p>
</body>
</html>
