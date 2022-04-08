<?php
     //Importation du fichier de connextion
     require_once('connect.php');

     // on test
     if(isset($_GET['page']))
     {
          $page = $_GET['page'];
     }
     else
     {
          $page = 1;
     }

     //on definie une limite d'etudiant par page
     $nbr_par_page = 04;

     $start_from = ($page-1)*04;

     //On affiche tous les etudiants
     //$query = "select * from etudMasterInfo";

     //On affiche tous les etudiants
     $query = "select * from etudMasterInfo limit $start_from, $nbr_par_page";
     $result = mysqli_query($con,$query);

?>



<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv= "X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="bootstrap.css">
     <title> Pagination en php</title>
     
</head>
<body>
     <table class="table table-borderrd"> 
          <tr>
               <th>id</th>
               <th>nom</th>
               <th>prenom</th>
               <th>message</th>
          </tr>
          <tr>
               <?php
                    //Iteration sur la base de données pour 
                    //recuperer les données.
                    while($data = mysqli_fetch_assoc($result))
                    {
               ?> 
                   <td>  <?php echo $data ['id']?></td> 
                   <td>  <?php echo $data ['nom']?></td> 
                   <td>  <?php echo $data ['prenom']?></td>
                   <td>  <?php echo $data ['message']?></td>  

          </tr>
               <?php
                     }
               ?>
     </table>

     <?php
          $query2 = "select * from etudMasterInfo ";
          $result2 = mysqli_query($con,$query2); 
          $enregistrement_etudiant_total = mysqli_num_rows($result2);
          //echo $enregistrement_etudiant_total;

          //on definit le nombre d'etudiant a afficher par page en arrodissant 
          $page_total = ceil($enregistrement_etudiant_total/$nbr_par_page);

          //echo $page_total;

          for($i = 1; $i <= $page_total; $i++ )
          {
               echo" <a href='index.php?page=".$i."'class='btn btn-success'>$i</a>";
          }
     ?>


</body>
</html>


