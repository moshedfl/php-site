<?php
	include '../includes/session.php';
?>			
<script>
	$(document).ready(function(){
		$(".img_data_box").hover(function(){
			$(this).find(".slider").slideToggle("slow");
		});
	});
</script>

<!--css for gallery-->
<link rel="stylesheet" href="../includes/css/gallery.css">

<!--create upload button-->
<form method="get">
	<button type="submit" name="page_slug" value="upload" class="btn btn-primary" style="margin:20px;">Add a new photo to the gallery</button>
</form>
	
	<div class="container">
	
		<?php
			$gallery_sql = "SELECT * FROM gallery_db order by photo_id DESC";
			$gallery_result = $conn->query($gallery_sql);
			
			if ($gallery_result->num_rows > 0) {
				// output data of each row
				while($row = $gallery_result->fetch_assoc()) {
					$img_url = $row["photo_url"];
					$db_date = date_create($row["Time_added"]);
					$new_date = date_format($db_date,"H:i | d/m/Y ");
		?>
				<div class="img_frame img-thumbnail shadow m-2">
					<a data-fancybox="gallery" href="<?=$img_url?>">
						<div class=" img_box bg-white">
							<img class="gallery_img" src="<?=$img_url?>">
						</div>    
					</a>
					<div class="mobile_title_space"></div>
					<div class="img_data_box bg-dark text-white p-1">	
						<h6 class="img_title">
							<?=$row["photo_title"]?>
						</h6>
						<hr class="slider bg-white">
						<p class="img_content slider">
							<?=$row["photo_content"]?>
						</p>
						<span class="photo_editor slider float-left">
							<b><?=$row["photo_editor"]?></b> :
						</span>
						<span class="Time_added slider float-right">
							<?=$new_date?>
						</span>
					</div>
				</div>
		<?php
				}
			} else {
				echo "0 results";
			}
			$conn->close();
			
		?>
	
</div>