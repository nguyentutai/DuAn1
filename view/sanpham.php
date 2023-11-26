<div class="container-dm-children">
        <div class="slide-category">
            <div class="list-category-header" id="clickshow">
                <i class="fa-solid fa-bars"></i>
                <h3>Danh Mục Sản Phẩm</h3>
            </div> 
                <?php foreach ($dssp as $sp) {
                    extract($sp);
                ?>
                <li><a href="<?= $link_category ?>"><?= $name_category ?></a></li>
                <?php } ?>
        </div>