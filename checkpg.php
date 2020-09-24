<style>
.user
{
  margin-left:40px;
  margin-top:20px;
}
.nav-item
{
  margin:10px;
  text-align:center;
}
.nav
{
  margin-top:20px;
}
</style>
<?php include('header.php');
include('connection.php');
session_start();
if(isset($_SESSION['is_login']))
{
    $email=$_SESSION["email"];
    if(isset($_REQUEST["submit"]))
  {
      $email=$_SESSION["email"];   
      $budget=$_REQUEST["budget"];
      $bhk=$_REQUEST["bhk"];
      $city=$_REQUEST["city"];
      $movingdate=$_REQUEST["moving"];
      $facility=$_REQUEST["facility"];
    if($budget!='' &&  $bhk!='' &&  $city!='' && $movingdate!='' && $facility!='')
    {
      $sql="INSERT INTO checkpg(budget,bhk_type,city,moving_date,facility,email)
      VALUES('$budget','$bhk','$city','$movingdate','$facility','$email')";
      $result=mysqli_query($conn,$sql);
      if(isset($result))
      {
        $msg='<div class="alert alert-success mt-3 text-center">Details submitted succesfully</div>';
      }
    }
    else{
      $msg='<div class="alert alert-warning mt-3 text-center">Please fill all the details</div>';
    }  
  }
}
else{
  echo "<script>location.href='login.php';</script>";
}
?>

<div class="container-fluid">

<div class="row">
    <div class="col-sm-3 bg-light sidebar">
    <div class="sidebar-sticky">
    <ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="checkpg.php">APPLY FOR PG</a></li>
    <li class="nav-item"><a class="nav-link" href="status.php">APPLIED PG</a></li>
    <li class="nav-item"><a class="nav-link" href="changepsd.php">CHANGE PASSWORD</a></li>
    <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
    </ul>
    </div>
    </div>    
<div class="col-sm-9">
<div class="user">
<form action="" method="POST">
<div class="form-row">
<div class="form-group col-md-5">
  <label>E-mail</label>
  <input type="email" name="email" value="<?php echo $email ?>" class="form-control"  readonly>
</div>
</div>
<div class="form-row">
  

    <div class="form-group col-md-5">
      <label for="inputState">City</label>
      <select id="inputState" class="form-control" name="city">
        <option selected disabled>Choose...</option>
        <option>Ghatkhoper</option>
        <option>Vidhyavihar</option>
        <option>Sion</option>
        <option>Kurla</option>
        <option>Byculla</option>
        <option>Bandra</option>
        <option>Juhu</option>
        <option>Goregaon</option>
        <option>Andheri</option>
        <option>Kandivali</option>
        <option>Borvali</option>
        <option>Prabhadevi</option>
        <option>Marines</option>
        <option>Sandurst Road</option>
        <option>C.S.T</option>
        <option>Thane</option>
        <option>Mulund</option>
        <option>Mahalaxmi</option>
        <option>Ram Mandir</option>
      </select>
    </div>
    <div class="form-group col-md-5">
      <label for="budget">Estimeted Budget</label>
      <input type="number" class="form-control" id="budgte" name="budget">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-5">
      <label for="bhk">BHK Type</label>
      <select id="bhk" class="form-control" name="bhk">
        <option selected disabled>Choose...</option>
        <option>1 RK</option>
        <option>1 BHK</option>
        <option>2 BHK</option>
        <option>3 BHK</option>
        <option>4 BHK</option>
        <option>4+ BHK</option>
      </select>
    </div>

    <div class="form-group col-md-5">
      <label for="inputState">Readt to move in</label>
      <select id="inputState" class="form-control" name="moving">
        <option selected disabled>Choose...</option>
        <option>Immediately</option>
        <option>Within 15 days</option>
        <option>Within 30 days</option>
        <option>Within 30+ days</option>
      </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputStat">Facility</label>
      <select id="inputState" class="form-control" name="facility">
        <option selected disabled>Choose...</option>
        <option>Wifi</option>
        <option>Parking</option>
        <option>Security</option>
      </select>
    </div>
</div>

<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
<?php 
if(isset($msg))
{
  echo $msg;
}
?>
</div>
</div>
</div>
<?php include('footer.php') ?>