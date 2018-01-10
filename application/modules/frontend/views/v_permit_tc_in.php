
<?php $id = $this->uri->segment(3); ?>
<div id="main-content" class="wrapper">
		<div class="container">
			<div class="web-page">
					<div class="title">
						<a href=""> <i class="fa fa-globe" style="background: #2AACC8;color:#fff;padding:10px;border-radius:20px"></i> Perizinan </a>
					</div>	


				<?php  // foreach($query as $permit):  ?>
				<?php   foreach($get as $permit):  ?>
				<div class="content-policy" style="float:left; ">
					
						<?php 
							 $data_get = $this->db->limit('1','0')->get_where('tbl_pic_permit',array('permit_id'=>$permit['permit_id']));	
								foreach ($data_get->result_array() as  $value): 
									$id_p = $value['pic_permit'];
									?>
								<div class="policy-image">
									<a style="focus:outline:none;" class="group<?php echo $value['permit_id'] ?>" href="<?php echo base_url()?>assets/upload_resize/<?php echo $value['pic_permit'] ?>" > 
									<img width="300" height="300" src="<?php echo base_url()?>assets/upload_resize/<?php echo $value['pic_permit'] ?>">
									</a> 
								</div>
								<div style="text-align:center"><?php echo $permit['permit_description'] ?></div>
						<?php
							endforeach;
							
						 ?>

						 <?php 
							 $get = $this->db->get_where('tbl_pic_permit',array('permit_id'=>$permit['permit_id']));	

								foreach ($get->result_array() as  $val): 
									if($val['pic_permit'] != $id_p):
						?>

									<a style="focus:outline:none;" class="group<?php echo $val['permit_id'] ?>" href="<?php echo base_url()?>assets/upload_resize/<?php echo $val['pic_permit'] ?>" > 
									</a> 
						<?php
							endif;
							endforeach;
							
						 ?>

					    
										
	<!-- 				<div style="clear:both"></div> -->
<!-- 					
 -->				</div>
				<?php  endforeach; ?>
				
				<div style="clear:both">  </div>

			</div>

		</div>
	</div>

<?php foreach($query as $permit): ?> 
	<script type="text/javascript">
 	$(document).ready(function(){
 	var id = <?php echo $permit['permit_id']; ?>;

 		$(".group"+id+"").colorbox({rel:'group'+id+''});
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});

 	})
 		
 	</script>
 <?php  endforeach; ?>
