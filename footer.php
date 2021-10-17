  
   
   <footer class="footer section">

        <div class="footer__container container">

            <div class="footer__social footer__item">
                <h3 class="footer__title ">ĐIỀU HƯỚNG</h3>

                <div class="social__list">
                    <ul>
                        <li><a href=""><i class="ri-facebook-circle-line social__link"></i></a></li>
                        <li><a href=""><i class="ri-instagram-line social__link"></i></a></li>
                        <li><a href=""><i class="ri-youtube-line social__link"></i></a></li>
                        <li><a href=""><i class="ri-twitter-line social__link"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="footer__subscribe footer__item">
                <div class="footer__subscribe-content">
                    <a href="#" class="nav__logo footer__logo">XSHOP<i class="ri-time-line"></i></a>
                    <span class="footer__description">LINHDQ Mang lại gía trị đích thực cũng những chiếc đồng hồ sang trọng, đa dạng trong mẫu mã sản phẩn, chính sách bảo hành, vận chuyển và thanh toán tốt nhất.</span>

                    <div class="subscribe__form">
                        <input type="email" name="" id="" placeholder="Email...">
                        <button class="subscribe__button"><i class="ri-arrow-right-circle-line button__icon"></i></button>
                    </div>
                </div>
            </div>

            <div class="footer__info footer__item">
                <h3 class="footer__title">THÔNG TIN LIÊN HỆ</h3>

                <div class="info__detail">
                    <p>Xóm 2, xã Diễn Lộc, huyện Diễn Châu, tỉnh Nghệ An 
                        <br> 0123456789 <br> linhdqph14703@fpt.edu.vn
                    </p>
                </div>
            </div>

        </div>

        <div class="footer__rights">
            <span class="copy__right">
                © All rights reserved 14703.
            </span>
        </div>
    </footer>

    <script src="./assets/js/main.js"></script>
    <script>
        function showPassw() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            });
        // SCROLL REVEAL
        ScrollReveal().reveal('.product');
        ScrollReveal().reveal('.cart');
        ScrollReveal().reveal('.main_category');
        // aos js
        AOS.init();
        
//]]>
    </script>

</body>
</html>