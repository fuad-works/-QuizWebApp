<section id="breadcrumb">
                                <div class="container">
                                  <ol class="breadcrumb">
                                      <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a></li>
                                      <li class="active">Quizzes</li>
                                  </ol>  
                                </div>
                        </section>

                        <div class="panel panel-success">
                        <div class="panel-heading">
                                  <h3 class="panel-title">Quiz (<?php if(isset($row)) echo "Update"; else echo "New"; ?>)</h3>
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
                                  <label for="exampleInputEmail1">Quiz Title</label>
                                  <input required name="title" id="title" class="form-control" placeholder="Quiz Title" value="<?php if(isset($row)) echo $row->title; ?>" type="text">
                                </div>
					            <div class="form-group">
                                  <label for="exampleInputEmail1">Time allowed (minutes)</label>
                                  <input required name="allowed_time" id="allowed_time" class="form-control" value="<?php if(isset($row)) echo $row->allowed_time; ?>" placeholder="Time" type="number">
                                </div>

                                <button type="submit" class="btn btn-primary">Save </button> <a href="<?php echo base_url(); ?>index.php/manage/Data/<?php echo $table; ?>" class="btn btn-warning title">Cancel</a>
                                </form>
                                </div>
                         </div>

                         <!-- latest Users -->
                         <div class="panel panel-warning">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Table</h3>
                                </div>
                                <div class="panel-body">
                                  <table class="table table-striped table-hover">
                                    <thead>
                                     <tr>
                                          <th>Title</th>
                                          <th>Time allowed</th>
                                          <th>Options</th>
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
                <td><a href="<?php echo base_url(); ?>index.php/manage/Exams/<?php echo $the_row->id;?>" class="btn btn-info"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Questions</a>
                <a href="<?php echo base_url(); ?>index.php/manage/Data/<?php echo $table; ?>/edit/<?php echo $the_row->id;?>" class="btn btn-primary"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit</a> 
								<a href="<?php echo base_url(); ?>index.php/manage/Data/<?php echo $table; ?>/delete/<?php echo $the_row->id;?>" data-toggle="confirmation" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a></td>
							</tr>
							<?php
						}
                    ?>
                    </tbody>
                                  </table>
                                </div>
                        </div>
                </div>
            </div>
