<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{asset('/')}}">
    <meta charset="UTF-8">
    <meta name="description" content="ShopAlot Template">
    <meta name="keywords" content="ShopAlot, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title") | ShopALot</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <!-- Css Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
</head>

<body>
<!--    Page Preloder-->
<div id="preloder">
    <div class="loader"></div>
</div>
<!--    Header Section Begin-->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class="fa fa-envelope"></i>
                    brendanbao12@gmail.com
                </div>
                <div class="phone-service">
                    <i class="fa fa-phone"></i>
                    +84 905022841
                </div>
            </div>
            <div class="ht-right">
                @if(Auth::check())
                    <a href="./account/logout"  class='login-panel'><i class="fa fa-user"></i>
                        {{Auth::user()->name}} - logout
                    </a>
                @else

                    <a href="./account/login"  class='login-panel'><i class="fa fa-user"></i>Login</a>

                @endif








                <div class="lan-selector">


                    <select class="language_drop" name="countries" id="countries" style='width:300px;'>
                        <option value="yu" data-image="front/img/flag-1.jpg" data-imagecss="flag yt" data-title="EngLish">English</option>
                        <option value="yt" data-image="front/img/flag-2.jpg" data-imagecss="flag yu" data-title="Bangladesh">German</option>
                    </select>
                </div>
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>


            </div>

        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="#">
                            <img src="front/img/logo.png" height="25" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">

                    <form action="shop">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Category</button>
                            <div class="input-group">
                                <input name="search" value="{{request('search') }}" type="text" placeholder="What do you need?">
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 text-right">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#"><i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a  href="./cart">
                                <i class="icon_bag_alt">

                                </i>
                                <span class="cart-count">{{Cart::count()}}</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            @foreach(Cart::content() as $cart)
                                                <tr  data-rowId="{{ $cart->rowId }}">
                                            <td class="si-pic">
                                                <img style="height: 70px;"
                                                                    src="front/img/products/{{$cart->options->images[0]->path}}" alt=""></td>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>${{$cart->price}} x {{ $cart->qty }}</p>
                                                    <h6>{{$cart->name}}</h6>
                                                </div>
                                            </td>
                                            <td class="si-close">
                                                <i onclick="removeCart('{{$cart->rowId}}')" class="ti-close"></i>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div  class="select-total">
                                    <span>total:</span>
                                    <h5>${{Cart::total()}}</h5>
                                </div>
                                <div class="select-button">
                                    <a href="./cart" class="primary-btn view-card">VIEW CART</a>
                                    <a href="./checkout" class="primary-btn checkout-btn">Checkout</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">${{Cart::total()}}</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All departments</span>
                    <ul class="depart-hover">
                        <li class="active"><a href="#">Women's Clothing</a></li>
                        <li><a href="#">Men's Clothing</a></li>
                        <li><a href="#">Underwear</a></li>
                        <li><a href="#">Kid's Clothing</a></li>
                        <li><a href="#">Brand ShopAlotOn</a></li>
                        <li><a href="#">Accessories/Shoes</a></li>
                        <li><a href="#">Luxury Brands</a></li>
                        <li><a href="#">Brand Outdoor Apparel</a></li>
                    </ul>
                </div>
            </div>
            <nav  class="nav-menu mobile-menu">
                <ul>
                    <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Home</a></li>
                    <li class="{{ (request()->segment(1) == 'shop') ? 'active' : '' }}"><a href="./shop">Shop</a></li>
                    <li><a href="">Collection</a>
                        <ul class="dropdown">
                            <li><a href="">Men's</a></li>
                            <li><a href="">Women's</a></li>
                            <li><a href="">Kid's</a></li>
                        </ul>
                    </li>
                    <li><a href="./blog">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="">Pages</a>
                        <ul class="dropdown">
                            <li><a href="./account/my-order">My Order</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                            <li><a href="./cart">Shopping Cart</a></li>
                            <li><a href="./checkout">Checkout</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="./account/register">Register</a></li>
                            <li><a href="./account/login">Login</a></li>
                        </ul>

                    </li>
                </ul>

            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!--    Header Section End-->

{{--Body here--}}
@yield('body')

<!--    Partner logo Section Begin-->
<div  class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="front/img/logo-carousel/logo-1.png" >
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="front/img/logo-carousel/logo-2.png" >
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="front/img/logo-carousel/logo-3.png" >
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="front/img/logo-carousel/logo-4.png" >
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="front/img/logo-carousel/logo-5.png" >
                </div>
            </div>
        </div>
    </div>
</div>
<!--    Partner logo Section End-->
<!--    Footer Section Begin-->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="index.html">
                            <img src="front/img/footer-logo.png"  height="25" alt="">
                        </a>
                    </div>
                    <ul>
                        <il>HCM City</il>
                        <il>Phone: +84 90.50.22.841</il>
                        <il>Email: brendanbao12@gmail.com</il>
                    </ul>
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i> </a>
                        <a href="#"><i  class="fa fa-instagram"></i> ></a>
                        <a href="#"><i  class="fa fa-twitter"></i>> </a>
                        <a href="#"><i  class="fa fa-pinterest"></i> </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a  href="">About Us</a></li>
                        <li><a  href="">Check Out</a></li>
                        <li><a  href="">Contact</a></li>
                        <li><a  href="">Services</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a  href="">My Account</a></li>
                        <li><a  href="">Contact</a></li>
                        <li><a  href="">Shopping Cart</a></li>
                        <li><a  href="">Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newslatter-item">
                    <h5>Join Our Newsletter Now</h5>
                    <p>Get E-mail Updates about latest shop and special offers.</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Enter your Email">
                        <button type ="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        Copyright@ <script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is made with <i class ='fa fa-heart-o' aria-hidden="true"></i> by <a href="https://www.facebook.com/Mag1cal.Bao/" target="_blank">ShopALot</a>
                    </div>
                    <div class="payment-pic">
                        <img src="front/img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chatbox Component -->
    <button id="toggle-chat-btn">💬</button>
    <div id="chatbox-container">
        <!-- Tiêu đề của Chatbox -->
        <div id="chatbox-header">
            <span>Chat with us!</span>
        </div>

        <!-- Chat Log -->
        <div id="chat-log"></div>

        <!-- Form nhập câu hỏi -->
        <form id="chat-form">
            <input type="text" id="user-query" placeholder="Ask a question..." required>
            <button type="submit">Send</button>
        </form>
    </div>

</footer>


<!--    Footer Section End-->



<!-- Js Plugins -->
<script src="front/js/jquery-3.3.1.min.js"></script>
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery-ui.min.js"></script>
<script src="front/js/jquery.countdown.min.js"></script>
<script src="front/js/jquery.nice-select.min.js"></script>
<script src="front/js/jquery.zoom.min.js"></script>
<script src="front/js/jquery.dd.min.js"></script>
<script src="front/js/jquery.slicknav.js"></script>
<script src="front/js/owl.carousel.min.js"></script>
<script src="front/js/owlcarousel2-filter.min.js"></script>
<script src="front/js/main.js"></script>
<script>

    // Lấy các phần tử
    const chatbox = document.getElementById('chatbox-container');
    const toggleChatBtn = document.getElementById('toggle-chat-btn');
    let currentUserId = null;
    let lastCheckedUserId = null;

    // Thêm sự kiện khi nhấn nút chatbox
    toggleChatBtn.addEventListener('click', function() {
        // Kiểm tra trạng thái hiện tại của chatbox và thay đổi display
        if (chatbox.style.display === 'none' || chatbox.style.display === '') {
            chatbox.style.display = 'block';  // Hiển thị chatbox
            toggleChatBtn.innerHTML = '❌';   // Thay đổi nút thành icon đóng (x)
            chatbox.classList.remove('small'); // Bỏ class 'small' khi mở chatbox
        } else {
            chatbox.style.display = 'none';  // Ẩn chatbox
            toggleChatBtn.innerHTML = '💬';   // Thay đổi nút thành icon chat (💬)
            chatbox.classList.add('small');  // Thêm class 'small' khi thu nhỏ chatbox
        }
    });

    // Function to check current user and handle chat history
    function checkCurrentUser() {
        fetch('/get-current-user', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
        })
            .then(response => response.json())
            .then(data => {
                // Compare with previous user ID
                if (lastCheckedUserId !== null && lastCheckedUserId !== data.userId) {
                    // User changed - clear chat history
                    document.getElementById('chat-log').innerHTML = '';
                    localStorage.removeItem('chatlog');
                    console.log('Chat history cleared - user changed');
                }

                // Update current user ID
                currentUserId = data.userId;
                lastCheckedUserId = data.userId;

                // Load the appropriate chat history
                loadChatHistory();
            })
            .catch(error => {
                console.error('Error checking user:', error);
            });
    }

    // Function to load chat history based on current user
    function loadChatHistory() {
        const chatLogKey = currentUserId ? `chatlog_${currentUserId}` : 'chatlog_guest';
        const savedChatLog = localStorage.getItem(chatLogKey);

        if (savedChatLog) {
            document.getElementById('chat-log').innerHTML = savedChatLog;
        } else {
            document.getElementById('chat-log').innerHTML = '';
        }
    }

    // Function to save chat history for current user
    function saveChatHistory(content) {
        const chatLogKey = currentUserId ? `chatlog_${currentUserId}` : 'chatlog_guest';
        localStorage.setItem(chatLogKey, content);
    }

    // Check user on page load and periodically
    window.onload = function() {
        checkCurrentUser();
        // Check for user changes every 30 seconds
        setInterval(checkCurrentUser, 30000);
    };

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('chat-form').addEventListener('submit', function(event) {
            event.preventDefault();  // Ngừng hành động mặc định (không làm reload trang)

            const userQuery = document.getElementById('user-query').value;  // Lấy câu hỏi từ người dùng
            const chatLog = document.getElementById('chat-log');

            // Kiểm tra nếu câu hỏi trống
            if (!userQuery.trim()) {
                return;
            }

            // Hiển thị câu hỏi của người dùng ngay lập tức
            chatLog.innerHTML += `<strong>You:</strong> ${userQuery}<br>`;

            // Thêm hiệu ứng "đang nhập..."
            const loadingId = 'loading-' + Date.now();
            chatLog.innerHTML += `<div id="${loadingId}"><strong>Bot:</strong> <em>Đang xử lý...</em></div>`;
            chatLog.scrollTop = chatLog.scrollHeight;

            // Lấy CSRF token từ thẻ meta
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Gửi câu hỏi tới Laravel route
            fetch('/ask', {  // Đường dẫn đến route Laravel của bạn
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,  // Thêm CSRF token
                    'X-Requested-With': 'XMLHttpRequest'  // Để Laravel nhận biết đây là AJAX request
                },
                body: JSON.stringify({ question: userQuery }),  // Gửi câu hỏi dưới dạng JSON
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Xóa hiệu ứng "đang nhập..."
                    document.getElementById(loadingId).remove();

                    // Hiển thị câu trả lời từ bot
                    chatLog.innerHTML += `<strong>Bot:</strong> ${data.answer}<br><br>`;

                    // Cuộn xuống cuối chatlog để thấy câu trả lời mới nhất
                    chatLog.scrollTop = chatLog.scrollHeight;

                    // Lưu lại chatlog cho người dùng hiện tại
                    saveChatHistory(chatLog.innerHTML);

                    // Xóa ô nhập câu hỏi
                    document.getElementById('user-query').value = '';
                })
                .catch(error => {
                    // Xóa hiệu ứng "đang nhập..."
                    document.getElementById(loadingId).remove();

                    console.error('Error:', error);  // Nếu có lỗi, in lỗi ra console
                    chatLog.innerHTML += `<strong>Bot:</strong> <span class="text-danger">Xin lỗi, đã xảy ra lỗi khi xử lý yêu cầu của bạn.</span><br><br>`;
                    chatLog.scrollTop = chatLog.scrollHeight;

                    // Lưu lại chatlog cho người dùng hiện tại
                    saveChatHistory(chatLog.innerHTML);
                });
        });
    });
</script>
</body>

</html>

