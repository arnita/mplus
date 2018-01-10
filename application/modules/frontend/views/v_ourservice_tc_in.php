<?php $id = $this->uri->segment(3); ?>
<div id="main-content" class="wrapper">
		<div class="container">
			<div class="web-page">
					<div class="title">
<!-- 						<img src="<?php echo base_url()?>assets/frontend/images/people_icon.png">
 -->						<a href=""> <i class="fa fa-industry" style="background: #2AACC8;color:#fff;padding:10px;border-radius:20px"></i> Service</a>
					</div>

				<div class="web-menu">
					

					<?php  foreach($data_ourservice as $service): ?>
									
						<a href="<?php echo base_url()?>TankCleanIn/OurService/<?php echo $service['ourservice_id'] ?>/<?php echo url_title(strtolower(get_page_ourservice($service['ourservice_id']))) ?>" class="<?php echo ($id==$service['ourservice_id']) ? "active":"" ?>"><?php echo $service['ourservice_name']; ?></a>
						<?php endforeach; ?>
				</div>


				<div class="content-web">
					<div class="web-image">
						<img src="<?php echo base_url()?>assets/upload_resize/<?php echo $query['ourservice_detail_pic'] ?>" width="300" height="300">
					</div>
					<div class="web-desc">
						<?php echo $query['ourservice_detail_description'] ?>
					</div>
				</div>

				
				<div style="clear:both">  </div>

			</div>

		</div>
	</div>