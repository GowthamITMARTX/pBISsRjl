<!DOCTYPE html>
<html>
    
<!-- Mirrored from tisa-admin.tzdthemes.com/tasks_summary.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Aug 2015 05:23:37 GMT -->
 <head>
        <?php $this->load->view('inc/head'); ?>
 </head>
    <body>
        <!-- top bar -->
    <?php $this->load->view('student/inc/header'); ?>
    <?php $this->load->view('student/inc/nav') ?> 
    <?php $user = $this->session->userdata('user');
      ?> 
    <div id="main_wrapper">
      <div class="page_content">
           <div class="container-fluid">
           <div class="row">
               <div class="col-lg-12">
                            <div class="panel-body">
                                <?php if(isset($success)): ?>
                                <div class="alert alert-success alert-dismissable fade in ">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    <?= $success ?>
                                </div>
                                <?php elseif(isset($error)): ?>
                                 <div class="alert alert-danger alert-dismissable fade in ">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    <?= $error ?>
                                </div>
                                <?php endif; ?>
                       
                  </div>
            <?php foreach($record as $k => $r):  ?>
             <div class="col-lg-6">
           <div class="todo_section panel panel-default">
          <div class="panel panel-info">
             <div class="panel-heading">
                <h3 class="panel-title"><b>Assignments Details (
                     <?=$r->cls_t.' - '.$r->sub_t;?>
                  ) </b></h3>
             </div>
             <div class="panel-body">
                 <h3><?=$r->title ?></h3>
                 <p><?=$r->description; ?></p>
                 <?php if($r->file): ?>
                 <p><a href="<?=base_url().'students/assignment/download/'.$r->file.'/'.$r->sub_t; ?> " class="btn btn-primary btn-xs"> <i class="glyphicon glyphicon-file" >PDF</i> - Download </a></p>
                 <?php else: ?>
                     Attachment unavailable.
                 <?php endif ?>
                 <?= form_open_multipart(''); ?>
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td width="40%">Remaining Time:</td>
                          <td width="60%"><?php
                              if(strtotime($r->date." ".$r->time) < time()  ) {
                                echo "<div class='text-danger' ><strong>Time Up !!!</strong></div>";
                              }
                           else{
                                echo timespan(time() ,strtotime($r->date), 4 );
                            }
                        ?></td>
                      </tr>
                      
                      <tr>        

                        <td>

                            Upload Your Assignment<br> <small>( size less then 2 mb )</small><br /><br />
                            <?php
                            if(strtotime($r->date." ".$r->time) > time()  ) {
                                ?><input type="checkbox" name="agree" onclick="$('.form-<?=$k?>').attr('disabled',!$(this).is(':checked')) " /> Agree<?php
                            }
                            ?>
                            </td>
                        <td>
                            <input type="file" name="userfile" />
                            <input type='hidden' value="<?=$r->id; ?>" name="assi_id"/>
                        <input type="hidden" name="s_date" value="<?=$r->date; ?>" />
                        <input type="hidden" name="s_time" value="<?=$r->time; ?>"
                        <br /><br />
                            <?php
                            if(strtotime($r->date." ".$r->time) > time()  ) {
                                ?>
                                <input type="submit" class="btn btn-success form-<?=$k?> " disabled="disabled" value="Upload" name="form"/>
                                <?php
                            }
                            ?>

                        </td>

                      </tr>
                    
                    </tbody>

                  </table>
                 <?= form_close(); ?>
            </div>
            </div>
         </div>
         </div>
         
       <?php endforeach; ?>
     </div>
   </div>
  </div>
 </div>
   <?php $this->load->view('inc/foot') ?>
</body>
</html>