<style>
.user
{
  margin-left:30%;
}
</style>


<?php
include('header.php');
include('connection.php');

if(isset($_REQUEST['submit']))
{
    $name=$_REQUEST['name'];
    $phone=$_REQUEST['phone'];
    $email=$_REQUEST['email'];
    $querie=$_REQUEST['querie'];
    if($name!='' && $phone!='' && $email!='' && $querie!='')
    {
        $sql="INSERT INTO queries(name,phone,email,querie) VALUES('$name','$phone','$email','$querie')";
        $result=mysqli_query($conn,$sql);
        if(isset($result))
        {
            $msg='<div class="alert alert-success mt-3 text-center">Your querie has been sucessfully submitted</div>';
            $mailto="rp589006@gmail.com";
            $header="From:".$email;
            mail($mailto,$querie,$header);
        }
    }
    else{
        $msg='<div class="alert alert-warning mt-3 text-center">Please fill all the details</div>';
    }
}


?>

<div class="container">
<h1 class="text-center mt-4">FILL THE QUERY</h1>

<form action="" method="POST" class="mt-3 user">
  <div class="form-group col-7">
    <label >Full name</label>
    <input type="text" class="form-control" name="name" autocomplete="none">
  </div>
  <div class="form-group col-7">
    <label>Phone</label>
    <input type="text" class="form-control" name="phone" autocomplete="none">
  </div>
  <div class="form-group col-7">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" autocomplete="">
   
  </div>
  <div class="form-group col-7">
  <label>Querie</label>
  <textarea class="form-control mb-3 " name="querie"></textarea>
  </div>

  <button type="submit" class="btn btn-primary ml-3" name="submit">Submit</button>

</form>
<?php 

if(isset($msg))
{
    echo $msg;
}
?>


</div>
<?php  include('footer.php')  ?>