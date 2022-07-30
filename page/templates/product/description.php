<link href="../../../css/product/description.css" rel="stylesheet" type="text/css" media="all">
<script src="../../../lib/script/decription.js"></script>

<div id="description_menu">
    <button class ="active" id="component_button">Mô tả thành phần</button>
    <button id="manual_button">Hướng dẫn sử dụng</button>
</div>



<div class="card__body" style="border-left: 3px solid gray;">
    <div id="component" class="full">
        <div class="description">
            <br>
            <h2>Thành phần chính: </h2>
            <?php echo nl2br($item_this['description']); ?>
        </div>
    </div>
    <div id="manual" class="full" style="display:none;">
        <div class="description">
            <br>
            <h2>Hướng dẫn sử dụng: </h2>
            <?php echo nl2br($item_this['manual']); ?>
        </div>
    </div>
</div>