          <div class="row mt">
                  <div class="col-md-12">
                      <div class="form-panel">
                        
                          <table class="table table-striped table-advance table-hover" id="table_artikel">
                            <h4><i class="fa fa-angle-right"></i> Artikel</h4>
                            <div class="nav-action">
                              <a href="<?php echo base_url()?>dashboard/add_artikel" class="btn btn-success btn-xs'"><i class="fa fa-plus"></i> Tambah </a>  
                            </div>
                            <?php echo $this->session->flashdata("success") ?>
                            
                            <hr>
                              <thead>
                              <tr>
                                  <th> No</th>
                                  <th> Judul Artikel</th>
                                  <th> Image Artikel</th>
                                  <th>Tanggal Artikel </th>
                                  <th> Hit</th>
<!--                                   <th class="hidden-phone"><i class="fa fa-question-circle"></i> Equipment Image</th>
 -->                                  <th><i class=" fa fa-edit"></i> Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                
                              </tbody>
                          </table>
                      </div><!-- /form-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
<script type="text/javascript">
    $(document).ready(function () {
         $('#table_artikel').DataTable({
              "processing":true,
              "serverSide":true,
              "order":[[0,'desc']],
              "ajax":{
                "url":"<?php echo base_url()?>dashboard/ajax_datatable_artikel",
                'type':'POST',
              }
            });
 });


    

    // untuk hapus baris di tabel detail unit karyawan 
function delete_artikel(artikel_id)
{
    swal({
        title: "Delete Data",
        text: "Are you sure delete this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      },
      function(){
        $.post('<?php echo base_url()?>dashboard/delete_artikel',{delete_id:artikel_id,},function(turn_data){
          if(turn_data.data=='1'){
            swal("Delete data success!","", "success");
             location.reload();
          }else{
            swal({
                  title: "Error",
                  type: "error",
                  text: 'Function Error',
                  html: true
                });
          }


        }).fail( function(xhr, textStatus, errorThrown) {
            swal({
                  title: "Error",
                  type: "error",
                  text: 'Function Error',
                  html: true
                });
            //location.reload();          

        });      
      });
}
</script>