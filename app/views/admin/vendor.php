       <!-- Card stats -->
       </div>
       </div>
       </div>
       <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

       <!-- Page content -->
       <div class="container-fluid mt--6">
         <div class="card mb-4">
           <!-- Table dimulai -->
           <div class="card-header border-0">
             <div class="row align-items-center">
             <div class="col">
             <h3 class="mb-0">Vendor Data</h3>
             </div>
             <!-- Button trigger modal -->
             </div>
            </div>
           <!-- Isi Tabel -->
           <div class="table-responsive">
             <table class="table align-items-center table-flush">
               <thead class="thead-light">
                 <tr>
                   <th scope="col" class="sort" data-sort="no">No</th>
                   <th scope="col" class="sort" data-sort="name">Name</th>
                   <th scope="col" class="sort" data-sort="username">Username</th>
                   <th scope="col" class="sort" data-sort="Email">Email</th>
                   <th scope="col" class="sort" data-sort="manage">Manage</th>
                 </tr>
               </thead>
               <tbody class="list">
                 <?php
                  $no = 1;
                  foreach ($data['vendor'] as $pg) : ?>
                   <tr>
                     <th scope="row"><?php echo $no++ ?></th>
                                          
                     <td><?= $pg['name']; ?></td>
                     <td><?= $pg['username']; ?></td>
                     <td><?= $pg['email']; ?>
                     <td>
                     <a href="<?= BASEURL; ?>/users/delete_vendor/<?= $pg['user_id']; ?>" 
                        class="btn btn-sm btn-danger" 
                        onclick="return confirm('Are you sure you want to delete this vendor?');">
                          <i class="fas fa-trash"></i>
                        </a>
                     <a href="<?= BASEURL; ?>/users/update_vendor/<?= $pg['user_id']; ?>" 
                        class="btn btn-sm btn-warning" 
                        data-toggle="modal" 
                        data-target="#edit_vendor" 
                        data-id="<?= $pg['user_id']; ?>" 
                        data-name="<?= $pg['name']; ?>" 
                        data-username="<?= $pg['username']; ?>" 
                        data-email="<?= $pg['email']; ?>">
                          <i class="fas fa-edit"></i>
                      </a>
                    </td>
                    </td>
                   </tr>
                 <?php endforeach; ?>
               </tbody>
             </table>
           </div>
           <!-- Edit Vendor Modal -->
<div class="modal fade" id="edit_vendor" tabindex="-1" aria-labelledby="editVendorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVendorLabel">Edit Vendor Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/users/update_vendor" method="post">
                    <input type="hidden" name="user_id" id="edit_user_id">
                    <div class="form-group">
                        <label for="edit_name" class="form-control-label">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_username" class="form-control-label">Username</label>
                        <input type="text" class="form-control" id="edit_username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email" class="form-control-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_password" class="form-control-label">Password</label>
                        <input type="password" class="form-control" id="edit_password" name="password">
                        <small class="form-text text-muted">Leave blank if you don't want to change the password</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Vendor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

           <!-- Ini table nya -->
        </div> <!-- Div Class Container Content-->
        <!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include Bootstrap JS if not already included -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $('#edit_vendor').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id');
        var name = button.data('name');
        var username = button.data('username');
        var email = button.data('email');

        var modal = $(this);
        modal.find('#edit_user_id').val(id);
        modal.find('#edit_name').val(name);
        modal.find('#edit_username').val(username);
        modal.find('#edit_email').val(email);
    });
});
</script>
