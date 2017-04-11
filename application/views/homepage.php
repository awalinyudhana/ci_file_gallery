<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>File Gallery</title>
    <!--CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/custom-style.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/admin/font-awesome/css/font-awesome.css"); ?>"/>

    <style>





    </style>
</head>
<body>
<?php $this->load->view('top_menu'); ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="gallery-title text-center">Gallery</h1>
            </div>
            <div class="col-sm-6 col-sm-offset-3 gallery_product">
                    <form action="<?php echo current_url(); ?>" method="get">
                        <div class="input-group stylish-input-group">
                            <input type="text" name="search" class="form-control"  placeholder="Search" >
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="container">
        <?php foreach($items as $item): ?>
        <div class="col-md-12">
            <div class="col-md-6">
                <h4>
                    <strong><?php echo $item['title'] . ' ('. $item['total_file'] . ') '; ?></strong>
                </h4>
            </div>
            <div class="col-md-6">
                <p class="pull-right">
                    <a href="<?php echo site_url('home/by_category/'.$item['id_category']) ?>" class="btn btn-primary btn-outline">Lihat Semua</a>
                </p>
            </div>
        </div>
        <div class="col-md-12">
            <?php foreach ($item['file'] as $file_item) : ?>
            <div class="file-item">
                <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="thumbnail">
                        <img src="<?php echo base_url('assets/uploads/files/') .  $file_item['thumbnail']; ?>"
                             class="img-responsive" alt="<?php echo $file_item['title'] ?>">
                        <a href="<?php echo site_url('home/detail/'.$file_item['id']) ?>">
                            <h4 class="text-center"><?php echo $file_item['title'] ?></h4>
                        </a>
                        <p><?php echo $file_item['description'] ?></p>
                        <div class="pull-right">
                            <input type="button" class="btn btn-primary btn-outline" value="Download">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<!-- Core Scripts - Include with every page -->
<script type="text/javascript" src="<?php echo base_url("assets/bootstrap/js/bootstrap.js"); ?>"></script>
<scrript type="text/javascript" src="<?php echo base_url("assets/bootstrap/jquery-1.10.2.js"); ?>"></scrript>

</body>
</html>