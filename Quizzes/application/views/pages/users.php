<section id="breadcrumb">
                                <div class="container">
                                  <ol class="breadcrumb">
                                      <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a></li>
                                      <li class="active">Users</li>
                                  </ol>  
                                </div>
                        </section>

                        <div class="panel panel-success">
                        <div class="panel-heading">
                                  <h3 class="panel-title">User (<?php if(isset($row)) echo "Edit"; else echo "New"; ?>)</h3>
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
                                  <label for="exampleInputEmail1">First Name</label>
                                  <input required name="first_name" id="first_name" class="form-control" id="exampleInputEmail1" placeholder="First Name" value="<?php if(isset($row)) echo $row->first_name; ?>" type="text">
                                </div>
					            <div class="form-group">
                                  <label for="exampleInputEmail1">Last Name</label>
                                  <input name="last_name" id="last_name" class="form-control" id="exampleInputEmail1" value="<?php if(isset($row)) echo $row->last_name; ?>" placeholder="Last Name" type="text">
                                </div>
					            <div class="form-group">
                                  <label for="exampleInputPassword1">Email</label>
                                  <input name="email_address" id="email_address" class="form-control" id="exampleInputPassword1" value="<?php if(isset($row)) echo $row->email_address; ?>" placeholder="Email" type="email">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">UserName</label>
                                  <input name="user_name" id="user_name" class="form-control" id="exampleInputPassword1" value="<?php if(isset($row)) echo $row->user_name; ?>" placeholder="UserName" type="text">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input name="password" id="password" class="form-control" id="exampleInputPassword1" value="<?php if(isset($row)) echo $row->password; ?>" placeholder="Password" type="password">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">User Type</label>
                                  <select name="admin" id="admin" class="form-control">
                                  <option value="0" <?php if(isset($row)) if($row->admin == "0") echo "selected='selected'"; ?>>Admin</option>
                                  <option value="1" <?php if(isset($row)) if($row->admin == "1") echo "selected='selected'"; ?>>Tutor</option>
                                  <option value="3" <?php if(isset($row)) if($row->admin == "3") echo "selected='selected'"; ?>>Student</option>
                                  </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Save Data </button> <a href="<?php echo base_url(); ?>index.php/manage/Data/<?php echo $table; ?>" class="btn btn-warning title">Cancel</a>
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
                                          <th>First Name</th>
                                          <th>Email</th>
                                          <th>User Name</th>
                                          <th>Type</th>
                                          <th>Options</th>
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php
					
						foreach ($rows as $the_row)
						{
							?>
							<tr>
								<td><?php echo $the_row->first_name;?></td>
								<td><?php echo $the_row->email_address;?></td>
                <td><?php echo $the_row->user_name;?></td>
                <td><?php if($the_row->admin == "0") echo "<span class='label label-success title'>Admin</span>"; else if($the_row->admin == "1") echo "<span class='label label-primary title'>Tutor</span>"; else echo "<span class='label label-warning title'>Student</span>";?></td>
                <td><a href="<?php echo base_url(); ?>index.php/manage/Data/<?php echo $table; ?>/edit/<?php echo $the_row->id;?>" class="btn btn-primary"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit</a> 
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
