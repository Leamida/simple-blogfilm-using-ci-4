<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>



<div class="container d-flex justify-content-center my-5">
    <div class="card" style="width: 50%; ">
        <div class="card-body">
            <form action=" /user/update" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cover</label>
                    <input type="text" class="form-control" name="image_url" placeholder="link" value="<?= $film['image_url']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" class="form-control" name="titles" value="<?= $film['title']; ?>" readonly required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Release</label>
                    <input type="date" class="form-control" name="release" value="<?= $film['release']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Synopsis</label>
                    <textarea type="text" class="form-control" name="synopsis" required><?= $film['synopsis']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-danger" style="width: 100%;">Update</button>
            </form>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>