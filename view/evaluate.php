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
        <div class="name-evalue-pro">
            <h2><?= $name_product ?></h2>
        </div>
        <form id="ratingForm" action="" method="POST">
            <input type="hidden" name="id_pro" value="<?= $id_product ?>">
            <label for="">Nội dung đánh giá</label><br>
            <textarea name="nd-evalue" id="" cols="30" rows="10" placeholder="Nội dung đánh giá">
            </textarea>
            <div class="dg">
                <label for="">Đánh giá</label>
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5"><label for="star5">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4"><label for="star4">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3"><label for="star3">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2"><label for="star2">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1"><label for="star1">&#9733;</label>
                </div>
            </div>
            <button type="submit" name="btn-submit">Đánh giá</button>
        </form>
    </div>
    <?php include "load_account.php"; ?>
</div>