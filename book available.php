<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: skyblue;
        }
     </style>
</head>
<body>

    <?php
    //echo "Dharani Mahata";
 
    $servername="localhost";
   $username="root";
   $password="";
 
   $conn=mysqli_connect($servername,$username,$password);
 
   if($conn)
   {
     echo "Connection created successfully <br>";
   }
   else
   {
     //die("Failed".mysqli_connect_error());
     echo "Connection not created successfully <br>";
   }
 
 
   if(isset($_POST['search']))
{


    $book=$_POST['book'];
    $author=$_POST['main-author'];
    echo $book;
    echo $author;
    $sql="SELECT * FROM `library`.`master_book` WHERE `Name_Book`='$book' AND `Author`='$author'";

$result= mysqli_query($conn,$sql);

// $result= mysqli_query($conn,$sql);

    if($result)
    {
        echo "Sucessfully Fetched<br>";
    }
    else
    {
        echo "Not Fetched<br>";
    }

    $row=mysqli_num_rows($result);
    echo $row;
   
    if($row>0)
    {
    while($res=mysqli_fetch_assoc($result))
    

    {
        echo "<div style='text-align:center;background-color:Green;color:white;font-size:25px'>";
        echo "The Available Quantity of " . $book." is: ".$res['Quantity']."</div>";
        echo "</div>";

       }
    }
    else{
        echo "<div style='text-align:center;background-color:Red;color:white;font-size:25px'>";
        echo "This Book is Not Available right Now";
        echo "</div>";
    }
}
?> 

    <div style="width:500px;border:solid darkblue 2px;margin:200px auto;">
        <h3 style="text-align: center;">Book Availability</h3>
        <form action="#" method="post">
        <div style="display:flex; justify-content: space-around">
           
            <h4>Enter Book Name</h4>
            <h4><select name="book">
               <option name="book1" value="C++">C++</option>
               <option name="book1" value="Java">Java</option>
               <option name="book1" value="Python">Python</option>
            </select>
           </h4>
        </div>
        <div style="display:flex; justify-content: space-around">
            
            <h4>Enter Author Name</h4>
            <h4><select name="main-author">
                <option name="author" value="Xlavious">Author1</option>
                <option name="author" value="Dennis">Author2</option>
                <option name="author" value="John">Author3</option>
             </select>
            </h4>
        </div>

        <div style="display:flex; justify-content: space-between;">
            <button name="Back">Back</button>
            <button name="search">Search</button>
        </form>
        </div>
    </div>
</body>
</html>