<?php
$list_category_0 = db_fetch_array("SELECT*FROM `tbl_product_cat` WHERE `parent_id` = 0");
$list_products = db_fetch_array("SELECT*FROM `tbl_products` ORDER BY  `sold_product` DESC");
$list_best_selling_product = array_slice($list_products, 0, 8);
?>
<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <?php if(!empty($list_category_0)){
                ?>
            <ul class="list-item">
                <?php foreach($list_category_0 as $category_0){
                    $list_category_1 = db_fetch_array("SELECT*FROM `tbl_product_cat` WHERE `parent_id` = '{$category_0['cat_id']}'");
                    ?>
                    <li>
                        <a href="danh-muc/<?php echo $category_0['slug'] ?>-<?php echo $category_0['cat_id'] ?>.html" title=""><?php echo $category_0['title']?></a>
                        <?php if(!empty($list_category_1)){
                            ?>
                        <ul class="sub-menu">
                        <?php foreach($list_category_1 as $category_1){
                        $list_category_2 = db_fetch_array("SELECT*FROM `tbl_product_cat` WHERE `parent_id` = '{$category_1['cat_id']}'");
                            ?>
                            <li>
                                <a href="danh-muc/<?php echo $category_1['slug'] ?>-<?php echo $category_1['cat_id'] ?>.html" title=""><?php echo $category_1['title']?></a>
                                <?php if(!empty($list_category_2)){
                                    ?>
                                <ul class="sub-menu">
                                <?php foreach($list_category_2 as $category_2){
                                    ?>
                                    <li>
                                        <a href="danh-muc/<?php echo $category_2['slug'] ?>-<?php echo $category_2['cat_id'] ?>.html" title=""><?php echo $category_2['title']?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                                </ul>
                                <?php
                                }
                            ?>
                            </li>
                            <?php
                        }
                        ?>
                        </ul>
                        <?php
                        }
                    ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title">Bộ lọc</h3>
        </div>
        <div class="section-detail">
            <form action="#" method="POST">
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Giá</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="common_selector filter-price" type="radio" name="r-price" value="0"></td>
                            <td>Tất cả</td>
                        </tr>
                        <tr>
                            <td><input class="common_selector filter-price" type="radio" name="r-price" value="1"></td>
                            <td>Dưới 10.000đ</td>
                        </tr>
                        <tr>
                            <td><input class="common_selector filter-price" type="radio" name="r-price" value="2"></td>
                            <td>10.000đ - 20.000đ</td>
                        </tr>
                        <tr>
                            <td><input class="common_selector filter-price" type="radio" name="r-price" value="3"></td>
                            <td>20.000đ - 50.000đ</td>
                        </tr>
                        <tr>
                            <td><input class="common_selector filter-price" type="radio" name="r-price" value="4"></td>
                            <td>50000đ - 100.000đ</td>
                        </tr>
                        <tr>
                            <td><input class="common_selector filter-price" type="radio" name="r-price" value="5"></td>
                            <td>Trên 100.000đ</td>
                        </tr>
                    </tbody>
                </table>
                <?php 
                if(!empty($_GET['cat_id'])){
                    $cat_id = $_GET['cat_id'];
                    $list_brands = db_fetch_array("SELECT `title` FROM `tbl_product_cat` WHERE `parent_id` = '{$cat_id}'");
                }
                ?>
                <table>
                <?php if(!empty($list_brands)){
                    ?>
                    <thead>
                        <tr>
                            <td colspan="2">Hãng</td>
                        </tr>
                    </thead>
                    
                        <tbody>
                            <tr>
                                <td><input class="common_selector filter-brand" type="radio" name="r-brand" value=""></td>
                                <td>Tất cả</td>
                            </tr>
                            <?php foreach($list_brands as $brand){
                        ?>
                            <tr>
                                <td><input class="common_selector filter-brand" type="radio" name="r-brand" value="<?php echo $brand['title']?>"></td>
                                <td><?php echo $brand['title']?></td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                </table>
                <?php
                }
            ?>
            </form>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="?page=detail_product" title="" class="thumb">
                <img src="public/images/video.jpg" alt="">
            </a>
        </div>
    </div>
</div>
