<div>
    <div class="x_panel">
      <div class="x_title">  
        <h2> Book </h2>
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
                <th class="column-title">Title  </th>
                <th class="column-title">Author </th>
                <th class="column-title">Tanggal Published</th>
                <th class="column-title">Number Of  Pages </th>
                <th class="column-title">Type Of Book </th>
                <th class="column-title no-link last" width="150px;"><span class="nobr">Action</span>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="book in getData">
                <td>{{$index+1}}</td>
                <td>{{book.title}}</td>
                <td>{{book.author}}</td>
                <td>{{book.date}}</td>
                <td>{{book.number}}</td>
                <td>{{book.type}}</td>
                <td><button class="btn btn-warning" data-toggle="modal" data-target="#modal_form_edit"  ng-click="editBook(book.id_books)" >Edit</button> | <button class="btn btn-danger" confirmed-click="deleteBook(book.id_books)" 
    ng-confirm-click="Are you sure delete this data?">Delete</button> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>



<div class="modal fade" id="modal_form" role="dialog" data-backdrop="false">
    <div class="modal-dialog" style="">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Book</h3>
            </div>

            <div class="modal-body form">
                <form id="form_books" role="form" class="form-horizontal" method="POST" ng-submit="saveBook()">
                            <div id="msg-container"><!--Error Container--></div>

                    <div class="panel-body">

                        <input type="hidden" name="id_books" id="id_books" ng-model="id_books" >
                        <!-- form kiri -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">         
                                <input type="text" name="title" ng-model="title" class="form-control" placeholder="Title">
                                    
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Nama -->

                            <div class="form-group">
                                <label for="author" class="col-md-4 control-label">Author</label>
                                <div class="col-md-6"> 
                                <input type="text" name="author" ng-model="author"  class="form-control" placeholder="Author">                                  
                                   
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Nama -->


                         <!--    <div class="form-group">
                                <label for="tanggal" class="col-md-4 control-label">Tanggal</label>
                                <div class="col-md-6">                                   
                                <input type="text" name="tanggal" id="tanggal" ng-model="tanggal"  class="form-control tanggal" placeholder="tanggal">
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Tempat Lahir -->

                            <div class="form-group">
                                <label for="number" class="col-md-4 control-label">Number</label>
                                <div class="col-md-6">                                   
                                  <input type="text" name="number" ng-model="number"  class="form-control" placeholder="Number">
                                    <span class="help-block"></span>

                                </div>
                            </div> <!--/ Tanggal Lahir -->

                            <div class="form-group">
                                <label for="type" class="col-md-4 control-label">Type</label>
                                <div class="col-md-6">                                   
                                    <input type="text" name="type" ng-model="type"  class="form-control" placeholder="Type">
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Jenis Kelamin -->

                        </div>




                       
                    </div> <!--/ Panel Body -->
                    <div class="panel-footer">   
                        <div class="row"> 
                            <div class="col-md-10 col-md-12 col-md-offset-2 col-md-offset-0">

                                <button type="button" class="btn btn-danger" name="post" data-dismiss="modal">
                                    <i class="glyphicon glyphicon-chevron-left"></i> Cancel 
                                </button>                  
                                <button type="submit" class="btn btn-primary" name="post" id="saveData">
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

<div class="modal fade" id="modal_form_edit" role="dialog" data-backdrop="false">
    <div class="modal-dialog" style="">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Book</h3>
            </div>

            <div class="modal-body form">
                <form id="form_books" role="form" class="form-horizontal" method="POST" ng-submit="updateBook()">
                            <div id="msg-container"><!--Error Container--></div>

                    <div class="panel-body">

                        <input type="hidden" name="id_books" id="id_books" >
                        <!-- form kiri -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">         
                                <input type="text" name="title" ng-model="book.title" class="form-control" placeholder="Title">
                                    
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Nama -->

                            <div class="form-group">
                                <label for="author" class="col-md-4 control-label">Author</label>
                                <div class="col-md-6"> 
                                <input type="text" name="author" ng-model="book.author"  class="form-control" placeholder="Author">                                  
                                   
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Nama -->


                         <!--    <div class="form-group">
                                <label for="tanggal" class="col-md-4 control-label">Tanggal</label>
                                <div class="col-md-6">                                   
                                <input type="text" name="tanggal" id="tanggal" ng-model="tanggal"  class="form-control tanggal" placeholder="tanggal">
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Tempat Lahir -->

                            <div class="form-group">
                                <label for="number" class="col-md-4 control-label">Number</label>
                                <div class="col-md-6">                                   
                                  <input type="text" name="number" ng-model="book.number"  class="form-control" placeholder="Number">
                                    <span class="help-block"></span>

                                </div>
                            </div> <!--/ Tanggal Lahir -->

                            <div class="form-group">
                                <label for="type" class="col-md-4 control-label">Type</label>
                                <div class="col-md-6">                                   
                                    <input type="text" name="type" ng-model="book.type"  class="form-control" placeholder="Type">
                                    <span class="help-block"></span>
                                </div>
                            </div> <!--/ Jenis Kelamin -->

                        </div>




                       
                    </div> <!--/ Panel Body -->
                    <div class="panel-footer">   
                        <div class="row"> 
                            <div class="col-md-10 col-md-12 col-md-offset-2 col-md-offset-0">

                                <button type="button" class="btn btn-danger" name="post" data-dismiss="modal">
                                    <i class="glyphicon glyphicon-chevron-left"></i> Cancel 
                                </button>                  
                                <button type="submit" class="btn btn-primary" name="post" id="saveData">
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


<script type="text/javascript">
    var app=angular.module('myApp',[]);

    var baseUrl = '<?php echo base_url()?>';

app.directive('ngConfirmClick',[
  function(){
  return{
    link:function(scope,element,attr){
      var msg = attr.ngConfirmClick || "Are you sure";
      var clicAction = attr.confirmedClick;
      element.bind('click',function(event){
        if(window.confirm(msg)){
          scope.$eval(clicAction)
        }
      })
    }
  }
}])

    app.controller('cntrl', function($scope,$http){
    $scope.book = {};

      $http.get(baseUrl+'/mplus/getData').then(function(response){
        $scope.getData = response.data;
      })


      $scope.saveBook = function(){
       
            $http({
              method:'POST',
              url:baseUrl+'mplus/saveBook',
              data:{title:$scope.title,author:$scope.author,number:$scope.number,type:$scope.type},
            }).then(function(data){
              if(data.data=="success")
              {
                alert('success');
                location.reload();
              }
              else
              {
                alert('failed');
                location.reload();
              }
              
            });
      }

      $scope.deleteBook = function(id){
        $http.post(baseUrl+'mplus/deleteBook',{id_books:id}).then(function(data){
            location.reload();
        })
      }

      $scope.editBook = function(id)
      {
        $http.post(baseUrl+'mplus/editBook',{id_books:id}).then(function(response){
          $scope.book = response.data;
          
        })
      }

      $scope.updateBook =function(){
        $http({
          method:'POST',
          url:baseUrl+'mplus/updateBook',
              data:{id_books:$scope.book.id_books,title:$scope.book.title,author:$scope.book.author,number:$scope.book.number,type:$scope.book.type},

        }).then(function(data){
         if(data.data=="success")
              {
                alert('success');
                location.reload();
              }
              else
              {
                alert('failed');
                location.reload();
              }

        })
      }

//---------     
//       $scope.obj={'idisable':false};
//       $scope.btnName="Insert";
// //-----

//       $scope.insertdata=function(){
//         $http.post("input.php",{'id':$scope.id, 'nama':$scope.nama, 'alamat':$scope.alamat,'jenis':$scope.jenis, 'btnName':$scope.btnName})
//         .success(function(){
//           $scope.msg="Data Berhasil Disimpan";
//           $scope.displayStud();
//         })
//       }
//   //proses untuk menampilkan data dari file tampil.php
//     $scope.displayStud=function(){
//         $http.get("tampil.php")
//         .success(function(data){
//           $scope.data=data
//         })
//       }
//   //proses untuk Delete data dari file hapus.php  
//       $scope.deleteStud=function(studid){
//         $http.post("hapus.php",{'id':studid})
//         .success(function(){
//           $scope.msg="Data Berhasil Dihapus";
//           $scope.displayStud();
//         })
//       }
//   //proses menampilkan data saat di uptanggal
//     $scope.editStud=function(id, nama, alamat, jeniskelamin){ 
//         $scope.id=id;
//         $scope.nama=nama;
//         $scope.alamat=alamat;
//         $scope.jenis=jeniskelamin;
//         $scope.btnName="Uptanggal";
//         $scope.obj.idisable=true;
//         $scope.displayStud();
//       }

    });

    $(function(){

        
    })
  </script>