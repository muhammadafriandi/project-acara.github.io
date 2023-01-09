<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Contact &mdash; Nikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1> Edit Contact </h1>
        <div class="section-header-back">
            <a href="<?php echo site_url('Kontak') ?>" class="fas fa-arrow-left mb-3"></a>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Contact</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <form action="<?php echo site_url('Kontak/update/' . $contact->id_contact) ?>" method="POST" autocomplete="off">
                    <?php echo csrf_field() ?>
                    <!-- <input type="hidden" name="_method" value="POST"> -->
                    <div class="form-group ">
                        <label>Grup</label>
                        <select name="id_group" class="form-control col-md-6 <?php echo isset($errors['id_group']) ? 'is-invalid' : null ?>">
                            <option value="" hidden>--Pilih Group--</option>
                            <?php foreach ($groups as $key => $grup) : ?>
                                <option value="<?php echo $grup->id_group ?>" <?php echo old('id_grup', $contact->id_group) == $grup->id_group ? 'selected' : null ?>>
                                    <?php echo $grup->name_group ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo isset($errors['id_group']) ? $errors['id_group'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Kontak *</label>
                        <input type="text" name="name_contact" value="<?php echo old('name_contact', $contact->name_contact) ?>" class="form-control <?php echo isset($errors['name_contact']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?php echo isset($errors['name_contact']) ? $errors['name_contact'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama alias</label>
                        <input type="text" name="name_alias" class="form-control" value="<?php echo $contact->name_alias ?>">
                    </div>
                    <div class="form-group">
                        <label>Telepon *</label>
                        <input type="number" name="phone" value="<?php echo old('phone', $contact->phone) ?>" class="form-control <?php echo isset($errors['phone']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?php echo isset($errors['phone']) ? $errors['phone'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" value="<?php echo old('email', $contact->email) ?>" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?php echo isset($errors['email']) ? $errors['email'] : null ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat *</label>
                        <textarea name="address" class="form-control" cols="30" rows="3"><?php echo $contact->address ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Info Kontak</label>
                        <input type="text" name="info_contact" class="form-control" value="<?php echo $contact->info_contact ?>">
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