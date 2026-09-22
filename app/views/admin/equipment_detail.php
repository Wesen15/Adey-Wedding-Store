<!-- Card stats -->
</div>
</div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="card mb-4">
    <?php foreach ($data['detail'] as $dt) : ?>
      <div class="card-body">
        <div class="card">
          <!-- List group -->
          <div class="row">
            <div class="col-md-6">
              <img class="card-img-top" height="320px" src="<?= BASEURL . '/equipment_photo/' . $dt['picture'] ?>" alt="equipment">
            </div>
            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Equipment Name: <?= $dt['item_name']; ?></li>
                <li class="list-group-item">Price: ETB <?= number_format($dt['price'], 0, ',', '.'); ?> </li>
                <li class="list-group-item">Location: <?= $dt['location']; ?>, Ethiopia</li>
                <li class="list-group-item">Production Description: <?= $dt['description']; ?></li>
                <li class="list-group-item">Status: <?= $dt['status'] == '1' ? 'Available' : 'Not Available'; ?></li>
              </ul>
            </div>
          </div>
          <!-- Card body -->
          <div class="card-body">
            <h3 class="card-title mb-3">Facility</h3>
            <p class="card-text mb-4">There are several facilities on <?= $dt['item_name']; ?></p>
            <div class="col text-right">
              <a class="btn btn-danger mb-0" href="<?= BASEURL; ?>/equipment">Return</a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_modal<?= $dt['equipment_id']; ?>">Update Data</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

    <!-- Modal Update Data -->
    <?php foreach ($data['detail'] as $mb) : ?>
           <div class="modal fade" id="update_modal<?= $mb['equipment_id']; ?>" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
             <div class="modal-dialog modal-lg">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="judulModal">Update Equipment</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <div aria-hidden="true" <?= $id = $mb['equipment_id'];
                                            $data['update_equipment'] = $this->model('rental_model')->update($id);
                                            $data['update_category'] = $this->model('rental_model')->getallcategory('category');
                                            foreach ($data['update_equipment'] as $upmb) : ?>>
                      <form action="<?= BASEURL; ?>/equipment/update" method="post" enctype="multipart/form-data">
                         <input type="hidden" class="form-control" id="equipment_id" name="equipment_id" value="<?= $upmb['equipment_id'] ?>">
                         <div class="form-group">
                           <label class="form-control-label" for="item_name">Item Name</label>
                           <input type=" text" class="form-control" id="item_name" name="item_name" value="<?= $upmb['item_name'] ?>" required="">
                         </div>
                         <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                               <label class="form-control-label" for="category">Category</label>
                               <input type="hidden" name="equipment_id" value="<?= $upmb['equipment_id'] ?>">
                               <select class="form-control" id="category_code" name="category_code" required="">
                                 <option value="<?= $upmb['category_code'] ?>"><?= $upmb['category_code'] ?></option>
                                 <?php foreach ($data['update_type'] as $uptp) : ?>
                                   <option value="<?= $uptp['category_code'] ?>"><?= $uptp['category_name'] ?></option>
                                 <?php endforeach; ?>
                               </select>
                             </div>
                           </div>
                           <div class="col-md-6">
                             <div class="form-group">
                               <label class="form-control-label" for="price">Price</label>
                               <input type=" text" class="form-control" id="price" name="price" value="<?= $upmb['price'] ?>" required="">
                             </div>
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-md-6">
                             <div class="form-group">
                               <label class="form-control-label" for="status">Status</label>
                               <select class="form-control" name="status" id="status">
                                 <option <?php if ($upmb['status'] == "1") {
                                                  echo "selected='selected'";
                                                }
                                                echo $upmb['status']; ?> value="1">Available</option>
                                 <option <?php if ($upmb['status'] == "0") {
                                                  echo "selected='selected'";
                                                }
                                                echo $upmb['status']; ?> value="0">Not Available</option>
                               </select>
                             </div>
                           </div>
                           <div class="col-md-6">
                             <div class="form-group">
                               <label class="form-control-label" for="location">Location</label>
                               <input type="text" class="form-control" id="location" name="location" value="<?= $upmb['location'] ?>" required="">
                             </div>
                           </div>
                                                  </div>
                         <div class="row">
                           <div class="col-md-6">
                             <label>Upload Picture</label>
                             <div class="custom-file">
                               <input type="file" class="custom-file-input form-control" id="picture" name="picture">
                               <label class="custom-file-label" for="picture">Choose File</label>
                             </div>
                           </div>
                           <div class="col-md-6">
                             <div class="form-group">
                               <label class="form-control-label" for="description">Description</label>
                               <input type="text" class="form-control" id="description" name="description" value="<?= $upmb['description'] ?>" required="">
                             </div>
                           </div>
                         </div>
                          
                          <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" name="submit" id="submit" class="btn btn-primary">Update Data</button>
                         </div>
                       </form>
                     <?php endforeach; ?>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         <?php endforeach; ?>
    <!-- End Update Modal -->
  </div> <!-- Div Class Container Content -->
</div>
