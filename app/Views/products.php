<?= $this->include('templates/header') ?>
<?= $this->include('templates/nav') ?>

<!-- Products Hero Section -->
<section class="products-hero hero-section" style="padding: 100px 0;">
    <div class="container py-5 text-center" style="position: relative; z-index: 1;">
        <h1 class="hero-title"><?= $category ? $category['name'] : ($translations['nav_products'] ?? 'Our Products') ?></h1>
        <div style="width: 60px; height: 3px; background: #A4998C; margin: 0 auto 30px;"></div>
        <p class="hero-subtitle mb-0 mx-auto" style="max-width: 700px;"><?= $category ? $category['description'] : ($translations['products_subtitle'] ?? 'Exquisite craftsmanship meeting modern elegance in every piece.') ?></p>
    </div>
</section>

<!-- Brand/Partner Slider (Fixed Version) -->
<section class="brand-section py-5 bg-white border-bottom overflow-hidden">
    <div class="container">
        <h6 class="text-center text-uppercase mb-5" style="letter-spacing: 4px; color: #999; font-weight: 400; font-size: 0.75rem;">
            <?= $translations['trusted_by'] ?? 'TRUSTED BY INTERNATIONAL BRANDS & ARCHITECTS' ?>
        </h6>
        <div class="brand-slider-container">
            <div class="brand-track">
                <!-- Each logo repeated to ensure seamless loop -->
                <div class="brand-item"><span>BRAND ONE</span></div>
                <div class="brand-item"><span>LIVING LUX</span></div>
                <div class="brand-item"><span>WOOD CRAFT</span></div>
                <div class="brand-item"><span>ELITE DESIGN</span></div>
                <div class="brand-item"><span>GLOBAL FURNISH</span></div>
                <div class="brand-item"><span>ARCHI-STYLE</span></div>
                <!-- Repeat -->
                <div class="brand-item"><span>BRAND ONE</span></div>
                <div class="brand-item"><span>LIVING LUX</span></div>
                <div class="brand-item"><span>WOOD CRAFT</span></div>
                <div class="brand-item"><span>ELITE DESIGN</span></div>
                <div class="brand-item"><span>GLOBAL FURNISH</span></div>
                <div class="brand-item"><span>ARCHI-STYLE</span></div>
            </div>
        </div>
    </div>
</section>

<!-- Main Products Section (Architectural Editorial) -->
<section class="products-editorial py-5" style="background-color: #fafafa;">
    <div class="container py-5">
        <div class="row g-0">
            <!-- Refined Minimalist Sidebar -->
            <div class="col-lg-2">
                <div class="editorial-sidebar sticky-top" style="top: 120px;">
                    <div class="mb-5">
                        <span class="editorial-label"><?= $translations['browse_by'] ?? 'Browse By' ?></span>
                        <div class="editorial-menu mt-4">
                            <a href="<?= base_url('products') ?>" class="editorial-menu-item <?= !$category ? 'active' : '' ?>">
                                <?= $translations['all_collections'] ?? 'All Collections' ?>
                            </a>
                            <?php foreach ($categories as $cat): ?>
                                <a href="<?= base_url('products/' . $cat['slug']) ?>"
                                    class="editorial-menu-item <?= ($category && $category['slug'] == $cat['slug']) ? 'active' : '' ?>">
                                    <?= $cat['name'] ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Editorial Content Grid -->
            <div class="col-lg-10 ps-lg-5">
                <!-- Status & Sort -->
                <div class="d-flex justify-content-between align-items-center mb-5 pb-3 border-bottom">
                    <div class="editorial-breadcrumb">
                        <span><?= $translations['catalog'] ?? 'Catalog' ?></span>
                        <i class="fas fa-chevron-right mx-2 small opacity-50"></i>
                        <span class="fw-bold"><?= $category ? $category['name'] : ($translations['all_products'] ?? 'All Products') ?></span>
                    </div>
                    <div class="editorial-count text-muted small text-uppercase" style="letter-spacing: 1px;">
                        <?= count($products) ?> <?= $translations['pieces'] ?? 'Pieces' ?>
                    </div>
                </div>

                <?php if (empty($products)): ?>
                    <div class="text-center py-5">
                        <p class="editorial-empty-text"><?= $translations['no_pieces_yet'] ?? 'No pieces found in this curation.' ?></p>
                    </div>
                <?php else: ?>
                    <div class="row g-4 lg-g-5">
                        <?php
                        // External Placeholders for demonstration
                        $placeholders = [
                            'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=800&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=800&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1581539250439-c96689b514dd?q=80&w=800&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1503602642458-232111445657?q=80&w=800&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1592078615290-033ee584e267?q=80&w=800&auto=format&fit=crop',
                            'https://images.unsplash.com/photo-1567016432779-094069958ad5?q=80&w=800&auto=format&fit=crop'
                        ];
                        ?>
                        <?php foreach ($products as $index => $product): ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="editorial-card-v2">
                                    <div class="editorial-img-container">
                                        <img src="<?= $placeholders[$index % count($placeholders)] ?>" alt="<?= $product['name'] ?>" class="editorial-img">

                                        <?php if ($product['is_new']): ?>
                                            <span class="editorial-badge"><?= $translations['exclusive_badge'] ?? 'Exclusive' ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="editorial-body-v2">
                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                            <span class="editorial-tag-main">Furniture</span>
                                            <span class="editorial-tag-sub"><?= ucfirst($product['category'] ?? 'Piece') ?></span>
                                        </div>
                                        <h3 class="editorial-title-v2">
                                            <a href="<?= base_url('product/' . $product['product_code']) ?>"><?= $product['name'] ?></a>
                                        </h3>
                                        <div class="editorial-footer-v2">
                                            <span class="editorial-code">REF: <?= $product['product_code'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Editorial Pagination -->
                    <div class="d-flex justify-content-center mt-5 pt-5">
                        <div class="editorial-pagination">
                            <a href="#" class="prev disabled"><i class="fas fa-arrow-left"></i></a>
                            <div class="pages">
                                <a href="#" class="active">01</a>
                                <a href="#">02</a>
                                <a href="#">03</a>
                            </div>
                            <a href="#" class="next"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Inquiry Concierge Section -->
<section class="inquiry-concierge py-5" style="background-color: #fff; border-top: 1px solid #eee;">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="concierge-info">
                    <span class="editorial-label"><?= $translations['concierge_service'] ?? 'Concierge Service' ?></span>
                    <h2 class="display-5 my-4" style="font-family: 'Playfair Display', serif;"><?= $translations['inquiry_title'] ?? 'Inquire About Our Collections' ?></h2>
                    <p class="text-muted mb-5" style="line-height: 1.8;">
                        <?= $translations['inquiry_desc'] ?? 'Our team of consultants is ready to assist you in finding the perfect pieces for your space. Whether you need a single piece or a full interior solution, we are here to help.' ?>
                    </p>

                    <div class="d-flex align-items-center gap-4 mb-4">
                        <div class="icon-box-small">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Email Inquiry</h6>
                            <p class="small text-muted mb-0"><?= $companyInfo['company_email'] ?? 'info@chakranagafurniture.com' ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="inquiry-card p-4 p-md-5">
                    <form action="<?= base_url('contact/send') ?>" method="POST">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating-custom">
                                    <input type="text" class="form-control-minimal" name="name" placeholder="Full Name" required>
                                    <label class="minimal-label">Full Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating-custom">
                                    <input type="email" class="form-control-minimal" name="email" placeholder="Email Address" required>
                                    <label class="minimal-label">Email Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating-custom">
                                    <select class="form-control-minimal" name="subject">
                                        <option value="Product Inquiry">Product Inquiry</option>
                                        <option value="Bespoke Design">Bespoke Design</option>
                                        <option value="Partnership">Partnership</option>
                                    </select>
                                    <label class="minimal-label">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating-custom">
                                    <textarea class="form-control-minimal" name="message" style="height: 120px" placeholder="Your Message" required></textarea>
                                    <label class="minimal-label">Message</label>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <button type="submit" class="btn-editorial-submit w-100">
                                    <span>Send Inquiry</span>
                                    <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Architectural Editorial Styles */
    :root {
        --editorial-accent: #A4998C;
        --editorial-dark: #222222;
        --editorial-muted: #888888;
        --editorial-border: #eeeeee;
        --editorial-card-bg: #ffffff;
    }

    /* Fixed Brand Slider */
    .brand-slider-container {
        width: 100%;
        overflow: hidden;
        padding: 10px 0;
    }

    .brand-track {
        display: flex;
        width: calc(250px * 12);
        animation: scrollBrands 40s linear infinite;
    }

    .brand-item {
        width: 250px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.1rem;
        color: #bbb;
        letter-spacing: 3px;
        transition: color 0.3s ease;
    }

    .brand-item:hover {
        color: var(--primary-color);
    }

    @keyframes scrollBrands {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(calc(-250px * 6));
        }
    }

    /* Editorial Sidebar */
    .editorial-label {
        font-size: 0.65rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: var(--editorial-muted);
    }

    .editorial-menu {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .editorial-menu-item {
        text-decoration: none;
        color: var(--editorial-dark);
        font-size: 0.9rem;
        font-weight: 400;
        transition: all 0.3s ease;
        padding-left: 0;
        position: relative;
    }

    .editorial-menu-item:hover,
    .editorial-menu-item.active {
        color: var(--editorial-accent);
        padding-left: 15px;
    }

    .editorial-menu-item.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        width: 8px;
        height: 1px;
        background: var(--editorial-accent);
    }

    /* Editorial Breadcrumb */
    .editorial-breadcrumb {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* Editorial Card V2 (Improved Spacing & Shape) */
    .editorial-card-v2 {
        background: var(--editorial-card-bg);
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    }

    .editorial-card-v2:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    /* Responsive Image Container */
    .editorial-img-container {
        position: relative;
        overflow: hidden;
        background-color: #f5f5f5;
        /* Default for Desktop */
        aspect-ratio: 4/5;
    }

    @media (max-width: 1199.98px) {
        .editorial-img-container {
            /* Tablet/Smaller Desktop */
            aspect-ratio: 1/1;
        }
    }

    @media (max-width: 767.98px) {
        .editorial-img-container {
            /* Mobile */
            aspect-ratio: 16/9;
        }
    }

    .editorial-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: grayscale(10%);
        transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .editorial-card-v2:hover .editorial-img {
        transform: scale(1.08);
        filter: grayscale(0%);
    }

    .editorial-action {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 25px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.4), transparent);
        display: flex;
        justify-content: center;
        opacity: 0;
        transform: translateY(15px);
        transition: all 0.4s ease;
    }

    .editorial-card-v2:hover .editorial-action {
        opacity: 1;
        transform: translateY(0);
    }

    .editorial-btn {
        background: white;
        color: var(--editorial-dark);
        padding: 10px 20px;
        text-decoration: none;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .editorial-btn:hover {
        background: var(--editorial-accent);
        color: white;
    }

    .editorial-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255, 255, 255, 0.9);
        color: var(--editorial-dark);
        padding: 4px 10px;
        font-size: 0.6rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        border-radius: 2px;
        backdrop-filter: blur(4px);
    }

    /* Editorial Body V2 (Better Padding) */
    .editorial-body-v2 {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    /* Editorial Card Tags */
    .editorial-tag-main {
        font-size: 0.6rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        background: var(--editorial-dark);
        color: white;
        padding: 4px 10px;
        border-radius: 4px;
    }

    .editorial-tag-sub {
        font-size: 0.6rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        background: #f0ede9;
        color: var(--editorial-accent);
        padding: 4px 10px;
        border-radius: 4px;
    }

    .editorial-desc {
        font-size: 0.85rem;
        color: #666666;
        line-height: 1.6;
        margin-bottom: 25px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .editorial-title-v2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        margin-bottom: 12px;
        line-height: 1.3;
        font-weight: 600;
    }

    .editorial-title-v2 a {
        color: var(--editorial-dark);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .editorial-title-v2 a:hover {
        color: var(--editorial-accent);
    }

    .editorial-footer-v2 {
        margin-top: auto;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding-top: 20px;
        border-top: 1px solid #f0f0f0;
    }

    .editorial-code {
        font-size: 0.7rem;
        color: var(--editorial-muted);
        font-weight: 600;
        letter-spacing: 1px;
    }

    /* Editorial Pagination */
    .editorial-pagination {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .editorial-pagination .pages {
        display: flex;
        gap: 15px;
    }

    .editorial-pagination a {
        text-decoration: none;
        color: var(--editorial-muted);
        font-weight: 700;
        font-size: 0.85rem;
        transition: color 0.3s ease;
    }

    .editorial-pagination a.active,
    .editorial-pagination a:hover:not(.disabled) {
        color: var(--editorial-dark);
    }

    .editorial-pagination .disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }

    /* Inquiry Section Styles */
    .inquiry-card {
        background: white;
        border: 1px solid #eee;
        border-radius: 12px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.05);
    }

    .form-floating-custom {
        position: relative;
        margin-bottom: 10px;
    }

    .form-control-minimal {
        width: 100%;
        padding: 15px 0;
        border: none;
        border-bottom: 2px solid #eee;
        background: transparent;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        outline: none;
        border-radius: 0;
    }

    .form-control-minimal:focus {
        border-bottom-color: var(--editorial-accent);
    }

    .minimal-label {
        position: absolute;
        top: -10px;
        left: 0;
        font-size: 0.65rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--editorial-muted);
    }

    .btn-editorial-submit {
        background: var(--editorial-dark);
        color: white;
        border: none;
        padding: 18px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .btn-editorial-submit:hover {
        background: var(--editorial-accent);
        transform: translateY(-3px);
    }

    .icon-box-small {
        width: 50px;
        height: 50px;
        background: #f9f7f5;
        color: var(--editorial-accent);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        border-radius: 10px;
    }

    /* Design Highlights Styles */
    .highlight-visual {
        width: 150px;
        height: 150px;
        margin: 0 auto;
        overflow: hidden;
        border: 5px solid white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .highlight-visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }

    .highlight-item:hover .highlight-visual img {
        transform: scale(1.15);
    }

    /* Responsive Sidebar Adjustment */
    @media (max-width: 991.98px) {
        .editorial-sidebar {
            position: static !important;
            margin-bottom: 50px;
        }

        .editorial-body-v2 {
            padding: 20px;
        }
    }
</style>

<?= $this->include('templates/footer') ?>