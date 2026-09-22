       <!-- Card stats -->
       </div>
       </div>
       </div>
      <!-- Page content -->
<div class="container-fluid mt--6">
    <div class="card mb-4">
        <!-- Table dimulai -->
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Transaction Data</h3>
                    <?php Flasher::flash_modal(); ?>
                </div>
            </div>
        </div>
        <!-- Isi Tabel -->
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="no">No</th>
                        <th scope="col" class="sort" data-sort="customer">Customer</th>
                        <th scope="col" class="sort" data-sort="item_name">Item</th>
                        <th scope="col" class="sort" data-sort="price">Price</th>
                        <th scope="col" class="sort" data-sort="rental_date">Rental Date</th>
                        <th scope="col" class="sort" data-sort="return_date">Return Date</th>
                        <th scope="col" class="sort" data-sort="rental_status">Progress</th>
                        <th scope="col" class="sort" data-sort="action">Action</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php
                    $no = 1;
                    foreach ($data['transaction'] as $tk) :
                        // Only display transactions that are not marked as "Item Returned" (status code 6)
                        if ($tk['rental_status'] != 6) : ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?= $tk['name'] ?></td>
                                <td><?= $tk['item_name'] ?></td>
                                <td>ETB. <?php echo number_format($tk['price'], 0, ',', '.'); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($tk['rental_date'])); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($tk['return_date'])); ?></td>
                                <td><?php
                                    if ($tk['rental_status'] == 2) {
                                        echo 'Not Taken Yet';
                                    } else {
                                        echo $tk['status_name'];
                                    }; ?></td>
                                <td>
                                    <strong><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update_modal<?php echo $tk['rental_id']; ?>"><i> Update</i></button></strong>
                                </td>
                            </tr>
                        <?php endif;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- Ini table nya -->
        <!-- Modal Tambah Data -->
        <?php foreach ($data['transaction'] as $tk) :
            // Only display modal for transactions that are not marked as "Item Returned" (status code 6)
            if ($tk['rental_status'] != 6) : ?>
                <div class="modal fade" id="update_modal<?php echo $tk['rental_id']; ?>" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="judulModal">Update Lease Progress</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div aria-hidden="true">
                                    <form action="<?= BASEURL; ?>/transaction/update" method="post">
                                        <input type="hidden" class="form-control" id="rental_id" name="rental_id" value="<?= $tk['rental_id'] ?>">
                                        <input type="hidden" class="form-control" id="equipment_id" name="equipment_id" value="<?= $tk['equipment_id'] ?>">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">Customer</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?= $tk['name'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="item_name">Item</label>
                                            <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $tk['item_name'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="rental_status">Progress Now</label>
                                            <select class="form-control" name="rental_status" id="rental_status">
                                                <?php if ($tk['rental_status'] != "5") { ?>
                                                    <option <?php if ($tk['rental_status'] == "2") {
                                                                echo "selected='selected'";
                                                            }
                                                            echo $tk['rental_status']; ?> value="2">
                                                        <?php if ($tk['rental_status'] == "3") { ?>
                                                            Payment Confirmation
                                                        <?php } else { ?>
                                                            Not Taken Yet
                                                        </option>
                                                    <?php } ?>
                                                    <?php if ($tk['rental_status'] != "2") { ?>
                                                        <option <?php if ($tk['rental_status'] == "3") {
                                                                    echo "selected='selected'";
                                                                }
                                                                echo $tk['rental_status']; ?> value="3">Payment declined</option>
                                                    <?php } ?>
                                                <?php } ?>
                                                <option <?php if ($tk['rental_status'] == "5") {
                                                            echo "selected='selected'";
                                                        }
                                                        echo $tk['rental_status']; ?> value="5">On Rent</option>
                                                <option <?php if ($tk['rental_status'] == "6") {
                                                            echo "selected='selected'";
                                                        }
                                                        echo $tk['rental_status']; ?> value="6">Item Returned</option>
                                            </select>
                                        </div>
                                        <?php if ($tk['rental_status'] == "5") { ?>
                                            <div class="form-group">
                                                <label class="form-control-label" for="return_date">Return Date</label>
                                                <input type="date" class="form-control" id="return_date" name="return_date" value="<?= $tk['return_date'] ?>" >
                                            </div>
                                        <?php } ?>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Update Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;
        endforeach; ?>
        <!--End Modal Tambah -->
    </div>
</div>
