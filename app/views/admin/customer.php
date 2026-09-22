<!-- Card stats -->
<!-- Assuming there's a matching opening div tag before this comment -->
<!-- If not, the extra closing div tags below need to be removed -->
</div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- Page content -->
<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="no">No</th>
                <th scope="col" class="sort" data-sort="Photo">Photo</th>
                <th scope="col" class="sort" data-sort="name">Name</th>
                <th scope="col" class="sort" data-sort="username">User Name</th>
                <th scope="col" class="sort" data-sort="Email">Email</th>
                <th scope="col" class="sort" data-sort="phone_number">Phone Number</th>
                <th scope="col" class="sort" data-sort="address">Address</th>
                <th scope="col" class="sort" data-sort="gender">Gender</th>
                <th scope="col" class="sort" data-sort="mange">Mange</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php
            $no = 1;
            foreach ($data['Users'] as $pg) : ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><img width="50px" src="<?= BASEURL . '/customer_photo/' . $pg['photo'] ?>"></td>
                    <td><?= $pg['name']; ?></td>
                    <td><?= $pg['username']; ?></td>
                    <td><?= $pg['email']; ?></td>
                    <td><?= $pg['phone_number']; ?></td>
                    <td><?= $pg['address']; ?></td>
                    <td><?= $pg['gender']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/users/delete_user/<?= $pg['user_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">
                            <i class="fas fa-trash"></i>
                        </a>
                        <a href="<?= BASEURL; ?>/users/update_user/<?= $pg['user_id']; ?>" class="btn btn-sm btn-warning" 
                           data-toggle="modal" 
                           data-target="#edit_Vendor" 
                           data-id="<?= $pg['user_id']; ?>" 
                           data-name="<?= $pg['name']; ?>" 
                           data-username="<?= $pg['username']; ?>" 
                           data-email="<?= $pg['email']; ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="edit_Vendor" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/users/update_user" method="post">
                    <input type="hidden" name="user_id" id="edit_user_id">
                    <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_username" class="form-control-label">Username</label>
                        <input type="text" class="form-control" id="edit_username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_password">Password</label>
                        <input type="password" class="form-control" id="edit_password" name="password">
                        <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#edit_Vendor').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var userId = button.data('id'); // Extract info from data-* attributes
        var name = button.data('name');
        var username = button.data('username');
        var email = button.data('email');

        // Update the modal's content.
        var modal = $(this);
        modal.find('#edit_user_id').val(userId);
        modal.find('#edit_name').val(name);
        modal.find('#edit_username').val(username);
        modal.find('#edit_email').val(email);
    });
});
</script>

