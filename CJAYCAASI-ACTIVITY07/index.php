<?php
    include_once("config.php");

    $result = mysqli_query($mysqli, "SELECT * FROM fam_quotes");

    //initialize session
    session_start();

    if( !isset($_SESSION['email']) || empty($_SESSION['email']))
    {
        header('location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href='css/styles.css' type='text/css' rel='stylesheet'/>
    <title>CRUD</title>
</head>
<body>

    
    
    <div class= container-fluid>
    <div class="col-10 mx-auto">
    <table class="table table-bordered table-striped table-dark">

     

    <thead class="">
    <td id="THEADER" colspan="5"> <a><h2 class="text-center">FAMOUS QUOTES</h1></a> <a href="add.html" class=" btn"> ADD </a>  <a href="logout.php" class="btn">LOG OUT</a></td>   
    
            <tr>
                <td> Authors </td>
                <td> Quotes</td>
                <td> Update </td> 
             </tr>
        
            <?php
                while( $res = mysqli_fetch_array($result))
                {
                    echo "<tr>";

                    echo "<td>".$res['author']."</td>";
                    echo "<td>".$res['quote']."</td>";
                    echo "<td><a href=\"edit.php?id=$res[id]\">EDIT</a> <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this record?')\">DELETE</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>

      
    </div>
</body>
</html>