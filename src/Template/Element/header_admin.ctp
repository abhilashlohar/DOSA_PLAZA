
<style type="text/css">
.topBtn{
    color: #FFF !important; border-radius: 5px !important; background-color: #41526d !important; padding: 6px 18px;border:none !important;margin-left: 8px;
}
.pointer{
    cursor: pointer;
}
</style>
<?php
if (in_array("40", $userPages)){ ?>
<div style="background: #2d4161;padding: 14px 0px 0px 0px;">
    <div >
        <span class="counter topBtn pointer">Billing</span>
    </div>
</div>
<?php }?>
<?php 

$js="
$(document).ready(function() {
    $('.counter').die().live('click',function(event){
        var url='".$this->Url->build(['controller'=>'Tables','action'=>'index'])."'
        $('#loading').show();
        window.location.href = url;
    });
});
";
echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));
?>