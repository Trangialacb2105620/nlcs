<?php
session_start();
ob_start();
include './view/header.php';
include "./model/connectdb.php";
include "./model/user.php";
include "./model/product.php";
$route = isset($_GET['route']) ? $_GET['route'] : '';
switch ($route) {
    case 'home':
        $results = getAll_Products();
        include "./view/banner.php";
        include './view/home.php';
        break;
    case 'sanpham':
        $results = getAll_Products();
        include './view/product.php';
        break;
    case 'add-sanphamm':
        $results = getAll_Products();
        include './view/product.php';
        break;
    case 'chitietsanpham':
        if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $one_product = getone_product($id);
                $one_product = $one_product[0];
          
                include "./view/product-detail.php";
            }
            break;
    case 'gioithieu':
        include './view/introduce.php';
        break;
    case 'dangnhap':
        include './view/login.php';
        break;
    case 'dangky':
        include './view/signup.php';
        break;
    case 'exit':
        unset($_SESSION['role']);
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        header('location: index.php');
        break;
        case 'themgiohang':
            if (isset($_POST['themgiohang'])) {
                // Lấy thông tin sản phẩm từ POST
                $color = $_POST['mau'];
                $image = $_POST['img'];
                $camera = $_POST['cam'];
                $display = $_POST['display'];
                $storage = $_POST['sto'];
                $CPU = $_POST['CPU'];
                $battery = $_POST['pin'];
        
                // Hiển thị màu sắc cho debug (nếu cần)
                echo $color;
        
                // Tạo mảng sản phẩm
                $sp = array($color, $image, $camera, $battery, $storage, $display);
        
                // Kiểm tra nếu giỏ hàng chưa tồn tại, tạo mảng giỏ hàng
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();  // Khởi tạo giỏ hàng nếu chưa có
                }
        
                // Thêm sản phẩm vào giỏ hàng
                array_push($_SESSION['cart'], $sp);
        
                // Kiểm tra và hiển thị giỏ hàng
                if (isset($_SESSION['cart'])) {
                    echo '<pre>';
                    var_dump($_SESSION['cart']);  // Hiển thị nội dung giỏ hàng
                    $cart = $_SESSION['cart'];
                    include 'view/viewcart.php';  // Bao gồm trang giỏ hàng
                }
            }
            break;
        
      
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];
            $user = check_user($email, $password);

            if ($user) {
                if ($user['role_id'] == 0) {
                    // Lưu thông tin người dùng vào session
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role_id'];
                    $_SESSION['username'] = $user['username'];
                    // Chuyển hướng đến trang quản trị
                    header('Location: ./admin/index.php');
                    exit();
                } else {
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role_id'];
                    $_SESSION['username'] = $user['username'];
                    header('Location: index.php');
                    exit();
                }
            } else {
                // Người dùng không tồn tại
                $_SESSION['error'] = 'Email hoặc mật khẩu không đúng.';
                header('Location: login.php');
                exit();
            }
        }
        break;

    default:
        include "./view/banner.php";
        include "./view/home.php";
        break;
}

include './view/footer.php';