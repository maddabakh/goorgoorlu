<?php
   session_start();
   
  function lister($table,$colonne)
   {
       $connect = mysqli_connect('localhost','root','','goorgoorlu');
       $result=mysqli_query($connect,"SELECT * FROM ".$table);
       while ($donnee=mysqli_fetch_assoc($result))
       {
          $info = $donnee[$colonne];
           echo "<option value='".$info."'>".$info."</option>";
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
      <title>GoorGoorlu</title>
      <link rel="stylesheet" href="css/css3.css">
      <link rel="stylesheet" href="css/css2.css">
      <link rel="stylesheet" href="css/css1.css">
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/code.js"></script>
    
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
 
    <script type="text/javascript">
   $(function(){
      setInterval(function(){
         $(".slideshow ul").animate({marginLeft:-600},1200,function(){
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
         })
      }, 2500);
   });
</script>     
       
       <script language="javascript">
       
       
     function valider(champ) {
 
            
   var reg = new RegExp("^[0-9]*$")
   var test = true;
   var i=0;
   var x=champ.value;
           var nb=parseInt(x);
           if (nb<0) {
               alert("Entrer un tarif positif");
               champ.value="";
           }
           
           
   }

  
          
       </script> 
    
        
       
             
   </head>
   <body style="" class="size-1140">
      <header>
         <div id="topbar">
         </div> 
         <nav>
            <div class="line">
               <div class="champs l-2">
                  <p class="logo"><strong>Goor</strong>Goorlu</p>
               </div>
               <div class="top-nav champs l-10">
                  <p class="nav-text">Recherche de services en ligne.</p>
                  <ul class="right">
                     <li class="active-item"><a href="#contrat">Contrats</a></li>
                      <li><a href="#prestataire">Prestataires</a></li>
                     <li><a href="#service">Services</a></li>
                      <li> </li>
                  </ul>
               </div>
                
            </div>
         </nav>
      </header>
       
      <section>
          
         <!-- ppaneau --> 
         <div id="panneau">
            <div id="le-demo" class="le-panneau le-theme"> 
               <div class="item">
                  <img src="medias/image1.jpg" alt="">
                  <div class="line">       
                      
                  </div>
               </div>
               
            </div>
         </div>
          
         <br/><br/><br/>
         <!-- FIRST BLOCK -->
         <div id="first-block">
            <div class="zoom">
                      <h3><font color="#fff"><strong>Administrateur</strong></font></h3>
                      <img src="images/admin.png" alt=''>;  
                   </div >
                     
             </div>
          
        
         <!-- Clients -->
              
              <div class="left">
                 <!-- <div class="champs m-12 l-4 margin-bottom">  -->
                   <div id="contrat" class="champs m-6 l-4 margin-bottom">
                      
                  </div>
                  <div style="width:1300px;" class="center">
                      <br/><br/><br/>
                      <center><div><h2 ><font color="#002b3b"><strong>Liste des tâches</strong></font></h2> </div></center>
                      <br/><br/>
                       <table>
                           <tr> 
                             <th>N° D'identification</th> 
                             <th>NomClient</th>
                             <th>PrénomClient</th>
                             <th>NomPrest</th>
                             <th>PrénomPrest</th>
                             <th>Service</th>
                             <th>Etat</th>
                             <th>Note</th>
                         </tr>  
                        
                           <?php
                              $connect = mysqli_connect('localhost','root','','goorgoorlu');
                              $result=mysqli_query($connect,"SELECT id,nomclient,prenomclient,nom,prenom,service,etat,note FROM travail,prestataire where prestataire=idprestataire");
                              while ($donnee=mysqli_fetch_row($result))
                               {
                                 echo '<tr>';
                                for($i=0;$i<mysqli_num_fields($result);$i++){
                                   $a="<td>".$donnee[$i]."</td>";
                                   if (($i==mysqli_num_fields($result)-1 and ($donnee[$i-1]=='en cours' or $donnee[$i]==-1))){
                                       echo '<td>Néant</td>';
                                   }
                                else{
                                   echo $a;
                                    }
                                  }
                               echo '</tr>';
                              }
                             mysqli_free_result($result);
                             mysqli_close($connect);  

                           ?>
                             
                         
                        </table>
                      <br/><br/><br/>
                      <br/><br/><br/>
                      
                      
                </div>
                
                  
                  
               </div>
               <br/><br/><br/>
               
                      
                    
         
         <div id="prestataire" style="background-color:#6f9600;" style="float:center;">
             <br/><br/><br/>
              <center> <h2><font color="#fff"><strong>Liste des prestataires</strong></font></h2></center>
                      <div class="imageservice" style="position: center">
                          
                      <br/>
                    
                   
                      <center> <table style="width:1300px">
                           <tr> 
                             <th>Email</th> 
                             <th>Nom</th>
                             <th>Prénom</th>
                             <th>Zone</th>
                             <th>Note</th>
                             <th>Service (tarif)</th>
                         </tr>  
                        
                           <?php
                              $connect = mysqli_connect('localhost','root','','goorgoorlu');
                              $result=mysqli_query($connect,"SELECT idprestataire,nom,prenom,zone,moyenne FROM prestataire");
                              while ($donnee=mysqli_fetch_row($result))
                               {
                                 echo '<tr>';
                                for($i=0;$i<=mysqli_num_fields($result);$i++){
                                    if ($i==mysqli_num_fields($result)){
                                        echo '<td>';
                                           $result1=mysqli_query($connect,"SELECT service,tarif FROM prestataire_service where prestataire='".$donnee[0]."'");
                                           while ($donnee1=mysqli_fetch_assoc($result1)){
                                               echo $donnee1["service"].'  '.$donnee1["tarif"].'<br/>';
                                           }
                                         
                                        echo '</td>';
                                        mysqli_free_result($result1);
                                    }
                                    else{
                                    $a="<td>".$donnee[$i]."</td>";
                                    echo $a;
                                    }
                                  }
                               echo '</tr>';
                              }
                             mysqli_free_result($result);
                             mysqli_close($connect);  

                           ?>
                             
                         
                        </table>
                        </center>
                 
                  </div>
               <br/><br/><br/><br/><br/><br/><br/>
            </div>
         
           <div id="service" style="background-color:;" style="float:center;">
               
             <br/>
             <center>
                <h2><font color="#002b3b"><strong>Les Services de la plateforme</strong></font></h2>
                 <br/><br/>
               <div class="slideshow">
                  
	            <ul>
                    <?php
                       $connect = mysqli_connect('localhost','root','','goorgoorlu');
                       $result=mysqli_query($connect,"SELECT * FROM service ");
                       while ($donnee=mysqli_fetch_assoc($result))
                        {
                         $type = $donnee['type'];
                         $image = $donnee['image'];
                         echo '<li><img src="'.$image.'" alt="" /><br/><label><font color="#fff"><b>'.$type.'</b></font></label></li>';
                        }
                       mysqli_free_result($result);
                       mysqli_close($connect);
                    ?>
	            	
	           </ul>
             </div>
             
                <br/><br/><br/>
                          
                  <table style="width: 700px;">        
                          
                      <tr>
                         <th> Services </th>
                      </tr>
                <?php
                      
                       $connect = mysqli_connect('localhost','root','','goorgoorlu');
                       $result=mysqli_query($connect,"SELECT * FROM service ");
                       while ($donnee=mysqli_fetch_assoc($result))
                        {
                         $type = $donnee['type'];
                             echo '<tr>';
                             
                                   $a="<td>".$type."</td>";
                                   echo $a;
                                 
                            echo '</tr>';
                        }
                       mysqli_free_result($result);
                       mysqli_close($connect);
                    ?>
                  </table>
                    
             </center>
                <br/><br/>          
               
                   
                    <form class="customform" action="admin.php" method="post" enctype="multipart/form-data">
                        
                        <div class="champs" style=" width:500px; background-color:; float: left;">
                            
                           <center> <h2><font color="#002b3b"><strong>Ajouter un service </strong></font></h2></center>
                            <br/>
                            <input type="text" placeholder="Service" name="serviceajoute" required>
                            <input type="file" name="imageservice" placeholder="Image" required></br>
                             
                            <br/>
                            <button style="width: 300px; height:250; margin-left: 100px;" class="boutonovale" name="ajouterservice" type="submit" ><strong>Ajouter</strong></button>
                           
                         </div>
                    </form>
                    <form class="customform" action="" method="post">
                         <div class="champs" style="width:500px; background-color:; float: right;">
                          <center> <h2><font color="#002b3b"><strong>Supprimer un service</strong></font></h2></center><br/>
                          
                          <select name="servicepres" required>
                          <?php
                            lister("service","type"); 
                          ?>
                          </select>
                             
                         <button style="width: 300px; height:250; margin-left: 100px;" class="boutonovale" name="supprimerservice" type="" ><strong>Supprimer</strong></button>
                         </div>
                  
                   </form>
                    <br/>
                   <center>
                    <!--
                       <form class="customform" action="admin.php" method="post">
                        
                        <div class="champs" style=" width:500px; background-color:; float: left;">
                            
                           <center> <h2><font color="#002b3b"><strong>Ajouter une zone </strong></font></h2></center>
                            <br/>
                            <input type="text" placeholder="Zone" name="zoneajoute" required>
                             
                            <br/>
                            <button style="width: 300px; height:250; margin-left: 100px;" class="boutonovale" name="ajouterzone" type="submit" ><strong>Ajouter</strong></button>
                           
                         </div>
                    </form>  -->
                   </center>
                  </div>
               <br/><br/><br/><br/><br/><br/><br/>
            </div>
       
       
          
      <script type="text/javascript" src="le-panneau/le.panneau.js"></script>
      <script type="text/javascript">
         jQuery(document).ready(function($) {
            var theme_slider = $("#le-demo");
            $("#le-demo").lepanneau({
                navigation: false,
                slideSpeed: 300,
                paginationSpeed: 400,
                autoPlay: 6000,
                addClassActive: true,
                singleItem: true
            });
            $("#le-demo2").lepanneau({
                slideSpeed: 300,
                autoPlay: true,
                navigation: true,
                navigationText: ["&#xf007","&#xf006"],
                pagination: false,
                singleItem: true
            });
        
          
            $(".next-arrow").click(function() {
                theme_slider.trigger('le.next');
            })
            $(".prev-arrow").click(function() {
                theme_slider.trigger('le.prev');
            })     
        }); 
          var modal = document.getElementById('id01');


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
      </script>
     

   <?php
       $connect = mysqli_connect('localhost','root','','goorgoorlu'); 
    
       if (isset($_POST['ajouterservice'])){
            $service=$_REQUEST['serviceajoute'];
            $extensions = array('.png', '.gif', '.jpg', '.jpeg');
            $extension = strrchr($_FILES['imageservice']['name'], ".");
            $file=$_FILES['imageservice']['name'];
             $target_file ="service/".$file;
            if (in_array($extension,$extensions)){
                copy($_FILES['imageservice']['tmp_name'],$target_file);
                $requete="insert into service(type,image) value ('".$service."','".$target_file."')";
                mysqli_query($connect,$requete);
                header('Location: admin.php');
             }
           else
           {
               echo '<script>alert("Le fichier entré n\'est pas une image");</script>';
           }
          
       }
    
      
      /* if (isset($_POST['ajouterzone'])){
           $connect = mysqli_connect('localhost','root','','goorgoorlu');
           mysqli_query($connect,"insert into zone(id) values ('".$_SESSION['zoneajoute']."'");
           mysqli_close($connect);
          header('Location: prestataire.php#services');

       }*/
    
       mysqli_close($connect);
     ?>


   </body>
</html>