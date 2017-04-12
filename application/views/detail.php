<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Image Gallery</title>
    <!--CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/custom-style.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/font-awesome/css/font-awesome.css"); ?>"/>

</head>
<body>
<?php $this->load->view('top_menu'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center"><?php echo $item['title'] ;?> </h2>
                </div>
            </div> <!--  ./ File title -->
            <hr>
            <!-- File Content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="event-content">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="image-content">
                                    <img src="<?php echo base_url('assets/uploads/files/') . $item['thumbnail'] ;?>" alt="File Thumbnail" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h4><strong>Category</strong></h4>
                                <h4><?php echo $item['title_category'] ?></h4>
                                <h5>Created at  : <?php echo $item['date_created'] ?></h5>
                                <h4><strong>Description</strong></h4>
                                <p><?php echo $item['description'] ?> </p>
                                <h4>
                                    <span class="glyphicon glyphicon-user"></span>
                                    <?php echo $item['author'] ?>
                                </h4>
                                <div class="download-section">
                                    <p>Download File</p>
                                    <a href="<?php echo base_url('assets/uploads/files/').$item['file']; ?>" class="btn btn-primary btn-outline">Download</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div> <!-- ./ File Content -->
            <hr>
        </div>
    </div>
    <div class="row separator-brand">
        <div class="col-xs-12">
            <div class="line-brand"></div>
        </div>
    </div>
    <!-- .separator-brand -->
    <!-- footer -->
    <div class="footer">
        <div class="row separator-brand">
            <div class="col-xs-12">
                <p>&nbsp;</p>
                    <div class="copy col-md-6">
                        &copy; File Gallery. All Right Reserved.
                 </div>
            </div>
        </div>
    </div>
    <!-- ./footer -->
</div>


<!-- Core Scripts - Include with every page -->
<script type="text/javascript" src="<?php echo base_url("assets/bootstrap/js/bootstrap.js"); ?>"></script>
<scrript type="text/javascript" src="<?php echo base_url("assets/bootstrap/jquery-1.10.2.js"); ?>"></scrript>

</body>
</html>