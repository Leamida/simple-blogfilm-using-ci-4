<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="height: 25rem;">
    <div class="d-flex justify-content-center mt-5">
        <form action="/validation" method="get" class="border p-2 mt-5">
            <?php if (session()->getFlashdata('alert')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('alert'); ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <button type="submit" class="btn btn-danger" style="width: 100%;">Continue</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>