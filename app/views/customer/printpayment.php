<head>
    <!-- Title -->
    <title>Print Payment Invoice</title>
    <!-- Bootstrap Css -->
    <link href="<?= BASEURL; ?>/assets_dashboard/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Dashboard Css -->
    <link href="<?= BASEURL; ?>/assets_dashboard/css/style.css" rel="stylesheet">
    <!-- Font-awesome  Css -->
    <link href="<?= BASEURL; ?>/assets_dashboard/css/icons.css" rel="stylesheet">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
    <!--Bootstrap-daterangepicker css-->
    <link href="<?= BASEURL; ?>/assets_dashboard/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!--Select2 Plugin -->
    <link href="<?= BASEURL; ?>/assets_dashboard/plugins/select2/select2.min.css" rel="stylesheet">
    <!-- Owl Theme css-->
    <link href="<?= BASEURL; ?>/assets_dashboard/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <!-- Date Picker Plugin -->
    <link href="<?= BASEURL; ?>/assets_dashboard/plugins/date-picker/spectrum.css" rel="stylesheet">
    <!-- Custom scroll bar css-->
    <link href="<?= BASEURL; ?>/assets_dashboard/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet">
    <!-- COLOR-SKINS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?= BASEURL; ?>/assets_dashboard/colorskins/color-skins/color13.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets_dashboard/colorskins/demo.css">
</head>

<body>
    <?php foreach ($data['transaction'] as $tk) : ?>
        <div class="card-body">
            <div class="table-responsive">
                <h3 class="card-title">Adey Store Payment  Invoice</h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>Transaction number</strong></td>
                            <td>:</td>
                            <td class="text-primary">#000<?= $tk['rental_id']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Equipment Brand</strong></td>
                            <td>:</td>
                            <td><?= $tk['item_name']; ?></td>
                        </tr>
                        <tr>
                        <tr>
                            <td><strong>Rental Date</strong></td>
                            <td>:</td>
                            <td><?php echo date('d/m/Y', strtotime($tk['rental_date'])); ?></td>
                        </tr>
                        <td><strong>Return Date</strong></td>
                        <td>:</td>
                        <td><?php echo date('d/m/Y', strtotime($tk['return_date'])); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Rental Fee/Day</strong></td>
                            <td>:</td>
                            <td>ETB. <?php echo number_format($tk['price'], 0, ',', '.'); ?></td>
                        </tr>
                        <td><strong>Number of Rental Days</strong></td>
                        <td>:</td>
                        <td><?php
                            $rental = strtotime($tk['rental_date']);
                            $kembali = strtotime($tk['return_date']);
                            $jml = abs(($rental - $kembali) / (60 * 60 * 24));
                            echo "$jml Day"
                            ?></td>
                        </tr>
                        <tr>
                            <td class="text-success"><strong>Total Payment</strong></td>
                            <td class="text-success">:</td>
                            <td class="text-success"><strong>ETB <?php echo number_format($tk['price'] * $jml, 0, ',', '.'); ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</body>
<footer>
    <script type="text/javascript">
        window.print();
    </script>
</footer>