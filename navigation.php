<!-- navbar -->
<!-- nav 是 html5 的 tag,role="navigation" 是為了那些不支援html5的瀏覽器認得所設置 -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <!-- 指定 class=navbarCollapse 為 選單資料來源 -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="products.php">我的網站</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!-- 依照頁面抬頭，判斷是否為動作中 class='active' -->
                <li <?php echo $page_title=="Products" ? "class='active'" : ""; ?> >
                    <a href="products.php">Products</a>
                </li>
                <li <?php echo $page_title=="Cart" ? "class='active'" : ""; ?> >
                    <a href="cart.php">
                        <?php
                        // count products in cart
                        if(!isset($_SESSION['cart_items'])){
                            $cart_count = 0;
                        }else{
                            $cart_count=count($_SESSION['cart_items']);
                        }
                        ?>
                        Cart <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->

    </div>
</div>
<!-- /navbar -->