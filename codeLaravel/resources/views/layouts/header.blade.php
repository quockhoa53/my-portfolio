<!-- HEADER -->
<header class="navbar-custom">
    <div class="container-custom">
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('images/khoa.png') }}" alt="Logo">
            <a href="#">My Portfolio</a>
        </div>

        <!-- Menu (Desktop) -->
        <nav class="nav-links">
            <a href="{{ route('index') }}" class="{{ request()->is('index') ? 'active' : '' }}">Trang chủ</a>
            <a href="{{ route('project') }}" class="{{ request()->is('project') ? 'active' : '' }}">Dự án</a>
            <a href="{{ route('knowledge') }}" class="{{ request()->is('knowledge') ? 'active' : '' }}">Kho kiến thức</a>
            <a href="{{ route('contract') }}" class="{{ request()->is('contract') ? 'active' : '' }}">Liên hệ</a>
        </nav>

        <!-- Call and Zalo Buttons -->
        <div class="contact-buttons">
            <div class="contact-button-wrapper">
                <a href="tel:+84969895549" class="call-button" title="Gọi ngay">
                    <i class="bi bi-telephone-fill phone-icon"></i>
                </a>
                <span class="contact-label">Gọi ngay</span>
            </div>
            <div class="contact-button-wrapper">
                <a href="https://zalo.me/0969895549" class="zalo-button" title="Chat Zalo" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/1200px-Icon_of_Zalo.svg.png" alt="Zalo" class="phone-icon">
                </a>
                <span class="contact-label">Zalo</span>
            </div>
        </div>

        <!-- Mobile Menu Icon -->
        <div class="menu-toggle" id="mobile-menu-btn">
            <i class="bi bi-list"></i>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-nav" id="mobile-menu">
        <a href="{{ route('index') }}" class="{{ request()->is('index') ? 'active' : '' }}">Trang chủ</a>
        <a href="{{ route('project') }}" class="{{ request()->is('project') ? 'active' : '' }}">Dự án</a>
        <a href="{{ route('knowledge') }}" class="{{ request()->is('knowledge') ? 'active' : '' }}">Kho kiến thức</a>
        <a href="{{ route('contract') }}" class="{{ request()->is('contract') ? 'active' : '' }}">Liên hệ</a>
    </div>
</header>

<style>
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Navbar */
.navbar-custom {
    position: fixed;
    top: 0;
    width: 100%;
    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); /* Gradient màu xanh đậm đến xanh sáng */
    backdrop-filter: blur(8px);
    color: white;
    z-index: 1000;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4); /* Bóng đổ đậm hơn */
    transition: background 0.3s ease;
}

/* Hiệu ứng khi scroll (tùy chọn, có thể bỏ nếu không cần) */
.navbar-custom.scrolled {
    background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
}

body {
    padding-top: 80px;
    font-family: JetBrains Mono;
}

/* Container */
.container-custom {
    max-width: 1200px;
    margin: 0 auto;
    padding: 15px 25px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Logo */
.logo {
    display: flex;
    align-items: center;
    gap: 12px;
}

.logo img {
    width: 50px; /* Tăng kích thước logo */
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, 0.3); /* Viền nhẹ cho logo */
    transition: transform 0.3s ease;
}

.logo img:hover {
    transform: scale(1.1);
}

.logo a {
    font-size: 1.5rem; /* Tăng kích thước chữ */
    font-weight: 700;
    color: white;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Nav links */
.nav-links {
    display: flex;
    gap: 30px; /* Tăng khoảng cách giữa các liên kết */
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-weight: 600; /* Chữ đậm hơn */
    font-size: 1.1rem; /* Tăng kích thước chữ */
    position: relative;
    transition: color 0.3s ease;
}

.nav-links a::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -5px;
    height: 2px;
    width: 0;
    background-color: #ffffff;
    transition: width 0.3s ease;
}

.nav-links a:hover::after,
.nav-links a.active::after {
    width: 100%;
}

.nav-links a:hover {
    color: #e0f2fe; /* Màu sáng hơn khi hover */
}

/* Contact Buttons */
.contact-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Call Button */
.call-button {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: #10b981; /* Màu xanh lá để nổi bật trên nền gradient */
    border-radius: 50%;
    text-decoration: none;
    transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.call-button:hover {
    background-color: #059669;
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

/* Phone Icon */
.phone-icon {
    font-size: 20px;
    color: #ffffff;
}

/* Phone Ring Animation */
@keyframes phoneRing {
    0%, 100% { transform: rotate(0deg); }
    20% { transform: rotate(15deg); }
    40% { transform: rotate(-15deg); }
    60% { transform: rotate(0deg); }
}

.call-button:hover .phone-icon {
    animation: phoneRing 1s ease-in-out;
}

/* Zalo Button */
.zalo-button {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: #10b981; /* Màu cam để tạo điểm nhấn */
    border-radius: 50%;
    text-decoration: none;
    transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.zalo-button:hover {
    background-color: #059669;
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

/* Zalo Icon */
.zalo-button img {
    width: 20px;
    height: 20px;
}

/* Zalo Pulse Animation */
@keyframes zaloPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

.zalo-button:hover img {
    animation: zaloPulse 1s ease-in-out;
}

/* Mobile Toggle */
.menu-toggle {
    display: none;
    font-size: 1.8rem;
    cursor: pointer;
    color: white;
}

/* Mobile Nav */
.mobile-nav {
    display: none;
    flex-direction: column;
    background-color: #1e3a8a; /* Đồng bộ với màu gradient của header */
    padding: 10px 20px;
    text-align: center;
    transition: all 0.3s ease-in-out;
    position: absolute;
    top: 80px;
    width: 100%;
}

.mobile-nav a {
    color: white;
    padding: 12px 20px;
    text-decoration: none;
    border-bottom: 1px solid #3b82f6;
    transition: background-color 0.3s ease;
}

.mobile-nav a:last-child {
    border-bottom: none;
}

.mobile-nav a:hover {
    color: #e0f2fe;
    background-color: #2563eb;
}

/* Responsive */
@media (max-width: 768px) {
    .nav-links {
        display: none;
    }

    .menu-toggle {
        display: block;
    }

    .contact-buttons {
        gap: 8px;
    }

    .call-button, .zalo-button {
        width: 36px;
        height: 36px;
    }

    .phone-icon {
        font-size: 18px;
    }

    .zalo-button img {
        width: 18px;
        height: 18px;
    }

    .logo img {
        width: 40px;
        height: 40px;
    }

    .logo a {
        font-size: 1.2rem;
    }

    .mobile-nav.active {
        display: flex;
    }
}
/* Glow effect */
.call-button, .zalo-button {
    animation: glowPulse 2s infinite;
}

/* Glow Pulse Animation */
@keyframes glowPulse {
    0%, 100% {
        box-shadow: 0 0 10px #10b981, 0 0 20px #10b981;
    }
    50% {
        box-shadow: 0 0 20px #34d399, 0 0 30px #34d399;
    }
}

/* Show label next to icons on desktop */
.contact-label {
    display: none;
    color: white;
    font-weight: bold;
    margin-left: 8px;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.contact-button-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
}

@media (min-width: 769px) {
    .contact-label {
        display: inline;
    }
}

</style>

<script>
document.getElementById('mobile-menu-btn').addEventListener('click', function () {
    document.getElementById('mobile-menu').classList.toggle('active');
});

// Optional: Thêm hiệu ứng khi scroll (nếu muốn header đổi màu khi scroll)
window.addEventListener('scroll', function () {
    const header = document.querySelector('.navbar-custom');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});
</script>