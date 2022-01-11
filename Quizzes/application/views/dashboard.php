                        <section id="breadcrumb">
                                <div class="container">
                                  <ol class="breadcrumb">
                                      <li class="active">Dashboard</li>
                                  </ol>  
                                </div>
                        </section>

                        <div class="panel panel-default">
                                <div class="panel-heading main-color-bg">
                                  <h3 class="panel-title">Start Work</h3>
                                </div>
                                <div class="panel-body">
                                  <div class="col-md-4">
                                      <div class="well dash-box">
                                          <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br/><?php if(isset($clientC)) echo $clientC; ?></h2>
                                          <h4><a href="#"> Quizzes </a></h4>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                        <div class="well dash-box">
                                            <h2><span class="glyphicon glyphicon-fire" aria-hidden="true"></span><br/><?php if(isset($adsC)) echo $adsC; ?></h2>
                                            <h4><a href="#"> Questions</a></h4>
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                                <div class="well dash-box">
                                                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br/><?php if(isset($markterC)) echo $markterC; ?></h2>
                                                    <h4><a href="#"> Results </a></h4>
                                                </div>
                                            </div>
                                </div>
                         </div>

<!-- latest Users -->
<div class="panel panel-success">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Available Options</h3>
                                </div>
                                <div class="panel-body">
                                  <table class="table table-striped table-hover">
                                    <thead>
                                     <tr>
                                          <th>Quiz title</th>
                                          <th>Allowed Time (minutes)</th>
                                          <th>Tutor</th>
                                          <th>Start Quiz</th>
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php
					
						foreach ($rows as $the_row)
						{
							?>
							<tr>
								<td><?php echo $the_row->title;?></td>
								<td><?php echo $the_row->allowed_time;?></td>
                                <td><?php echo $the_row->first_name." ". $the_row->last_name;?></td>
                <td>
                <?php 
                if($_SESSION["admin"] == 3)
                {
                ?>
                <a href="<?php echo base_url(); ?>index.php/manage/Exam/<?php echo $the_row->id;?>/start" class="btn btn-primary"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Start Quiz</a> 
                <?php 
                }
                else echo "Only Students";
                ?>
                            </td></tr>
							<?php
						}
                    ?>
                    </tbody>
                                  </table>
                                </div>
                        </div>
                </div>
            </div>
