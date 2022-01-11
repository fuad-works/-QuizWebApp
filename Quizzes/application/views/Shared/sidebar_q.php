    <!--section id="breadcrumb">
        <div class="container">
          <ol class="breadcrumb">
              <li class="active">الرئيسية</li>
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
                                      <li class="active">Questions</li>
                                  </ol>  
                                </div>
                        </section>

                        <div class="list-group">
                        <?php
                        $count = 1;
                        foreach($questions as $q1 )
                        {
                            ?>
                            <a href="<?php echo base_url(); ?>index.php/manage/Exam/<?php echo $exam_id; ?>/start/<?php echo $count; ?>" class="list-group-item <?php if(isset($q_count)) if($q_count == $count) echo "active"; ?>"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Question <?php echo $count; ?>   </a>
                            <?php
                            $count++;
                        }
                        ?>
                        </div>
<hr />


                </div>
                <div class="col-md-9">
