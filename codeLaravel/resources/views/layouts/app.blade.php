<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="css/all.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/project.css" rel="stylesheet">
    <link href="css/contract.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<head>
<div class="navbar bg-dark">
    <div class="container d-flex align-items-center">
        <div class="logo col-md-4 d-flex align-items-center">
            <img src="images/khoa.png" alt="Logo">
            <span>My Profile</span>
        </div>
        <div class="menu col-md-4 text-center">
            <a href="index"><b>Profile</b></a>
            <a href="project"><b>Dự án</b></a>
            <a href="contract"><b>Liên hệ</b></a>
        </div>
        <div class="search col-md-4 d-flex justify-content-end">
            <input type="text" placeholder="Tìm kiếm...">
            <button>Tìm</button>
        </div>
    </div>
</div>
</head>
<main>
@yield('content')
</main>
<footer class="footer bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <!-- Logo và mô tả -->
            <div class="col-md-4 mb-3">
                <h5 class="text-uppercase fw-bold">WEBSITE CỦA NGUYỄN QUỐC KHOA</h5>
                <p class="text-white">
                    Cảm ơn bạn đã xem những thông tin tôi đã cung cấp.
                </p>
            </div>
            <!-- Liên kết nhanh -->
            <div class="col-md-4 mb-3">
                <h5 class="text-uppercase fw-bold">Liên kết nhanh</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Profile</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Dự án</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Liên hệ</a></li>
                </ul>
            </div>
            <!-- Liên hệ -->
            <div class="col-md-4 mb-3">
                <h5 class="text-uppercase fw-bold">Liên hệ</h5>
                <p><i class="bi bi-geo-alt-fill"></i> Số 128, đường Tổ 10, ấp Phú Quới, xã Yên Luông, huyện Gò Công Tây, tỉnh Tiền Giang.</p>
                <p><i class="bi bi-telephone-fill"></i> 0969895549</p>
                <p><i class="bi bi-envelope-fill"></i> nguyenquockhoa5549@gmail.com</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col text-center">
                <p class="text-white small mb-0">
                    © 2024 Tên Công Ty. Tất cả các quyền được bảo lưu.
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

