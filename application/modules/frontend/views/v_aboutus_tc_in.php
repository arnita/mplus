
<?php $id = $this->uri->segment(3); ?>
<div id="main-content" class="wrapper">
		<div class="container">
			<div class="web-page">
					<div class="title">
<!-- 						<img src="<?php echo base_url()?>assets/frontend/images/people_icon.png">
 -->						<a href=""> <i class="fa fa-users" style="background: #2AACC8;color:#fff;padding:10px;border-radius:20px"></i> Tentang Kami</a>
 

					</div>

				<div class="web-menu">
					
					<?php foreach($data_aboutus as $about): ?>
							<a href="<?php echo base_url()?>TankCleanIn/AboutUs/<?php echo $about['aboutus_id'] ?>/<?php echo url_title(strtolower(get_page_aboutus($about['aboutus_id']))) ?>" class="<?php echo ($id==$about['aboutus_id']) ? "active":"" ?>"><?php echo $about['aboutus_name']; ?></a>
						<?php endforeach; ?>
				</div>

<!--  -->
						<?php $dt = $this->db->get_where('tbl_aboutus_detail',array('aboutus_id'=>6))->result_array();  ?>
						<?php if(!empty($dt) && $id == 6): ?>
							<?php foreach($dt as $d_kebijakan): ?>
								<div class="content-policy">
									<div class="policy-image">
										
										
										<a style="focus:outline:none;" class="group<?php echo $d_kebijakan['aboutus_detail_id'] ?>" href="<?php echo base_url()?>assets/upload_resize/<?php echo $d_kebijakan['aboutus_detail_pic'] ?>" title="<?php echo $d_kebijakan['aboutus_detail_description']?>"> 	
										<img width="300" height="300" src="<?php echo base_url()?>assets/upload_resize/<?php echo $d_kebijakan['aboutus_detail_pic'] ?>">
										</a>
									</div>
									<div class="policy-desc">
										<?php echo $d_kebijakan['aboutus_detail_description'] ?>
									</div>
								</div>
							<?php endforeach ?>
						<?php else: ?>


				

				<div class="content-web">
					<div class="web-image">
						<img src="<?php echo base_url()?>assets/upload_resize/<?php echo $query['aboutus_detail_pic'] ?>">
					</div>
					<div class="web-desc">
						<?php echo $query['aboutus_detail_description'] ?>
					</div>
				</div>
			<?php endif; ?>

				
				<div style="clear:both">  </div>

			</div>

		</div>
	</div>
	
	
<?php $dt = $this->db->get_where('tbl_aboutus_detail',array('aboutus_id'=>6))->result_array();  ?>
<?php if(!empty($dt) && $id == 6): ?>
	<?php foreach($dt as $d_kebijakan): ?>
		<script type="text/javascript">
         	$(document).ready(function(){
         				var id = <?php echo $d_kebijakan['aboutus_detail_id']; ?>;
        
         		$(".group"+id+"").colorbox({rel:'group'+id+''});
        		//Example of preserving a JavaScript event for inline calls.
        		$("#click").click(function(){ 
        			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
        			return false;
        		});
        
         	})
         	</script>
	<?php endforeach; ?>
<?php endif; ?>

