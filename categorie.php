<?php
include "db_con.php";
if(isset($_POST['submit'])){
$nom=$_POST['genre'];
$sql_add="INSERT INTO `categorie`(`id`,`nom`) VALUES (NULL,'$nom')";
$result_add=mysqli_query($db,$sql_add);
if($result_add){
    header('location: categorie.php?msg=categorie add successfuly');
}else {
   echo "Failed: ".mysqli_error($db);
}

}
?>
<?php
$id=$_GET['id'];
if(isset($_POST['edit'])){
    $nom=$_POST['genre'];
    $sql_edit="UPDATE `categorie` SET `nom`='$nom' WHERE `id`='$id'";    
    $result_edit=mysqli_query($db,$sql_edit);
    if($result_edit){
        header('location: categorie.php?msg=categorie add successfuly');
    }else {
       echo "Failed: ".mysqli_error($db);
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
    <title>Favorite</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                        <li><a href="movies.php" class="text-decoration-none text-white px-4 py-2"><i
                                    class=" fa-regular fa-heart"></i> <span
                                    class="d-none d-md-inline text-white">Movies</span></a>
                        </li>
                        <li><a href="series.php" class="text-decoration-none text-white px-4 py-2"><i
                                    class=" fa-regular fa-bookmark"></i>
                                <span class="d-none d-md-inline ">Series</span></a></li>
                        <li><a href="categorie.php" class="text-decoration-none text-warning px-4 py-2"><i
                                    class=" fa-regular fa-user"></i> <span class="d-none d-md-inline text-warning">Categorie</span></a>
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

       <!-- Button trigger add categorie modal -->
    <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add New Categorie
    </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">add categorie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="">
                  <label class="form-label text-white  mb-3">Nom</label>
                  <input type="text" class="form-control" name="genre" placeholder="add categorie">
      

      </div>
      <div class="modal-footer  bg-warning">
        <input type="button" class="btn btn-danger" data-bs-dismiss="modal"  value='Cancel'>
        <input type="submit" name="submit" class="btn btn-success" value='Save'>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
$sql1 = "SELECT * FROM `categorie` WHERE `id` = $id";
$result1 = mysqli_query($db, $sql1);

if ($result1) {
    $row1 = mysqli_fetch_assoc($result1);
}
    
?>

<!-- Modal   edit movie -->
<div class="modal fade" id="editModal<?php echo $id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Edit Categorie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <label class="form-label text-white mb-3">Nom</label>
          <input type="text" class="form-control" name="genre" placeholder="Edit categorie" value="<?php echo $row1['nom'] ?>">
      </div>
      <div class="modal-footer bg-warning">
        <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value='Cancel'>
        <input type="submit" name="edit" class="btn btn-success" value='Save'>
        </form>
      </div>
    </div>
  </div>
</div>

       
   

    <table class="table table-hover text-center">
      <thead class="table-warning">
        <tr>
        <th scope="col">Action</th>
          <th scope="col">Nom</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `categorie`";
        $result = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td class='text-white'><?php echo $row["nom"] ?></td>
            <td>
            
              <a href="#editModal<?php echo $row["id"] ?>" class="link-dark " data-bs-toggle="modal" data-bs-target="#editModal" ><i class="fa-solid fa-pen-to-square fs-5 " style="color: #efbd0b;"></i></a>
              <a href="./categorie/delete_categorie.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5" style="color: #f00000;"></i></a>
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

</body>

</html>