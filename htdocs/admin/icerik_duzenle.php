<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("location:sign_in.php");
}
$title = "İçerik Düzenle";
include "inc/header.php";
include '../inc/db.php';
$id = $_GET['id'];
$message="";
$control=true;
if ($_POST){
    $title=$_POST['title'];
    $author=$_POST['author'];
    $cover=$_POST['cover'];
    $newname=$_POST['cover'];
    $slug=$_POST['slug'];
    $content=$_POST['content'];
    if ( $title != "" && $author != "" && $cover != "" ){
        if ($_FILES["cover"]['name'] !="") {
            $direc = "covers";
            $dosyaUzantisi = pathinfo($_FILES["cover"]["name"], PATHINFO_EXTENSION);
            $name= md5(uniqid(rand()));
            $newname=$name.".".$dosyaUzantisi;
            $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $direc . DIRECTORY_SEPARATOR . $newname;
            if ($dosyaUzantisi != "jpg" && $dosyaUzantisi != "png" && $dosyaUzantisi != "jpeg") {
                $message= "Sadece jpg, png ve jpeg uzantılı dosyalar yüklenebilir.";
                $newname="";
                $control=false;
            } else {
                $result = move_uploaded_file($_FILES["cover"]["tmp_name"], $yuklemeYeri);
                $message.= $result ? "Resim başarıyla yüklendi" : "Hata oluştu";}}
        $cover=$newname;
        if ($control){
            $query = $db->prepare("UPDATE icerikler SET
             title = ?,
            author = ?,
            cover = ?,
            slug = ?,
            content = ?
            WHERE id = ?");
            $update = $query->execute(array($title, $author, $cover,$slug,$content,$id
            ));
            if ( $update ){
                $message = "güncelleme başarılı!";
            }else{
                $message = "Hata Oluştu";
            }}
    }else{
        $message="Lütfen zorunlu alanları doldurun.";}}
?>
<div class="container-fluid">
    <div class="row">
        <?php include 'inc/navbar.php'?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php
            $query = $db->query("SELECT * FROM icerikler WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
            if ( $query ){ ?>
                <h2>İçerik Düzenle</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">İçerik Adı <span style="color: red">*</span></label>
                        <input type="text" id="title" value="<?php echo $query["title"] ?>" class="form-control" name="title" placeholder="İçerik Adı">
                    </div>
                    <div class="form-group">
                        <label for="title">İçerik <span style="color: red">*</span></label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?php echo $query["content"] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="author">Yazar<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="author"value="<?php echo $query["author"] ?>" name="author" placeholder="Yazar">
                    </div>
                    <div class="form-group">
                        <label for="cover">Url<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="cover" name="slug"value="<?php echo $query["slug"] ?>" placeholder="Url">
                    </div>
                    <div class="form-group">
                        <label for="cover">Kapak Resmi</label>
                        <input type="file" class="form-control" name="cover" accept="image/png, image/jpg, image/jpeg" id="cover">
                    </div>
                    <input type="hidden" name="cover" value="<?php echo $query["cover"] ?>" >

                    <button type="submit" class="btn btn-success">Düzenle</button>
                    <span class="alert-success"><?php echo $message;?> </span>
                </form>
            <?php }
            ?>
        </main>
    </div>
</div>
<?php include 'inc/footer.php'?>
