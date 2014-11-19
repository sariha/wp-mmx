<?php

/**
 *
 * Template Name: Page template Profile
 *
 */

get_header();

$wpdb->hide_errors(); auth_redirect_login(); nocache_headers();

?>

<div class="container">
  <div class="row-fluid" style="margin-top: 60px; margin-bottom: 60px;">
    <div class="span12">
      <h2 class="h2top"><i class="fa fa-check"></i> - Merci de votre inscription</h2>
      <div style="font-size: 1.7em;">
	      <p>Un passionné d’art vous rejoindra bientôt sur le tapis vert <strong>#SpeedArting</strong>.</p>
	      <p>En attendant, café, photos et bonne humeur :)</p>
	    	
	    	<p>Faites rebondir vos idées autour de l’art !</p>

	    	<hr>

	      <p>Capturez le moment et partagez-le avec le mot-clic <strong>#SpeedArting</strong></p>

      		<a class="skt-parallax-button" style="font-size: 1.2em;" href="http://museomixmtl.com/speedarting/sondage/">2 tickets à gagner pour le meilleur selfie!</a>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>