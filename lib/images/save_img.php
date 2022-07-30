<?php
    $target_dir = "../../../lib/images/";
	$target_dir .= $target_folder . "/";
	//$target_dir .= $target_folder . "/";

    if(isset($_FILES["fileToUpload"]) 
	&& isset($_FILES["fileToUpload"]["name"]) 
	&& isset($_FILES["fileToUpload"]["tmp_name"])) {
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    // Check if image file is a actual image or fake image
	
		if (!empty($_FILES["fileToUpload"]["tmp_name"])){
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		} else $check = false;
	   
	    if($check !== false) {
	    	//echo "File is an image - " . $check["mime"] . ".";
	    	$uploadOk = 1;
	    } else {
	    	//echo "File is not an image.";
	    	$uploadOk = 0;
	    }
	
	    // Check if file already exists
	    $target_file1 = $target_dir . $save_name . ".png";
	
	    /*if (file_exists($target_file1)) {
	    	//echo "Sorry, file already exists.";
	    	$uploadOk = 0;
	    }
		*/
	
	    // Check file size
	    if ($_FILES["fileToUpload"]["size"] > 500000) {
	    	//echo "Sorry, your file is too large.";
	    	$uploadOk = 0;
	    }
	
		// Allow certain file formats
	    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	    && $imageFileType != "gif" ) {
	    	//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    	$uploadOk = 0;
	    }
	
	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadOk == 0) {
	    //echo "Sorry, your file was not uploaded.";
	    // if everything is ok, try to upload file
        } else {
            $temp = $save_name;
		    $temp .= ".png";
		    $target_file = $target_dir . $temp;
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				    echo "ok";
		    		//return true;
		    	} 
		 }
	}
	//return false;
    ?>
<script>
    $(document).ready(function() {
        $("#file_cancel").on("click", function(event) {
            $("#fileToUpload").val(null);
        });
    });
</script>
<section>
    <dl>
        <dd>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <button name="file_cancel" id="file_cancel" class="btn btn-reds">Xóa </button>
        </dd>
    </dl>
</section>