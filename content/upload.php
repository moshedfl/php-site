<?php 
	include '../includes/session.php';
    
    //Insert form data into variables
    $photo_title = htmlspecialchars($_POST[photo_title]);
	$photo_content = htmlspecialchars($_POST[photo_content]);
    $file_name = $_FILES["uploaded_photo"]["name"];
    $new_file_name = iconv("utf-8" , "Windows-1255" ,$file_name);
    $file_path = "../includes/images/uploads/" . $file_name;
    $new_file_path = "../includes/images/uploads/" . $new_file_name;
    $image_file_type = strtolower(pathinfo($file_path,PATHINFO_EXTENSION));
    $err_upload = "";
    $Word_Count = substr_count($photo_content, ' ');
    
    if($photo_title && $photo_content && strlen($photo_title)<256 ){
        
        // Checks if file selected
        if(!$file_name) {
            $err_upload = "No file selected";
        
        // Checks if image file is a actual image or fake image
        }elseif(getimagesize($_FILES["uploaded_photo"]["tmp_name"]) == false) {
            $err_upload = "File is not an image";
                    
        // Checks if file already exists
        }elseif (file_exists($new_file_path)) {
            $err_upload = "File already exists";
         
        // Checks file size
        }elseif ($_FILES["uploaded_photo"]["size"] > 2000000){
            $err_upload = "File over 2mb";
           
        // Allow certain file formats
        }elseif($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg"){
            $err_upload = "only JPG, JPEG & PNG files are allowed";
        
        //Count the amount of words in the content
        }elseif($Word_Count<2){
            $err_upload = "Please enter at least three words of content";
        
        //Count the amount of Letters in the content
        }elseif(strlen($photo_content)>255){
            $err_upload = "too Long content";
        
        //Insert form data into database
        }else{
            $sql_new_photo = $conn->prepare("INSERT INTO gallery_db (photo_title, photo_content, photo_url, photo_editor) VALUES (?, ?, ?, ?)");
            $sql_new_photo->bind_param("ssss", $photo_title, $photo_content, $file_path, $username);
            $sql_new_photo->execute();
                
            // Checks if insert successful
            if ($sql_new_photo && move_uploaded_file($_FILES["uploaded_photo"]["tmp_name"], $new_file_path)) {
                
                header("Location:?page_slug=gallery");
            } else {
                $err_upload = "there was an error uploading your file Try again later";
            }    
        }
    }
    
    
  
  echo '<pre>';
  print_r($sql_new_photo->execute);
  //print_r($matches);
  //print $err_upload;
  //echo $new_file_name.'<br>';
  // echo $file_name.'<br>';
  echo '</pre>';
?>
<!--css for foroms-->
<link rel="stylesheet" href="../includes/css/login.css">

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../includes/icons/upload.png" id="icon" alt="User Icon" />
      <h1>Upload a photo</h1>
    </div>

    <!-- Upload Form -->
    <form method="post" enctype="multipart/form-data" accept-charset="utf-8">
      <input type="text" id="photo_title" class="fadeIn second" name="photo_title" placeholder="title" value="<?= $photo_title?>" maxlength="255" required>
      <textarea id="photo_content" class="fadeIn third" name="photo_content" placeholder="A few words about the picture" title="At least three words" maxlength="255" required><?= $photo_content?></textarea>
      <input type="file" hidden name="uploaded_photo" id="uploaded_photo" accept="image/jpg, image/jpeg, image/png,">
      <label id="uploaded_button" class="fadeIn fourth" style="margin-bottom:0; background-color:#96c342" for="uploaded_photo">Select a file</label>
      <?= '<br><span style="color:red">'.$err_upload.'</span><br>'?>
      <input type="submit" class="fadeIn fourth" value="add to gallery">
      <input method="get" type="text" hidden name="page_slug" <?=$back_to_gallery ? 'value="gallery"' : "upload"?>>
    </form>

    <!-- back to gallery -->
    <div id="formFooter">
      <a class="underlineHover" href="?page_slug=gallery">back to gallery</a>
    </div>

  </div>
</div>

<script>
    $('#uploaded_photo').on('change',function(){
        //get the file name
        var fileName = $(this).val().replace(/.*\\/, '');
        //replace the "Choose a file" label
        $(this).next('#uploaded_button').html(fileName);
        
    })
</script>