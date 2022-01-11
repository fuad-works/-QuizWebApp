
<section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    
                <?php
					$attributes = array('class' => 'well','style' => 'background:white;' , 'id' => 'login', 'data-toggle' => 'validator');
                    echo form_open('admin', $attributes);
                    ?>
                    <h4>Please Login to continue</h4>
                    <hr/>    
                    <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" placeholder="User Name" />
                        </div>
                        <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                        <button type="submit" class="btn btn-block btn-success">Login</button>
                        <hr/>
                        <div class="form-group">
                        don't have an account? <a href="<?php echo base_url(); ?>index.php/admin/signUp">create a new one</a>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </section>
