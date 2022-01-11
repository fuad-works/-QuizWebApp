<section id="breadcrumb">
                                <div class="container">
                                  <ol class="breadcrumb">
                                      <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a></li>
                                      <li class="active"><a href="<?php echo base_url(); ?>index.php/manage/Data/exams">Quizzes</a></li>
                                      <li class="active">Questions</li>
                                  </ol>  
                                </div>
                        </section>

                        <div class="panel panel-success">
                        <div class="panel-heading">
                                  <h3 class="panel-title">Basics</h3>
                                </div>
                                <div class="panel-body">
                                <?php
					                $attributes = array('rol' => 'form', 'id' => 'myform','data-toggle' => 'validator');
					                $action_target = 'manage/Data/'.$table.'/addNew';
					                if(isset($row))
					                	$action_target = 'manage/Data/'.$table.'/update/'.$row->id;
                                    echo form_open($action_target, $attributes);
                                ?>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Title</label>
                                  <select  onchange="changeHref();" id="exam" name="exam" class="form-control">
                                  <option disabled selected="selected">Select Quiz</option>
                                  <?php
                                    foreach ($rows as $the_row)
                                    {
                                    ?>
                                    <option value="<?php echo $the_row->id; ?>"><?php echo $the_row->title; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                                <a id="qLink" href="<?php echo base_url(); ?>index.php/manage/Exams/" class="btn btn-primary title"> <span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Show qustions </a> 
                                <a href="<?php echo base_url(); ?>index.php/manage/Data/exams" class="btn btn-success title"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new Quiz </a>
                                <script>
                                var baselURL = "<?php echo base_url(); ?>index.php/manage/Exams/";

                                function changeHref()
                                {
                                   var exam_id = document.getElementById("exam").value;
                                   var qLink = document.getElementById("qLink");
                                   qLink.setAttribute("href",baselURL + exam_id);
                                }
                                </script>
                                </form>
                                </div>
                         </div>

                         <!-- latest Users -->
                         <div class="panel panel-warning">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Questions</h3>
                                </div>
                                <div class="panel-body">
                                <?php
                                if(isset($rows1)){
                                  ?>
                                  <a href="<?php echo base_url(); ?>index.php/manage/DataQ/questions/<?php echo $exam_id;  ?>" class="btn btn-primary title"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New </a>
                                  <hr/>
                                  <table class="table table-striped table-hover">
                                    <thead>
                                     <tr>
                                          <th>the question</th>
                                          <th>type</th>
                                          <th>options</th>
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php
					
						foreach ($rows1 as $the_row1)
						{
							?>
							<tr>
								<td><?php echo $the_row1->title;?></td>
                <td><?php 
                if($the_row1->question_type == "0")
                echo "Single Answer";
                else echo "Multi answers";
                ?></td>
                <td>
                <a href="<?php echo base_url(); ?>index.php/manage/DataQ/questions/<?php echo $exam_id; ?>/edit/<?php echo $the_row1->id;?>" class="btn btn-primary title"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Details</a> 
								<a href="<?php echo base_url(); ?>index.php/manage/DataQ/questions/<?php echo $exam_id; ?>/delete/<?php echo $the_row1->id;?>" data-toggle="confirmation" class="btn btn-danger title"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></td>
							</tr>
							<?php
            }
          }
          else{
            ?>
<h5>You must choose from the list</h5>
            <?php
          }
                    ?>
                    </tbody>
                                  </table>
                                </div>
                        </div>
                </div>
            </div>
