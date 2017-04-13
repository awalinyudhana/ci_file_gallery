<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>File Gallery</title>
    <!--CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/custom-style.css") ?>">

</head>
<body>
<nav class="navbar navbar-default">
</nav>

<div class="container">
    <div class="row">
        <div class="container container-top">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <img src="<?php echo base_url('assets/img/header.png'); ?>" class="img-responsive center-block" alt="logo">
                <h1 class="gallery-title text-center">Cari dan Simpan dengan mudah</h1>
                <h4 class="text-center text-muted">Unggah, temukan dan simpan file tanpa halangan</h4>
            </div>
            <div class="col-sm-8 col-sm-offset-2 gallery_product">
                <form action="<?php echo current_url(); ?>" method="get">
                    <div class="input-group stylish-input-group input-lg">
                        <input type="text" name="search" class="form-control input-lg" placeholder="Search">
                        <span class="input-group-addon">
                                <button type="submit" class="btn btn-lg">
                                    <span class="glyphicon glyphicon-search white-color"></span>
                                </button>
                            </span>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="content-category">
                        <div class="text-center">
                                <a href="<?php echo site_url() ;?>"
                                   class="btn btn-md btn-danger button-category">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row container-list">
    <div class="container ">
        <?php foreach ($items as $file_item) : ?>
        <div class="col-2">
            <div class="file-item">
                <div class="gallery_product col-xs-6 col-sm-3 col-md-2">
                    <div class="thumbnail thumbnail-item">
                        <?php if($file_item['thumbnail']) {
                            ?>
                            <img src="<?php echo base_url('assets/uploads/files/') . $file_item['thumbnail']; ?>"
                                 class="img-responsive" style="" alt="<?php echo $file_item['title'] ?>">
                            <?php
                        }
                        else
                        {
                            ?>
                            <img src="<?php  echo base_url('assets/img/default.jpg'); ?>"
                                 class="img-responsive" style="" alt="<?php echo $file_item['title'] ?>">
                            <?php
                        }?>
                        <a target="_blank" href="<?php echo site_url('assets/uploads/' . $file_item['file']) ?>">
                            <h4 class="text-center"><?php echo substr($file_item['title'], 0, 10) ?></h4>
                        </a>
                        <span class="teaser"> <p><?php echo substr($file_item['file'], 0, 15) ?></p></span>
                        <div class="text-center">
                            <span class="glyphicon glyphicon-user"></span>
                            <?php echo $file_item['author'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <nav aria-label="Page navigation" class="text-center">
        <?php echo $pagination; ?>
    </nav>
</div>
</body>
</html>

