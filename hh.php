<?php
session_start();


$user=$_SESSION['username'];
$db=mysqli_connect(" localhost:3306 ","user","jahnvi","id1665612_database ");

if(isset($_POST['create'])){
  $note=$_POST['note'];
  $sql="INSERT INTO notes(note,username) VALUES('$note','$user')";
  mysqli_query($db,$sql);
}

if(isset($_POST['delete_id'])){
  $delete_id = $_POST['delete_id'];
   $as="DELETE FROM notes WHERE note='$delete_id'";
   mysqli_query($db,$as);
   header('Location: hh.php');
}
?>

<html>
<head><link rel="stylesheet" type="text/css" href="sss.css"/></head>
<body>
<div id="msg">
  <?php if(isset($_SESSION['message']))
  echo $_SESSION['message'].'<br>'; ?>
</div>
<div id="welcome">WELCOME</div><br>
<div id="name"><?php echo "USER : ".$_SESSION['username']."<br>"; ?></div>

<form method="POST" action="home.php" id="create">
    Add a note:<input type="text" name="note"><br><br>
    <input type="submit" value="create" name="create"><br>
</form>



<?php $mysql="SELECT*FROM notes WHERE username='$user'";
      $result= mysqli_query($db,$mysql);; ?>

<table id="table" cellspacing="50">
  <tr>
    <td>Notes:</td>
  </tr>
  <?php while($row = mysqli_fetch_array($result)) : ?>
  <tr>
    <td><?php echo $row['note']; ?></td>
  
    <td>
      <form action="home.php" method="post">
        <input type="hidden" name="delete_id" value="<?php echo $row['note']; ?>" />
        <input type="submit" value="Delete" />
      </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>





<div id="logout"><a href="log.php"> Logout </a></div>
</body>
</html>