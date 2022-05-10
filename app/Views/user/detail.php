<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container my-3 d-flex justify-content-center">
    <div class="card" style="width: 70%;">
        <img src="<?= $film['image_url']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h2 class="card-title">
                <?= $film['title']; ?>
            </h2>
            <h4 class="card-title">
                <?= $film['release']; ?>
            </h4>
            <p class="card-text">
                <?= $film['synopsis']; ?>
            </p>
            <?php if (session()->get('username')) : ?>
                <div class="row">
                    <div class="col">
                        <form action="/user/edit" method="post">
                            <input type="text" class="form-control" name="title" hidden='true' value="<?= $film['title']; ?>" required>
                            <button style="width: 100%;" type="submit" class="btn btn-outline-danger">Edit</button>
                        </form>
                    </div>
                    <div class="col">
                        <form action="/user/delete" method="post">
                            <input type="text" class="form-control" name="title" hidden='true' value="<?= $film['title']; ?>" required>
                            <button style="width: 100%;" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>


<?= $this->endSection(); ?>