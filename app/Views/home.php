<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title> Home &mdash; Nikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Dashboard </h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class=" col-md-4">
                                <i class="fas fa-solid fa-cake-candles fa-4x text-primary"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <h6>Acara</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 ml-3">
                                    <?php echo countData('gawe') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class=" col-md-4">
                                <i class="fa-sharp fa-4x fa-solid fa-people-group text-primary"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <h6>Gruop</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 ml-3">
                                    <?php echo countData('groups') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row">
                            <div class=" col-md-4">
                                <i class="fas fa-solid fa-phone fa-4x text-primary"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <h6>Kontak</h6>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 ml-3">
                                    <?php echo countData('contacts') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>