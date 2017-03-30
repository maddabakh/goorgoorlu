<?php
   session_start();
   
   function lister($table,$colonne)
   {
       $connect = mysqli_connect('localhost','root','','goorgoorlu');
       $result=mysqli_query($connect,"SELECT * FROM ".$table);
       while ($donnee=mysqli_fetch_assoc($result))
       {
          $info = $donnee[$colonne];
           $affiche= "<option value=".$info.">".$info."</option>";
           echo $affiche;
       }
       mysqli_free_result($result);
       mysqli_close($connect);
   }

   function liste_recherche($service)
   {
       $connect = mysqli_connect('localhost','root','','goorgoorlu');
       $result=mysqli_query($connect,"SELECT idprestataire as id,nom,prenom,contact,tarif,moyenne as note FROM prestataire,prestataire_service where idprestataire=prestataire and statut='disponible' and service='".$service."' and zone='".$_SESSION['zoneclient']."' order by note desc");
       while ($donnee=mysqli_fetch_row($result))
       {
           echo '<tr>';
          for($i=0;$i<mysqli_num_fields($result);$i++){
           $a="<td>".$donnee[$i]."</td>";
           echo $a;
          }
           echo '</tr>';
       }
       mysqli_free_result($result);
       mysqli_close($connect);
   }

   function combochoix($service)
   {
       $connect = mysqli_connect('localhost','root','','goorgoorlu');
       $result=mysqli_query($connect,"SELECT idprestataire FROM prestataire,prestataire_service where idprestataire=prestataire and service='".$service."' and statut='disponible' and zone='".$_SESSION['zoneclient']."'");
       while ($donnee=mysqli_fetch_assoc($result))
       {
           $info = $donnee['idprestataire'];
           $affiche= "<option value=".$info.">".$info."</option>";
           echo $affiche;
       }
       mysqli_free_result($result);
       mysqli_close($connect);
   }
   
?>

<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>GoorGoorlu/clients</title>
      <link rel="stylesheet" href="css/css3.css">
      <link rel="stylesheet" href="css/css2.css">
      <link rel="stylesheet" href="css/css1.css">
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/code.js"></script> 
   </head>
 <body class="size-1140">
      <header class='ymgx'>
         <div id="topbar">
         </div> 
         <nav>
            <div class="line">
               <div class="champs l-2">
                  <p class="logo"><strong>Goor</strong>Goorlu</p>
               </div>
                <div class="top-nav champs l-10">
                  <p class="nav-text">Trouver un prestataire</p>
                  <ul class="right">
                    <li class="active-item"><a href="index.php">Accueil</a></li>
                  </ul>
                </div>
             </div>
             <div id="Clients">
            <div class="line">
               <h1 class="section-title">Clients</h1>
               <div class="margin">
                    <div class="champs m-12 l-5">
                        <br/><br/>
                    <h3>Services</h3>
                    <form class="customform" method="post" action="client.php">
                        
                          <div class="champs">
                          <select name="service" required>
                           <?php
                            lister("service","type"); 
                          ?>
                        </select>
                        </div>
                       
                       
                         <div class="champs m-12 l-4"><button class="color-btn" type="submit" name="buttonservicerech">Rechercher</button>
                        
                         <br/> <br/> <br/>
                           <h3><strong>La liste des prestataires disponibles</strong></h3>
                        </div>
                    
                    </form> 
                  </div>              
               </div>
                <br/>
                     <table> 
                         <tr>
                          <th>ID</th> 
                          <th>Nom</th> 
                          <th>Prénom</th>
                          <th>Contact</th>
                          <th>Tarif</th>
                          <th>Note</th>
                         </tr>
                         <?php
                            if (isset($_POST['buttonservicerech'])){
                                $service=$_POST['service'];
                                liste_recherche($service);
                            }
                         ?>
                    </table>
                
                <br/><br/><br/><br/><br/>
             <div class="margin" id="ymgx">
                    <div class="champs m-12 l-5">
                    <h3>Choix</h3>
                    <form class="customform" method="post" action="client.php">
                        
                          <div class="champs">
                          <select name="choix" required>
                             <?php
                                if (isset($_POST['buttonservicerech'])){
                                  $service=$_POST['service'];
                                  $_SESSION['service']=$service;
                                  combochoix($service);
                            }
                            ?>
                        </select>
                        </div>
                    <br/>
                   
                         <div class="champs m-12 l-4"><button class="color-btn" type="submit" name="choixprestataire">Choisir</button></div> </li>
                    
                    </form> 
                  </div>              
               </div>
   
            </div>
            
              <?php
                      if (isset($_POST['choixprestataire'])){
                          $prestatairechoisi=$_POST['choix'];
                          
                          $connect = mysqli_connect('localhost','root','','goorgoorlu');
                          $trouve=0;
                             while($trouve==0){
                                 $trouve=1;
                                 $identifiant="AB".rand(1,1000)."CD".rand(1,1000);
                                 $result=mysqli_query($connect,"select count(*) nombre from travail where id='".$identifiant."'");
                                 while ($donnee=mysqli_fetch_assoc($result))
                                  {
                                    $info = $donnee['nombre'];
                                  }
                                if ($info==1){$trouve=0;}
                             }
                          $requete="insert into travail(id,prestataire,nomclient,prenomclient,note,etat,service) values ('".$identifiant."','".$prestatairechoisi."','".$_SESSION['nomclient']."','".$_SESSION['prenomclient']."',-1,'en cours','".$_SESSION['service']."')";
                          mysqli_query($connect,$requete);
                          echo '<br/><br/><br/>';
                          echo '<h1><font color="#ff00ff">Votre numéro d identifiant pour le suivi du service est <strong>'.$identifiant.'</strong></font></h1>';
                    }
              ?>
            
         </div> 
          <br/>
           
            
           
    <script type="text/javascript" src="le-panneau/le.panneau.js"></script>
    
   </body>
</html>