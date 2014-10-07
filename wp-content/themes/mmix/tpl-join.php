<?php
/**
 * Template Name: Join team forms
 */
?>

<p><br/></p>

<div id="cta">

  <div class="col-md-4">
    <div class="join-panels">
      <div class="join-header">
        <span class="helper"></span>
        <img src="<?php echo get_template_directory_uri() ?>/img/pict-bird.png" alt=""/>
      </div>
      <p class="join-text robotoFont">
        <?php if(ICL_LANGUAGE_CODE == 'en'): ?>
          Want to know what we’re up to? Join our newsletter:
        <?php else : ?>
          Vous voulez savoir où nous en sommes ? Inscrivez-vous à notre infolettre :
        <?php endif; ?>
      </p>
      <div>

        <form action="http://museomixmtl.us3.list-manage.com/subscribe/post?u=031aada7dda3a38c6ea1cb5c7&id=ce1f00ce80" target="_blank" method="post">
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;"><input type="text" name="b_031aada7dda3a38c6ea1cb5c7_ce1f00ce80" value=""></div>

          <!-- auto select language -->
          <input type="hidden" name="group[6605]" value="<?php echo (ICL_LANGUAGE_CODE == 'en') ? '32' : '16' ; ?>"/>

          <div class="input-group">
            <input type="text" class="form-control" name="EMAIL" placeholder="email">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit"><i class="fa fa-arrow-right"></i></button>
            </span>
          </div><!-- /input-group -->
        </form>

      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="join-panels">
      <div class="join-header">
        <span class="helper"></span>
        <img src="<?php echo get_template_directory_uri() ?>/img/pict-human.png" alt=""/>
      </div>
      <p class="join-text robotoFont">
        <?php if(ICL_LANGUAGE_CODE == 'en'): ?>
          Wanna see us in November?</br> Click here to know more! 
        <?php else : ?>
          Vous voulez nous retrouver en Novembre ?</br>
          Cliquez ici pour en savoir plus !
        <?php endif; ?>
      </p>
            <div>
        <?php if(ICL_LANGUAGE_CODE == 'en'): ?>
          <a href="<?php echo site_url().'/en/3-days-to-remix-the-museum/'; ?>" class="btn btn-primary">
            Go
          </a>
        <?php else : ?>
          <a href="<?php echo site_url().'/3-jours-pour-remixer-le-musee/'; ?>" class="btn btn-primary">
            Hop
          </a>
        <?php endif; ?>

      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="join-panels">
      <div class="join-header">
        <span class="helper"></span>
        <img src="<?php echo get_template_directory_uri() ?>/img/pict-heart.png" alt=""/>
      </div>
      <p class="join-text robotoFont">

        <?php if(ICL_LANGUAGE_CODE == 'en'): ?>
          Want to join our team of LOVEunteers? write us a few words..
        <?php else : ?>
         Vous voulez rejoindre notre équipe de bénéLOVEs ?
          Écrivez-nous quelques mots...
        <?php endif; ?>

      </p>
      <div>
        <?php if(ICL_LANGUAGE_CODE == 'en'): ?>
          <a href="<?php echo site_url().'/en/contact-us/'; ?>" class="btn btn-primary">
            ... right this way!
          </a>
        <?php else : ?>
          <a href="<?php echo site_url().'/home/join/beneloves/'; ?>" class="btn btn-primary">
            ... par ici !
          </a>
        <?php endif; ?>



      </div>
    </div>
  </div>



</div>