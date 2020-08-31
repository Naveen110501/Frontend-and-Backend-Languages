<?php
$link=mysqli_connect("localhost", "root","","cricket");
if($link==false)
{ 
die("error:could not connect.".mysqli_connect_error());
}
if(isset($_POST["search"]))
{
  $sql="select * from player";
  if($result=mysqli_query($link,$sql))
   {
     if(mysqli_num_rows($result)>0)
        {
             echo "<table border=1>";
             echo "<tr>";
              echo "<th>firstname</th>";
              echo "<th>lastname</th>";
              echo "<th>age</th>";
               echo "<th>jersey number</th>";
echo "<th>status</th>";
              echo "</tr>";
                 while($row=mysqli_fetch_array($result))
                   {
                       
if($_POST['lastname']==$row['lastname'] && $_POST['firstname']==$row['firstname'] && $_POST['age']==$row['age'] && $_POST['jerseynumber']==$row['jerseynumber'])
     {
echo "<tr>";
             echo "<td>".$row['firstname']."</td>";
              echo "<td>".$row['lastname']."</td>";
              echo "<td>".$row['age']."</td>";
              echo "<td>".$row['jerseynumber']."</td>";
echo "<td>".$row['status']."</td>";
echo "</tr>";
     }
                 }

      echo "</table>";
        }
         else    
          {
             echo "no records";
2
          }
    }

}


if(isset($_POST["add"]))
{
$sql="insert into player(firstname,lastname,age,jerseynumber,status)
VALUES('$_POST[firstname]','$_POST[lastname]','$_POST[age]','$_POST[jerseynumber]','$_POST[status]')";
if(mysqli_query($link, $sql))
{
echo "records added.";
echo "<br>";
echo '<a href="project1.html">click this link to overview the team</a>';
}
else
{
echo "error:$sql".mysqli_error($link);
}


}
if(isset($_POST["overview"]))
{
$sql="select * from player";




if($result=mysqli_query($link,$sql))
   {
       if(mysqli_num_rows($result)>0)
        
 {
              echo "<table border=1>";
             echo "<tr>";
              echo "<th>firstname</th>";
              echo "<th>lastname</th>";
              echo "<th>age</th>";
               echo "<th>jersey number</th>";
echo "<th>status</th>";
              echo "<tr>";
                 while($row=mysqli_fetch_array($result))
                   {
             echo "<tr>";
             echo "<td>".$row['firstname']."</td>";
              echo "<td>".$row['lastname']."</td>";
              echo "<td>".$row['age']."</td>";
              echo "<td>".$row['jerseynumber']."</td>";
echo "<td>".$row['status']."</td>";
             echo "<tr>";
                      }
          }
    }
}
$num=$_POST['jerseynumber'];

if(isset($_POST["delete"]))
{
 $sql="DELETE FROM player WHERE jerseynumber=$num ";
if(mysqli_query($link, $sql))
{
echo "records deleted.";
echo "<br>";
echo '<a href="project1.html">click this link to overview the team</a>';
}
else
{
echo "error:$sql".mysqli_error($link);
}
}


mysqli_close($link);
?>