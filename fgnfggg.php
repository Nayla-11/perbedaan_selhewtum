<?php
$conn = mysqli_connect("localhost","root","","pstsh");

if (isset($_POST["addnewdata"])){
  $NO = $_POST["NO"];
  $SELTUM = $_POST["SELTUM"];
  $PERBEDAAN = $_POST["JP"];
  $SELWAN = $_POST["SELWAN"];
 

  $addtotable = mysqli_query($conn, "insert into no (SELTUM, JP, SELWAN) values('$SELTUM', '$PERBEDAAN', '$SELWAN')");
  if($addtotable){
    header("location:PSHST.php");
  } else {
    echo "GAGAL";
    header("location:PSHST.php");
  }
};


if (isset($_POST["editdata"])){
  $NO = $_POST["NO"];
  $SELTUM = $_POST["SELTUM"];
  $PERBEDAAN = $_POST["JP"];
  $SELWAN = $_POST["SELWAN"];

  $update = mysqli_query($conn, "update no set SELTUM='$SELTUM', JP='$PERBEDAAN', SELWAN='$SELWAN' where NO='$NO'");
  if($update){
    header("PSHST.php");
  } else {
    echo "Gagal";
    header("PSHST.php");
  }
};

if(isset($_POST['hapusdata'])){
  $NO = $_POST['NO'];
  $hapus = mysqli_query($conn, "delete from no where NO='$NO'");
  if($hapus){
      header("location:PSHST.php");
  } else {
      echo "Gagal";
      header("location:PSHST.php");
  }
};
?>php