<!-- Card stats -->
</div>
</div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="card mb-4">
    <!-- Table starts -->
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Equipment Data</h3>
          <?php Flasher::flash_modal(); ?>
        </div>
        <!-- Button trigger modal -->
        <div class="col text-right">
          <button type="button" class="btn btn-primary mb-0" data-toggle="modal" data-target="#add_data">Add Data</button>
        </div>
      </div>
    </div>
    <!-- Table content -->
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="sort" data-sort="no">No</th>
            <th scope="col" class="sort" data-sort="picture">Picture</th>
            <th scope="col" class="sort" data-sort="category">Category</th>
            <th scope="col" class="sort" data-sort="item_name">Item Name</th>
            <th scope="col" class="sort" data-sort="price">Price</th>
            <th scope="col" class="sort" data-sort="status">Status</th>
            <th scope="col" class="sort" data-sort="manage">Manage</th>
          </tr>
        </thead>
        <tbody class="list">
          <?php
          $no = 1;
          foreach ($data['equipment'] as $mb) : ?>
            <tr>
              <th scope="row"><?= $no++ ?></th>
              <td>
                <img width="100px" src="<?= BASEURL . '/equipment_photo/' . $mb['picture'] ?>">
              </td>
              <td><?= $mb['category_code'] ?></td>
              <td><?= $mb['item_name'] ?></td>
              <td>ETB <?= number_format($mb['price'], 0, ',', '.'); ?></td>
              <td>
                <?php if ($mb['status'] == "0") : ?>
                  <span class='badge badge-dot mr-4'><i class='bg-warning'></i><span class='status'>Not Available</span></span>
                <?php else : ?>
                  <span class='badge badge-dot mr-4'><i class='bg-success'></i><span class='status'>Available</span></span>
                <?php endif; ?>
              </td>
              <td>
                <a href="<?= BASEURL; ?>/equipment/detail/<?= $mb['equipment_id']; ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                <a href="<?= BASEURL; ?>/equipment/delete/<?= $mb['equipment_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Sure to delete?')"><i class="fas fa-trash"></i></a>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update_modal<?= $mb['equipment_id']; ?>"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Modal Add Data -->
    <div class="modal fade" id="add_data" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="judulModal">Add Data Equipment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= BASEURL; ?>/equipment/add_equipment" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="form-control-label" for="item_name">Item Name</label>
                <input type="text" class="form-control" id="item_name" name="item_name" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="category_code">Category</label>
                    <select class="form-control" id="category_code" name="category_code" required>
                      <option value="">Select Equipment Category</option>
                      <?php foreach ($data['category'] as $tp) : ?>
                        <option value="<?= $tp['category_code'] ?>"><?= $tp['category_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                      <option value="">Choose Status</option>
                      <option value="1">Available</option>
                      <option value="0">Not Available</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Upload Picture</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input form-control" id="picture" name="picture" required>
                    <label class="custom-file-label" for="picture">Select File</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                  </div>
                </div>
              </div>
 
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Add Data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Add Modal -->
    <!-- Modal Update Data -->
<!-- Modal Update Data -->
<?php foreach ($data['equipment'] as $mb) : ?>
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
  </div>
</div> <!-- End container content -->
