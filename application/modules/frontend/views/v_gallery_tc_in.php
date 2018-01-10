<?php $id = $this->uri->segment(3); ?>
<div id="main-content" class="wrapper">
		<div class="container">
			<div class="gallery-page">

				<?php foreach($query as $gallery): ?>
					<div class="title">
 						<a href=""> <i class="fa fa-image" style="background: #2AACC8;color:#fff;padding:10px;border-radius:20px"></i>  <?php echo $gallery['category_gallery_name'] ?>  </a>
					</div>	
					<?php $query_photo = $this->M_TankCleanIn->get("tbl_photo_gallery",'',array('category_gallery_id'=>$gallery['category_gallery_id']),'0','8')->result_array();

					?>
						

						<?php foreach($query_photo as $photo): ?>
						 <div class="photoThumb">
							<a class="group1" href="<?php echo base_url()?>assets/upload_resize/<?php echo $photo['photo_gallery_pic'] ?>">
							<img width="" src="<?php echo base_url()?>assets/upload_resize/<?php echo $photo['photo_gallery_pic'] ?>" ></a>
						</div>
						<?php endforeach; ?>
 
				<?php  endforeach; ?>
				

			</div>

		</div>
	</div>


