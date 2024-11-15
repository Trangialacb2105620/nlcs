
<div class="row home-title d-flex justify-content-center align-items-center"><p>CHI TIẾT SẢN PHẨM</p></div>
<div style="padding-bottom: 100px" class="row d-flex justify-content-center align-items-center">
    <div class="product-details" style="border:none">
        <?php
        // Debug: Kiểm tra giá trị của $one_product
        // var_dump($one_product);

        // Kiểm tra xem $one_product có tồn tại và là một mảng
        if (isset($one_product) && is_array($one_product) && count($one_product) > 0) {
            echo '
            <div class="product-info d-flex">
                <div class="product-detail-image">
                <img style="width: 300px; height: 300px" src="./uploads/' . $one_product['image'] . '" alt="Hình ảnh sản phẩm">
     
                </div>
                <div class="specifications">
                 
                    <h2>' . htmlspecialchars($one_product["name_product"]) . '</h2>
                    <h4 class="price">' . number_format($one_product["selling_price"], 0, ',', '.') . ' vnđ</h4>
                    <del>' . number_format($one_product["import_price"], 0, ',', '.') . ' vnđ</del>
                    <h4 style="padding-top: 15px;">Thông số kỹ thuật</h4>
                    <table>
                        <tbody>
                            <tr>
                                <ul>
                                    <li><b>Màu sắc:</b> ' . htmlspecialchars($one_product["color"]) . '</li>
                                    <li><b>Màn hình:</b> ' . htmlspecialchars($one_product["display"]) . '</li>
                                    <li><b>Bộ nhớ trong:</b> ' . htmlspecialchars($one_product["storage"]) . '</li>
                                    <li><b>Camera:</b> ' . htmlspecialchars($one_product["camera"]) . '</li>
                                    <li><b>CPU:</b> ' . htmlspecialchars($one_product["CPU"]) . '</li>
                                    <li><b>Pin:</b> ' . htmlspecialchars($one_product["battery"]) . '</li>
                                </ul>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <div class="activity">
                    <form action="index.php?route=themgiohang" method="POST">
                    <input name="mau" type="hidden" value='.$one_product["color"].'>
                        <button name="themgiohang" type="submit" class="add-to-cart">Thêm vào giỏ hànggg</button>
                        <button class="buy-now">Mua ngay</button>
                     <input name="display" type="hidden" value='.$one_product["display"].'>
                     <input name="sto" type="hidden" value='.$one_product["storage"].'>
                      <input name="img" type="hidden" value='.$one_product["image"].'>
                       <input name="cam" type="hidden" value='.$one_product["camera"].'>
                        <input name="CPU" type="hidden" value='.$one_product["CPU"].'>  
                    <input name="pin" type="hidden" value='.$one_product["battery"].'>
                         
                    </form>
                    </div>
                </form>
                </div>
            </div>';
        } else {
            echo '<p>Không có thông tin sản phẩm để hiển thị.</p>';
        }
        ?>
    </div>
</div>
