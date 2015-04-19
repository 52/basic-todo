<script type="text/javascript">
$('.action').hide();

$('.main-link').hover(
	function(){
		$(this).children('.action').show();
	},
	function(){
		$(this).children('.action').hide();
	}
);
</script>