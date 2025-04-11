<?php foreach ($images as $img): ?>
    <img onclick="changeMainImage(this)" src="<?= BASE_URL . $img['link_hinh_anh'] ?>" alt="" style="width: 120px; height:120px; margin-right: 10px; border-radius: 3px; border: 1px solid gray;">
<?php endforeach ?>
<?php if(empty($images)){
    echo '<div class="alert alert-danger" role="alert">No images</div>';
}