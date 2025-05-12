<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="css/all.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <!-- AOS Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body>
@include('layouts.header')
<main>
    <ul class="banner-container">
        <li>
            <img src="{{ URL('images/banner3.svg') }}" alt="">
            <div class="content-banner">
                <span>
                    <a href="{{ route('profiledetail') }}"><button class="btn btn-primary btn-banner">Xem ngay</button></a>
                </span>
            </div>
        </li>
        <li>
            <img src="{{ URL('images/banner2.svg') }}" alt="">
            <div class="content-banner">
                <span>
                    <a href="{{ route('project') }}"><button class="btn btn-primary btn-banner">Xem ngay</button></a>
                </span>
            </div>
        </li>
        <li>
            <img src="{{ URL('images/banner4.svg') }}" alt="">
            <div class="content-banner">
                <span>
                    <a href="{{ route('contract') }}"><button class="btn btn-primary btn-banner">Liên hệ ngay</button></a>
                </span>
            </div>
        </li>
        <li>
            <img src="{{ URL('images/banner1.svg') }}" alt="">
            <div class="content-banner">
                <span>
                    <a href="{{ route('contract') }}"><button class="btn btn-primary btn-banner">Liên hệ ngay</button></a>
                </span>
            </div>
        </li>
    </ul>    
    <!-- Giới thiệu bản thân -->
    <div class="container py-5" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-4 text-primary" data-aos="fade-left" data-aos-delay="300">
                    <b>Giới Thiệu Bản Thân</b>
                </h2>
                <p class="mb-3" data-aos="fade-left" data-aos-delay="600">
                    Em tên là <b>Nguyễn Quốc Khoa</b>, sinh viên năm 4 ngành <b>Công nghệ phần mềm</b> tại <b>Học viện Công nghệ Bưu chính Viễn thông</b>.
                </p>
                <p class="mb-3" data-aos="fade-left" data-aos-delay="900">
                    Em đã tham gia nhiều dự án môn học với các vai trò như thiết kế giao diện, xây dựng API, xử lý dữ liệu và tích hợp chatbot AI. 
                    Em có kiến thức về <b>Java, PHP Laravel, Python, C#, React</b> cùng với <b>MySQL, SQL Server</b>, và luôn sẵn sàng học hỏi công nghệ mới.
                </p>
                <p class="mb-3" data-aos="fade-left" data-aos-delay="1200">
                    Mục tiêu của em là trở thành một lập trình viên chuyên nghiệp, tạo ra những sản phẩm phần mềm chất lượng, tối ưu và thân thiện với người dùng.
                </p>
                <a href="profiledetail" class="btn btn-primary" data-aos="zoom-in" data-aos-delay="1500">Xem chi tiết</a>
            </div>
            <div class="col-md-6 text-center" data-aos="zoom-in">
                <a href="images/khoa.png" data-lightbox="profile">
                    <img src="images/khoa.png" alt="Nguyễn Quốc Khoa" class="img-fluid rounded-circle shadow w-75">
                </a>
            </div>
        </div>
    </div>

    <!-- Giá trị cốt lõi -->
    <div class="container my-5 py-5 bg-light" data-aos="fade-up">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="text-primary mb-4" data-aos="fade-up" data-aos-delay="500"><b>Giá trị cốt lõi</b></h2>
                <p data-aos="fade-up" data-aos-delay="700">Những nguyên tắc mà tôi luôn trân trọng và theo đuổi.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="900">
                <div class="p-4 border rounded shadow-sm h-100 core-value">
                    <h5 class="text-primary mb-3">Chính trực trong công việc</h5>
                    <p>Luôn làm việc với tinh thần trách nhiệm, minh bạch và trung thực.</p>
                </div>
            </div>
            <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="1200">
                <div class="p-4 border rounded shadow-sm h-100 core-value">
                    <h5 class="text-primary mb-3">Nỗ lực, học hỏi không ngừng</h5>
                    <p>Luôn không ngừng trau dồi kiến thức và kỹ năng để phát triển bản thân.</p>
                </div>
            </div>
            <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="1500">
                <div class="p-4 border rounded shadow-sm h-100 core-value">
                    <h5 class="text-primary mb-3">Sáng tạo đổi mới</h5>
                    <p>Luôn không ngừng sáng tạo, không ngại thay đổi để mang lại những giá trị tốt nhất cho công việc.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Dự án -->
    <div class="container my-5" data-aos="fade-up">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="mb-4 text-primary"><b>Dự án nổi bật</b></h2>
                <p>Bao gồm các dự án nhóm và cá nhân từ 2021-2025</p>
            </div>
        </div>
        <div class="row">
            @foreach ($projects as $index => $project)
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
                    <div class="card shadow-lg rounded-3 overflow-hidden h-100">
                        <a href="{{ $project->images ? asset('storage/' . $project->images) : 'https://via.placeholder.com/300x200' }}" data-lightbox="project-{{ $index }}">
                            <img src="{{ $project->images ? asset('storage/' . $project->images) : 'https://via.placeholder.com/300x200' }}" class="card-img-top" alt="Dự án {{ $index + 1 }}">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3">{{ $project->title }}</h5>
                            <span class="badge bg-success mb-2 w-25">{{ $project->status ?? 'Hoàn thành' }}</span>
                            <p class="card-text text-muted mb-4">{{ $project->content }}</p>
                            <div class="d-flex gap-2 mt-3">
                                <a href="{{ route('projectdetail', ['id' => $project->id]) }}" class="btn btn-primary">Xem chi tiết</a>
                                @if ($project->url_demo)
                                    <a href="{{ $project->url_demo }}" class="btn btn-outline-primary" target="_blank">Live Demo</a>
                                @else
                                    <button class="btn btn-outline-primary disabled" disabled>Live Demo</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>    
            @endforeach
        </div>
    </div>
    <!-- Kinh nghiệm làm việc -->
    <div class="container py-5 my-4 bg-light shadow rounded" data-aos="fade-up">
        <div class="row mb-4">
            <h2 class="text-primary mb-4"><b>Kinh nghiệm & Kỹ năng làm việc</b></h2>
            <p>Những kiến thức, kinh nghiệm và trải trong quá trình học tập và những dự án đã được làm tại trường.</p>
        </div>
        <div class="row">
            <div class="col-card col-md-4 mb-4" data-aos="fade-up" data-aos-delay="600">
                <div class="p-4 border rounded shadow-sm h-100 skill-card">
                    <p class="text-primary mb-4"><b>Kiến thức</b></p>
                    <ul>
                        <li>Đã học và thực hành với các ngôn ngữ lập trình như <b>C++, Python, Java, C#, PHP</b></li>
                        <li>Đã học và thực hành với mô hình <b>MVC</b></li>
                        <li>Đã học và thực hành với framework <b>PHP Laravel</b> và <b>Java Spring Boot</b></li>
                        <li>Đã học và thực hành với thư viện <b>React</b> và <b>Bootstrap, Tailwind Css</b></li>
                        <li>Biết sử dụng <b>Git</b></li>
                        <li>Biết sử dụng <b>Postman</b></li>
                        <li>Biết sử dụng <b>WordPress</b></li>
                    </ul>
                </div>
            </div>
            <div class="col-card col-md-4 mb-4" data-aos="fade-up" data-aos-delay="900">
                <div class="p-4 border rounded shadow-sm h-100 skill-card">
                    <p class="text-primary mb-4"><b>Kinh nghiệm làm việc với CSDL</b></p>
                    <ul>
                        <li>Đã từng làm việc với nhiều CSDL như <b>SQL Server, MySQL</b></li>
                        <li>Biết viết và sử dụng các <b>SP, View, Trigger</b></li>
                        <li>Biết phân tán <b>cơ sở dữ liệu</b></li>
                        <li>Biết tối ưu hóa các truy vấn để hệ thống có thể chạy ổn định hơn</li>
                    </ul>
                </div>
            </div>
            <div class=" col-card col-md-4 mb-4" data-aos="fade-up" data-aos-delay="1200">
                <div class="p-4 border rounded shadow-sm h-100 skill-card">
                    <p class="text-primary mb-4"><b>Kỹ năng mềm</b></p>
                    <ul>
                        <li>Có kĩ năng làm việc nhóm</li>
                        <li>Biết lắng nghe, chia sẻ để cùng nhau phát triển</li>
                        <li>Luôn chủ động trong công việc</li>
                        <li>Kĩ lưỡng trong công việc</li>
                        <li>Biết tìm hiểu để giải quyết vấn đề khi gặp khó khăn</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Scroll to Top Button -->
<a href="#" id="scrollToTopBtn" class="unline">
    <i class="bi-chevron-up"></i>
</a>

@include('layouts.footer')

<!-- AOS Script -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 800,
    once: true,
    easing: 'ease-out',
});
</script>
<script>
    let scrollToTopBtn = document.getElementById("scrollToTopBtn");
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    }
    scrollToTopBtn.onclick = function() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
</script>
</body>
</html>
