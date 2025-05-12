<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <link href="css/all.css" rel="stylesheet">
    <link href="css/contract.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
@include('layouts.header')
<main>
    <div class="contact-section">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col">
                    <h2 class="text-primary"><b>Liên hệ với tôi</b></h2>
                    <p>Hãy gửi tin nhắn của bạn và tôi sẽ phản hồi sớm nhất có thể.</p>
                </div>
            </div>
            <div class="row">
                <!-- Thông tin liên hệ -->
                <div class="col-md-6 mb-4">
                    <h4 class="text-secondary">Thông tin liên hệ</h4>
                    <ul class="list-unstyled contact-info">
                        <li class="mb-3">
                            <i class="bi-geo-alt-fill text-primary"></i>
                            <strong>Địa chỉ: </strong>Số 128, đường Tổ 10, ấp Phú Quới, xã Yên Luông, huyện Gò Công Tây, tỉnh Tiền Giang.
                        </li>
                        <li class="mb-3">
                            <i class="bi-telephone-fill text-primary"></i>
                            <strong>Số điện thoại:</strong> 0969895549
                        </li>
                        <li class="mb-3">
                            <i class="bi-envelope-fill text-primary"></i>
                            <strong>Email:</strong> nguyenquockhoa5549@gmail.com
                        </li>
                        <li class="mb-3">
                            <i class="bi-facebook text-primary"></i>
                            <strong>Facebook:</strong> <a href="https://www.facebook.com/quockhoa.nguyen.374" target="blank">https://www.facebook.com/quockhoa.nguyen.374</a>
                        </li>
                    </ul>
                    <div class="row">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.520141589769!2d106.78408977485803!3d10.84798698930519!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752772b245dff1%3A0xb838977f3d419d!2zSOG7jWMgdmnhu4duIEPDtG5nIG5naOG7hyBCxrB1IENow61uaCBWaeG7hW4gVGjDtG5nIGPGoSBz4bufIHThuqFpIFRQLkhDTQ!5e0!3m2!1svi!2s!4v1735468746452!5m2!1svi!2s" width="600" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <!-- Biểu mẫu liên hệ -->
                <div class="col-md-6">
                    <h4 class="text-secondary">Gửi tin nhắn</h4>
                    <form class="contact-form" action="/contact" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input name="name" type="text" id="name" class="form-control" placeholder="Nhập họ và tên của bạn">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" id="email" class="form-control" placeholder="Nhập email của bạn">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Chủ đề</label>
                            <input name="subject" type="text" id="subject" class="form-control" placeholder="Nhập chủ đề của bạn">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Nội dung</label>
                            <textarea name="message" id="message" class="form-control" rows="5" placeholder="Nhập nội dung tin nhắn"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Gửi tin nhắn</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
</body>
</html>
