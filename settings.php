<?php
require("core.php");
head();

if (isset($_POST['save'])) {
    $table = $prefix . 'settings';
    
    $email = $_POST['email'];
    
    if (isset($_POST['realtime_protection'])) {
        $realtime_protection = 'Yes';
    } else {
        $realtime_protection = 'No';
    }
    
    if (isset($_POST['mail_notifications'])) {
        $mail_notifications = 'Yes';
    } else {
        $mail_notifications = 'No';
    }
    
    if (isset($_POST['jquery_include'])) {
        $jquery_include = 'Yes';
    } else {
        $jquery_include = 'No';
    }
    
    $query = mysqli_query($connect, "UPDATE `$table` SET email='$email', realtime_protection='$realtime_protection', mail_notifications='$mail_notifications', jquery_include='$jquery_include' WHERE id=1");
}
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<section class="content-header">
    			  <h1><i class="fa fa-cogs"></i> Settings</h1>
    			  <ol class="breadcrumb">
   			         <li><a href="dashboard"><i class="fa fa-home"></i> Admin Panel</a></li>
    			     <li class="active">Settings</li>
    			  </ol>
    			</section>


				<!--Page content-->
				<!--===================================================-->
				<section class="content">

                <div class="row">
                    
				<div class="col-md-12">
<form class="form-horizontal" method="post">
				    <div class="box">
						<div class="box-header">
							<h3 class="box-title">Settings</h3>
						</div>
						<div class="box-body">
<?php
$table = $prefix . 'settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_array($query);
?>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">E-Mail Address:</label>
												<div class="col-md-6">
                                                    <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
													<input type="email" class="form-control" name="email" value="<?php
echo $row['email'];
?>" required>
                                                    </div>
                                                    The E-Mail address will be used for some of the functions in the script.
												</div>
											</div><hr>
                                            <div class="form-group">
												<label class="control-label col-md-3">RealTime Protection</label>
												<div class="col-md-9">
													<div class="switch switch-success">
                                                        <div class="switch switch-sm switch-success">
														      <input type="checkbox" name="realtime_protection" id="ios-switch" <?php
if ($row['realtime_protection'] == 'Yes') {
    echo 'checked="checked" checked';
}
?> />
												        </div> With this module you can <strong>Enable</strong> or <strong>Disable</strong> the whole script.<br />
												    </div>
                                                </div>
                                            </div><hr>
                                            <div class="form-group">
												<label class="control-label col-md-3">Mail Notifications</label>
												<div class="col-md-9">
                                                    <div class="switch switch-success">
                                                        <div class="switch switch-sm switch-success">
														      <input type="checkbox" name="mail_notifications" id="ios-switch2" <?php
if ($row['mail_notifications'] == 'Yes') {
    echo 'checked="checked" checked';
}
?> />
												        </div> If this is <strong>Enabled</strong> you will receive notifications on your E-Mail Address<br />
												    </div>
												</div>
											</div>
                                            <div class="form-group">
												<label class="control-label col-md-3">jQuery Include</label>
												<div class="col-md-9">
                                                    <div class="switch switch-success">
                                                        <div class="switch switch-sm switch-success">
														      <input type="checkbox" name="jquery_include" id="ios-switch3" <?php
if ($row['jquery_include'] == 'Yes') {
    echo 'checked="checked" checked';
}
?> />
												        </div> <strong>Enable</strong> this option if your website do not have a jquery file included<br />
												    </div>
												</div>
											</div>
                        </div>
                        <div class="panel-footer text-left">
							<button class="btn btn-flat btn-primary" name="save" type="submit">Save</button>
				            <button type="reset" class="btn btn-flat btn-default">Reset</button>
				        </div>
                     </div>
</form>
                </div>
				</div>
                    
				</div>
				<!--===================================================-->
				<!--End page content-->


			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->

<script>
$(document).ready(function() {
    new Switchery(document.getElementById('ios-switch'), { size: 'large' });
    new Switchery(document.getElementById('ios-switch2'), { size: 'large' });
    new Switchery(document.getElementById('ios-switch3'), { size: 'large' });
});
</script>    
<?php
footer();
?>