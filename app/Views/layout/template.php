<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title><?= $title; ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <div class="container-fluid">
            <?php if (session()->get('username')) : ?>
                <a class="navbar-brand text-light" href="/user">FilmMore</a>
            <?php else : ?>
                <a class="navbar-brand text-light" href="<?= Base_Url(); ?>">FilmMore</a>
            <?php endif; ?>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <div>
                    <?php if (session()->get('username')) : ?>
                        <a href="/logout" type="button" class="btn btn-light">Logout</a>
                    <?php else : ?>
                        <a href="/auth" type="button" class="btn btn-light">Login or Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>



    <footer class="py-5 bg-danger">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h5 class="text-light">Contact</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <p class="nav-link p-0 text-light"><?= $config['contact']; ?></p>
                        </li>
                    </ul>
                </div>

                <div class="col-4">
                    <h5 class="text-light">address</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <p class="nav-link p-0 text-light"><?= $config['address']; ?></p>
                        </li>
                    </ul>
                </div>


                <div class="col-5 offset-1">

                    <h5 class="text-light">About Us</h5>
                    <p class="text-light"><?= $config['about']; ?></p>

                </div>
            </div>

            <div class="d-flex justify-content-between border-top">

            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>