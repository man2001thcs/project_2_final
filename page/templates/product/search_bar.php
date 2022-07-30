<div class="search_bar">
    <div id="input">
        <form method="POST" action="../../main_page/search/search_return.php">
            <input type="text" name="search_content" placeholder="Nhập để tìm kiếm">
            <button type="submit" name="search" id="search" style="padding: 5px; font-size:70%; border-radius: 10px; cursor: pointer;">
                <strong>Tìm kiếm</strong>
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <div id="cart_icon">
        <a href="<?php echo BASE_URL; ?>page/user/temp_bill/listM.php">Giỏ hàng<img
                src="../../../lib/images/buy_icon.png" width="55"></a>
    </div>
</div>