<?php // no direct access
defined('_JEXEC') or die('Restricted access');  
JHTML::_( 'behavior.modal','a.vmmodal');  
$col= 1 ;   
?>
<div class="vmgroup<?php echo $params->get( 'moduleclass_sfx' ) ?>">
<?php if ($headerText) : ?>
	<div class="vmheader"><?php echo $headerText ?></div>
<?php endif;
if ($display_style =="div") { ?>
<div class="vmproduct<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($products as $product) : ?>
<div style="float:left;">
	<?php
	if (!empty($product->images[0]) ) {
		echo JHTML::_('link', JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.$product->virtuemart_category_id),$product->images[0]->displayMediaThumb('class="featuredProductImage" border="0"',$product->product_name));
	}
	?>
		<?php echo JHTML::link(JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.$product->virtuemart_category_id), $product->product_name, array('title' => $product->product_name)); ?>
	<?php
	if ($show_price) {
		echo $currency->priceDisplay($product->prices['salesPrice']);
		if ($product->prices['salesPriceWithDiscount']>0) echo $currency->priceDisplay($product->prices['salesPriceWithDiscount']);
	}
	?>
</div>
<?php
if ($col == $products_per_row && $products_per_row && $col < $totalProd ) {
	echo "</div><div style='clear:both;'>";
	$col= 1 ;
} else {
	$col++;
}
endforeach; ?>
</div>
<br style='clear:both;' />
<?php
} else {
?>
<ul class="vmproduct<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($products as $product) : ?>
<li><div class="pricefr"><?php echo JHTML::link(JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.$product->virtuemart_category_id), $product->product_name, array('title' => $product->product_name,'rel'=>'facebox')); ?></div> 
	<div class="browseImage"><?php
	$productModel->addImages($product);
	echo $product->images[0]->displayMediaThumb('class="browseProductImage" border="0" title="'.$product->product_name.'" ',true,'class="vmmodal"');
	//displayMediaThumb($imageArgs='',$lightbox=true,$effect="class='modal'") ;//echo JHTML::_('link', JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id='.$product->virtuemart_product_id.'&virtuemart_category_id='.$product->virtuemart_category_id),VmImage::getImageByProduct($product)->displayImage('class="featuredProductImage" border="0"',$product->product_name));
	?>
		</div><div class="cena"><?php
	if ($show_price) {
		echo $currency->priceDisplay($product->prices['salesPrice']);
		if ($product->prices['salesPriceWithDiscount']>0) echo $currency->priceDisplay($product->prices['salesPriceWithDiscount']);
	}?></div>
	<?php if ($show_addtocart) echo mod_virtuemart_product::addtocart($product);
	?>
</li>
<?php
	if ($col == $products_per_row && $products_per_row) {
//		echo "</ul><ul>";
		$col= 1 ;
	} else {
		$col++;
	}
	endforeach; ?>
</ul>
<?php }
	if ($footerText) : ?>
	<div class="vmfooter<?php echo $params->get( 'moduleclass_sfx' ) ?>">
		 <?php echo $footerText ?>
	</div>
<?php endif; ?>
</div>