 <?php
require  'conn.php';

if(isset($_POST['submit']))
{    

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
	$adresa = $_POST['adresa'];
    $godine = $_POST['godine'];
    $telefon = $_POST['telefon'];
	 
	$database = new Connection();
    $db = $database->openConnection();
    $sql = "UPDATE osoba SET ime=? , prezime = ? , email = ?, adresa= ? , godine =?, telefon = ? WHERE `id` = ".$_POST['id'] ;
    $stm = $db->prepare($sql);
	$stm->execute([$ime, $prezime, $email, $adresa, $godine, $telefon]);
	 
	header('Location: index.php');
}

	$database = new Connection();
    $db = $database->openConnection();
    $sql = "SELECT * FROM osoba WHERE `id` = ".$_GET['id'] ;
	$stmt = $db->query($sql);
	$data = $stmt->fetch(); 

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unos osobe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
			<nav class="navbar bg-body-tertiary">
				<div class="container-fluid">
					<a class="navbar-brand" href="index.php">Povratak na početak</a>
				</div>
			</nav>
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Kontakt forma</h2>
                    </div>
                    <form action="izmena.php" method="post">
                        <div class="form-group">
                            <label>Ime</label>
                            <input type="text" name="ime" class="form-control" required value = "<?php echo $data['ime'];?>">
                        </div>
						<div class="form-group">
                            <label>Prezime</label>
                            <input type="text" name="prezime" class="form-control" required value = "<?php echo $data['prezime'];?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required value = "<?php echo $data['email'];?>">
                        </div>
                        <div class="form-group">
                            <label>Adresa</label>
                            <input type="text" name="adresa" class="form-control" required value = "<?php echo $data['adresa'];?>">
                        </div>
						<div class="form-group">
                            <label>Broj Godina</label>
                            <input type="text" name="godine" class="form-control" required value = "<?php echo $data['godine'];?>">
                        </div>
						<div class="form-group">
                            <label>Broj telefona</label>
                            <input type="mobile" name="telefon" class="form-control" required value = "<?php echo $data['telefon'];?>">
                        </div>
						<input type="hidden" name="id" class="form-control" required value = "<?php echo $data['id'];?>">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>