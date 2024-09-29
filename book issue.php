<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin:200px auto;
            width:700px;
            background-color:skyblue;
            height: 200px;
            
        }
        .container{
            background-color:pink;
            border-radius: 10px;
            border:1px solid black;
        
        }
    </style>
</head>
<body>
 
    <?php
   
    $servername="localhost";
    $username="root";
    $password="";
  
    $conn=mysqli_connect($servername,$username,$password);
  
    if($conn)
    {
      //echo "Connection created successfully <br>";
    }
    else
    {
      //die("Failed".mysqli_connect_error());
      //echo "Connection not created successfully <br>";
    }
  
    
    if(isset($_POST['Con']))
{


    $book=$_POST['book'];
    $author=$_POST['author'];
    $issue_date=$_POST['issue_Date'];
    $return_date=$_POST['return_Date'];
    $remark=$_POST['remark'];
    // echo $book."<br>";
    // echo $author."<br>";
    // echo $issue_date."<br>";
    // echo $return_date."<br>";
    // echo $remark."<br>";


    $sql="SELECT * FROM `library`.`master_book` WHERE `Name_Book`='$book' AND `Author`='$author'";

$result= mysqli_query($conn,$sql);

$Quan=mysqli_fetch_assoc($result);
$Quantity=$Quan['Quantity'];


// $result= mysqli_query($conn,$sql);

    if($result)
    {
       // echo "Sucessfully Fetched<br>";
    }
    else
    {
       // echo "Not Fetched<br>";
    }

    $row=mysqli_num_rows($result);
    //echo $row;

   
    if($row>0)
    {


    $sql="INSERT INTO `library`.`book_issue`(`Book`,`Author`,`Issue_Date`,`Return_Date`,`Remark`) VALUES('$book','$author','$issue_date','$return_date','$remark')";
    if(mysqli_query($conn, $sql))
    {
      
      //header("location:Pet Care.php");
      echo "<div style='text-align:center;background-color:blue;color:white;font-size:25px'>";
      echo "<h>Successfully Issued</h>";
      echo "</div>";
      $cal=$Quantity-1;
      $sql="UPDATE `library`.`master_book` SET `Quantity`='$cal' WHERE `Name_Book`='$book' AND `Author`='$author'";
      //UPDATE `book_issue` SET `Book`='[value-1]',`Author`='[value-2]',`Issue_Date`='[value-3]',`Return_Date`='[value-4]',`Remark`='[value-5]' WHERE 1
     $result1= mysqli_query($conn,$sql);
     if($result1)
     {
        echo "Successfully Changed The Database";
     }
     else{
        echo "Not Changed The Database";
     }
 
    }
    else
    {
        echo "<div style='text-align:center;background-color:Red;color:white;font-size:25px'>";
        echo "<h>Not Issud</h>";
        echo "<div style='text-align:center;background-color:Green;color:white;font-size:25px'>";
      
      } 
    }  
    else{
        echo "<div style='text-align:center;background-color:orange;color:white;font-size:25px'>";
        echo "<h>Book Not Available</h>";
        echo "<div style='text-align:center;background-color:Green;color:white;font-size:25px'>";
    }
    //$sql="SELECT * FROM `library`.`master_book` WHERE `Name_Book`='$book' AND `Author`='$author'";

//$result= mysqli_query($conn,$sql);

// $result= mysqli_query($conn,$sql);

    // if($result)
    // {
    //     echo "Sucessfully Fetched<br>";
    // }
    // else
    // {
    //     echo "Not Fetched<br>";
    // }

    // $row=mysqli_num_rows($result);
    // echo $row;
   
    // if($row>0)
    // {
    // while($res=mysqli_fetch_assoc($result))
    

    // {
        // echo "<div style='text-align:center;background-color:Green;color:white;font-size:25px'>";
        // echo "The Available Quantity of " . $book." is: ".$res['Quantity']."</div>";
        // echo "</div>";

    //    }
    // }
    // else{
        // echo "<div style='text-align:center;background-color:Red;color:white;font-size:25px'>";
        // echo "This Book is Not Available right Now";
//         // echo "</div>";
//     }
 }

    ?>


    <div class="container">
    <h3 style="text-align:center;text-decoration:underline">Book Issue</h3>
    <form action="#" method="post">
    <table style="border:2px red solid;margin: auto;">
        <tr>
            <th style="border:2px red solid">
               Enter Book Name
            </th>
            <th style="border:2px red solid">
                <select name="book">
                    <option name="book1" value="C">C</option>
                    <option name="book1" value="Java">Java</option>
                    <option name="book1" value="Python">Python</option>
                 </select>
             </th>
            
        </tr>
        <tr>
            <td style="border:2px red solid">
               Enter Author 
             </td>
             <td style="border:2px red solid">
                <select name="author">
                    <option name="author1" value="Xlavious">A1</option>
                    <option name="author1" value="Dennis">A2</option>
                    <option name="author1" value="John">A3</option>
                 </select>
              </td>
              
        </tr>
        <tr>
            <td style="border:2px red solid">
               Issue Date 
             </td>
             <td style="border:2px red solid">
                 <input type="date" name="issue_Date">
              </td>
             
        </tr>
        <tr>
            <td style="border:2px red solid">
                Return Date
             </td>
             <td style="border:2px red solid">
                <input type="date" name="return_Date">
              </td>
             
        </tr>
        <tr>
            <td style="border:2px red solid">
                Remarks 
             </td>
             <td style="border:2px red solid">
                <input type="text" name="remark">
              </td>
             
        </tr>

       
        <!-- <tr>
            <td style="border:2px red solid">
                Table head from 
             </td>
             <td style="border:2px red solid">
                 Table head To
              </td>
             
        </tr> -->
    </table>
    <div style="display:flex; justify-content: space-between;">
    <button name="Cancel">Cancel</button>
    <button name="Con">Confirm</button>
</div>
</form>
</div>
</body>
</html>