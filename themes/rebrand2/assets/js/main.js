$(document).ready(function(){
	// Price Table
	var monthly_price_table = $('#price_tables').find('.monthly');
	var yearly_price_table = $('#price_tables').find('.yearly');
	var lifetime_price_table = $('#price_tables').find('.lifetime');

	$('.switch-toggles').find('.monthly').addClass('active');
	$('#price_tables').find('.monthly').addClass('active');

	$('.switch-toggles').find('.monthly').on('click', function(){
		$(this).addClass('active');
		$(this).closest('.switch-toggles').removeClass('active');
		$(this).closest('.switch-toggles').removeClass('active2');
		$(this).siblings().removeClass('active');
		monthly_price_table.addClass('active');
		yearly_price_table.removeClass('active');
		lifetime_price_table.removeClass('active');
	});

	$('.switch-toggles').find('.yearly').on('click', function(){
		$(this).addClass('active');
		$(this).closest('.switch-toggles').addClass('active');
		$(this).closest('.switch-toggles').removeClass('active2');
		$(this).siblings().removeClass('active');
		yearly_price_table.addClass('active');
		monthly_price_table.removeClass('active');
		lifetime_price_table.removeClass('active');
	});

	$('.switch-toggles').find('.lifetime').on('click', function(){
		$(this).addClass('active');
		$(this).closest('.switch-toggles').addClass('active');
		$(this).closest('.switch-toggles').addClass('active2');
		$(this).siblings().removeClass('active');
		lifetime_price_table.addClass('active');
		yearly_price_table.removeClass('active');
		monthly_price_table.removeClass('active');
	});
});