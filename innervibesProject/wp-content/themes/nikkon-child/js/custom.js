function initStorySlider() {
	jQuery('.story-section').slick({
		arrows: true,
		autoplay: false,
		dots: true,
		infinite: false,
		nextArrow: '<i class="fa fa-chevron-right"></i>',
		prevArrow: '<i class="fa fa-chevron-left"></i>',
		slidesToShow: 1,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 769,
			    settings: {
			      	dots: false
				}
			}
		]
	});
}

function initWowSlider() {
	jQuery('.wow-slider').slick({
		arrows: true,
		autoplay: false,
		dots: false,
		infinite: false,
		nextArrow: '<i class="fa fa-chevron-right"></i>',
		prevArrow: '<i class="fa fa-chevron-left"></i>',
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
		{
			breakpoint: 481,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
		]
	});
}

function productGallerySlider() {
	jQuery('.woocommerce div.product div.images .flex-control-thumbs').slick({
		arrows: true,
		autoplay: false,
		dots: true,
		infinite: false,
		nextArrow: '<i class="fa fa-chevron-right"></i>',
		prevArrow: '<i class="fa fa-chevron-left"></i>',
		slidesToShow: 1,
		slidesToScroll: 1
	});
}

function changeProductButton() {
	jQuery('ul.products').find('.product .add_to_cart_button').text('Add to cart');
	jQuery('ul.products, .related.products .products').find('.product .add_to_cart_button').text('Add to cart');
	jQuery('div.product form.cart').find('.single_add_to_cart_button').text('Add to cart');
	jQuery('ul.products').find('a.icon-black.tinvwl-product-in-list').text('Added to wishlist');
}

function addToBasket() {
	jQuery('.homepage-section .products li').each(function() {
		var element = jQuery(this).find('a.ajax_add_to_cart');
		if (!element.hasClass('add_to_cart_button')) {
			element.text('Out of stock');
		}
	});
}

function collectionsSameHeight() {
	jQuery('.same-size-col-inner-block').matchHeight();
}

jQuery(document).ready(function() {
	initStorySlider();
	initWowSlider();
	changeProductButton();
	addToBasket();
	productGallerySlider();
	collectionsSameHeight();
});

jQuery(window).resize(function() {
	collectionsSameHeight();
});