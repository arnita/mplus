<?php $id = $this->uri->segment(3); ?>
<div id="main-content" class="wrapper">
		<div class="container">
			<div class="equipment-page">
					<div class="title">
					<a href=""> <i class="fa fa-ship" style="background: #2AACC8;color:#fff;padding:10px;border-radius:20px"></i> <?php echo $data_equipment['equipment_name'] ?></a>
					</div>	


				<?php foreach($query as $equipment): ?>
				<div class="content-policy" style="float:left;height:500px ">
					<div class="policy-image" style="">
						<?php $t['id_pic'] = $equipment['pic_equipment']; ?>
						
						<a style="focus:outline:none;" class="group<?php echo $equipment['equipment_detail_id'] ?>" href="<?php echo base_url()?>assets/upload_resize/<?php echo $equipment['pic_equipment'] ?>" > 
						<img width="300" height="300" src="<?php echo base_url()?>assets/upload_resize/<?php echo $equipment['pic_equipment'] ?>">
						</a>
					</div>
				
					<div style="text-align: left;padding-left:5px;" >
						<p><b>Equipment name </b> : <?php echo $equipment['equipment_detail_name'] ?></p>
						<p><b>Ownership </b> : <?php echo $equipment['equipment_detail_owner'] ?></p>
						<p><b>Quantity </b> : <?php echo $equipment['equipment_detail_qty'] ?></p>
						<p><b>Description </b> :<?php echo $equipment['equipment_detail_description'] ?></p>
					</div>
				</div> 

				<?php 

			
					$data_det = $this->db->get_where('tbl_pic_equipment',array('equipment_detail_id'=>$equipment['equipment_detail_id']))->result_array();
					foreach($data_det as $det): 
						if($equipment['pic_equipment']!=$det['pic_equipment']):
						?>

					<a style="focus:outline:none;" class="group<?php echo $det['equipment_detail_id'] ?>" href="<?php echo base_url()?>assets/upload_resize/<?php echo $det['pic_equipment'] ?>" ></a>	
				<?php endif; ?>
				 <?php endforeach; ?>
				 <?php endforeach; ?>
<!--  -->				
				<div style="clear:both">  </div>

			</div>

		</div>
	</div>

	
<?php 
	foreach($query as $equipment): 

?> 

	<script type="text/javascript">
 	$(document).ready(function(){
 	var id = <?php echo $equipment['equipment_detail_id']; ?>;

 		$(".group"+id+"").colorbox({rel:'group'+id+''});
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});

 	})
 		
 	</script>
 <?php  endforeach; ?>

