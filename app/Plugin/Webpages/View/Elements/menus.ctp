<?php 
/** 
 * Menu Element for Display Various Menu Types
 *
 * @todo 	Move the menu types into their own elements or something, because it will get way too hectic in here.
 */
$data = $this->requestAction(array('plugin' => 'webpages', 'controller' => 'webpage_menus', 'action' => 'element', $id), array('pass' => array($id)));
# $data['menu']['Menu']['type']
# superfish
# superfish sf-horizontal
# superfish sf-vertical
echo $this->Tree->generate($data['items'], array(
			'model' => 'WebpageMenuItem', 
			'alias' => 'item_text', 
			'class' => 'menu '.$data['menu']['WebpageMenu']['type'], 
			'id' => 'menu'.$data['menu']['WebpageMenu']['id'], 
			'element' => 'item', 
			'elementPlugin' => 'menus'));
?>

<?php 
# basic superfish horizontal with vertical drop downs
if ($data['menu']['WebpageMenu']['type'] == 'superfish') { 
	echo $this->Html->css('/webpages/menus/css/superfish'); 
	echo $this->Html->script('/webpages/menus/js/jquery.hoverIntent.min'); 
	echo $this->Html->script('/webpages/menus/js/jquery.superfish');
	echo $this->Html->script('/webpages/menus/js/jquery.superSubs'); 
?> 
<script> 
 
    $(document).ready(function(){ 
        $("ul.superfish").supersubs({ 
            minWidth:    12,   // minimum width of sub-menus in em units 
            maxWidth:    27,   // maximum width of sub-menus in em units 
            extraWidth:  1     // extra width can ensure lines don't sometimes turn over 
                               // due to slight rounding differences and font-family 
        }).superfish();  // call supersubs first, then superfish, so that subs are 
                         // not display:none when measuring. Call before initialising 
                         // containing tabs for same reason. 
    }); 
 
</script>
<?php } ?>


<?php 
# superfish horizontal with horizontal drop downs
if ($data['menu']['WebpageMenu']['type'] == 'superfish sf-horizontal') { 
	echo $this->Html->css('/webpages/menus/css/superfish'); 
	echo $this->Html->css('/webpages/menus/css/superfish-horizontal'); 
	echo $this->Html->script('/webpages/menus/js/jquery.hoverIntent.min'); 
	echo $this->Html->script('/webpages/menus/js/jquery.superfish');
	?>
<script> 
 
    $(document).ready(function(){ 
        $("ul.superfish").superfish({ 
            pathClass:  'current' 
        }); 
    }); 
 
</script>
<?php } ?>


<?php 
# superfish vertical 
if ($data['menu']['WebpageMenu']['type'] == 'superfish sf-vertical') { 
	echo $this->Html->css('/webpages/menus/css/superfish'); 
	echo $this->Html->css('/webpages/menus/css/superfish-vertical'); 
	echo $this->Html->script('/webpages/menus/js/jquery.hoverIntent.min'); 
	echo $this->Html->script('/webpages/menus/js/jquery.superfish');
?>
<script> 
 
    $(document).ready(function(){ 
        $("ul.superfish").superfish({ 
            animation: {height:'show'},   // slide-down effect without fade-in 
            delay:     500               // 1.2 second delay on mouseout 
        }); 
    }); 
 
</script>
<?php } ?>