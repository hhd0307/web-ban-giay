<?php 
    require_once '../library/init.php';
    $sql_get_theloai = "SELECT * FROM theloai";
    $theloai = $db->fetch_assoc($sql_get_theloai);
    if (isset($_POST['Them'])) {
        // echo 'ok';
        // Xử lý các giá trị 
        $Ten = isset($_POST['Ten']) ? trim(htmlspecialchars(addslashes($_POST['Ten']))) : '';
        $MoTa = isset($_POST['MoTa']) ? trim(htmlspecialchars(addslashes($_POST['MoTa']))) : '';
        $Gia = isset($_POST['Gia']) ? trim(htmlspecialchars(addslashes($_POST['Gia']))) : '';
        $TheLoaiId = isset($_POST['TheLoaiId']) ? trim(htmlspecialchars(addslashes($_POST['TheLoaiId']))) : '';

        if($Ten == "" || $MoTa == "" || $Gia == "" || $TheLoaiId == "") {
            echo '<script>alert("Không được để trống các trường")</script>';
        } else {
            $Anh1 = (new UploadImage('Anh1'))->get_check();
            $Anh2 = (new UploadImage('Anh2'))->get_check();
            $Anh3 = (new UploadImage('Anh3'))->get_check();
            if($Anh1 == "0" || $Anh2 == "0" || $Anh3 == "0") {
                echo '<script>alert("Không được để trống các input ảnh")</script>';
            } else {
                $sql = "INSERT INTO sanpham (Ten, MoTa, Gia, TheLoaiId, Anh1, Anh2, Anh3)
                    VALUES ('$Ten', '$MoTa', '$Gia', '$TheLoaiId', '$Anh1', '$Anh2', '$Anh3');";
                $db->query($sql);
                new Redirect('san-pham.php');
            }
            
        }
    }
?>

<?php 
    $title = 'Thêm sản phẩm';
    require_once 'layouts/header.php'; 
?>
    <!-- main -->
    <div class="main theloai">
        <div class="container">
            <h4 class="label label-primary">Thêm sản phẩm</h4>
            <form action="them-san-pham.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="Ten">Tên</label>
                  <input type="text" name="Ten" class="form-control" id="Ten" required>
                </div>
                <div class="form-group">
                  <label for="MoTa">Mô tả</label>
                  <textarea  class="form-control" name="MoTa" id="MoTa" required></textarea>
                </div>
                <div class="form-group">
                  <label for="Gia">Giá</label>
                  <input type="text" name="Gia" class="form-control" id="Gia" required>
                </div>
                <div class="form-group">
                    <label for="TheLoaiId">Thể loại</label>
                    <select class="form-control" id="TheLoaiId" name="TheLoaiId">
                    <?php 
                        for($i = 0; $i < count($theloai); $i++) {
                            echo '<option value="'.$theloai[$i]['Id'].'">'. $theloai[$i]['Ten'] .'</option>';
                        }
                    ?>  
                    </select>
                </div>
                <div class="form-group">
                  <label for="Anh1">Ảnh 1</label>
                  <input type="file" name="Anh1" class="form-control" id="Anh1" required>
                </div>
                <div class="form-group">
                  <label for="Anh2">Ảnh 2</label>
                  <input type="file" name="Anh2" class="form-control" id="Anh2" required>
                </div>
                <div class="form-group">
                  <label for="Anh3">Ảnh 3</label>
                  <input type="file" name="Anh3" class="form-control" id="Anh3" required>
                </div>
                <button type="submit" class="btn btn-default" name="Them">Thêm</button>
              </form>
        </div>
    </div>
    <!-- //main -->
<?php 
    require_once 'layouts/footer.php'; 
?>