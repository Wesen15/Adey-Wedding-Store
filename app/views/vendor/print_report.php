<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="<?= BASEURL; ?>/assets_manage/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets_manage/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets_manage/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets_manage/css/argon.css?v=1.1.0" type="text/css">
    <title>Print Report</title>
</head>

<body>
    <h3>Transaction Reports</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Rental Date</th>
                    <th scope="col">Return Date.</th>
                    <th scope="col">Number of days</th>
                    <th scope="col">Total payment</th>
                </tr>
            </thead>
            <tbody class="list">
                    <?php
                    $no = 1;
                    foreach ($data['transaction'] as $tk) : ?>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?= $tk['name'] ?></td>
                            <td><?= $tk['item_name'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($tk['rental_date'])); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($tk['return_date'])); ?></td>
                            <td><?php
                                $rental = strtotime($tk['rental_date']);
                                $dikembalikan = strtotime($tk['return_date']);
                                $jml = abs(($rental - $dikembalikan) / (60 * 60 * 24));
                                echo $jml > 0 ? "$jml Day" : "1 Day";
                                ?></td>
                            <td>ETB. <?php
                                $kembali = strtotime($tk['return_date']);
                                $jml_dikem = abs(($kembali - $dikembalikan) / (60 * 60 * 24));
                                echo number_format($jml_dikem * $tk['fine'], 0, ',', '.');
                                ?></td>
                            <td>ETB. <?php
                                $jml_bayar = $jml > 0 ? $jml : 1;
                                echo number_format(($jml_dikem * $tk['fine']) + ($jml_bayar * $tk['price']), 0, ',', '.');
                                ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
        </table>

        <script type="text/javascript">
            window.print();
        </script>
    <!-- Ini table nya -->
</body>

</html>