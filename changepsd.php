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

<?php
include('header.php');
include('connection.php');
session_start();
if(isset($_SESSION['is_login']))
{
    $email=$_SESSION['email'];
    if(isset($_REQUEST['update']))
    {
        $prev=$_REQUEST['previouspsd'];
        if($prev!='')
        {
            $email=$_SESSION['email'];
            $sql="SELECT email,password FROM customerreg WHERE email='".$email."' AND password='".$prev."'";
            $result=$conn->query($sql);
            if($result->num_rows==1)
            {
                $newpsd=$_REQUEST['newpsd'];
                $confpsd=$_REQUEST['confpsd'];
                if($newpsd!='' && $confpsd!='')
                {
                    if($newpsd==$confpsd)
                    {
                        $msg='<div class="alert alert-succes mt-5 text-center"><small class="form-text text-muted">Password matched</small></div>';
                            $sql="UPDATE  Customerreg SET password='$newpsd' WHERE password='$prev' AND email='$email'";
                            $result=$conn->query($sql);
                            if(isset($result))
                            {
                                $msg='<div class="alert alert-success mt-5 text-center">Password updated succesfully</div>';
                            }
                        
                    }
                    else{
                        $msg='<div class="alert alert-warning mt-5 text-center">Newpassword and confirm Password does not match</div>';
                        
                    }
                }
                else{
                    $msg='<div class="alert alert-warning mt-5 text-center">Fill New password and Confirm password </div>';
                }
            }
            else{
                $msg='<div class="alert alert-warning mt-5 text-center">Your previous password entered wrong</div>';
            }
        }
        else{
            $msg='<div class="alert alert-warning mt-5 text-center">Please enter the previous password</div>';
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
<div class="col-sm-4 user">
<form action="" method="POST">

<div class="form-group">
    <label>Previous password</label>
    <input type="password" class="form-control" name="previouspsd">
  
</div>
<div class="form-group">
    <label>New password</label>
    <input type="password" class="form-control" name="newpsd">
</div>
<div class="form-group">
    <label>Confirm password</label>
    <input type="password" class="form-control" name="confpsd">
   
</div>
<button class="btn btn-primary" name="update" type="submit">Update</button>
<?php 

if(isset($msg))
{
    echo $msg;
}
?>
</form>
</div>
</div>





<?php include('footer.php') ?>