<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/admin/dashboard">Quizzes</a>
        </div>
        <?php if(isset($_SESSION["id"]))
        {
          ?>

         
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if(isset($data)) if($data == "Data") echo "active"; ?>"><a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a></li>
            <?php 
            if(isset($_SESSION["admin"]))
             if($_SESSION["admin"] == "0")
             { 
            ?>
            <li class="<?php if(isset($data)) if($data == "users") echo "active"; ?>"><a href="<?php echo base_url(); ?>index.php/manage/Data/users">Users</a></li>
            <?php 
             }
            ?>
          </ul>

          <ul class="nav navbar-nav navbar-left">
            <li><a href="<?php echo base_url(); ?>index.php/admin/profile">Hello, <?php echo $_SESSION["first_name"]." ".$_SESSION["last_name"]; ?> <span class="label label-warning"><?php if($_SESSION['admin'] == "0") echo "Admin"; else if($_SESSION['admin'] == "1") echo "Tutor";  else echo "Student"; ?></span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      <?php
        }
        ?>
    </nav>
    
    