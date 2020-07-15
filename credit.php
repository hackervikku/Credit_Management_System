<?php
include 'dbconnection.php';
$amterr = "";
if(isset($_POST['done']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amt = $_POST['amount'];
    $q = "SELECT * from allusers where id=$from";
    $query = mysqli_query($conn,$q);
    $q1 = mysqli_fetch_array($query);
    $q = "SELECT * from allusers where id=$to";
    $query = mysqli_query($conn,$q);
    $q2 = mysqli_fetch_array($query);
    if($amt > $q1['credit_status'])
    {
        $amterr = "Insufficient Balance";
    }
    else {
        $newcredit = $q1['credit_status'] - $amt;
        $q = "UPDATE allusers set credit_status=$newcredit where id=$from";
        mysqli_query($conn,$q);

        $newcredit = $q2['credit_status'] + $amt;
        $q = "UPDATE allusers set credit_status=$newcredit where id=$to";
        mysqli_query($conn,$q);
        
        $sname = $q1['name'];
        $rname = $q2['name'];

        $q = "INSERT INTO `transactions`(`sid`,sname, `rid`,rname, `amount`, `time`) VALUES ('$from','$sname','$to','$rname','$amt',now());";
        mysqli_query($conn,$q);
    }
    header('location:index.php');
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
    
    <div class="w3-card-4 w3-mobile" style="width:40%;margin-left:30%;background-color:#ffffff;">
        
        <header class="w3-container w3-teal">
            <h2 class="w3-text-white w3-center"> <i><b>Transfer Credits</i></b> </h2>
        </header>
        <form method="post" name="tcredit" style="margin-left:10%;margin-right:10%"><br/>
            <?php
                include 'dbconnection.php';
                $sid=$_GET['id'];
                $q = "SELECT * FROM allusers where id=$sid";
                $query=mysqli_query($conn,$q);
                if(!$query)
                {
                    echo "Error ".$q."<br/>".mysqli_error($conn);
                }
                $res=mysqli_fetch_array($query);
            ?>
            <label> From </label><br/>
                <?php echo $res['name']; ?><br/>
                <?php echo $res['email']; ?><br/>
                <?php echo $res['phno']; ?><br/><br/>
            <label>To</label>
            <select class="w3-select w3-card-2" name="to" style="margin-bottom:5%">
            <option value="" disabled selected> To </option>
            <?php
                include 'dbconnection.php';
                $sid=$_GET['id'];
                $q = "SELECT * FROM allusers where id!=$sid";
                $query=mysqli_query($conn,$q);
                if(!$query)
                {
                    echo "Error ".$q."<br/>".mysqli_error($conn);
                }
                while($res = mysqli_fetch_array($query)) {
            ?>
                <option value="<?php echo $res['id'];?>">
                <?php echo $res['name']; ?>
                <?php echo $res['email']; ?>
                <?php echo $res['phno']; ?>
                </option>
            <?php } ?>
            </select>
            <label>Amount</label>
            <input class="w3-input" style="margin-bottom:7%" name="amount" required/> <p class="error"></p><?php echo $amterr;?></p>
            
            <button class="w3-button w3-green w3-round" name="done" type="submit" style="margin-bottom:4%;margin-left:1%">Submit</button>
            
        </form>
    </div>
    </body>
</html>