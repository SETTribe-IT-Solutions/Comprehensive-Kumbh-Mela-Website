<?php
require_once 'include/connect.php';
include 'include/navbar.php'; 

$pageTitle = "Marketplace - Kumbh Mela 2027";
$activePage = "shop";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="css/shop.css">
</head>
<body>
    <main>
        <!-- ================== E-COMMERCE & SOUVENIRS SECTION ================== -->
        <section id="shop-products" class="">
            <div class="container">
                <div class="shop-section">
                    <h2 class="shop-title">Marketplace</h2>
                    <div class="underline-wrapper">
                        <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
                    </div>
                    <p class="lead">Explore our collection of religious products and local handicrafts.</p>
                </div>

                <!-- Products Row -->
                <div class="row g-4">
                    <!-- Product Card: Rudraksha -->
                    <div class="col-md-6 col-lg-3">
                        <div class="product-card">
                            <img src="https://tse4.mm.bing.net/th/id/OIP.gbYIIFTZG5XsJ6VP2AeFugHaHa?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Rudraksha Mala" class="product-card-img">
                            <div class="product-card-body">
                                <h5 class="product-title">Authentic Rudraksha Mala</h5>
                                <p class="product-category">Religious Items</p>
                                <p class="product-price">₹1,250</p>
                                <a href="#" class="btn btn-brand w-100">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card: Idol -->
                    <div class="col-md-6 col-lg-3">
                        <div class="product-card">
                            <img src="https://i1.fnp.com/images/pr/x/v20200827182559/lord-ganesha-idol-pink_1.jpg" alt="Ganesha Idol" class="product-card-img">
                            <div class="product-card-body">
                                <h5 class="product-title">Hand-carved Ganesha Idol</h5>
                                <p class="product-category">Idols & Sculptures</p>
                                <p class="product-price">₹3,500</p>
                                <a href="#" class="btn btn-brand w-100">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card: Handicraft -->
                    <div class="col-md-6 col-lg-3">
                        <div class="product-card">
                            <img src="https://i.pinimg.com/originals/0c/95/3d/0c953dae115f19c4233a637389aa25b8.jpg" alt="Handicraft" class="product-card-img">
                            <div class="product-card-body">
                                <h5 class="product-title">Jaipuri Blue Pottery Vase</h5>
                                <p class="product-category">Local Handicrafts</p>
                                <p class="product-price">₹980</p>
                                <a href="#" class="btn btn-brand w-100">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card: Prasad -->
                    <div class="col-md-6 col-lg-3">
                        <div class="product-card">
                            <div class="product-badge">Customizable</div>
                            <img src="https://sanatansiddhi.com/wp-content/uploads/2025/01/mahakumbh-prasad-with-nuts-and-prasad-2-boondi-laddu-in-simple-pakaging.jpg" alt="Prasad" class="product-card-img">
                            <div class="product-card-body">
                                <h5 class="product-title">Prasad Delivery Service</h5>
                                <p class="product-category">Sacred Offerings</p>
                                <p class="product-price">From ₹501</p>
                                <a href="#" class="btn btn-brand w-100">Customize Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================== SUPPORT LOCAL ARTISANS SECTION ================== -->
        <section id="local-artisans" class="section-padding bg-light">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <img src="https://img.freepik.com/premium-photo/engage-with-local-artisans-jaipurs-pottery-vill-generative-ai_1198270-8027.jpg" class="img-fluid rounded-3 shadow" alt="Local Artisan">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="section-title text-start">Support for Local Artisans</h2>
                        <p>Our marketplace provides a platform for talented local artisans to showcase their traditional skills and reach a wider audience. Every purchase directly contributes to their livelihood and helps preserve our rich cultural heritage.</p>
                        <ul class="list-unstyled mt-3 fs-5">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Fair Pricing</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Global Reach</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Preservation of Crafts</li>
                        </ul>
                        <a href="#" class="btn btn-secondary mt-3">Meet The Artisans</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- ================== ORDER TRACKING SECTION ================== -->
        <section id="order-tracking" class="section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="section-title">Track Your Order</h2>
                        <p class="lead mb-4">Enter your Order ID below to check the status of your delivery.</p>
                        <div class="input-group input-group-lg shadow-sm">
                            <span class="input-group-text bg-white"><i class="bi bi-box-seam"></i></span>
                            <input type="text" class="form-control" placeholder="Enter your Order ID (e.g., KM2027-12345)">
                            <button class="btn btn-primary btn-brand" type="button">Track Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'include/footer.php'; ?>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>