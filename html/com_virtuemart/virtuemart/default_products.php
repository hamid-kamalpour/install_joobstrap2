<?php defined('_JEXEC') or die('Restricted access');
JHTML::_( 'behavior.modal','a.vmmodal');

// Separator
$verticalseparator = " vertical-separator";

foreach ($this->products as $type => $productList ) {
// Calculating Products Per Row
$products_per_row = VmConfig::get ( $type.'_products_per_row', 3 ) ;
$cellwidth = ' width'.floor ( 100 / $products_per_row );

// Category and Columns Counter
$col = 1;
$nb = 1;

$productTitle = JText::_('COM_VIRTUEMART_'.$type.'_PRODUCT')

?>

<div class="<?php echo $type ?>-view">

	<h4><?php echo $productTitle ?></h4>

<?php // Start the Output
foreach ( $productList as $product ) {

	// Show the horizontal seperator
	if ($col == 1 && $nb > $products_per_row) { ?>
	<div class="horizontal-separator"></div>
	<?php }

	// this is an indicator wether a row needs to be opened or not
	if ($col == 1) { ?>
	<div class="row-fluid">
	<?php }

	// Show the vertical seperator
	if ($nb == $products_per_row or $nb % $products_per_row == 0) {
		$show_vertical_separator = ' ';
	} else {
		$show_vertical_separator = $verticalseparator;
	}

		// Show Products ?>
		<div class="product span4">
			<div class="spacer">


					<h3>
					<?php // Product Name
					echo JHTML::link ( JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id ), $product->product_name, array ('title' => $product->product_name ) ); ?>
					</h3>

					<div style="min-height:110px;">
					<?php // Product Image
					if ($product->images) {
						echo JHTML::_ ( 'link', JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id ), $product->images[0]->displayMediaThumb( 'class="featuredProductImage" border="0"',true,'class="vmmodal"' ) );
					}
					?>
					</div>


					<div class="product-price">
					<?php
					if (VmConfig::get ( 'show_prices' ) == '1') {
					//				if( $featProduct->product_unit && VmConfig::get('vm_price_show_packaging_pricelabel')) {
					//						echo "<strong>". JText::_('COM_VIRTUEMART_CART_PRICE_PER_UNIT').' ('.$featProduct->product_unit."):</strong>";
					//					} else echo "<strong>". JText::_('COM_VIRTUEMART_CART_PRICE'). ": </strong>";

					if ($this->showBasePrice) {
						echo $this->currency->createPriceDiv( 'basePrice', 'COM_VIRTUEMART_PRODUCT_BASEPRICE', $product->prices );
						echo $this->currency->createPriceDiv( 'basePriceVariant', 'COM_VIRTUEMART_PRODUCT_BASEPRICE_VARIANT', $product->prices );
					}
					echo $this->currency->createPriceDiv( 'variantModification', 'COM_VIRTUEMART_PRODUCT_VARIANT_MOD', $product->prices );
					echo $this->currency->createPriceDiv( 'basePriceWithTax', 'COM_VIRTUEMART_PRODUCT_BASEPRICE_WITHTAX', $product->prices );
					echo $this->currency->createPriceDiv( 'discountedPriceWithoutTax', 'COM_VIRTUEMART_PRODUCT_DISCOUNTED_PRICE', $product->prices );
					echo $this->currency->createPriceDiv( 'salesPrice', 'COM_VIRTUEMART_PRODUCT_SALESPRICE', $product->prices );
					echo $this->currency->createPriceDiv( 'priceWithoutTax', 'COM_VIRTUEMART_PRODUCT_SALESPRICE_WITHOUT_TAX', $product->prices );
					echo $this->currency->createPriceDiv( 'discountAmount', 'COM_VIRTUEMART_PRODUCT_DISCOUNT_AMOUNT', $product->prices );
					echo $this->currency->createPriceDiv( 'taxAmount', 'COM_VIRTUEMART_PRODUCT_TAX_AMOUNT', $product->prices );
					} ?>
					</div>

					<div>
					<?php // Product Details Button
					echo JHTML::link ( JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id ), JText::_ ( 'COM_VIRTUEMART_PRODUCT_DETAILS' ), array ('title' => $product->product_name, 'class' => 'btn btn-info' ) );
					?>
					</div>
			</div>
		</div>
	<?php
	$nb ++;

	// Do we need to close the current row now?
	if ($col == $products_per_row) { ?>
	<div class="clear"></div>
	</div>
		<?php
		$col = 1;
	} else {
		$col ++;
	}
}
// Do we need a final closing row tag?
if ($col != 1) { ?>
	<div class="clear"></div>
	</div>
<?php
}
?>
</div>
<?php }