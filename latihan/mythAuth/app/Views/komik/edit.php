<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
<?php
$errors = session()->getFlashdata('errors');
?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h2 class="my-3"><?= $title ?></h2>

      <form action="/komik/update/<?= $komik['id'] ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $komik['slug'] ?>">
        <input type="hidden" name="sampulLama" value="<?= $komik['sampul'] ?>">

        <div class="form-group row">
          <label for="judul" class="col-sm-2 col-form-label">Judul</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= (!empty($errors['judul'])) ? 'is-invalid' : '' ?>" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $komik['judul'] ?>">
            <div class="invalid-feedback">
              <?= (!empty($errors['judul'])) ? $errors['judul'] : '' ?>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $komik['penulis'] ?>">
          </div>
        </div>
        <div class=" form-group row">
          <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $komik['penerbit'] ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
          <div class="col-sm-2">
            <img src="/img/<?= $komik['sampul'] ?>" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">
            <div class="custom-file">
              <input type="file" class="custom-file-input <?= (!empty($errors['sampul'])) ? 'is-invalid' : '' ?>" id="sampul" name="sampul" onchange="previewImg()">
              <div class="invalid-feedback">
                <?= (!empty($errors['sampul'])) ? $errors['sampul'] : '' ?>
              </div>
              <label class="custom-file-label" for="sampul"><?= $komik['sampul'] ?></label>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>