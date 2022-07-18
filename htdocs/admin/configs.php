<?php
session_start();
error_reporting(E_ALL);
if (!isset($_SESSION['name'])) {
    header("location:sign_in.php");
}
include '../inc/db.php';
$title = "Dashboard";


$message="";
$control=true;
if ($_POST){

    foreach ($_POST as $key => $config){
        $query1 = $db->prepare("UPDATE configs SET
             `value` = ?
            WHERE `key` = ?
            
");
        $update = $query1->execute(array($config, $key
        ));
        if ( $update ){
            $message = "güncelleme başarılı!";
        }else{
            $message = "Hata Oluştu";
        }
    }
}
$query = $db->query("SELECT * FROM configs", PDO::FETCH_ASSOC);

include 'inc/header.php'?>

<div class="container-fluid">
    <div class="row">
        <?php include 'inc/navbar.php'?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


            <h2>Ayarlar</h2>
            <form method="post" action="" >
                <?php
                if ( $query->rowCount() ){

                foreach( $query->fetchAll() as $row ){  ?>
                <div class="form-group">
                    <label for="title"><?php echo $row["title"] ?> <span style="color: red">*</span></label>
                    <input type="text" id="<?php echo $row["key"] ?>" value="<?php echo $row["value"] ?>" class="form-control" name="<?php echo $row["key"] ?>" placeholder="<?php echo $row["title"] ?>">
                </div>

                    <?php
                }
                }
                ?>
                <button type="submit" class="btn btn-success">Düzenle</button>
                <span class="alert-success"><?php echo $message;?> </span>
            </form>
        </main>
    </div>
</div>
<?php include 'inc/footer.php'?>
