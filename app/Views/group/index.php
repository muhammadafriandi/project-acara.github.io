<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Group &mdash; Nikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1> Data Group </h1>
        <div class="section-header-button">
            <a href="<?php echo site_url('groups/new') ?>" class="btn btn-primary btn-sm my-3">Tambah</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>success !</b>
                <?php echo session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>error !</b>
                <?php echo session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Data Group</h4>
                    </div>
                    <div class="col-md-3 float-right">
                        <form action="" method="get" autocomplete="off">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Search . . .">
                                <button type="submit" class="btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>


                    <!-- <div class="col-md-2 text-right">
                        <a href="<?php echo base_url('groups/trash') ?>" class="btn btn-danger btn-sm btn-end my-2 my-sm-0"><i class="fa fa-trash"> Trash</i></a>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive mb-4">
                    <table class="table table-border data">
                        <thead class="text-white" style="background-color:#1E90FF; height:60px;">
                            <tr>
                                <th style="width:8%">No</th>
                                <th style="width:auto;">Nama</th>
                                <th>Info</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:#F5F5F5;">
                            <?php foreach ($groups as $key => $group) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo ucwords($group->name_group); ?></td>
                                    <td><?php echo $group->info_group; ?></td>
                                    <td class="text-left" style="width:10%;">
                                        <a href="<?php echo site_url('groups/edit/' . $group->id_group) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?php echo site_url('groups/delete/' . $group->id_group) ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data ?')">
                                            <?php echo csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- //script data table dengan menambahkan script di bawah title dan menambahkan id javascript di table (data) dan menambaakan di bawah jquery di bagian bawah (footer) -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>

</section>

<?= $this->endSection() ?>