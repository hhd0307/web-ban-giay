<?php 
    $title = 'Thể loại';
    require_once 'layouts/header.php'; 
?>
    <!-- main -->
    <div class="main theloai">
        <div class="container">
            <h4 class="label label-primary">Thêm thể loại</h4>
            <form action="them-the-loai.php" method="post">
                <div class="form-group">
                  <label for="Ten">Tên thể loại</label>
                  <input type="text" name="Ten" class="form-control" id="Ten">
                </div>
                <button type="submit" class="btn btn-default" name="Them">Thêm</button>
              </form>
        </div>
    </div>
    <!-- //main -->
<?php 
    require_once 'layouts/footer.php'; 
?>