<?php
/**
 * index.php
 * Public landing page: hero section + quick links into the main
 * features (report lost, report found, search, map).
 */
require_once __DIR__ . '/config/config.php';

$lostModel = new LostHelmet();
$foundModel = new FoundHelmet();

$db = Database::getInstance()->getConnection();
$totalLost = (int) $db->query('SELECT COUNT(*) FROM lost_helmets')->fetchColumn();
$totalFound = (int) $db->query('SELECT COUNT(*) FROM found_helmets')->fetchColumn();
$totalRecovered = (int) $db->query("SELECT COUNT(*) FROM lost_helmets WHERE status = 'recovered'")->fetchColumn();

$pageTitle = 'Helmet Recovery System — Lost & Found Helmets';
require_once __DIR__ . '/views/partials/header.php';
?>

<div class="p-5 mb-4 bg-dark text-white rounded-4 text-center">
    <i class="bi bi-shield-fill-check text-warning" style="font-size:3.5rem;"></i>
    <h1 class="fw-bold mt-3">Lost Your Helmet? Found One?</h1>
    <p class="lead">
        Our automatic matching engine connects lost helmet reports with found ones —
        with QR registration, OCR serial detection, and a live map to help reunite riders with their gear.
    </p>
    <?php if (isLoggedIn()): ?>
        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
            <a href="<?= BASE_URL ?>/views/lost/create.php" class="btn btn-danger btn-lg"><i class="bi bi-exclamation-triangle"></i> Report Lost</a>
            <a href="<?= BASE_URL ?>/views/found/create.php" class="btn btn-success btn-lg"><i class="bi bi-search-heart"></i> Report Found</a>
        </div>
    <?php else: ?>
        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
            <a href="<?= BASE_URL ?>/register.php" class="btn btn-warning btn-lg fw-semibold">Get Started — Sign Up Free</a>
            <a href="<?= BASE_URL ?>/login.php" class="btn btn-outline-light btn-lg">Log In</a>
        </div>
    <?php endif; ?>
</div>

<div class="row g-4 mb-5 text-center">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100"><div class="card-body">
            <div class="fs-2 fw-bold text-danger"><?= $totalLost ?></div>
            <div class="text-muted">Lost Helmet Reports</div>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100"><div class="card-body">
            <div class="fs-2 fw-bold text-success"><?= $totalFound ?></div>
            <div class="text-muted">Found Helmet Reports</div>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100"><div class="card-body">
            <div class="fs-2 fw-bold text-primary"><?= $totalRecovered ?></div>
            <div class="text-muted">Helmets Recovered</div>
        </div></div>
    </div>
</div>

<div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4 mb-5">
    <div class="col">
        <div class="card border-0 shadow-sm h-100 text-center"><div class="card-body d-flex flex-column">
            <i class="bi bi-shop fs-1 text-primary"></i>
            <h6 class="fw-bold mt-2">Helmet Store</h6>
            <p class="small text-muted flex-grow-1">Buy a certified helmet — authenticity certificate included free.</p>
            <a href="<?= BASE_URL ?>/shop.php?category=helmet" class="btn btn-sm btn-outline-primary">Shop Helmets</a>
        </div></div>
    </div>
    <div class="col">
        <div class="card border-0 shadow-sm h-100 text-center"><div class="card-body d-flex flex-column">
            <i class="bi bi-search fs-1 text-primary"></i>
            <h6 class="fw-bold mt-2">Search Everything</h6>
            <p class="small text-muted flex-grow-1">Filter by brand, model, color, size, and location.</p>
            <a href="<?= BASE_URL ?>/views/lost/search.php" class="btn btn-sm btn-outline-primary">Search Now</a>
        </div></div>
    </div>
    <div class="col">
        <div class="card border-0 shadow-sm h-100 text-center"><div class="card-body d-flex flex-column">
            <i class="bi bi-geo-alt-fill fs-1 text-danger"></i>
            <h6 class="fw-bold mt-2">Live Map</h6>
            <p class="small text-muted flex-grow-1">See lost & found pins near you.</p>
            <a href="<?= BASE_URL ?>/views/map/map.php" class="btn btn-sm btn-outline-danger">View Map</a>
        </div></div>
    </div>
    <div class="col">
        <div class="card border-0 shadow-sm h-100 text-center"><div class="card-body d-flex flex-column">
            <i class="bi bi-qr-code fs-1 text-warning"></i>
            <h6 class="fw-bold mt-2">QR Registration</h6>
            <p class="small text-muted flex-grow-1">Register your helmet before it's ever lost.</p>
            <a href="<?= BASE_URL ?>/views/helmet/register.php" class="btn btn-sm btn-outline-warning">Register Helmet</a>
        </div></div>
    </div>
    <div class="col">
        <div class="card border-0 shadow-sm h-100 text-center"><div class="card-body d-flex flex-column">
            <i class="bi bi-link-45deg fs-1 text-success"></i>
            <h6 class="fw-bold mt-2">Automatic Matching</h6>
            <p class="small text-muted flex-grow-1">We compare reports and notify you of possible matches.</p>
            <a href="<?= BASE_URL ?>/views/matches/list.php" class="btn btn-sm btn-outline-success">My Matches</a>
        </div></div>
    </div>
</div>


<?php require_once __DIR__ . '/views/partials/footer.php'; ?>
