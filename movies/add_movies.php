<?php
   include "../db_con.php";
   
   
   if (isset($_POST["submit"])) {
       $titre= $_POST['titre'];
       $annee_de_sortie= $_POST['annee_sortie'];
       $duree= $_POST['duree'];
       $country= $_POST['country'];
       $nombre_des_etoiles= $_POST['nbr_etoiles'];
       $genre= $_POST['genre'];
   
       $sql = "INSERT INTO `movies`(`id`, `titre`, `annee_de_sortie`, `duree`, `country`, `nombre_des _etoiles`, `categorie_id`) VALUES (NULL,'$titre','$annee_de_sortie',
       '$duree','$country','$nombre_des_etoiles','$genre')";
   
       $result = mysqli_query($db, $sql);
       if ($result) {
           header("Location: ../movies.php?msg=New record created successfully");
        } else {
           echo "Failed: " . mysqli_error($db);
        }
   
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Discover and curate your all-time favorites here. These are the films and
         shows
         that have left a mark on you">
      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="../dashboard.css">
      <title>show movies</title>
   </head>
   <body class=" bg-black">
      <nav>
         <div class="container d-flex justify-content-between gap-md-3 gap-lg-5 align-items-center position-relative">
            <div class="d-flex w-sm-100 align-items-center justify-content-between gap-3">
               <div class="logo"><img class="img-fluid" src="../img-dash/logo.png" alt="logo"></div>
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
                  <img src="../img-dash/user.png" alt="">
                  <span class="d-none d-md-inline">admin</span>
               </div>
               <ul class="nav d-flex flex-column">
                  <li><a href="../index.php" class="text-decoration-none text-white  px-4 py-2"><i
                     class=" fa-solid fa-border-all"></i>
                     <span class="d-none d-md-inline">Dashboard</span></a>
                  </li>
                  <li><a href="../movies.php" class="text-decoration-none text-warning px-4 py-2"><i
                     class=" fa-regular fa-heart"></i> <span
                     class="d-none d-md-inline text-warning">Movies</span></a>
                  </li>
                  <li><a href="../series.php" class="text-decoration-none text-white px-4 py-2"><i
                     class=" fa-regular fa-bookmark"></i>
                     <span class="d-none d-md-inline  text-white ">Series</span></a>
                  </li>
                  <li><a href="#" class="text-decoration-none text-white px-4 py-2"><i
                     class=" fa-regular fa-user"></i> <span class="d-none d-md-inline">Account</span></a>
                  </li>
                  <li><a href="../index.php" class="text-decoration-none text-white px-4 py-2"><i
                     class=" fa-solid fa-arrow-right-from-bracket"></i> <span
                     class="d-none d-md-inline">Log
                     out</span></a>
                  </li>
               </ul>
            </div>
         </div>
         <!-- content -->
         <div class="content d-flex flex-column align-items-center gap-5 m-1 col-md-9 col-9 min-vh-100 p-2 p-md-5">
         <div class="col-lg-11">
            <h1 class="title fs-5 text-center">Add New Movie</h1>
            <div class="container">
               <div class="text-center mb-4">
                  <p class=" text-white">Complete the form below to add a new movies</p>
               </div>
               <div class="container d-flex justify-content-center">
                  <form action="" method="post" style="width:50vw; min-width:300px;">
                     <div class="row mb-3">
                        <div class="col">
                           <label class="form-label text-white">Titre:</label>
                           <input type="text" class="form-control" name="titre" placeholder="titre">
                        </div>
                        <div class="col">
                           <label class="form-label text-white">Annee de sortie:</label>
                           <input type="text" class="form-control" name="annee_sortie" placeholder="2023">
                        </div>
                     </div>
                     <div class=" row mb-3">
                        <div class="col">
                           <label class="form-label text-white">duree:</label>
                           <input type="text" class="form-control" name="duree" placeholder="duree">
                        </div>
                        <div class="col">
                           <label class="form-label text-white">country:</label>
                           <input type="text" class="form-control" name="country" placeholder="country">
                        </div>
                     </div>
                     <div class=" row mb-3">
                        <div class="col">
                           <label class="form-label text-white">nombre_des_etoiles:</label>
                           <input type="text" class="form-control" name="nbr_etoiles" placeholder="nombre des etoiles">
                        </div>
                        <div class="col">
                           <label class="form-label text-white">categorie</label>
                           <select class="form-select mb-3" aria-label="Default select example" name="genre">
                              <?php
                                 $sql = "SELECT * FROM `categorie`";
                                  $result = mysqli_query($db, $sql);
                                      if ($result) {
                                           while ($row = mysqli_fetch_array($result)) {
                                     ?>
                              <option value="<?=$row['id']?>"><?=$row['nom']?></option>
                              <?php
                                 }
                                 }
                                 ?>
                           </select>
                        </div>
                     </div>
                     <div>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                        <a href="../movies.php" class="btn btn-danger">Cancel</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      <script src="js/favorite.js"></script>
   </body>
</html>