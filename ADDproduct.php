<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	form{
text-align: center;
background-color: burlywood;
margin-left:400px ;
margin-right: 400px;
padding-top: 60px;
padding-bottom: 60px;
border-radius: 30px;
}
form:hover{

	background-color: cadetblue;
}
</style>
</head>
<body>
	<h1 style="text-align: center;"></h1>
		<form method="POST" action=""  enctype="multipart/form-data">
		<label for="pname">enter your product name</label><br>
				<input type="text" name="pname"style="border-radius: 25px;"><br>
				<label for="pprice">enter your product price</label><br>
				<input type="text" name="pprice"style="border-radius: 25px;"><br>
				<label for=pcompany>enter your product company </label><br>
	        	<input type="text" name="pcompany" id="pcompany"style="border-radius: 25px;"><br>
				<label for=pquantity>enter your product quantity</label><br>
		        <input type="number" name="pquantity" id="pquantity"style="border-radius: 25px;"><br>
	        	<label for=pdescription>enter description</label><br>
	        	<input type="text" name="pdescription" id="pdescription"style="border-radius: 25px;"><br>
				<input type="file" name="uploadfile1" id="uploadfile1" value="" />
				<input type="file" name="uploadfile2" id="uploadfile2" value="" />
				<input type="file" name="uploadfile3" id="uploadfile3" value="" /><br><br>
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
		</form>
		<?php
			error_reporting(0);
             
			$msg = "";



		if (isset($_POST['upload']))
			{
				if(($_FILES['uploadfile1']['name']==""))

				{
				
					echo "no file selected";
				}
				

				else
			    {
    $pname = $_POST["pname"];
	$pprice = $_POST["pprice"];
	$pcompany = $_POST["pcompany"];
	$pquantity = $_POST["pquantity"];
	$pdescription = $_POST["pdescription"];
	$pimage1 = $_FILES['uploadfile1']["name"];
	$pimage2 = $_FILES['uploadfile2']["name"];
	$pimage3 = $_FILES['uploadfile3']["name"];
    $tempname1 = $_FILES["uploadfile1"]["tmp_name"];
    $tempname2 = $_FILES["uploadfile2"]["tmp_name"];
    $tempname3 = $_FILES["uploadfile3"]["tmp_name"];
    $folder1 = "images/".$pimage1;
    $folder2 = "images/".$pimage2;
    $folder3 = "images/".$pimage3;


   // echo "$pname + $pprice + $pcompany + $pquantity + $pdescription + $pimage1 + $pimage2 + $pimage3 + $tempname1 + $tempname2 + $tempname3 //+ $folder1 + $folder2 + $folder3" ;
 
    $db = mysqli_connect("localhost", "root", "", "doabatrendzdb");
    $sql = "INSERT INTO protb (	pname	,pprice,	pcompany,	pquantity	,pdescription	,	pimage1	,pimage2	,pimage3	
)  VALUES ('$pname','$pprice','$pcompany','$pquantity','$pdescription','$pimage1','$pimage2','$pimage3');";

    if(mysqli_query($db, $sql))

         {


          if (move_uploaded_file($tempname1, $folder1) & move_uploaded_file($tempname2, $folder2) & move_uploaded_file($tempname3, $folder3)) 
    {
        echo "<h3>  Image uploaded successfully!</h3>";
    } 
    else {
        echo "<h3>  Failed to upload image!</h3>";
    }

}

else
{

	echo "ERROR $ sql.".mysqli_error($sql);
}


}
}
?>
   </body>
   </html>