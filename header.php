
<header>
<div class="mobile">
   <div class="header"></div>
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
  </label>
<div id="sidebarMenu">
    <nav>
    <ul class="sidebarMenuInner">
      <li><span>CATEGORIES</span></li>
      <li><a href="page_xbox.php" target="_blank">XBOXx ONE|XBOX SERIES S|X</a></li>
      <li><a href="page_playstation.php" target="_blank">PLAYSTATION 4|5</a></li>
      <li><a href="page_switch.php" target="_blank">SWITCH</a></li>
      <li><a href="page_pc.php" target="_blank">PC</a></li>
      <li><a href="page_enfant.php" target="_blank">ENFANTS</a></li>
      <li><a href="page_adulte.php" target="_blank">ADULTES</a></li>
      <li><a href="http://www.1980-games.com/?msclkid=a27b45c7cf9911eca923896ebd2b115f" target="_blank">JEUX ANCIENS</a></li>
     <?php if(!isset ($_SESSION ['user'])){ ?>
      <li><a href="test_connexion2.php">SE CONNECTER</a></li>
     <?php }else{ ?>
      <li><a href="deconnexion.php">SE DECONNECTER</a></li>
       <?php } ?>
      <li><a href="formulaire_inscription.php">CREER UN COMPTE</a></li>
    </ul>
    </nav> 
      </div>
</div>

    <nav class="grand_ecran">
        <ul>
          <li class="deroulant"><a href="#">PLATEFORMES JEUX &ensp;</a>
            <ul class="sous">
              <li><a href="page_xbox.php">XBOX ONE|XBOX SERIES S|X</a></li>
              <li><a href="page_playstation.php">PLAYSTATION 4|5</a></li>
              <li><a href="page_switch.php">SWITCH</a></li>
              <li><a href="page_pc.php">PC</a></li>
            </ul>
          </li>
          <li class="deroulant"><a href="#">CATEGORIE &ensp;</a>
            <ul class="sous">
              <li><a href="page_enfant.php">ENFANTS</a></li>
              <li><a href="page_adulte.php">ADULTES</a></li>
            </ul>
          </li>
          <li><a href="http://www.1980-games.com/?msclkid=a27b45c7cf9911eca923896ebd2b115f">JEUX ANCIENS</a></li>
          <?php if(!isset ($_SESSION ['user'])){ ?>
      <li><a href="test_connexion2.php">SE CONNECTER</a></li>
     <?php }else{ ?>
      <li><a href="deconnexion.php">SE DECONNECTER</a></li>
       <?php } ?>
          <li>
      <a href="formulaire_inscription.php">CREER UN COMPTE</a></li>
        </ul>
      </nav>
      
  </div>
</header>