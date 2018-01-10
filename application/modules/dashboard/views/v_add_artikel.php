<?php $q = $this->db->list_fields('tbl_artikel'); 
	foreach($q as $dt)
	{
		$data[$dt] = (!empty($edit))  ? $edit[$dt] : set_value($dt);
	}

?>

          	<h3><i class="fa fa-angle-right"></i> Form Artikel </h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                       
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Form Artikel </h4>
                  	  <?php echo $this->session->flashdata("error")?>
                      <form class="form-horizontal style-form" id="artikel" enctype="multipart/form-data" method="post" action="<?php base_url() ?>dashboard/action_artikel/">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Judul Artikel</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="judul_artikel" value="<?php echo $data['judul_artikel'] ?>">
                              </div>
                          </div>
                          <input type="hidden" name="token" value="<?php echo rand();  ?>">
                          
                          <input type="hidden" name="id_artikel" value="<?php echo (!empty($_GET['id_artikel'])) ? $_GET['id_artikel']  : "" ?>">


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Isi Artikel</label>
                              <div class="col-sm-10">
                                  <textarea name="isi_artikel"  rows="6" id="isi_artikel" class="form-control"><?php echo $data['isi_artikel'] ?></textarea>
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Image Artikel</label>
                              <div class="col-sm-10">
                              	<input type="file" name="image_artikel">
                              	   <?php if(!empty($data['id_artikel'])): ?>
                                    <br>
                                		<img width="200" src="<?php echo base_url()?>assets/uploads/<?php echo $data['image_artikel'] ?>">
                               
                                <?php endif ;?>
                              </div>
                          </div>
                          

                       


                         <button type="submit" id="btn-equipment"  class="btn btn-theme">Simpan</button>
                         <a href="<?php echo base_url()?>dashboard/artikel" class="btn btn-default" >Batal</a>

                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->

<script type="text/javascript">
	



$(function(){
$("#artikel").submit(function(){

     swal({
        title: "Loading!",
        text: "Mohon Tunggu",
       
      });
     $("#btn-equipment").prop("disabled",true);

})

  
});



 
 

</script>          	


          	
          	
          	
     