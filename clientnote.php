<?php
   session_start();

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
       
       
      <script language="javascript">
       
       
     function valider(champ) {
 
   var test = true;
   var x=champ.value;
           var nb=parseFloat(x);
           if (nb<0 || nb>20) 
           {
               alert("Entrer une note 0-20");
               champ.value="";
           }
           
   }
  
  
          
       </script> 
       
       
       
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
                <div class="champs m-12 l-4">
               <h4 class="section-title"><strong>Client</strong></h4><br/>
                <?php
  
                    $connect = mysqli_connect('localhost','root','','goorgoorlu');
                    $result=mysqli_query($connect,"SELECT nomclient,prenomclient,service,nom,prenom,contact,prestataire FROM travail,prestataire where id='".$_SESSION['numident']."' and idprestataire=prestataire");
                    while ($donnee=mysqli_fetch_assoc($result))
                     {
                        $nomclient = $donnee['nomclient'];
                        $prenomclient = $donnee['prenomclient'];
                        $nomprestataire = $donnee['nom'];
                        $prenomprestataire = $donnee['prenom'];
                        $contact=$donnee['contact'];
                        $service=$donnee['service'];
                        $prestataire=$donnee['prestataire'];
                        
                    }
                     echo "<h5> Nom: ".$nomclient."</h5><br/> "."<h5> Prénom: ".$prenomclient."</h5><br/><br/> "."<h4 class='section-title'><strong>Prestataire</strong></h4><br/>"."<h5> Nom: ".$nomprestataire."</h5><br/> "."<h5> Prenom: ".$prenomprestataire."</h5><br/> "."<h5> Contact: ".$contact."</h5><br/><br/> "."<h4 class='section-title'><strong>Service</strong></h4><br/>".
                         "<h5> Type: ".$service."</h5><br/> ";
                       
                   mysqli_free_result($result);
                   mysqli_close($connect);
   
              ?>
               </div>
                <br/>
                
                <br/><br/><br/><br/><br/>
             <div class="margin" id="ymgx">
                    <div class="champs m-12 l-5">
                    <h3>Notez le prestataire</h3>
                    <form class="customform" method="post" action="clientnote.php">
                          <div class="champs">
                          <input name="note" type="number" step="any" onblur="valider(this)"  required>
                        </input>
                        </div>
                        <br/>
                        <div class="champs m-12 l-4"><button class="color-btn" type="submit" name="noteprestataire">Valider</button></div> </li>
                    </form> 
                  </div>              
               </div>
   
            </div>
            
         </div> 
          <br/>        
         
     
     
    <script type="text/javascript" src="le-panneau/le.panneau.js"></script>
    
     <?php
       if (isset($_POST['noteprestataire'])){
           $connect = mysqli_connect('localhost','root','','goorgoorlu');
           $requete="update prestataire set total=total+".$_REQUEST['note']." where idprestataire='".$prestataire."'";
           mysqli_query($connect,$requete);
           $requete="update travail set note=".$_REQUEST['note']." where id='".$_SESSION['numident']."'";
           mysqli_query($connect,$requete);
           $requete="select count(*) nombre from travail where prestataire='".$prestataire."' and etat='a fait'";
           $result= mysqli_query($connect,$requete);
           while ($donnee=mysqli_fetch_assoc($result))
             {
                 $nombre=$donnee['nombre'];
            }
           $nombre=$nombre+1;
           $requete="select * from prestataire where idprestataire='".$prestataire."'";
           $result= mysqli_query($connect,$requete);
           while ($donnee=mysqli_fetch_assoc($result))
             {
                 $total=$donnee['total'];
            }
           $moyenne=$total/$nombre;
           $moyenne=number_format($moyenne,2); 
           $requete="update prestataire set moyenne=".$moyenne." where idprestataire='".$prestataire."'";
           mysqli_query($connect,$requete);
           
           mysqli_close($connect);
           header('Location: index.php');
       }
     ?>
     
   </body>
</html>