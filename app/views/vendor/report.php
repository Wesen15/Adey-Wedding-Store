<!-- Card stats -->
</div>
</div>
</div>
<!-- Page content -->
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="card mb-4">
        <!-- Table header -->
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Transaction Reports</h3>
                    <?php Flasher::flash_modal(); ?>
                </div>
                <div class="col text-right">
                    <a class="btn btn-primary mb-0" href="<?= BASEURL; ?>/transaction/print_report"><i class="fa fa-print"></i> Print Report</a>
                </div>
            </div>
        </div>
        <!-- Table content -->
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="no">No</th>
                        <th scope="col" class="sort" data-sort="customer">Customer</th>
                        <th scope="col" class="sort" data-sort="item_name">Brand</th>
                        <th scope="col" class="sort" data-sort="rental_date">Rental Date</th>
                        <th scope="col" class="sort" data-sort="return_date">Return Date</th>
                        <th scope="col" class="sort" data-sort="jumlah_hari">Number of Days</th>
                        <th scope="col" class="sort" data-sort="total_bayar">Total Payment</th>
                        <th scope="col" class="sort" data-sort="action">Action</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php
                    $no = 1;
                    foreach ($data['transaction'] as $tk) : 
                        $rentalDate = isset($tk['rental_date']) && strtotime($tk['rental_date']) ? $tk['rental_date'] : '1970-01-01';
                        $returnDate = isset($tk['return_date']) && strtotime($tk['return_date']) ? $tk['return_date'] : '1970-01-01';
                        $rental = strtotime($rentalDate);
                        $dikembalikan = strtotime($returnDate);
                        $jml = abs(($dikembalikan - $rental) / (60 * 60 * 24));
                        $jml_bayar = $jml > 0 ? $jml : 1;
                        $total_payment = ($jml_bayar * $tk['price']);
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?= $tk['name'] ?></td>
                            <td><?= $tk['item_name'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($rentalDate)); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($returnDate)); ?></td>
                            <td><?php echo $jml_bayar > 0 ? "$jml_bayar Day" : "1 Day"; ?></td>
                            <td>ETB. <?php echo number_format($total_payment, 0, ',', '.'); ?></td>
                            <td>
                                <?php if ($_SESSION['group_id'] == 1): ?>
                                    <a class="btn btn-sm btn-danger" href="<?= BASEURL; ?>/transaction/delete/<?= $tk['rental_id'] ?>" onclick="return confirm('Are you sure you want to delete this transaction?');"><i class='fas fa-trash'></i> Delete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

