<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="about-veno">
                    <div class="logo">
                    Dünya Ülkeleri ve Kültürleri
                    </div>
                    <p><?php echo $configs['footer_text']; ?></p>
                    <ul class="social-icons">
                        <li>
                            <a href="<?php echo $configs['facebook'] ?>"><i class="fa fa-facebook"></i></a>
                            <a href="<?php echo $configs['twitter'] ?>"><i class="fa fa-twitter"></i></a>
                            <a href="<?php echo $configs['linkedin']; ?>"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="useful-links">
                    <div class="footer-heading">
                        <h4>Menü</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li><a href="index.php">Anasayfa</a></li>
                               
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li><a href="icerik.php">İçerikler</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="contact-info">
                    <div class="footer-heading">
                        <h4>İletişim Bilgileri</h4>
                    </div>
                    <p><i class="fa fa-map-marker"></i> <?php echo $configs['address']?></p>
                    <ul>
                        <li><span>Telefon:</span><a href="tel:<?php echo $configs['tel']?>"><?php echo $configs['tel']?></a></li>
                        <li><span>E-posta:</span><a href="mailto:<?php echo $configs['email']?>"><?php echo $configs['email']?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="sub-footer">
    <p>Copyright © 2022</a></p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="/assets/js/vendor/bootstrap.min.js"></script>

<script src="/assets/js/datepicker.js"></script>
<script src="/assets/js/plugins.js"></script>
<script src="/assets/js/main.js"></script>
</body>
</html>