<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movieku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/assets/css/style.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.png">
</head>


<?php 
$level = session()->get('level');
?>


<header>
    <nav class="navbar navbarku navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-film"></i> MOVIEKU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/"><button type="button" class="btn btn-warning fw-bold"><i class="fa-solid fa-house fa-lg"></i> Home</button></a>
                    </li>
                    <?php if (session()->get('level') >= 2 && session('isLogin')) : ?>
                        <li class="nav-item align-content-center">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-compass fa-lg" style="color: #B197FC;"></i> Menu
                                </button>
                                <ul class="dropdown-menu">

                                    <li><a class="dropdown-item" href="/addmovie">Add Movie</a></li>
                                    <li><a class="dropdown-item" href="/mymovie">My Movie</a></li>
                                    
                                    
                                <?php if (session()->get('level') >= 3 && session('isLogin')) : ?>
                                    <li><a class="dropdown-item" href="/usercontrol">User Control System</a></li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </li>
                        <?php endif; ?>
                  

                </ul>
                <form method="post" action="/search" class="d-flex flex-fill" role="search">
                    
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                    <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
                
                </form>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item d-flex align-content-center">
                        <?php if (!session('isLogin')) : ?>
                            <a class="nav-link active" aria-current="page" href="/login"><button type="button" class="btn btn-lg btn-primary">Login</button></a>
                        <?php else : ?>
                            <a class="nav-link active" aria-current="page"><button type="button" class="btn btn-lg btn-light disabled"><i class="fa-solid fa-user"></i></i>  <?= session()->get('username') ?></i> <span class="badge text-bg-primary"><?= session()->get('role') ?></span></button></a>
                            <a class="nav-link active" aria-current="page" href="/logout"><button type="button" class="btn btn-lg btn-primary">Logout</button></a>
                        <?php endif; ?>
                    </li>
                </ul>



            </div>
        </div>
    </nav>
</header>



<body class="mb-5">

    <?= $this->renderSection('content') ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d2fa4f343.js" crossorigin="anonymous"></script>
</body>

</html>