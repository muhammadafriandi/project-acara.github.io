<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Contact &mdash; Nikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1> Data Contact </h1>
        <div class="section-header-button col-mb-">
            <a href="<?php echo site_url('Kontak/new') ?>" class="btn btn-primary btn-sm my-3">Tambah</a>

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
                    <div class="col-md-3">
                        <h4>Data Contact - Saya</h4>
                    </div>
                    <div class="col-md-2 float-left">
                        <a href="<?php echo site_url('kontak/export') ?>" class="btn btn-info btn-sm"><i class="fas fa-file-download"></i> Download Excel</a>
                    </div>
                    <div class="dropdown d-inline col-md-3 float-right">
                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-upload"></i> Import Excel
                        </button>
                        <div class="dropdown-menu text-white" style="background-color: cornflowerblue;">
                            <a class="dropdown-item has-icon" href="<?php echo base_url('example/contacts-example-import.xlsx') ?>">
                                <i class="fas fa-file-excel"></i> Download Example
                            </a>
                            <a class="dropdown-item has-icon" href="" data-toggle="modal" data-target="#modal-import-contact">
                                <i class="fas fa-file-import"></i> Upload File
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-md-2 text-right">
                        <a href="<?php echo base_url('Kontak') ?>" class="btn btn-danger btn-sm btn-end my-2 my-sm-0"><i class="fa fa-trash"> Trash</i></a>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-border" id="data">
                        <thead class="text-white" style="background-color:#1E90FF; height:60px;">
                            <tr>
                                <th style="width:5%">No</th>
                                <th>Nama Kontak</th>
                                <th>ALias</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Info</th>
                                <th>Grup</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:#F5F5F5;">
                            <?php foreach ($contact as $key => $data) : ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo ucwords($data->name_contact) ?></td>
                                    <td><?php echo $data->name_alias ?></td>
                                    <td><?php echo $data->phone ?></td>
                                    <td><?php echo $data->email ?></td>
                                    <td><?php echo ucwords($data->address) ?></td>
                                    <td><?php echo $data->info_contact ?></td>
                                    <td><?php echo ucwords($data->name_group) ?></td>
                                    <td class="text-left" style="width:10%;">
                                        <a href="<?php echo site_url('kontak/edit/' . $data->id_contact) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?php echo site_url('kontak/delete/' . $data->id_contact) ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data ?')">
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

    <!-- script data table dengan menambahkan script di bawah title dan menambahkan id javascript di table (data) dan menambaakan di bawah jquery di bagian bawah (footer) -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>

</section>

<div class="modal fade" id="modal-import-contact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Import Contact</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo site_url('kontak/import') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>File Excel</label>
                    <div class="custom-file">
                        <?php echo csrf_field() ?>
                        <input type="file" name="file_excel" class="custom-file-input" id="file_excel" required>
                        <label for="file_excel" class="custom-file-label">Pilih File</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>