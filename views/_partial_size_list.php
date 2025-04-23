<?php if(empty($listKichCo)){
    echo "Chưa cập nhật số liệu";
}else{
    foreach($listKichCo as $kichCo){
        // var_dump($kichCo);
        ?>
        <div class="mt-3 btn-group ">
            <button type="button"
                class="btn btn-outline-dark btn-size <?= $kichCo['ton_kho'] ? '' : 'btn-disabled disabled' ?>"
                <?= $kichCo['ton_kho'] ? 'onclick="setActiveSize(this)"' : 'disabled' ?>
                data-bienthe-id="<?= $kichCo['id'] ?>">
                <?= $kichCo['kich_co'] ?>
                
            </button>
        </div>
        
    <?php }
}?>