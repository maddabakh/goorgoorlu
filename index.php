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
    
       function verifemail(champ){
         
        
         
         var x="<?php echo $nombre;?>";
         if(x==1){
             alert("Email déjà utilisé");
             champ.value="";
         }
     }
       
       </script>
       
       <script language="javascript">
       
     
     
          
     function valider(a,champ) {
 
            
   var reg = new RegExp("^[0-9]*$")
   var test = true;
   var i=0;
   var x=champ.value;
   switch(a){
       case 0:
           while(i<champ.value.length && test==true){
               test=reg.test(champ.value[i]);
               i++;
           }
           if (x.length!=9 || !test){ test=false;}
           break;
    
       case 1:
           if(x.substring(x.length-14,x.length)!="@goorgoorlu.sn"){
               test=false;
           }
           break;
       case 2:
           var nb=parseInt(x);
           if (nb<0) {test=false;}
           break;
           
   }
  if (!test) {
    if (a==0){alert("Numero de telephone incorrect"); }
    if(a==1) { alert("Email incorrect"); }  
    if(a==2) { alert("Entrer un tarif positif"); }
    
      champ.value="";
  }
  
}
  
          
       </script> 
       




       
   </head>
   <body class="size-1140">
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
                     <li class="active-item"><a href="#panneau">Accueil</a></li>
                      <li><a href="#Clients">Clients</a></li>
                     <li><a href="#services">Prestataires</a></li>
                      <li><a href="#Nous">Nous</a></li>  
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
            <div class="line">
               <h1>Vous Serez servis</h1>
               <p>en quete d'un service quelconque ?</span></p>
               <div class="champs m-4 l-2 center"><a class="white-btn" href="#Nous">Nous</a></div>
               <br/><br/>
              <center>
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
             </center>
            </div>
         </div>
         <!-- Clients -->
          <div id="Clients">
            <div class="line">
               <h2 class="section-title"><font color="#002b3b">Clients</font></h2>
               <div class="margin">
                    <div class="champs m-12 l-5">
                    <h3>Vos Coordonnees </h3>
                    <form name='formulaire' id="abcde" class="customform" method="post" action="verification.php">
                  
                      <div class="champs"><input name="prenomcl" placeholder="prenom" title="prenomcl" type="text" required/></div>
                      <div class="champs"><input name="nomcl" placeholder="nom" title="nomcl" type="text" required/></div>
                      <div class="champs"><input type="tel" name="numerocl" onblur="valider(0,this)" id="conts"  placeholder="77-000-00-00" required/></div>
                        <div class="champs">
                         <select name="zonecl" required>
                          <?php
                            lister("zone","id"); 
                          ?>
                        </select></div>
                        <div class="champs"><input name="adressecl" placeholder="18 Avenue El Hadji Malick SY" title="emailcl" type="text" required/></div>
                      <div class="champs m-12 l-4"><button class="color-btn" name="buttonrechercherpres" type="submit">Rechercher prestataire</button></div>
                    </form>
                  </div> 
                   <br/><br/><br/><br/><br/><br/>
                    <div style="float : right;" class="champs m-12 l-4 "> 
                   <form method="post" action="index.php">
                   <input name="numident" placeholder="Code d'identification" style="float: right;width:300px;" type="text" required/> 
                   <button class="signupbtn" name="suivitravail" style="width:300px; float: right;"  type="submit"><strong>Suivi du travail confié</strong></button>
                  </form>  
                  </div>
               </div>
            </div>
         </div> 
         <!-- SERVICES -->
         <div id="services">
            <div class="line">
               <h2 class="section-title">Prestataires</h2>
               <div class="margin">
                  <div class="champs m-6 l-4 margin-bottom">
                    <style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}


button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

.cancelbtn,.signupbtn {float:left;width:50%}

.container {
    padding: 16px;
}

.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; 
    border: 1px solid #888;
    width: 80%; 
}

.close {
    position: absolute;
    right: 35px;
    top: 15px;
    color: #000;
    font-size: 40px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

<h2>Inscription Prestataire</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Inscription</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form id="abcd"  class="modal-content animate" method="post" action="verification.php" enctype="multipart/form-data">
    <div class="container">
        <label><b>Services</b></label><br/>
          <select name="servicepres" required>
                          <?php
                            lister("service","type"); 
                          ?>
                      </select>&nbsp;
        <label><b>tarif</b></label>
      <input type="number" placeholder="Tarif" onblur="valider(2,this)" name="tarif" required><br/>
        <label><b>Zone</b></label><br/>
          <select name="zonepres" required>
                          <?php
                            lister("zone","id"); 
                          ?>
                      </select><br/>
        <label><b>Adresse</b></label>
      <input type="text" placeholder="Adresse" name="adressepres" required>
        
        <label><b>Nom</b></label>
      <input type="text" placeholder="Nom" name="nompres" required>
        
      <label><b>Prenom</b></label>
      <input type="text" placeholder="Prenom" name="prenompres" required>
        
        <label><b>Contact</b></label><br/>
        <input type="tel" name="numeropres" id="cont" onblur="valider(0,this)" placeholder="77-000-00-00" required/><br/>
        
        <label><b>Email</b></label><br/>
      <input type="email" placeholder="Email" onblur="valider(1,this)" name="emailpres" required> <br/>   

      <label><b>mot de passe</b></label>
        <input type="password" placeholder="mot de passe" name="mdppres" required>
      
          <label><b>Photo : </b></label>
      <input type="file" name="image" required></br>
      

     
        
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
        <button type="submit" name="buttoninscrippres" class="signupbtn">Valider</button>
      </div>
    </div>
  </form>
</div>
    </div>
                  </div>
                  <div class="champs m-6 l-4 margin-bottom">
                     <div class="service-text">
                        <h3>Espace reserve aux Prestataires</h3>
                        <p>Un prestataire se doit de fournir les des services dans son domaine de predilection selon les demandes du client.</p>
                     </div>
                  </div>
                  <div class="champs m-12 l-4 margin-bottom">
                     <div class="service-text">
                        <h3>Connexion</h3>
                         <form class="customform" method="post" action="index.php">
                        <div class="champs"><input name="pseudoconnect" placeholder="abc@goorgoorlu.sn" type="text" required/>
                             </div>
                         <div class="champs"><input name="mdpconnect" placeholder="mot de passe" type="password" required/>
                             </div>
                              <input type="checkbox" name="souvenir" > Se souvenir de moi.
                         <div class="champs m-12 l-4"><button class="color-btn" name="connectionvalid" type="submit">Go! </button>
                             </div>
                             </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- CONTACT -->
          <div id="Nous">
            <div class="champs m-12 l-6 media-container">
               <img src="medias/image2.jpg" alt="">
            </div>
            <article class="champs m-12 l-6">
               <h2>Goor<br>Goor<br> Lu</h2>
               <p>Ce site a été réalisé par des étudiants dans le cadre d'un projet d'études et ne doit pas être utilisé à d'autres fins sans l'accord du professeur et des étudiants. L'equipe Goorgoorlu.
               </p>
            </article>
             <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
         </div>
      </section>
     
      <footer>
          <p>Merci de votre visite.</p>
          <br/><br/><br/><br/>
      </footer>
       
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

// la ou lutilisateur click apart sur le tableau rek ca se ferme,
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
      </script>
     

   <?php
      



    if (isset($_POST['connectionvalid'])){
        if (!isset($_SESSION['presconnect'])){
              header('Location: index.php');
          }
        $connect = mysqli_connect('localhost','root','','goorgoorlu'); 
           $login=$_REQUEST['pseudoconnect'];
           $mdp=$_REQUEST['mdpconnect'];
               $result=mysqli_query($connect,"SELECT * FROM prestataire where idprestataire='".$login."'");
               $trouve=0;
               while ($donnee=mysqli_fetch_assoc($result)){
               if($donnee['motdepasse']==$mdp){
                   $trouve=1;
                }
               }
               mysqli_free_result($result);
               if ($trouve==1){
                   $_SESSION['presconnect']=$login;
                   if (isset($_POST['souvenir'])){
                     $_SESSION['presconnectmdp']=$mdp;
                    }
                   header ('Location: prestataire.php');
              }
              else{ echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect");</script>';
              }
      
         mysqli_close($connect);
    }

   
       if (isset($_POST['deconnexion'])){
           session_destroy();
       }  
          
      



       if (isset($_POST['suivitravail'])){
           $ident=$_REQUEST['numident'];
           $a=0;
           $connect = mysqli_connect('localhost','root','','goorgoorlu');
           $requete="select * from travail where id='".$ident."'";
           $result= mysqli_query($connect,$requete);
           while ($donnee=mysqli_fetch_assoc($result))
             {
                 $etat=$donnee['etat'];
                 $note=$donnee['note'];
                 $a=1; 
            }
          if ($a==1){
              if($etat=="a fait"){
                  if ($note<0){
                   $_SESSION['numident']=$ident;
                   header ('Location: clientnote.php');
                  }
                  else{echo '<script>alert("Travail terminé et déjà noté");</script>';}
              }
              else{echo '<script>alert("Vous ne pouvez pas noter un travail que votre prestataire n\'a pas encore termine ");</script>';}
          }
           else {
               echo '<script>alert("Ce numéro d identification n\'existe pas ");</script>'; 
           }
           
           mysqli_close($connect);
       }
     ?>



   </body>
</html>