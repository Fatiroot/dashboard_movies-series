<?php
include "db_con.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover and curate your all-time favorites here. These are the films and
        shows
        that have left a mark on you">
    <title>Favorite</title>
    <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="dashboard.css">
<title>show movies</title>
</head>

<body class=" bg-black">
    <nav>
        <div class="container d-flex justify-content-between gap-md-3 gap-lg-5 align-items-center position-relative">
            <div class="d-flex w-sm-100 align-items-center justify-content-between gap-3">
                <div class="logo"><img class="img-fluid" src="./img-dash/logo.png" alt="logo"></div>
                <div class="menu"><i class="fa-solid fa-bars burger-menu fs-3 text-white"></i></div>
            </div>
            <div class="search-wrapper flex-grow-1">
                <input class="py-2 px-3 rounded-2 w-100 border-0 d-none d-md-block" type="text" placeholder="Search">
            </div>
            <div class="sign-in-wrapper d-flex align-items-center gap-3">
                <a href="./MoviesSeries.html" class="fw-semibold text-white d-none d-md-block"> Watchlist</a>
                <a href="./sign-in.html" class="fw-bold text-white d-none d-md-block">signIn</a>
                <select class="form-select d-none d-md-block" aria-label="Default select example">
                    <option selected>En</option>
                    <option value="2">Fr</option>
                    <option value="3">Sp</option>
                </select>
            </div>
        </div>
    </nav>
    <section class="container">
        <div class="row flex-nowrap">
            <!-- side nav -->
            <div class="sidebar col-auto col-md-3 min-vh-100 ">
                <div class="side-content d-flex flex-column align-items-center  ">
                    <div class="profil d-flex flex-column align-items-center gap-3">
                        <img src="img-dash/user.png" alt="">
                        <span class="d-none d-md-inline">admin</span>
                    </div>
                    <ul class="nav d-flex flex-column">
                        <li><a href="index.php" class="text-decoration-none text-white px-4 py-2"><i
                                    class=" fa-solid fa-border-all"></i>
                                <span class="d-none d-md-inline">Dashboard</span></a></li>
                        <li><a href="movies.php" class="text-decoration-none text-warning px-4 py-2"><i
                                    class=" fa-regular fa-heart"></i> <span
                                    class="d-none d-md-inline text-warning">Movies</span></a>
                        </li>
                        <li><a href="series.php" class="text-decoration-none text-white px-4 py-2"><i
                                    class=" fa-regular fa-bookmark"></i>
                                <span class="d-none d-md-inline ">Series</span></a></li>
                        <li><a href="#" class="text-decoration-none text-white px-4 py-2"><i
                                    class=" fa-regular fa-user"></i> <span class="d-none d-md-inline">Account</span></a>
                        </li>
                        <li><a href="index.html" class="text-decoration-none text-white px-4 py-2"><i
                                    class=" fa-solid fa-arrow-right-from-bracket"></i> <span
                                    class="d-none d-md-inline">Log
                                    out</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- content -->
            <div class="content d-flex flex-column align-items-center gap-5 m-1 col-md-9 col-9 min-vh-100 p-2 p-md-5">
              
      <div class="container">
      <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?> 
    <a href="./movies/add_movies.php" class="btn btn-warning mb-3">Add New Movie</a>

    <table class="table table-hover text-center">
      <thead class="table-warning">
        <tr>
          <th scope="col">Titre</th>
          <th scope="col">annee de sortie</th>
          <th scope="col">duree</th>
          <th scope="col">Country</th>
          <th scope="col">Categorie</th>
          <th scope="col">nombre des etoiles</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `movies`";
        $result = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
       <?php
    $sql1 = "SELECT * FROM `categorie` WHERE `id` = " . $row['categorie_id'];
    $result1 = mysqli_query($db, $sql1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
    }
?>

          <tr>
            <td class='text-white'><?php echo $row["titre"] ?></td>
            <td class='text-white'><?php echo $row["annee_de_sortie"] ?></td>
            <td class='text-white'><?php echo $row["duree"] ?></td>
            <td class='text-white'><?php echo $row["country"] ?></td>
            <td class='text-white'><?php echo $row1["nom"] ?></td>
            <td class='text-white'><?php echo $row["nombre_des _etoiles"] ?></td>
            <td>
              <a href="./movies/edit_movies.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 " style="color: #efbd0b;"></i></a>
              <a href="./movies/delete_movies.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5" style="color: #f00000;"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>


    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/favorite.js"></script>

</body>

</html>