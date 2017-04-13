<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> File Uplad App </title>

    <!-- Core CSS - Include with every page -->
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/timeline.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/sb-admin.css"); ?>"/>


    <!--<link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet"> -->
</head>

<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <h1 class="page-header"> Dashboard</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="<?php echo site_url('admin/dashboard/index'); ?>" class="btn btn-info"> File</a>
                <a href="<?php echo site_url('admin/dashboard/category'); ?>" class="btn btn-info"> Category</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                foreach($css_files as $file): ?>
                                    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                                <?php endforeach; ?>
                                <?php foreach($js_files as $file): ?>
                                    <script src="<?php echo $file; ?>"></script>
                                <?php endforeach; ?>

                                <?php echo $output; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/bootstrap/js/bootstrap.js"); ?>"></script>
<scrript type="text/javascript" src="<?php echo base_url("assets/admin/sb-admin.js"); ?>"></scrript>
<!-- Page-Level Plugin CSS - Dashboard -->
</body>

</html>

