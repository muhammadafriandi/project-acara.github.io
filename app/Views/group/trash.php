<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Group &mdash; Nikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1> Data Group</h1>
        <div class="section-header-button">
            <a href="<?php echo site_url('groups') ?>" class="btn btn-secondary btn-sm my-3">Back</a>
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
                        <h4>Data Group Kontak - Trash</h4>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="<?php echo site_url('groups/restore') ?>" class="btn btn-info btn-sm">Restore All</a>
                        <a href="<?php echo site_url('groups/delete2') ?>" class="btn btn-danger btn-sm">Del All Peranent</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Info</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($groups as $key => $group) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo ucwords($group->name_group); ?></td>
                                    <td><?php echo ucwords($group->info_group); ?></td>
                                    <td class="text-right" style="width:22%;">
                                        <a href="<?php echo site_url('groups/restore/' . $group->id_group) ?>" class="btn btn-warning btn-sm">Restore</a>
                                        <form action="<?php echo site_url('groups/delete2/' . $group->id_group) ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data ?')">
                                            <?php echo csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-sm">Delete Permanently</button>
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

</section>

<?= $this->endSection() ?>