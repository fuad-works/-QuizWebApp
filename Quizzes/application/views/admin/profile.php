<section id="breadcrumb">
                                <div class="container">
                                  <ol class="breadcrumb">
                                      <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/dashboard">الصفحة الرئيسية</a></li>
                                      <li class="active">الملف الشخصي</li>
                                  </ol>  
                                </div>
                        </section>

                         <!-- Profile Users -->
                         <div class="panel panel-primary">
                                <div class="panel-heading">
                                  <h3 class="panel-title">البيانات الشخصية</h3>
                                </div>
                                <div class="panel-body">

            <!-- form start -->
            <?php
                $attributes = array('rol' => 'form', 'id' => 'myform','class' => 'well','style' => 'background: white;' ,'data-toggle' => 'validator');
                echo form_open('admin/profile/info', $attributes);?>

                <div class="form-group">
                  <label for="exampleInputEmail1">الإسم الأول</label>
                  <input required name="first_name" id="first_name" class="form-control" id="exampleInputEmail1" placeholder="الإسم" value="<?php echo $first_name; ?>" type="text">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">الإسم الأخير</label>
                  <input required name="last_name" id="last_name" class="form-control" id="exampleInputEmail1" value="<?php echo $last_name; ?>" placeholder="الإسم الأخير" type="text">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">اسم المستخدم</label>
                  <input required name="user_name" id="user_name" class="form-control" id="exampleInputPassword1" value="<?php echo $user_name; ?>" placeholder="اسم المستخدم" type="text">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">البريد الإلكتروني</label>
                  <input required name="email_address" data-error="البريد الإلكتروني غير صالح!" id="email_address" class="form-control" id="exampleInputPassword1" value="<?php echo $email_address; ?>" placeholder="البريد الإلكتروني" type="email">
                  <div class="help-block with-errors"></div>
                </div>
                
              <div class="form-group">
                <button type="submit" style="width:100%;"  class="btn btn-primary">تعديل البيانات الشخصية</button>
              </div>
            </form>
          </div>
</div>



<div class="panel panel-danger">
                                <div class="panel-heading">
                                  <h3 class="panel-title">تغيير كلمة المرور</h3>
                                </div>

            <!-- form start -->
            <?php
                $attributes = array('rol' => 'form', 'id' => 'myform','class'=>'well', 'style'=>'background: white;','data-toggle' => 'validator');
                echo form_open('admin/profile/password', $attributes);?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">كلمة المرور</label>
                  <input name="password" required id="password" data-minlength="6" class="form-control" id="exampleInputEmail1" value="<?php echo $password; ?>" placeholder="كلمة المرور" type="password">
                <div class="help-block">يجب أن لاتقل كلمة المرور عن 6 أحرف</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">تأكيد كلمة المرور</label>
                  <input name="rpassword" id="rpassword" data-match-error="كلمة المرور لا تطابق التأكيد!"  data-match="#password" class="form-control" id="exampleInputPassword1" value="***" placeholder="تأكيد كلمة المرور" type="password">
                <div class="help-block with-errors"></div>
                </div>
              </div><!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" style="width:100%;" class="btn btn-primary">تغيير كلمة المرور</button>
              </div>
            </form>
</div>
</div>
