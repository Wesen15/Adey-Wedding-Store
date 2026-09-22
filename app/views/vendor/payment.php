       <!-- Card stats -->
       </div>
       </div>
       </div>
       <!-- Page content -->
       <!-- Page content -->
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="card mb-4">
        <!-- Table dimulai -->
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Incoming Payment</h3>
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
                        <th scope="col" class="sort" data-sort="rental_date">Date of Rent</th>
                        <th scope="col" class="sort" data-sort="return_date">Return Date</th>
                        <th scope="col" class="sort" data-sort="total_day">Day</th>
                        <th scope="col" class="sort" data-sort="total_payment">Total payment</th>
                        <th scope="col" class="sort" data-sort="payment_proof">Invoice</th>
                        <th scope="col" class="sort" data-sort="manage">Manage</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php
                    $no = 1;
                    if (isset($data['transaction']) && is_array($data['transaction'])) :
                        foreach ($data['transaction'] as $tk) :
                            // Only display transactions that are pending (assuming rental_status 1 is pending)
                            if (isset($tk['rental_id']) && $tk['rental_status'] == 1) : ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?= isset($tk['name']) ? $tk['name'] : ''; ?></td>
                                    <td><?= isset($tk['item_name']) ? $tk['item_name'] : ''; ?></td>
                                    <td>ETB. <?= isset($tk['price']) ? number_format($tk['price'], 0, ',', '.') : '0'; ?></td>
                                    <td><?= isset($tk['rental_date']) ? date('d/m/Y', strtotime($tk['rental_date'])) : ''; ?></td>
                                    <td><?= isset($tk['return_date']) ? date('d/m/Y', strtotime($tk['return_date'])) : ''; ?></td>
                                    <td><?php
                                        if (isset($tk['rental_date']) && isset($tk['return_date'])) {
                                            $rental = strtotime($tk['rental_date']);
                                            $return = strtotime($tk['return_date']);
                                            $jml = abs(($return - $rental) / (60 * 60 * 24));
                                            echo "$jml Day";
                                        } else {
                                            echo "0 Day";
                                        }
                                        ?></td>
                                    <td>ETB. <?= isset($tk['price']) && isset($jml) ? number_format($tk['price'] * $jml, 0, ',', '.') : '0'; ?></td>
                                    <td>
                                        <strong><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update_modal<?php echo $tk['rental_id']; ?>"><i> Detail Invoice </i></button></strong>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <a class="btn btn-sm btn-success mr-2" href="<?= BASEURL; ?>/transaction/finished/<?= $tk['rental_id'] ?>"><i class='fas fa-check'></i></a>
                                            <a class="btn btn-sm btn-danger" href="<?= BASEURL; ?>/transaction/cancel/<?= $tk['rental_id'] ?>" onclick="return confirm('Are you sure to delete the transaction?')"><i class='fas fa-times'></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif;
                        endforeach;
                    else : ?>
                        <tr>
                            <td colspan="10">No transactions available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- Ini table nya -->
        <!-- Modal Tambah Data -->
        <?php
        if (isset($data['transaction']) && is_array($data['transaction'])) :
            foreach ($data['transaction'] as $tk) :
                if (isset($tk['rental_id']) && $tk['rental_status'] == 1) : ?>
                    <div class="modal fade" id="update_modal<?php echo $tk['rental_id']; ?>" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="judulModal">Proof of payment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php if (isset($tk['payment_proof']) && !empty($tk['payment_proof'])) : ?>
                                        <img width="100%" height="100%" src="<?= BASEURL . '/photo_evidence/' . $tk['payment_proof']; ?>">
                                    <?php else : ?>
                                        <p>No proof of payment available.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;
            endforeach;
        endif; ?>
        <!--End Modal Tambah -->
    </div>
</div>
