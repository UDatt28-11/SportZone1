<?php if(empty($listKichCo)){
    echo "Chưa cập nhật số liệu";
}else{
    foreach($listKichCo as $kichCo){
        if($kichCo['quantity'])
        ?>
        <div class="mt-3 btn-group btn-size-group">
            <button type="button" onclick="setActiveSize(this)" class="btn btn-outline-dark"><?=$kichCo['kich_co']?></button>
        </div>
        
    <?php }
}?>