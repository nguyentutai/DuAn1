<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="index.php?act=thongtintk">Thông Tin Tài Khoản /</a>
        <a href="">Đánh Giá Sản Phẩm</a>
    </div>
</div>
<div class="container container-tt">
    <div class="evaluate_pro">
        <?php extract($load_pro); ?>
        <div class="title-evalua">
            <div class="tile-cont">
                <div class="content-title-eva">
                    <p>Đánh Giá Sản Phẩm</p>
                </div>
                <div class="name-evalue-pro">
                    <p>( <?= $name_product ?> )</p>
                </div>
            </div>
            <form id="ratingForm" action="" method="POST">
                <input type="hidden" name="id_pro" value="<?= $id_product ?>">
                <div class="dg">
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5"><label for="star5">&#9733;</label>
                        <input type="radio" id="star4" name="rating" value="4"><label for="star4">&#9733;</label>
                        <input type="radio" id="star3" name="rating" value="3"><label for="star3">&#9733;</label>
                        <input type="radio" id="star2" name="rating" value="2"><label for="star2">&#9733;</label>
                        <input type="radio" id="star1" name="rating" value="1"><label for="star1">&#9733;</label>
                    </div>
                </div>
                <label class="noidung-dg" for="">Nội dung đánh giá</label><br>
                <input class="nddg" name="nd-evalue" type="text" placeholder="Nội dung đánh giá">
                <button type="submit" name="btn-submit">Đánh giá</button>
            </form>
        </div>
        <div class="images-evalue">
            <img src="./image/danhgia.png" alt="">
        </div>
    </div>
    <?php include "load_account.php"; ?>
</div>