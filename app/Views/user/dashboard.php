<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <form action="" method="post">
        <div class="input-group mb-3" style="height: 3rem;">
            <input type="text" class="form-control" placeholder="Search film..." name="title">
            <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
        </div>
    </form>
</div>


<div class="container-fluid  mt-5">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Film
    </button>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach ($films as $film) : ?>
            <div class="col">
                <div class="card border-danger">
                    <img src="<?= $film['image_url']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $film['title']; ?></h5>
                        <p class="card-text" style="-webkit-line-clamp: 3;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;">
                            <?= $film['release']; ?>
                        </p>
                        <p class="card-text" style="-webkit-line-clamp: 3;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;">
                            <?= $film['synopsis']; ?>
                        </p>
                        <form action="/user/detail" method="post">
                            <input type="text" class="form-control" name="title" hidden='true' value="<?= $film['title']; ?>" required>
                            <button style="width: 100%;" type="submit" class="btn btn-danger">View Detail</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="d-flex justify-content-center">
        <?= $pager->links('films', 'custom_pager'); ?>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/user/add" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Cover</label>
                        <input type="text" class="form-control" name="image_url" placeholder="link" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="titles" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Release</label>
                        <input type="date" class="form-control" name="release" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Synopsis</label>
                        <textarea type="text" class="form-control" name="synopsis" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger" style="width: 100%;">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>