<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <!-- Logo & Brand -->
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url() ?>">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="PT Chakra Naga Furniture" height="60" class="d-inline-block align-top">
            <div class="brand-text ms-2">
                <span class="brand-name fw-bold"><?= $companyInfo['company_name'] ?? 'Chakra Naga Furniture' ?></span>
                <span class="brand-tagline d-block small text-muted"><?= $companyInfo['company_tagline'] ?? 'Premium Furniture Manufacturer' ?></span>
            </div>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <!-- Home -->
                <li class="nav-item mx-1">
                    <a class="nav-link d-flex align-items-center <?= $activePage === 'home' ? 'active' : '' ?>" href="<?= base_url() ?>">
                        <i class="fas fa-home me-2"></i>
                        <span><?= $translations['nav_home'] ?? 'Home' ?></span>
                    </a>
                </li>

                <!-- About -->
                <li class="nav-item mx-1">
                    <!-- <a class="nav-link d-flex align-items-center" href="about"> -->
                    <a class="nav-link d-flex align-items-center <?= $activePage === 'about' ? 'active' : '' ?>" href="<?= base_url('about') ?>">
                        <i class="fas fa-info-circle me-2"></i>
                        <span><?= $translations['nav_about'] ?? 'About Us' ?></span>
                    </a>
                </li>

                <!-- Products -->
                <li class="nav-item mx-1">
                    <a class="nav-link d-flex align-items-center"
                        href="<?= base_url('products') ?>">
                        <i class="fas fa-couch me-2"></i>
                        <span><?= $translations['nav_products'] ?? 'Products' ?></span>
                    </a>
                </li>

                <!-- Gallery -->
                <li class="nav-item mx-1">
                    <a class="nav-link d-flex align-items-center" href="gallery">
                        <i class="fas fa-images me-2"></i>
                        <span><?= $translations['nav_gallery'] ?? 'Gallery' ?></span>
                    </a>
                </li>

                <!-- Career -->
                <li class="nav-item mx-1">
                    <a class="nav-link d-flex align-items-center <?= $activePage === 'career' ? 'active' : '' ?>" href="<?= base_url('career') ?>">
                        <i class="fas fa-briefcase me-2"></i>
                        <span><?= $translations['nav_career'] ?? 'Career' ?></span>
                    </a>
                </li>

                <!-- Contact -->
                <li class="nav-item mx-1">
                    <a class="nav-link d-flex align-items-center" href="#contact">
                        <i class="fas fa-envelope me-2"></i>
                        <span><?= $translations['nav_contact'] ?? 'Contact' ?></span>
                    </a>
                </li>

                <!-- Catalog Download -->
                <li class="nav-item mx-1">
                    <a class="nav-link d-flex align-items-center" href="<?= base_url('download-catalog') ?>">
                        <i class="fas fa-download me-2"></i>
                        <span><?= $translations['nav_catalog'] ?? 'Catalog' ?></span>
                    </a>
                </li>

                <!-- Call to Action Button -->
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a href="#contact" class="btn btn-primary btn-cta d-flex align-items-center">
                        <i class="fas fa-phone-alt me-2"></i>
                        <span><?= $translations['get_quote'] ?? 'Get Quote' ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Navigation Active State Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update active nav link on scroll
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link[href^="#"]');

        window.addEventListener('scroll', function() {
            let current = '';
            const scrollPosition = window.scrollY + 100;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;

                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                const href = link.getAttribute('href');

                if (href === '#' + current ||
                    (current === '' && href === '#home') ||
                    (current === '' && link.closest('.nav-item').querySelector('a[href="<?= base_url() ?>"]'))) {
                    link.classList.add('active');
                }
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                if (href !== '#' && href.startsWith('#') && document.querySelector(href)) {
                    e.preventDefault();

                    const target = document.querySelector(href);
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop - 80,
                            behavior: 'smooth'
                        });

                        // Close mobile menu if open
                        const navbarCollapse = document.getElementById('navbarNav');
                        if (navbarCollapse.classList.contains('show')) {
                            new bootstrap.Collapse(navbarCollapse).hide();
                        }
                    }
                }
            });
        });

        // Highlight current page
        const currentPath = window.location.pathname;
        const homeLink = document.querySelector('a[href="<?= base_url() ?>"]');
        const careerLink = document.querySelector('a[href="<?= base_url('career') ?>"]');

        if (currentPath === '/' || currentPath === '') {
            if (homeLink) homeLink.classList.add('active');
        } else if (currentPath.includes('career')) {
            if (careerLink) careerLink.classList.add('active');
        }
    });
</script>