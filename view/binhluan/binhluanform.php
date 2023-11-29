<?php

session_start();
 include "../../model/pdo.php";
 include "../../model/binhluan.php";
?>
<div class="comment">
<div class="comment-title">
<div class="box_title">BÌNH LUẬN</div>
            <div class="comment-content ">              
            </div>
        <div class="comment_form">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <input type="hidden" name="id" value="<?$id?>">
        <input type="text" class="box-comment-1" name="content_comment" placeholder="Nội dung tối thiểu 15 kí tự" ><br>
        <input type="submit" class="box-comment" name="guibinhluan" value="Gửi bình luận">   
    </form>
        </div>
        <?php
        if(isset($_POST['guibinhluan'])){
            if(isset($_SESSION['login'])){
            $content_comment=$_POST['content_comment'];
            $id=$_POST['id'];
            $id_product=$_SESSION['login']['user'];
            $date_comment=('h:i:sa d/m/Y');
            insert_comment($content_comment,$id_product,$id,$date_comment);
            header("Location:".$_SERVER['HTTP_REFERER']);
        }else{
            echo '<script>alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để gửi bình luận.");</script>';
        }
        }
        ?>
</div>
</div>
<?php
// session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";


$id = $_REQUEST['id'];
$dsbl = list_comment_product($id);
?>
<div class="comment">
    <div class="comment-title">
        <div class="box_title">BÌNH LUẬN</div>
        <div class=" ">
            <table>
                <?php foreach ($dsbl as $bl) : ?>
                    <tr>
                        <td><?php echo $bl['content_comment'] ?></td>
                        <td><?php echo $bl['user'] ?></td>
                        <td><?php echo date("d/m/Y", strtotime($bl['date_comment'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="comment_form">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="text" name="content_comment">
                <input type="submit" name="guibinhluan" value="Gửi bình luận">
            </form>
        </div>
        <?php
        if (isset($_POST['guibinhluan'])) {
            $content_comment = $_POST['content_comment'];
            if (isset($_SESSION['login'])) {
                $id_account = $_SESSION['login']['id_account'];
            }
            $date_comment = date("d/m/Y", strtotime($value['ngaybinhluan']));
            insert_comment($content_comment, $id, $id_account, $date_comment);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>
</div>

