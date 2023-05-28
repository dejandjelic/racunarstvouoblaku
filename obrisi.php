 <?php
require  'conn.php';
try
{
     $database = new Connection();
     $db = $database->openConnection();
	 
     $sql = "DELETE FROM osoba WHERE `id` = ".$_GET['id'] ;
	 
     $affectedrows  = $db->exec($sql);
	if(isset($affectedrows))
    {
       echo "Osoba uspešno obrisana";
	   header('Location: index.php');
    }          
}
catch (PDOException $e)
{
   echo "Došlo je do problema: " . $e->getMessage();
}
?>