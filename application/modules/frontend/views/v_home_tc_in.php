
<div class="camera_wrap camera_azure_skin" id="camera_wrap_1" >
<?php foreach ($slider as $key => $value): ?>
            <div style="text-align: center" data-thumb="<?php echo base_url()?>assets/upload_resize/<?php echo $value['slider_pic'] ?>" data-src="<?php echo base_url()?>assets/upload_resize/<?php echo $value['slider_pic'] ?>">
                <div class="camera_caption fadeFromBottom">
                     <em><?php echo $value['slider_description'] ?></em>
                </div>
            </div>
            
<?php endforeach; ?>
</div><!-- #camera_wrap_1 -->



	<div id="main" class="wrapper">
		<div class="container">

			<div class="aboutus">
				
					<div class="title">
						 <a href="<?php echo base_url() ?>TankCleanIn/AboutUs/6">Tentang Kami</a>
						 <p style="font-size:25px;font-family: 'Roboto', sans-serif;color:#145CA4;margin-top:9px;font-weight:bold;"> Kontraktor Spesialis Tank Cleaning </p>
					</div>
					<div class="desc">
					PT. Tirta Mega Nusantara didirikan di Jakarta pada tahun 2007, sebagai Perusahaan Kontraktor Tank Cleaning dan layanan
					Transportasi Darat. PT. TMN juga dapat mengerjakan Sludge Disposal, De-Slopping, dan Pumping di darat maupun di laut. 
					Di dukung oleh peralatan yang lengkap, pekerja berpengalaman, dan izin dari institusi yang terkait,
					PT. TMN sudah di percaya oleh perusahaan nasional atau multi nasional.
					<a style="color:#2AACC8;" href="<?php echo base_url() ?>TankCleanIn/AboutUs/6"> Read more >></a>
					</div>
				

			</div>
			<div class="ourservice">
				
					<div class="title">
						<span>Layanan Kami</span>
					</div>

				<?php foreach($ourservice as $service): ?>				
					<div class="section-grup">

 						<h4> <i class="fa fa-ship set-icon"></i> <?php echo $service['ourservice_name'] ?> </h4>
						<div class="desc">
						<?php
					
							echo  substr($service['ourservice_detail_description'],0,strpos($service['ourservice_detail_description'], ' ',150)) 


						?>


						</div>
						<div class="readmore"><a href="<?php echo base_url()?>TankCleanIn/OurService/<?php echo $service['ourservice_id'] ?>/<?php echo url_title(strtolower(get_page_ourservice($service['ourservice_id']))) ?>"> Read more >></a></div>
					</div>
				<?php endforeach ?>
				

			</div>

			<div style="clear:both"></div>
			<div class="lastestwork">
					<div class="title">
						<a href=""><a href=""> <i class="fa fa-check" style="background: #2AACC8;color:#fff;padding:10px;border-radius:20px"></i> Latest Work </a>
					</div>

				<div class="menu-lastestwork">

					<?php 
						foreach($list_lastestwork as $lw): 

					?>
						<a href="javascript:view_lastestwork('<?php echo $lw['lastestwork_id'] ?>')" class="active-ourclient" >
						<?php echo  $lw['lastestwork_name'] .' | '. $lw['ourclient_name'] ?> </a>
					<?php endforeach; ?>
				</div>


				<div class="images-lastestwork" >
						
						<ul id="view_lastestwork">
							<?php foreach ($lastestwork as $key => $value): ?>
								
							<li class="photoThumb">
								
								<a class="group1" href="<?php echo base_url()?>assets/upload_resize/<?php echo $value['pic_lastestwork'] ?>" title="<?php echo $value['lastestwork_description']?>">
									<img width="" src="<?php echo base_url() ?>assets/upload_resize/<?php echo $value['pic_lastestwork']?>" ></a>
							</li>
							

							<?php endforeach; ?>
						</ul>

				</div>
				<div style="clear:both">  </div>

			</div>



			<div class="ourclient">
				<div class="title">
					<img src="<?php echo base_url()?>assets/frontend/images/people_icon.png">
					<a href="">Klien Kami</a>
				</div>
				<ul>
					<?php foreach($dt_ourclient as $cl): ?>
						<li style="width:150px;"><img src="<?php echo base_url(); ?>assets/upload_resize/<?php echo $cl['ourclient_pic']; ?>"></li>
					<?php endforeach;?>

				</ul>
			</div>
		</div>
	</div>


<script  type="text/javascript">

var click = 0;
var session = "<?php echo $this->session->userdata("click_session") ?>";

jQuery(function(){

if(session!="click")
{
	$("#myModal").show();			
    $(".logo_modal").show().delay(5000).fadeOut(function(){
    	$(".logo_2").fadeIn();
    });

}

// colorBox();

$(".close").click(function(){
	$.ajax({
		url:"<?php echo base_url()?>TankCleanIn/click_session",
		success:function(){
			$("#myModal").css("display","none");
		}
	})

})
	jQuery('#camera_wrap_1').camera({
		thumbnails: true,
		height:'400px',
		time: 2000
	});
});

        
    function colorbox()
    {

    	$(".group4").colorbox({rel:'group4'});
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 

			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
    }
  

    function view_lastestwork(id)
    {
    	$.ajax({
    		url:"<?php echo base_url()?>TankCleanIn/view_lastestwork",
    		data: {id:id},
    		method:"POST",
    		success:function(data)
    		{
    			if(data.status=="success")
    			{
    				$("#view_lastestwork").empty();


    				$.each(data.data,function(i,v){
    					
    					$("#view_lastestwork").append("<li class='photoThumb'><a class='group4' href='<?php echo base_url()?>assets/upload_resize/"+v.pic_lastestwork+"' title='"+v.lastestwork_description+"'>"+
									"<img width='' src='<?php echo base_url()?>assets/upload_resize/"+v.pic_lastestwork+"' ></a></li>");

    				});
    				colorbox();
    			}
    		}
    	})
    }
</script>