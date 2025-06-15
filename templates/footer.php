<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Footer Styles */
        footer {
            background-color: #0d0d1a !important; 
            color: #e0e0e0;
            padding-top: 40px;
            padding-bottom: 20px;
            border-top: 3px solid rgb(248, 248, 248); 
        }

        .footer-underline {
            display: inline-block;
            position: relative;
            color:rgb(255, 255, 255); 
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-underline::after {
            content: "";
            position: absolute;
            width: 100%; 
            height: 3px;
            background-color:rgb(255, 255, 255);
            bottom: -8px;
            left: 0;
            border-radius: 2px;
        }

        footer p,
        footer a {
            color: #b0b0b0; 
            text-decoration: none;
            transition: color 0.3s ease; 
        }

        footer a:hover {
            color:rgb(255, 255, 255); 
            text-decoration: underline;
        }

        .social-icons a {
            color: #e0e0e0;
            font-size: 1.8rem; 
            margin: 0 12px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .social-icons a:hover {
            color:rgb(241, 0, 0); 
            transform: scale(1.2);
        }

        .contact-info li {
            margin-bottom: 10px;
            display: flex; 
            align-items: center; 
        }
        .contact-info li i {
            margin-right: 10px; 
            color: #ff5722; 
            font-size: 1.2rem; 
        }

        @media (max-width: 768px) {
            .footer-underline {
                text-align: center;
                display: block;
            }
            .footer-underline::after {
                left: 50%;
                transform: translateX(-50%);
            }
            .footer-bottom {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <footer class="text-center text-lg-start" data-bs-theme="dark">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase footer-underline mb-3">Home of Gamer</h5>
                    <p>
                        Pusat top up diamond game terpercaya dan termurah. Dapatkan pengalaman transaksi yang cepat, aman, dan nyaman untuk game favoritmu. Kami selalu berkomitmen memberikan layanan terbaik bagi para gamer.
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase footer-underline mb-3">Layanan Pelanggan</h5>
                    <ul class="list-unstyled mb-0 contact-info">
                        <li>
                            <i class="fas fa-envelope"></i> <a href="mailto:support@homeofgamer.com" class="text-reset">support@homeofgamer.com</a>
                        </li>
                        <li>
                            <i class="fab fa-whatsapp"></i> <a href="https://wa.me/+6283893082654" target="_blank" class="text-reset">+62 838-9308-2654</a>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i> Senin - Jumat, 09:00 - 17:00 WIB
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> Bandung, Jawa Barat, Indonesia
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase footer-underline mb-3">Ikuti Kami</h5>
                    <p>
                        Dapatkan informasi terbaru dan promo menarik dengan mengikuti kami di media sosial!
                    </p>
                    <div class="social-icons mt-4">
                        <a href="https://facebook.com/yourpage" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com/miqbaallp" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com/youraccount" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://youtube.com/Bergaming" target="_blank" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center footer-bottom">
            © 2025 Home of Gamer. Semua Hak Dilindungi.
        </div>
    </footer>
</body>

</html>