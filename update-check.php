<?php
require("core.php");
head();

$url = "http://project-security.cf/product-versions.json";
$ch  = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
$string = curl_exec($ch);
curl_close($ch);

$json_a        = json_decode($string, true);
$latestversion = $json_a['Project-SECURITY']['version'];
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<section class="content-header">
    			  <h1><i class="fa fa-refresh"></i> Check for Updates</h1>
    			  <ol class="breadcrumb">
   			         <li><a href="dashboard"><i class="fa fa-home"></i> Admin Panel</a></li>
    			     <li class="active">Check for Updates</li>
    			  </ol>
    			</section>


				<!--Page content-->
				<!--===================================================-->
				<section class="content">

                <div class="row">
				<div class="col-md-12">
                    
<?php
if ($version == $latestversion) {
    echo '<div class="box box-solid box-success">';
} else {
    echo '<div class="box box-solid box-danger">';
}
?>
						<div class="box-header">
<?php
if ($version == $latestversion) {
    echo '<h3 class="box-title"><i class="fa fa-check-circle-o"></i> Up To Date</h3>';
} else {
    echo '<h3 class="box-title"><i class="fa fa-exclamation-triangle"></i> Out Of Date</h3>';
}
?>
						</div>
						<div class="box-body jumbotron">
<center>
        <h1 style="color: #0088cc;"><i class="fa fa-get-pocket"></i> Project SECURITY</h1>
<br />
<div class="well">
  Installed Version: <span class="label label-primary"><?php
echo $version;
?></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Latest Version: <span class="label label-success"><?php
echo $latestversion;
?></span>
</div>
        <hr>
<?php
if ($version == $latestversion) {
    echo '<p>You have the <strong>latest version</strong> of <strong>Project SECURITY</strong> installed.</p>';
} else {
    echo '<p>You must update <strong>Project SECURITY</strong> to the <strong>latest version</strong>.</p><br />
<a href="https://codecanyon.net/item/project-security-website-security-malware-vulnerability-scanner/15487703?ref=Antonov_WEB" title="Download the Update" target="_blank" class="btn btn-flat btn-success btn-lg">
<i class="fa fa-download"></i> Download Update
</a>
';
}
?>	
</center>
                        </div>
                     </div>
                </div>
                    
				</div>
                    
				</div>
				<!--===================================================-->
				<!--End page content-->


			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->

<?php
footer();
?>