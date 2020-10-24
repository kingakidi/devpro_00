<?php include 'control/header.php'; ?>

			<!-- CONTENT SECTION  -->
			<div class="content">
				
				<?php 

				$uploadSql = mysqli_query($conn, "SELECT * FROM `upload` JOIN files ON upload.upload_Id=files.upload_id WHERE image_name <> '' AND upload.status = 'approve' ORDER BY upload.upload_Id DESC");
				
				while ($row = mysqli_fetch_assoc($uploadSql)) {
					  $uploadId=$row['upload_Id']; 
				      $profileId=$row['profile_id']; 
				      $video=$row['video_url'];
				      $code=$row['raw_code'];
				      $title = ucwords($row['title']);
				      $date = $row['date'];
				      $imageNames = array();
				      $fileQuery = mysqli_query($conn, "SELECT * FROM `files` WHERE upload_Id=$uploadId");
				      if (mysqli_num_rows($fileQuery) > 0) {
				      	while ($rowAssoc = mysqli_fetch_assoc($fileQuery)) {
				      	$imgName = $rowAssoc['image_name'];
				      	array_push($imageNames, $imgName);
				      }
				      echo '<div class="content-items">';
				      
				      echo "<a href='gallery.php?gId=$uploadId'><img src='dashboard/files/$imageNames[0]' class='content-items-img content-items-g'> </a>";
				    	}else{
				    	 echo '<div class="content-items">';
				    	echo '<img src="1.jpg" class="content-items-img content-items-g">';
				    	}
				      
					?>
					
					<h3 class="content-items-title"> <?php echo strtoupper($title); ?>  </h3>
					
					<p class="content-items-author"> DevPro  </p>
				</div>
				<?php }?>
				
				
			</div>
			<?php include 'control/footer.php'; ?>
