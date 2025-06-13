<?php if (!empty($images)): ?>
    <div style="overflow-x: auto; white-space: nowrap; padding-bottom: 8px;">
        <?php foreach ($images as $img): ?>
            <img 
                onclick="changeMainImage(this)" 
                src="<?= BASE_URL . $img['link_hinh_anh'] ?>" 
                
                alt="Thumbnail"
                style="
                    width: 120px; 
                    height: 120px; 
                    margin-right: 10px; 
                    border-radius: 8px; 
                    border: 2px solid transparent; 
                    object-fit: cover; 
                    cursor: pointer;
                    display: inline-block;
                    transition: border 0.2s, transform 0.2s;
                "
                onmouseover="this.style.border='2px solid #333'; this.style.transform='scale(1.03)'"
                onmouseout="this.style.border='2px solid transparent'; this.style.transform='scale(1)'"
            >
        <?php endforeach ?>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">No images</div>
<?php endif ?>
