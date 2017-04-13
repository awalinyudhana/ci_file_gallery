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
                            <?php foreach ($items as $item) : ?>
                                <a href="<?php echo site_url('home/by_category/' . $item['id_category']) ;?>" class="btn btn-md btn-primary button-category"><?php echo $item['title'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row container-list">
    <div class="container ">
        <?php foreach ($items as $item): ?>
            <div class="col-md-12">
                <div class="col-md-6">
                    <h4>
                        <strong><?php echo $item['title'] . ' (' . $item['total_file'] . ') '; ?></strong>
                    </h4>
                </div>
                <div class="col-md-6">
                    <p class="pull-right">
                        <a href="<?php echo site_url('home/by_category/' . $item['id_category']) ?>"
                           class="btn btn-primary btn-outline">Lihat Semua</a>
                    </p>
                </div>
            </div>
            <div class="col-md-12">
                <?php foreach ($item['file'] as $file_item) : ?>
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
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>