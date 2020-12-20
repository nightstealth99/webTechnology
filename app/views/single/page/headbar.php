    <div id="header-bar">
        <div class="containlogo">
            <img src="<?php echo PUBLIC_PATH?>img/logo.jpg" class="logo" alt="logo"  onclick="window.location.replace('<?php echo BASE_URL?>');">
            <form method="GET" action="index/homepage/">
                <div>
                    <input id="searchInput" type="text" name="search" autocomplete="off">
                    <button type="submit"><img src="<?php echo BASE_URL."images/searchButton.png"?>"></button>
                </div>
                <div id="searchSuggest">

                </div>
            </form>
        </div>
        <div class="account-cart-area">
            <div class="account-area">
                <div class="account-icon">
                    <!-- <img src="echo PUBLIC_PATH?>img/accounticon.png"> -->
                    <img src="<?php echo BASE_URL?>images/account_image.jpg">
                    <span>Tài khoản</span>
                </div>
                <div class="account-nav-container">
                    <div class="account-nav">
                        
                        <?php if (!isset($_SESSION['login']))
                        print("<button onclick='loginclick(); choice(1);'>Đăng nhập</button>
                               <button onclick='loginclick(); choice(2);'>Tạo tài khoản</button>  
                               ");      
                        else {
                            if ($_SESSION['login'] == true){
                                print("<button><a href='".BASE_URL."admin/product'>Admin page</a></button>");                                 
                            }
                            print("<button><a href='".BASE_URL."Guest/logout'>Đăng xuất</a></button>");
                        }               
                        ?>                
                    </div>
                </div>
            </div>

            <div class="cart-area" onmouseleave="hideCart();">
                <div class = "cart-area-nav" onmouseover="showCart();">                    
                    <img src="<?php echo BASE_URL?>images/cart_image.png">
                    <span>Giỏ hàng</span>
                </div>
                <a href="<?php echo BASE_URL?>cart/mycart">
                    <div id="cartShow">

                    </div>

                </a>
            </div>            
        </div>
    </div>
    <script>
        function showCart(){
            let xmlhttp = new XMLHttpRequest();
            let item = document.getElementById("cartShow");
            item.style.display="flex";
            xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        item.innerHTML = this.response;
                    }
            }
            xmlhttp.open("GET", <?php echo "\"".BASE_URL."\""?>+"cart/showCart", true);
            xmlhttp.send();
        }
        function hideCart(){            
            let item = document.getElementById("cartShow");
            item.style.display="none";
        }

        // var t; // public variable for the timeout
        // function startSearch(){
        //     if (t) window.clearTimeout(t);
        //     t = window.setTimeout("search()",200);
        // }
        // function search(){
        //     let xmlhttp = new XMLHttpRequest();
        //     if (!xmlhttp) alert("Request error!");
        //     query = document.getElementById("searchInput").value;
        //     list = document.getElementById("searchSuggest");
        //     xmlhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //             list.innerHTML = this.responseText;
        //             // form.reset();
        //         }
        //     }
        //     xmlhttp.open("GET", "<?php echo BASE_URL?>guest/search/?search="+query, true);
        //     xmlhttp.send();
        // }
    </script>