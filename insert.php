<?php
include 'dbconnection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phno = $_POST['phno'];
        $c = $_POST['credit'];
        $g = $_POST['gender'];
        $q = "INSERT INTO allusers(name,email,phno,credit_status,gender) VALUES ('$username','$email',$phno,$c,'$g')";
        $query = mysqli_query($conn,$q);
    }
?>

<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="w3.css">
        <link rel = "stylesheet" href="style2.css">
    </head>
    <body>
    <br/><br/><br/>
    
    <div class="w3-card-4 w3-mobile" style="width:50%;background-color:#ffffff;margin-left:25%;margin-top:-2%">
        
        <header class="w3-container w3-teal"><br/>
            <h2 class="w3-text-white w3-center w3-mobile"> <b><i>ADD NEW USER</b></i> </h2>
            <div><br/>
            <a href="index.php"><button class="w3-button w3-right w3-mobile" style="margin-top:-12%">&#10094;</button></a>
            </div>
        </header>
        <form class="na" name="newuser" method="post" style="margin-left:10%;margin-right:10%" onsubmit="mysuccess()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" ><br/>
            <label> Name : </label><br/>
            <input type="text" name="username" class="w3-input w3-hover-light-grey" required><br/>
            <label> Email : </label><br/>
            <input type="email" name="email" class="w3-input w3-hover-light-grey" required><br/>
            <label> Contact No. : </label><br/>
            <input type="number" name="phno" class="w3-input w3-hover-light-grey" required><br/>
            <label> Deposit Credit : </label><br/>
            <input type="number" name="credit" class="w3-input w3-hover-light-grey"required><br/>
            <label> Gender : </label><br/><br/>
            <label> Male : </label>
            <input type="radio" name="gender" class="w3-radio" value="m" required>
            <label> Female: </label>
            <input type="radio" name="gender" class="w3-radio" value="f" required><br/><br/><br/>
            <input type="submit" value="Submit" class="w3-button w3-light-green w3-round"/>
            <br/><br/>
        </form>
        <script type="text/javascript">
            function mysuccess()
            {
            alert("Submitted Successfully");
        }
        </script>
    </div>
    </body>
</html>