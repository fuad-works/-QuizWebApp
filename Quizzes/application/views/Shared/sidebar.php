    <!--section id="breadcrumb">
        <div class="container">
          <ol class="breadcrumb">
              <li class="active">Main</li>
          </ol>  
        </div>
    </section-->


    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                        <section id="breadcrumb">
                                <div class="container">
                                  <ol class="breadcrumb">
                                      <li class="active">Home</li>
                                  </ol>  
                                </div>
                        </section>

                        <div class="list-group">
                        <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="list-group-item <?php if(isset($data)) if($data == "Data") echo "active"; ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  Home   </a>
                        <?php 
            if(isset($_SESSION["admin"]))
             if($_SESSION["admin"] == "1")
             { 
            ?>
                 <a href="<?php echo base_url(); ?>index.php/manage/Data/exams" class="list-group-item <?php if(isset($data)) if($data == "exams") echo "active"; ?>"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span>  Manage Quizzes <span class="badge"><?php if(isset($adsC)) echo $adsC; ?><span></span></a>
                 <a href="<?php echo base_url(); ?>index.php/manage/Exams" class="list-group-item <?php if(isset($data)) if($data == "questions") echo "active"; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Manage Questions  <span class="badge"><?php if(isset($markterC)) echo $markterC; ?><span></span></a>
            <?php 
             } 
            if(isset($_SESSION["admin"]))
             if($_SESSION["admin"] == "3")
             { 
            ?>
                <a href="<?php echo base_url(); ?>index.php/manage/Data/students_log" class="list-group-item <?php if(isset($data)) if($data == "students_log") echo "active"; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Results <span class="badge"><?php if(isset($clientC)) echo $clientC; ?><span></span></a>
            <?php 
             }

            if(isset($_SESSION["admin"]))
             if($_SESSION["admin"] == "0")
             { 
            ?>
            <a href="<?php echo base_url(); ?>index.php/manage/Data/users" class="list-group-item <?php if(isset($data)) if($data == "users") echo "active"; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Users</a>
            <?php 
             }
            ?>
                        </div>
<hr />


                </div>
                <div class="col-md-9">
