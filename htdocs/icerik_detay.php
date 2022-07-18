<?php include 'inc/header.php';
$slug = $_GET['slug'];
$query = $db->query("SELECT * FROM icerikler WHERE slug = '{$slug}'")->fetch(PDO::FETCH_ASSOC);
if ( $query ){ ?>

    <section class="banner banner-secondary" id="top" style="background-image: url(assets/img/banner-image-1-1920x300.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2><?php echo $query['title'] ?></h2>

                        <h4><i class="fa fa-user"></i><?php echo $query['author'] ?> </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="featured-places">
            <div class="container">
                <div class="form-group">
                    <img src="admin/covers/<?php echo $query['cover'] ?>" class="img-responsive" alt="">
                </div>

                <br>

                <h2><?php echo $query['title'] ?></h2>

             <p><?php echo $query['content'] ?></p>
                <br>
                <br>



            </div>
        </section>
    </main>

<?php
}
include 'inc/footer.php'; ?>