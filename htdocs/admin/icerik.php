<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("location:sign_in.php");
}
include '../inc/db.php';
$title = "Dashboard";

$query = $db->query("SELECT * FROM icerikler", PDO::FETCH_ASSOC);



 include 'inc/header.php'?>

<div class="container-fluid">
    <div class="row">
       <?php include 'inc/navbar.php'?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


            <h2>İçerik</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">İçerik Başlık</th>
                        <th scope="col">Yazar</th>
                        <th scope="col">Kapak Görseli</th>
                        <th scope="col">Url</th>
                        <th scope="col">Eylem</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    if ( $query->rowCount() ){
                        foreach( $query as $row ){  ?>
                            <tr id="row_<?php echo $row['id']?>" >
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['author'] ?></td>
                                <td><img style="width: 100px" src="covers/<?php echo $row['cover'] ?>" alt=""></td>
                                <td><?php echo $row['slug'] ?></td>
                                <td><a class="delete" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>" data-href="icerik_sil.php?id=<?php echo $row['id'] ?>">Sil</a> <a href="icerik_duzenle.php?id=<?php echo $row['id'] ?>">Düzenle</a></td>

                            </tr>
                    <?php
                        }
                    }
                    ?>


                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php include 'inc/footer.php'?>

<script>
    $('.delete').click(function (e){
        if(!confirm("Silmek istediğinize emin misiniz?")) {
            return false;
        }
        var url = $(this).data('href');
        var id = $(this).data('id');
        $.ajax(
            {
                url: url,
                type: 'GET',
                success: function (response){
                    if(response == "no_login"){
                        location.href = 'sign_in.php';
                    }else{
                        $('#row_'+id).hide();
                    }

                }
            });
    })
</script>
