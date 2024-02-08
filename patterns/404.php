<?php
/**
 * Title: 404
 * Slug: holdmywp/404
 * Categories: hidden
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","area":"header"} /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"85px","fontStyle":"normal","fontWeight":"900","lineHeight":"1"},"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
<h1 class="wp-block-heading has-text-align-center" id="h-404" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-size:85px;font-style:normal;font-weight:900;line-height:1">404</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1"}},"textColor":"custom-accent-1"} -->
<p class="has-text-align-center has-custom-accent-1-color has-text-color" style="line-height:1"><strong>tu t'es perdu ?</strong></p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"center","id":662,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/boromir.gif" alt="" class="wp-image-662"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textAlign":"left"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-left wp-element-button" href="https://holdmywp.com/">😬 Revenir sur la page d'accueil</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->