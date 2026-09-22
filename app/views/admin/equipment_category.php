       <!-- Card stats -->
       </div>
       </div>
       </div>
       <!-- Page content -->
       <div class="container-fluid mt--6">
         <div class="card mb-4">
           <!-- Table started -->
           <div class="card-header border-0">
             <div class="row align-items-center">
             <div class="col">
             <h3 class="mb-0">Equipment Category Data</h3>
             <?php Flasher::flash_modal(); ?>
             </div>
             <!-- Button trigger modal -->
             <div class="col text-right">
             <button category="button" class="btn btn-primary mb-0" data-toggle="modal" data-target="#add_data">Add Data</button>
             </div>
             </div>
            </div>
           <!-- Fill in the Table -->
           <div class="table-responsive">
             <table class="table align-items-center table-flush">
               <thead class="thead-light">
                 <tr>
                   <th scope="col" class="sort" data-sort="no">No</th>
                   <th scope="col" class="sort" data-sort="category code">category code</th>
                   <th scope="col" class="sort" data-sort="category name">category name</th>
                   <th scope="col" class="sort" data-sort="manage">Manage</th>
                 </tr>
               </thead>
               <tbody class="list">
                 <?php
                  $no = 1;
                  foreach ($data['category'] as $tp) : ?>
                   <tr>
                     <th scope="row"><?php echo $no++ ?></th>
                     <td><?= $tp['category_code'] ?></td>
                     <td><?= $tp['category_name'] ?></td>
                     <td>   
                     <button category="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update_modal<?= $tp['category_id']; ?>"><i class="fas fa-edit"></i></button>
                       <a href="<?= BASEURL; ?>/equipment/delete_category/<?= $tp['category_id']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Are you sure?  to delete the equipment Type?')"></i></a>
                     </td>
                   </tr>
                 <?php endforeach; ?>
               </tbody>
             </table>
           </div>
           <!-- This is the table -->

           <!-- Modal Add Data -->
           <div class="modal fade" id="add_data" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="judulModal">Add Equipment Category</h5>
                   <button category="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <form action="<?= BASEURL; ?>/equipment/add_category" method="post" enccategory="multipart/form-data">
                     <div class="form-group">
                       <label class="form-control-label" for="category_code">Category Code</label>
                       <input category="text" class="form-control" id="category_code" name="category_code" required="">
                     </div>
                     <div class="form-group">
                       <label class="form-control-label" for="category_name">Category Name</label>
                       <input category="text" class="form-control" id="category_name" name="category_name" required="">
                     </div>

                     <div class="modal-footer">
                       <button category="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button category="reset" class="btn btn-danger">reset</button>
                       <button category="submit" name="submit" id="submit" class="btn btn-primary">Add Data</button>
                     </div>
                   </form>
                 </div>
               </div>
             </div>
           </div>
            <!--End Modal Add -->
        <!-- Modal Update Data -->
        <?php foreach ($data['category'] as $tp) : ?>
        <div class="modal fade" id="update_modal<?= $tp['category_id']; ?>" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="judulModal">Update Equipment Category</h5>
                   <button category="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <form action="<?= BASEURL; ?>/equipment/update_category" method="post" enccategory="multipart/form-data">
                   <input category="hidden" class="form-control" id="category_id" name="category_id" value="<?= $tp['category_id']; ?>"> 
                    <div class="form-group">
                       <label class="form-control-label" for="category_code">Category Code</label>
                       <input category="text" class="form-control" id="category_code" name="category_code" value="<?php echo $tp['category_code']; ?>" required="">
                     </div>
                     <div class="form-group">
                       <label class="form-control-label" for="category_name">Category Name</label>
                       <input category="text" class="form-control" id="category_name" name="category_name" value="<?php echo $tp['category_name']; ?>" required="">
                     </div>

                     <div class="modal-footer">
                       <button category="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button category="submit" name="submit" id="submit" class="btn btn-primary">Update Category</button>
                     </div>
                   </form>
                 </div>
               </div>
             </div>
           </div>
        <?php endforeach; ?>
            <!--End Modal Update -->
        </div> <!-- Div Class Container Content-->

          
      