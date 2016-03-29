	</div><!--/main-->
	
		<footer id="footer">
			<div class="content-center">
			<?php get_sidebar( 'footer' ); ?>
			</div>
		</footer>

	</div>
	
	<!-- here comes the javascript -->
	
	<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>window.jQuery || document.write("<script src='_/js/jquery-2.1.1.min.js'>\x3C/script>")</script>
	
	<!-- this is where we put our custom functions -->
	<script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>
	
	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=145196595577076";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<!---faceboook-->
	
	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-18221731-3']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	
	<?php wp_footer(); ?>
	</body>
</html>