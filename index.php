<?php
	include 'conn.php';
    $database = new Connection();
    $db = $database->openConnection();
    $sql = "SELECT * FROM osoba" ;
?> 
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
				<a class="navbar-brand" href="unos.php">Unos</a>
			</div>
		</nav>

            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Ispis podatka</h2>
                    </div>
                    <table class="table">
					  <thead>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">Ime</th>
						  <th scope="col">Prezime</th>
						  <th scope="col">Email</th>
						  <th scope="col">Adresa</th>
						  <th scope="col">Godine</th>
						  <th scope="col">Telefon</th>
						  <th scope="col">Izmena</th>
						  <th scope="col">Brisanje</th>
						</tr>
					  </thead>
						<tbody class="table-group-divider">
						<?php
							$br = 1;
							foreach ($db->query($sql) as $data) {
							echo "<tr>";
							echo   "<th scope=\"row\">".$br."</th>";
							echo   "<td>".$data['ime']."</td>";
							echo   "<td>".$data['prezime']."</td>";
							echo   "<td>".$data['email']."</td>";
							echo   "<td>".$data['adresa']."</td>";
							echo   "<td>".$data['godine']."</td>";
							echo   "<td>".$data['telefon']."</td>";
							echo   "<td><a href=\"izmena.php?id=".$data['id']."\">Izmeni</a></td>";
							echo   "<td><a href=\"obrisi.php?id=".$data['id']."\">Obriši</a></td>";
							echo "</tr>";
							$br++;
							}
						?>
					  </tbody>
					</table>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>