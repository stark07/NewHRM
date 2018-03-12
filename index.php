<?php
include 'templates/header.php';
?>
        
            <!-- Left nav
            ================================================== -->
<?php
include 'site/database.php';
?>
            <div class="row">
              <div class="span3 bs-docs-sidebar">
                <ul class="nav nav-list bs-docs-sidenav">

                  <?php if($user->isAdmin()): ?>
                  
                  
                  <?php endif;
                        ?>
                </ul>
              </div>
              </div>
            </div>

    <script src="ASLibrary/js/asengine.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="ASLibrary/js/index.js" charset="utf-8"></script>
  </body>
</html>
