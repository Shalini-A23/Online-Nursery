<?php 
$page_id="blog";
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
include_once 'assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db; 
    
?>
<thead>
  <tr>
    <th>id</th>
    <th>Name</th>
    <th>Email</th> 
    <th>Phone</th>
    <th>Edit</th>
    <th>Delete</th>
     
  </tr>
</thead>
<tbody id="checkall-target">
    <?php 
        $sql1="SELECT id,name,email,phoneno FROM `".TBL_PRODUCT."` ";
        $result1 = $database->query( $sql1 );
        while($row_f=$database->fetch_array($result1)){
    $_GET['phoneno1']=$row_f['phoneno'];

    ?>

  <tr>  
    <td><?php echo $row_f['id'];?></td>
    <td><?php echo $row_f['name'];?></td>
    <td><?php echo $row_f['email'];?></td>
    <td><?php echo $row_f['phoneno'];?></td>
    <td > <!-- <a href="agent_management.php"> --> <h5><a href="agent_management.php?id=<?php echo $row_f['id']?>" data-target="#editcontact" class="modal-title" data-toggle="modal" >
                                                    <button name="edit"  style="border:none;   "><i  class="icon-pencil" onclick="myFunction('<?php echo $row_f['id'];?>','<?php echo $row_f['name'];?>','<?php echo $row_f['email'];?>','<?php echo $row_f['phoneno'];?>')">
                                                </i></button></a></h5></td>
        
    <td><a href="agent_delete.php?mode=delete&id=<?php echo $row_f['phoneno'];?>"> <h5 class="modal-title"><i name="del"class="icon-trash"></i></h5></a></td>
  <form action="edit.php" method="POST">
    <input type="hidden" value="<?php echo $row_f['id']?>" name="id"></form>
  </tr>
  <?php
    } 
 ?> 
  </tbody> 
</table>
    </div></div></div>
                </div> 
                <!-- END: Card DATA-->
            </div>
<div class="modal fade" id="editcontact">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <i class="icon-pencil"></i> Edit Contact
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </div>     <?php
                                                            // if(isset($_POST['edit']))
                                                            // {
                                                                 
                                                                $sql19="SELECT * FROM `".TBL_ADMIN."` WHERE id= '".$_POST['id']."'";
                                                               
                                                                $result19 = $database->query($sql19);
                                                                $row_f9=$database->fetch_array($result19);                                                                                              
                                                            ?>
                                            <form class="edit-contact-form" action="agentinsert.php" name="edit" method="POST">       
                                                <div class="modal-body">                                               

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                          
                                                            <div class="contact-name">
                                                                <label for="edit-contact-name" class="col-form-label">Name</label>
                                                                <input type="text" name="fname" id="edit-contact-name" class="form-control" required="" value="<?php echo $row_f9['name']; ?>">                                                                           
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-email">
                                                                <label for="edit-contact-email" class="col-form-label">Email</label>
                                                                <input type="text" name="email1" id="edit-contact-email" class="form-control" required="" value="<?php echo $row_f9['email']; ?>">                                                                          
                                                            </div>
                                                        </div>
                                                    </div>

                                               

                                                        <div class="col-md-6">
                                                            <div class="contact-phone">
                                                                <label for="edit-contact-phone" class="col-form-label">Phone</label>
                                                                <input type="text" name="phno" id="edit-contact-phone" class="form-control" value="<?php echo $row_f9['phoneno']; ?>">                                                                           
                                                            </div>
                                                        </div>
                                                    </div>

                                                
                                                <!-- </div> -->
                                                <div class="modal-footer">
                                                   <input type="hidden"  id="edit-date">
                                                    <input type="submit" name="up" class="btn btn-primary add-todo" value="Update">
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <!-- END: Content-->



        <!-- START: Footer-->
        <footer class="site-footer">
            2020 © PICK
        </footer>
        <!-- END: Footer-->


        <!-- START: Back to top-->
        <a href="#" class="scrollup text-center"> 
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END: Back to top-->

        <!-- START: Template JS-->
        <script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="dist/vendors/moment/moment.js"></script>
        <script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
        <script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- END: Template JS-->       

        <!-- START: APP JS-->
        <script src="dist/js/app.js"></script>
        <!-- END: APP JS-->

        <!-- START: Page JS-->
        <script src="dist/js/app.contactlist.js"></script>
        <!-- END: Page JS-->
        <script type="text/javascript">
            function myFunction(id,name,email,phoneno)
            {
                console.log(id);
                document.getElementById('edit-contact-name').value=name;
                document.getElementById('edit-contact-email').value=email;
                document.getElementById('edit-contact-phone').value=phoneno;
            }
        </script>
    </body>
    <!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/app-contactlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Jul 2020 04:00:16 GMT -->
</html>
<?php
session_unset();
?>