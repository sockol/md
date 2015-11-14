<style>



body {

/*background:blue;*/

}



.message {

max-width:500px;

background:#fff;

box-shadow:0px 1px 15px #000;

border-radius:4px;

overflow:hidden;



}



.message h1 {

width:100%;

text-align:center;

margin:0px;

background:#fe6800;

color:#fff;

text-transform:uppercase;

padding:15px 0px;

font-size:45px;

font-style:italic;

font-family:tahoma;

letter-spacing:2px;

}



.fancybox-inner .pattern {

background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAKElEQVQIW2NkQAMXo/nPMCKLgQT0l340gQvCBECKwILIAmBBdAGQIABRzBINUTej2wAAAABJRU5ErkJggg==) repeat;

width:100%;

height:15px;

position:relative;

}



.confirm {

text-align:center;

margin:20px 0px;

}



.confirm a {

width:150px;

border-radius:6px;

background:#676767;

text-transform:uppercase;

font-size:36px;

color:#fff;

padding:5px 20px;

text-decoration:none;

margin:0px 10px;

font-family:tahoma;

font-weight:bold

}



.confirm a:hover {

background:#e7e7e7;

color:#2f2f2f;

}



</style>

<div class="container">

	<div id="age-form" style="display: none" class="message">

		<h1><?php echo t('Are you 21?') ?></h1>

	    <div class="pattern"></div>

		<div class="action-links confirm">

			<a id="age-yes" href="#"><?php echo t('Yes') ?></a>

			<a id="age-no" href="#"><?php echo t('No') ?></a>

		</div>

	</div>

	<div id="age-sorry" class="message">
		<h1><?php echo t('Are you 21?') ?></h1>
		<div class="pattern"></div>
		<div class="action-links confirm">
			<p><?php echo t('Sorry, you are not allowed to be here') ?></p>
		</div>
	</div>

</div>

<script type="text/javascript">

	jQuery(function($){

		$.fancybox({

			afterShow: function() { 
		        $('html').css('overflow','hidden');
		        $('body').css('overflow','hidden');
			}, 
			afterClose: function() { 
				$('html').css('overflow','visible');
        		$('body').css('overflow','visible');
			},  
			href: '#age-form',

			closeClick  : false, // prevents closing when clicking INSIDE fancybox
			openEffect  : 'none',
			closeEffect : 'none',
			closeBtn : false,
			keys : {
				close  : null
			},
			helpers   : {
				overlay : {closeClick: false} // prevents closing when clicking OUTSIDE fancybox
			}

		});

		$('#age-yes').click(function(){

			$.cookie('age', 1, { expires: 30 });

			$.fancybox.close();
			$('#age-sorry').hide();

		});

		$('#age-no').click(function(){

			$.fancybox({
				href: '#age-sorry',
				afterClose: function() {
					$('#age-sorry').hide();
                    location.href = "http://rutamaya.net";

				}
			});
			$.cookie('age', 0, { expires: 30 });
			//location.href = "http://rutamaya.net";
			//$.fancybox.close();
			//$('#age-sorry').hide();


		});

	});
/*
	jQuery(function($){
		$.fancybox({
			href: '#age-form',
			closeClick: false
		});
		$('#age-yes').click(function(){
			$.cookie('age', 1, { expires: 30 });
			$.fancybox.close();
		});
		$('#age-no').click(function(){
			$.cookie('age', 0, { expires: 30 });
			$.fancybox.close();
			$.fancybox({
				href: '#age-sorry',
				afterClose: function() {
				    //redirect("rutamaya.net");
					//location.replace("rutamaya.net");
                    location.href = "http://rutamaya.net";
				}
			});
		});
	});*/

</script>