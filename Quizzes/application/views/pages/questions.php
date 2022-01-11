<section id="breadcrumb">
                                <div class="container">
                                  <ol class="breadcrumb">
                                      <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a></li>
                                      <li class="active">Questions</li>
                                  </ol>  
                                </div>
                        </section>

                        <div class="panel panel-success">
                        <div class="panel-heading">
                                  <h3 class="panel-title">Question (<?php if(isset($row)) echo "Update"; else echo "New"; ?>)</h3>
                                </div>
                                <div class="panel-body">
                                <?php
					                $attributes = array('rol' => 'form', 'id' => 'myform','data-toggle' => 'validator');
					                $action_target = 'manage/DataQ/'.$table.'/'.$exam_id.'/addNew';
					                if(isset($row))
					                	$action_target = 'manage/DataQ/'.$table.'/'.$exam_id.'/update/'.$row->id;
                                    echo form_open($action_target, $attributes);
                                ?>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">the question</label>
                                  <input required name="title" id="title" class="form-control" placeholder="the question" value="<?php if(isset($row)) echo $row->title; ?>" type="text">
                                </div>

                                  <div class="form-group">
                                  <label for="exampleInputPassword1">question type</label>
                                  <select name="question_type" id="question_type" class="form-control">
                                  <option value="0" <?php if(isset($row)) if($row->question_type == "0") echo "selected='selected'"; ?>>single answer</option>
                                  <option value="1" <?php if(isset($row)) if($row->question_type == "1") echo "selected='selected'"; ?>>multi answers</option>
                                  </select>
                                 </div>
                                 <hr/>
                                <h4>Answers <small>Grades are add up when student choose the answer to calculate total mark</small></h4>
                                
                                 <table style="border: 1px solid gray;" id="myTable" class="qstionsTbl" style="width:100%;padding:20px;">
                                 <thead>
                                 <tr><th style="width:60%;padding:20px;">Answer</th><th style="width:40%;padding:20px;">Grades</th></tr>
                                 </thead>
                                 <?php if(isset($ans))
                                 {
                                   foreach($ans as $ns)
                                   {
                                   ?>
                                   <tr><td><input required id="title" name="titles[]" value="<?php echo $ns->title; ?>" type="text" class="form-control"></td><td><input required id="mark" value="<?php echo $ns->mark; ?>" name="marks[]" type="number" class="form-control"></td></tr>
                                   <?php
                                   }
                                 } else {
                                   ?>
                                 <tr><td><input required id="title" name="titles[]" type="text" class="form-control"></td><td><input required id="mark" name="marks[]" type="number" class="form-control"></td></tr>
                                 <?php } ?>
                                 </table>
                                 <br/>
                                 <script>
                                 function addItem()
						{
						//alert("sdsds");
						var table=document.getElementById("myTable");
						var row=table.insertRow(-1);
						var cell1=row.insertCell(0);
						var cell2=row.insertCell(1);
						
						cell1.innerHTML='<input required id="titles" name="titles[]" type="text" class="form-control">';
						cell2.innerHTML='<input required id="marks" name="marks[]" type="number" class="form-control">';
						}
                                 </script>
                                 <a onclick="addItem()" class="btn btn-primary">Add Answer</a>
                                 <hr/>

                                <button type="submit" class="btn btn-primary">Save Data </button> <a href="<?php echo base_url(); ?>index.php/manage/DataQ/<?php echo $table; ?>" class="btn btn-warning title">Cancel</a>
                                </form>
                                </div>
                         </div>

                </div>
            </div>
