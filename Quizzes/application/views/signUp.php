
<section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    
                <?php
					$attributes = array('class' => 'well','style' => 'background:white;' , 'id' => 'login', 'data-toggle' => 'validator');
                    echo form_open('admin/signUp/add', $attributes);
                    ?>
                    <h4>Sign Up</h4>
                    <hr/>    
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
                                  <label for="exampleInputPassword1">User Name</label>
                                  <input name="user_name" id="user_name" class="form-control" id="exampleInputPassword1" value="<?php if(isset($row)) echo $row->user_name; ?>" placeholder="User Name" type="text">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input name="password" id="password" class="form-control" id="exampleInputPassword1" value="<?php if(isset($row)) echo $row->password; ?>" placeholder="Password" type="password">
                                </div>
                        <div class="form-group">
                                  <label for="exampleInputPassword1">User Type</label>
                                  <select name="admin" id="admin" class="form-control">
                                  <option value="1">Tutor</option>
                                  <option value="3">Student</option>
                                  </select>
                                </div>

                        <button type="submit" class="btn btn-block btn-success">Create New Account</button>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </section>
