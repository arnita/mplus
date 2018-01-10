
<?php $id = $this->uri->segment(3); ?>
<div id="main-content" class="wrapper">
		<div class="container">
			<div class="web-page">
					<div class="title">
						<a href=""> <i class="fa fa-hourglass-start" style="background: #2AACC8;color:#fff;padding:10px;border-radius:20px"></i> Pengalaman</a>
					</div>
				<div class="table-container">
				<table class="table-tmn" border="1" style="border:1px solid  #ccc">
					<thead>
						<tr>
							<th>Company</th>
							<th>Image</th>
							<th>Vessel</th>
							<th>Job Description</th>
							<th>Year</th>
							<th>Letter of Recognition</th>
						</tr>	
					</thead>
					<tbody>
					<?php $no = 1; foreach($query as $experience): ?>
						<tr>
						    <?php $d = $this->db->get_where('tbl_pic_experience',array('experience_id'=>$experience['experience_id']));
						    $dd = $d->row_array();
						    ?>
						    
						    
					
						    
							
							<td style="width: 15%" > 
								<?php  if(!empty($experience['experience_logo'])): ?>
								<img width="150" height="150" src="<?php echo base_url()?>assets/uploads/upload_logo/<?php echo $experience['experience_logo'] ?>">
								<?php else: ?>
									<?php echo $experience['experience_company'] ?>
								<?php endif; ?>

							</td>
						
							<td  style="text-align: center;"> 
							    <?php if(!empty($dd)): ?>
							    <a style="focus:outline:none;" class="img_sub<?php echo $dd['experience_id'] ?>" href="<?php echo base_url()?>assets/upload_resize/<?php echo $dd['pic_experience'] ?>">  <img width="150" height="150" src="<?php echo base_url()?>assets/upload_resize/<?php echo $dd['pic_experience'] ?>"></a>
							    	<?php foreach($d->result_array() as $dt_s):
							    	    if($dd['pic_experience'] != $dt_s['pic_experience'] ):
							    	?>
                             	      <a style="focus:outline:none;" class="img_sub<?php echo $dt_s['experience_id'] ?>" href="<?php echo base_url()?>assets/upload_resize/<?php echo $dt_s['pic_experience'] ?>" ></a>
                             	  <?php endif; ?>
                                 	<?php endforeach;?>
            						    
							   <?php endif;?>
							
							</td>
							
							
							<td><?php echo $experience['experience_vessel'] ?></td>
							<td><?php echo $experience['experience_description'] ?></td>
							<td><?php echo $experience['experience_year'] ?></td>
							<td style="text-align: center;"  style="outline: none"> <a style="focus:outline:none;" class="group<?php echo $experience['experience_id'] ?>" href="<?php echo base_url()?>assets/upload_resize/<?php echo $experience['experience_pic'] ?>" title="<?php echo $experience['experience_description']?>"> <img width="150" height="150" src="<?php echo base_url()?>assets/upload_resize/<?php echo $experience['experience_pic'] ?>"></a></td>
							
						</tr>
						
 					
					<?php $no++;  endforeach; 
					?>
					
				
					</tbody>
					
				</table>
			</div>
			
				

			</div>

		</div>
	</div>
 <?php foreach($query as $experience): 
$dt = $this->db->get_where('tbl_pic_experience',array('experience_id'=>$experience['experience_id']))->result_array();
?>
	<script type="text/javascript">
 	$(document).ready(function(){
 		var id = <?php echo $experience['experience_id']; ?>;

 		$(".group"+id+"").colorbox({rel:'group'+id+''});
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
 	})
 	</script>
 	<?php foreach($dt as $dta): ?>
 	<script type="text/javascript">
 	    var id_sub = <?php echo $dta['experience_id']; ?>;
 	     $(".img_sub"+id_sub+"").colorbox({rel:'img_sub'+id_sub+''});
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
 	</script>
 	<?php endforeach;?>
 <?php  endforeach; ?>




