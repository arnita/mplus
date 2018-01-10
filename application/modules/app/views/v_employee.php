<div>
    <div class="x_panel">
      <div class="x_title">  
        <h2> Employee </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>


    <div  class="col-sm-12">
        
        <button class="btn btn-success" data-toggle="modal" data-target="#modal_form"> <i class="fa fa-plus"></i> Add </button>
    </div>

      
      <div class="x_content">
        <div class="table-responsive">
          <table id="table_master_employee" class="table table-striped jambo_table bulk_action">
            <thead>
              <tr class="headings">
               
                <th class="column-title">No </th>
                <th class="column-title">Name  </th>
                <th class="column-title">Phone </th>
                <th class="column-title">Date </th>
                <th class="column-title">Address </th>
                <th class="column-title">Current Position </th>
                <th class="column-title">KTP File </th>
                <th class="column-title no-link last" width="150px;"><span class="nobr">Action</span>
                </th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
</div>



<div class="modal fade" id="modal_form" role="dialog" data-backdrop="false">
    <div class="modal-dialog" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Employee</h3>
            </div>

            <div class="modal-body form">
                <form id="form_employee" role="form" class="form-horizontal">
                            <div id="msg-container"><!--Error Container--></div>

                    <div class="panel-body">

                        <input type="hidden" name="id_employee" id="id_employee" >
                        <!-- form kiri -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname" class="col-md-4 control-label">First Name</label>
                                <div class="col-md-6">         
                                <input type="text" name="firstname" class="form-control" placeholder="First Name">
                                    
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Nama -->

                            <div class="form-group">
                                <label for="lastname" class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-6"> 
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name">                                  
                                   
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Nama -->


                            <div class="form-group">
                                <label for="date_of_birth" class="col-md-4 control-label">Date of Birth</label>
                                <div class="col-md-6">                                   
                                <input type="text" name="date_of_birth" id="date_of_birth" class="form-control date_of_birth" placeholder="Date Of Birth">
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Tempat Lahir -->

                            <div class="form-group">
                                <label for="tanggal_lahir" class="col-md-4 control-label">Phone Number</label>
                                <div class="col-md-6">                                   
                                  <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                    <span class="help-block"></span>

                                </div>
                            </div> <!--/ Tanggal Lahir -->

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email Address</label>
                                <div class="col-md-6">                                   
                                    <input type="text" name="email" class="form-control" placeholder="Email Address">
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Jenis Kelamin -->

                            <div class="form-group">
                                <label for="province" class="col-md-4 control-label">Province</label>
                                <div class="col-md-6">  
                                  <select name="province" class="form-control" id="province" onchange="addPropinsi()">
                                    <option value="1"> Select Province </option>
                                    <?php foreach($province as $p):?>
                                      <option value="<?php echo $p['id_provinsi']?>"><?php echo $p['nama_provinsi'] ?></option>  
                                    <?php endforeach;?>
                                  </select>
                                  
                              
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Agama -->
                        </div>




                        <!-- form kanan -->
                        <div class="col-md-6">


                          <div class="form-group">
                                <label for="city" class="col-md-4 control-label">City</label>
                                <div class="col-md-6">                                   
                                  <select name="city" id="city" class="form-control city">
                                    <option></option>
                                  </select>
                                </div>
                            </div> <!--/ Status Pernikahan -->

                            <div class="form-group">
                                <label for="street" class="col-md-4 control-label">Street Address</label>
                                <div class="col-md-6">                                   
                                    <textarea name="street" class="form-control"></textarea>
                                </div>
                            </div> <!--/ Jumlah Anak -->

                            <div class="form-group">
                                <label for="alamat" class="col-md-4 control-label">Zip Code</label>
                                <div class="col-md-6">                                   
                                    <input type="text" name="zip" class="form-control" placeholder="Zip Code">
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Alamat -->


                           <div class="form-group">
                                <label for="number_id" class="col-md-4 control-label"> KTP Number </label>
                                <div class="col-md-6">                                   
                                        <input type="file" name="number_id" class="form-control" placeholder="KTP Number">
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Project -->



                            <div class="form-group">
                                <label for="position" class="col-md-4 control-label">Current Position</label>
                                <div class="col-md-6">                                   
                                      <select name="position" class="form-control">
                                        <option value="manager">Manager</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="staff">Staff</option>
                                      </select>
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Nomor Telepon -->


                            <div class="form-group">
                                <label for="bank" class="col-md-4 control-label">Bank Account</label>
                                <div class="col-md-6">                                   
                                  
                                  <select name="bank" class="form-control">
                                    <option value="BCA">BCA</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BTN">BTN</option>
                                    <option value="BRI">BRI</option>
                                  </select>
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Nomor HP -->

                            <div class="form-group">
                                <label for="account_bank" class="col-md-4 control-label">Bank Account Number</label>
                                <div class="col-md-6">            
                                    <input type="text" name="account_bank" class="form-control" placeholder="Bank Account Number">
                                </div>
                            </div> <!--/ Pendidikan Terakhir -->



                            
                        </div>

                    </div> <!--/ Panel Body -->
                    <div class="panel-footer">   
                        <div class="row"> 
                            <div class="col-md-10 col-md-12 col-md-offset-2 col-md-offset-0">

                                <button type="button" class="btn btn-danger" name="post" data-dismiss="modal">
                                    <i class="glyphicon glyphicon-chevron-left"></i> Cancel 
                                </button>                  
                                <button type="button" class="btn btn-primary" name="post" id="saveData" onclick="add_employee()">
                                    <i class="glyphicon glyphicon-floppy-save"></i> Save 
                                </button>                  
                            </div>
                        </div>
                    </div><!--/ Panel Footer -->       

                </form>
            </div>
        </div>
    </div>
</div>

  <div id="confirm" class="modal modal-styled fade">
      <div class="modal-dialog" style='width:70%'>
        <div class="modal-content">
          <form method='post'>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title">Konfirmasi</h3>
          </div>
          <div class="modal-body" id='confirm_content'>
            <p>Lanjutkan?</p>
          </div>
          <div class="modal-footer">
            <input type='hidden' />
            <a class="btn btn-primary btn-ok" id='confirm_ok' autofocus onclick='$(this).closest("form").submit()'>Lanjutkan</a>
            <a type="button" class="btn btn-default" data-dismiss="modal">Batal</a>
          </div>
          </form>
        </div>
      </div>
    </div>

   <a style="focus:outline:none;" class="group7" href="<?php echo base_url()?>assets/upload_resize/be285c6f34a6fc8456db68e9272cc4ed.jpeg" > </a>
<script>


function delete_employee(employee_id)
{
    swal({
        title: "Delete Data",
        // text: "Merubah atau menghapus province akan menyebabkan anda keluar dari sistem! Yakin lakukan ini  ",
        text: "Are you sure delete this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      },
      function(){
        $.post('<?php echo base_url()?>app/delete_employee',{delete_id:employee_id,},function(turn_data){
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
   function addPropinsi() {
      $.post("<?php echo base_url() ?>app/getCity/" + $("#province").val(), function (data) {
          $('.city').html('<option value="">-- Select City --</option>');
          $.each(data, function (index, value) {
              $(".city").append("<option value='" + value.id_kota + "'> " + value.nama_kota + " </option>");
          })
      },'json');
  }

  $('body').on('click','.telo',function(){
      
      id=$(this).attr('data-edit')
       var body =  '';
      $.post('<?php echo base_url()?>app/data_edit',{id:id},function(response){




   body +=  '<div class="panel-body">'
                        +'<input type="hidden" name="id_employee" id="id_employee" value="'+response.id_employee+'" >'
                        +'<input type="hidden" name="pic_history" value="'+response.number_id+'">'
                        +'<div class="col-md-6">'
                             +'<div class="form-group">'
                                 +'<label for="firstname" class="col-md-4 control-label">First Name</label>'
                                 +'<div class="col-md-6">'         
                                 +'<input type="text" name="firstname" class="form-control" placeholder="First Name" value="'+response.firstname+'">'
                                    
                                     +'<span class="help-block"></span>'
                                +'</div>'
                             +'</div>'

                            +'<div class="form-group">'
                                +'<label for="lastname" class="col-md-4 control-label">Last Name</label>'
                                +'<div class="col-md-6">'
                                +'<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="'+response.lastname+'">'                                  
                                   
                                    +'<span class="help-block"></span>'
                                +'</div>'
                            +'</div>' 


                            +'<div class="form-group">'
                                +'<label for="date_of_birth" class="col-md-4 control-label">Date of Birth</label>'
                                +'<div class="col-md-6">'                                   
                                +'<input type="text" name="date_of_birth" id="date_of_birth" class="form-control date_of_birth" value="'+response.date_of_birth+'" placeholder="Date Of Birth">'
                                    +'<span class="help-block"></span>'
                                +'</div>'
                            +'</div>' 

                            +'<div class="form-group">'
                                +'<label for="tanggal_lahir" class="col-md-4 control-label">Phone Number</label>'
                                +'<div class="col-md-6">'                                   
                                  +'<input type="text" name="phone" class="form-control" placeholder="Phone Number" value="'+response.phone+'" >'
                                    +'<span class="help-block"></span>'

                                +'</div>'
                            +'</div>' 

                            +'<div class="form-group">'
                                +'<label for="email" class="col-md-4 control-label">Email Address</label>'
                                +'<div class="col-md-6">'                                   
                                    +'<input type="text" name="email" class="form-control" placeholder="Email Address"  value="'+response.email+'" >'
                                    +'<span class="help-block"></span>'
                                +'</div>'
                            +'</div>'

                            +'<div class="form-group">'
                                +'<label for="province" class="col-md-4 control-label">Province</label>'
                                +'<div class="col-md-6">'  
                                //     +'<option value="1"> Select Province </option>'
                                //     +'<?php foreach($province as $p):?>'
                                //       +'<option value="<?php echo $p['id_provinsi']?>" ><?php echo $p['nama_provinsi']?></option>' 
                                //     +'<?php endforeach;?>'
                                //   +'</select>'
+'<select class="form-control" name="province"  required >'
                  $.post('<?php base_url()?>app/getProvince',{id:id},function(_reponse){
                    var province = 'select[name="province"]'; $(province).empty();
                    $(province).append('<option value="">Pilih province</option>');
                    $.each(_reponse,function(i,val){
                      var selected = 'asem'; if(response.province == val.id_provinsi) {selected = "selected"};
                      $(province).append('<option value="'+val.id_provinsi+'" '+selected+'  >'+val.nama_provinsi+'</option>');
                    })
                  })
              body +=       '</select>'
                            
                              
                                    body+='<span class="help-block"></span>'
                                +'</div>'
                            +'</div>'
                        +'</div>'




                        
                        +'<div class="col-md-6">'


                          +'<div class="form-group">'
                                +'<label for="city" class="col-md-4 control-label">City</label>'
                                +'<div class="col-md-6">'                                  
                                +'<select class="form-control" name="city"  required >'

                  $.post('<?php base_url()?>app/getCityList',{id_provinsi:response.province},function(_reponse){
                    var city = 'select[name="city"]'; $(city).empty();
                    $(city).append('<option value="">Select city</option>');
                    $.each(_reponse,function(i,val){
                      var selected = 'asem'; if(response.city == val.id_kota) {selected = "selected"};
                      $(city).append('<option value="'+val.id_kota+'"  '+selected+'  >'+val.nama_kota+'</option>');
                    })
                  })
              body +=       '</select>'
                                +'</div>'
                            +'</div>' 

                            +'<div class="form-group">'
                                +'<label for="street" class="col-md-4 control-label">Street Address</label>'
                                +'<div class="col-md-6">'                                   
                                    +'<textarea name="street" class="form-control">'+response.street+'</textarea>'
                                +'</div>'
                            +'</div>' 

                            +'<div class="form-group">'
                                +'<label for="alamat" class="col-md-4 control-label">Zip Code</label>'
                                +'<div class="col-md-6">'                                   
                                    +'<input type="text" name="zip" class="form-control" value='+response.zip+' placeholder="Zip Code">'
                                    +'<span class="help-block"></span>'
                                +'</div>'
                            +'</div>' 


                           +'<div class="form-group">'
                                +'<label for="number_id" class="col-md-4 control-label"> KTP Number </label>'
                                +'<div class="col-md-6">'                                   
                                        +'<input type="file" name="number_id" class="form-control" placeholder="KTP Number"><br>'

                                        +'<div> <img src="<?php echo base_url()?>assets/upload_resize/'+response.number_id+'" width="100" height=100></div>'
                                    +'<span class="help-block"></span>'
                                +'</div>'
                            +'</div>' 



                            +'<div class="form-group">'
                                +'<label for="position" class="col-md-4 control-label">Current Position</label>'
                                +'<div class="col-md-6">'    
                                var selected = '';
                                    var manager   = (response.position=='manager')?'selected':'';
                                    var supervisor   = (response.position=='supervisor')?'selected':'';
                                    var staff   = (response.position=='staff')?'selected':'';
            
                                      body +='<select name="position" class="form-control">'
                                        +'<option value="manager" '+manager+'>Manager</option>'
                                        +'<option value="supervisor" '+supervisor+'>Supervisor</option>'
                                        +'<option value="staff" '+staff+'>Staff</option>'
                                      +'</select>'
                                   +'<span class="help-block"></span>'
                                +'</div>'
                            +'</div>' 


                            +'<div class="form-group">'
                                +'<label for="bank" class="col-md-4 control-label">Bank Account</label>'
                                +'<div class="col-md-6">'                                  
                                    var selected = '';
                                    var BCA   = (response.bank=='BCA')?'selected':'';
                                    var MANDIRI   = (response.bank=='MANDIRI')?'selected':'';
                                    var BNI   = (response.bank=='BNI')?'selected':'';
                                    var BTN   = (response.bank=='BTN')?'selected':'';
                                    var BRI   = (response.bank=='BRI')?'selected':'';
            
                                  body+='<select name="bank" class="form-control">'
                                    +'<option value="BCA" '+BCA+'>BCA</option>'
                                    +'<option value="MANDIRI" '+MANDIRI+'>MANDIRI</option>'
                                    +'<option value="BNI" '+BNI+'>BNI</option>'
                                    +'<option value="BTN" '+BTN+'>BTN</option>'
                                    +'<option value="BRI" '+BRI+'>BRI</option>'
                                 +' </select>'
                                    +'<span class="help-block"></span>'
                                +'</div>'
                            +'</div>' 

                            +'<div class="form-group">'
                                +'<label for="account_bank" class="col-md-4 control-label">Bank Account Number</label>'
                                +'<div class="col-md-6">'            
                                    +'<input type="text" name="account_bank" value='+response.account_bank+' class="form-control" placeholder="Bank Account Number">'
                                +'</div>'
                            +'</div>' 



                            
                        +'</div>'

                    +'</div>' 




      var footer= '<button type="button" class="btn btn-info" onclick="edit_employee()">Simpan</button>'
            +'<a class="btn btn-default" data-dismiss="modal">Batal</a>';
      $('#confirm').find('#confirm_content').addClass('form-horizontal');
      $('#confirm').find('form').attr('id','form_edit_employee');
      // $('#confirm').find('form').attr('action',option.baseUrl+'Inventory/inventory_buy_item');
      $('#confirm').find('form').attr('enctype','multipart/form-data');
      $('#confirm').find('.modal-title').html('Edit Employee');
      $('#confirm').find('.modal-body').html(body);
      $('#confirm').find('.modal-footer').html(footer);
      // $('#confirm').modal({backdrop:'static',keyboard:false, show:true});
      $('#confirm').modal('show');

      $('.date_of_birth').datetimepicker({
                  format: 'YYYY-MM-DD'
        });
    });
  })



  function edit_employee(){
    
      data = new FormData($("#form_edit_employee")[0]);
      id = $('[name="id_employee"]').val();
      

  
      url = '<?php echo base_url() ?>app/action_employee';        
      


      //ajax untuk save users
      $.ajax({
          url: url,
          data:data,
          type:"POST",
          beforeSend:function(){
          
            swal({
              title: "Loading!",
              text: "Mohon Tunggu",
             
            });
          },
          success:function(turn_data){
              if(turn_data.data==1) 
            {
               swal("Input Data Success!","", "success");  
               location.reload()
            }
            else
            {              
                swal({
                  title: "Error",
                  type: "error",
                  text: turn_data,
                  html: true
                });
            }
          },
             error: function (xhr, ajaxOptions, thrownError) {
              swal({
                  title: "Error",
                  type: "error",
                  text: turn_data,
                  html: true
                });
            // location.reload();

          },
           cache:false,
          contentType:false,
          processData:false,
      });

  }



  function add_employee(){
    
      data = new FormData($("#form_employee")[0]);
      id = $('[name="id_employee"]').val();
      

  
      url = '<?php echo base_url() ?>app/action_employee';        
      


      //ajax untuk save users
      $.ajax({
          url: url,
          data:data,
          type:"POST",
          beforeSend:function(){
          
            swal({
              title: "Loading!",
              text: "Mohon Tunggu",
             
            });
          },
          success:function(turn_data){
              if(turn_data.data==1) 
            {
               swal("Input Data Success!","", "success");  
               location.reload()
            }
            else
            {              
                swal({
                  title: "Error",
                  type: "error",
                  text: turn_data,
                  html: true
                });
            }
          },
             error: function (xhr, ajaxOptions, thrownError) {
              swal({
                  title: "Error",
                  type: "error",
                  text: turn_data,
                  html: true
                });
            // location.reload();

          },
           cache:false,
          contentType:false,
          processData:false,
      });

  }

  $(function(){
  $(".group7").colorbox({rel:'group7'});
    //Example of preserving a JavaScript event for inline calls.
    $("#click").click(function(){ 
      $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
      return false;
    });

         $('#table_master_employee').DataTable({
              "processing":true,
              "serverSide":true,
              "order":[[0,'desc']],
              "ajax":{
                "url":"<?php echo base_url()?>app/ajax_datatable_employee",
                'type':'POST'
              }
            });


        $('.date_of_birth').datetimepicker({
                  format: 'YYYY-MM-DD'
        });

       
  })

</script>