<section id="breadcrumb">
                                <div class="container">
                                  <ol class="breadcrumb">
                                      <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/dashboard">Home</a></li>
                                      <li class="active">Question</li>
                                  </ol>  
                                </div>
                        </section>

                        <div class="panel panel-warning">
                        <div class="panel-heading">
                                  <h3 class="panel-title">Question <?php echo $_SESSION['current_question']; ?></h3>
                                </div>
                                <div class="panel-body">
                                <div class="well">
                                
                                <h5 style="text-align:left;"><a href="<?php echo base_url(); ?>index.php/manage/EndExam/<?php echo $exam_id; ?>" class="btn btn-danger title"><span class="glyphicon glyphicon-remove-circle"  data-toggle="confirmation"  aria-hidden="true"></span> End Quiz Now</a> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Remaining Time: <span id="remain_time" style="font-weight:bold; color:green;background:white;padding:0 4px; border: 1 solid white; border-radius:5px;"><?php echo $remain_time; ?></span></h5>
                                <script>
                                var remain_time = <?php echo $remain_time; ?>;
                                var seconds = remain_time;
                                function make_clock()
                                {
                                  //alert(seconds);
                                  seconds--;
                                  var minutes = parseInt(seconds/60);
                                  //alert(minutes);
                                  seconds1 = seconds%60;
                                  document.getElementById("remain_time").innerHTML =  minutes + ":" + seconds1;
                                  setTimeout(make_clock, 1000);
                                }
                                make_clock();
                                </script>

                                </div>
                                <?php
					                $attributes = array('rol' => 'form', 'id' => 'myform','data-toggle' => 'validator');
					                $action_target = 'manage/Exam/'.$exam_id.'/answer/'.$_SESSION['current_question'];
					                //if(isset($row))
					                //	$action_target = 'manage/DataQ/'.$table.'/'.$exam_id.'/update/'.$row->id;
                                    echo form_open($action_target, $attributes);
                                ?>
                                <h4><strong><?php if(isset($question)) echo $question->title; ?></strong></h4>

                                 <hr/>
                                <h4>Answer ...</h4>
                                 <table style="width:100%;padding:20px;" id="myTable" class="qstionsTbl">
                                 <?php if(isset($ans))
                                 {
                                   foreach($ans as $ns)
                                   {
                                   ?>
                                   <tr>
                                   <td style="width:20%;"><input id="answer"  <?php 
                                   if(isset($_SESSION['answer'.$_SESSION['current_question']])) 
                                    foreach($_SESSION['answer'.$_SESSION['current_question']] as $dt ) 
                                    {
                                      if($dt == $ns->id)
                                      echo 'checked="checked"'; 
                                    }
                                      ?> 
                                      value="<?php echo $ns->id; ?>" name="answer[]" type="<?php if($question->question_type == 0) echo "radio"; else echo "checkbox"; ?>"></td>
                                   <td style="width:80%;"><h5><?php echo $ns->title; ?></h5></td>
                                   </tr>
                                   <?php
                                   
                                   }
                                   //echo $_SESSION['answer'.$_SESSION['current_question']][0]."dasdsa";
                                 } ?>
                                 </table>
                                 <br/>
                                
                                 <hr/>

                                <button type="submit" class="btn btn-primary">Save Answer </button> 
                                </form>
                                </div>
                         </div>

                </div>
            </div>
