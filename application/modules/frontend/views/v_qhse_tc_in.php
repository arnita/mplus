<?php $id = $this->uri->segment(3); ?>
<div id="main-content" class="wrapper">
		<div class="container">
			<div class="web-page">
					<div class="title">
<!-- 						<img src="<?php echo base_url()?>assets/frontend/images/people_icon.png">
 -->						<a href=""> <i class="fa fa-file" style="background: #2AACC8;color:#fff;padding:10px;border-radius:20px"></i> QHSE</a>
					</div>

				<div class="web-menu">
					
					<?php foreach($data_qhse as $qhse): ?>
									
						<a href="<?php echo base_url()?>TankCleanIn/Qhse/<?php echo $qhse['qhse_id'] ?>/<?php echo url_title(strtolower(get_page_qhse($qhse['qhse_id']))) ?>" class="<?php echo ($id==$qhse['qhse_id']) ? "active":"" ?>"><?php echo $qhse['qhse_name']; ?></a>
						<?php endforeach; ?>
				</div>


				<div class="content-web">
					<div class="web-image">
						<img src="<?php echo base_url()?>assets/upload_resize/<?php echo $query['qhse_detail_pic'] ?>" width="300" height="300">
					</div>
					<div class="web-desc">
						<?php echo $query['qhse_detail_description'] ?>
					</div>
				</div>

				
				<div style="clear:both">  </div>

			</div>

		</div>
	</div>