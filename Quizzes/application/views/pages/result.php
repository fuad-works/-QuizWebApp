<section id="breadcrumb">
                                <div class="container">
                                  <ol class="breadcrumb">
                                      <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a></li>
                                      <li class="active">Quiz Ended</li>
                                  </ol>  
                                </div>
                        </section>

                        <div class="panel panel-warning">
                        <div class="panel-heading">
                                  <h3 class="panel-title">Total Mark</h3>
                                </div>
                                <div class="panel-body">

                                <h4>this quiz has ended</h4>

                                 <hr/>
                                <h4>mark</h4>
                                 <h1><?php echo $score; ?></h1>
                                 <br/>

                                 <h4>Time Elapsed</h4>
                                 <h1><?php echo $time_taken; ?> seconds</h1>
                                 <br/>
                                
                                 <hr/>

                                </div>
                         </div>

                </div>
            </div>
