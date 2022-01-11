<section id="breadcrumb">
                                <div class="container">
                                  <ol class="breadcrumb">
                                      <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a></li>
                                      <li class="active">Results</li>
                                  </ol>  
                                </div>
                        </section>


                         <div class="panel panel-warning">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Table</h3>
                                </div>
                                <div class="panel-body">
                                  <table class="table table-striped table-hover">
                                    <thead>
                                     <tr>
                                          <th>Quiz</th>
                                          <th>Mark</th>
                                          <th>Time Elapsed</th>
                                          <th>date done</th>
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php
					
						foreach ($rows as $the_row)
						{
							?>
							<tr>
								<td><?php echo $the_row->title;?></td>
								<td><?php echo $the_row->total_mark;?></td>
                <td><?php echo $the_row->time_taken;?> seconds</td>
                <td><?php echo $the_row->datecreated;?></td>
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
