<?php
include 'templates/header.php';
?>
        
            <!-- Left nav
            ================================================== -->
            <div class="row">
              <div class="span3 bs-docs-sidebar">
                <ul class="nav nav-list bs-docs-sidenav">
                  <li class="active">
                      <a href="index.php">
                          <i class="icon-home glyphicon glyphicon-home"></i>
                          <i class="icon-chevron-right glyphicon glyphicon-chevron-right"></i> 
                          <?php echo ASLang::get('home'); ?>
                      </a>
                  </li>
                        <li class="active">
                      <a href="hrmdatabase.php">
                          <i class="icon-home glyphicon glyphicon-home"></i>
                          <i class="icon-chevron-right glyphicon glyphicon-chevron-right"></i> 
                          <?php echo ASLang::get('dbms'); ?>
                      </a>
                  </li>
                        
                  <li>
                      <a href="profile.php">
                          <i class="icon-user glyphicon glyphicon-user"></i>
                          <i class="icon-chevron-right glyphicon glyphicon-chevron-right"></i> 
                          <?php echo ASLang::get('my_profile'); ?>
                      </a>
                  </li>
           
                  <?php if($user->isAdmin()): ?>
                  <li>
                      <a href="users.php">
                          <i class="icon-fire glyphicon glyphicon-fire"></i>
                          <i class="icon-chevron-right glyphicon glyphicon-chevron-right"></i> 
                          <?php echo ASLang::get('users'); ?>
                      </a>
                  </li>
                  <li>
                      <a href="user_roles.php">
                          <i class="icon-fire glyphicon glyphicon-fire"></i>
                          <i class="icon-chevron-right glyphicon glyphicon-chevron-right"></i> 
                          <?php echo ASLang::get('user_roles'); ?>
                      </a>
                  </li>
                  <?php endif;
                        ?>
                </ul>
              </div>
              </div>
            </div>
        
    <?php include 'templates/footer.php';
     ?>

    <script src="ASLibrary/js/asengine.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="ASLibrary/js/index.js" charset="utf-8"></script>
  </body>
</html>
