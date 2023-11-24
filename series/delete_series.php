<?php
include "../db_con.php";
$id = $_GET["id"];
$sql = "DELETE FROM `series` WHERE id = $id";
$result = mysqli_query($db, $sql);

if ($result) {
  header("Location: ../series.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($db);
}