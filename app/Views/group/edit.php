<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Group Kontak &mdash; Nikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1> Update Group </h1>
        <div class="section-header-back">
            <a href="<?php echo site_url('groups') ?>" class="fas fa-arrow-left mb-3"></a>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Acara </h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?php echo base_url('groups/update/' . $group->id_group) ?>" method="POST" autocomplete="off">
                    <?php echo csrf_field() ?>
                    <div class="form-group">
                        <label>Nama Group</label>
                        <input type="text" name="name_group" value="<?php echo old('name_group', $group->name_group) ?>" class="form-control <?php echo $validation->hasError('name_group') ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?php echo $validation->getError('name_group')  ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Info Group</label>
                        <textarea name="info_group" class="form-control" rows="5"><?php echo $group->info_group ?></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>