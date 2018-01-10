<div class="container">
 <!-- Page Heading/Breadcrumbs -->
      <h4 class="mt-4 mb-3">Artikel 
        
      </h4>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Artikel</li>
      </ol>

      <?php foreach($artikel as $ar):?>


      <!-- Blog Post -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <a href="#">
                <img class="img-fluid rounded" src="<?php echo base_url()?>assets/uploads/<?php echo $ar['image_artikel']?>" alt="">
              </a>
            </div>
            <div class="col-lg-6">
              <h2 class="card-title"><?php echo $ar['judul_artikel']?></h2>
              <p class="card-text"><?php echo $ar['isi_artikel']?></p>
              <a href="<?php echo base_url().'frontend/detail_artikel/'.$ar['id_artikel']?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted"> 
          Posted on <?php echo $ar['tanggal_artikel']?> by Arief manggala 
          
        </div>
      </div>
     <?php endforeach;?>

      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>

    </div>
</div>