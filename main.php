<?php
/**
 * DokuWiki Twitter Boostrap Template
 *
 * @link     https://github.com/ryanwmoore/dokutwitterbootstrap
 * @author   Ryan Moore <rwmoore07@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */

$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && $_SERVER['REMOTE_USER'] );

?>
<!DOCTYPE html>
<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>">
	<head>
		<meta charset="utf-8" />
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
        <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
        <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
        <?php tpl_metaheaders()?>
        <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
        <?php tpl_includeFile('meta.html') ?>
        <link href="<?php echo tpl_getMediaFile(array("css/modifications.css")); ?>" rel="stylesheet">
        <link href="<?php echo tpl_getMediaFile(array("css/dokuwikicompatibility.css")); ?>" rel="stylesheet">
        <link href="<?php echo tpl_getMediaFile(array("css/stylesheet.css")); ?>" rel="stylesheet">
    </head>
    <body>
        <?php /* the "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to */ ?>
        <?php /* classes mode_<action> are added to make it possible to e.g. style a page differently if it's in edit mode,
            see http://www.dokuwiki.org/devel:action_modes for a list of action modes */ ?>
        <?php /* .dokuwiki should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
        <div id="dokuwiki__site">
            <div id="dokuwiki__top" class="dokuwiki site mode_<?php echo $ACT ?>">
                <header>
                    <a id="top" class="anchor" accesskey="t"></a>
                    <div id="main_bar">
                        <div class="row">
                            <nav class="top-bar" data-topbar="">
                                <ul class="title-area">
                                    <li class="name">
                                        <a href="#">
                                            <?php echo $conf['title']; ?>
                                        </a>
                					</li>
                					<li class="toggle-topbar menu-icon">
                					    <a href="#">Menu</a>
                					</li>
                				</ul>
                				<section class="top-bar-section clearfix">
                				    <ul class="right">
                				        <?php
                                            tpl_includeFile('nav.html');
                                            _tpl_output_tools_twitter_bootstrap($conf['useacl'] && $showTools);
                                        ?>
                                    </ul>
                                    <?php
                                        if ($_SERVER['REMOTE_USER']) {
                                            echo '<span class="user">';
                                            tpl_userinfo();
                                            echo '</span>';
                                        }
                                        //TODO: If could link to user's profile? If so, wrap in:
                                        //echo 'Logged in as <a href="#" class="navbar-link">'.$username.'</a>';
                                    ?>
                                    <?php _tpl_output_search_bar(); ?>
                                </section>
                            </nav>
                        </div>
                    </div>
                </header>
                <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
                <?php tpl_includeFile('header.html') ?>
                <div class="container">
                    <div class="row">
                        <div class="medium-9 columns medium-push-3">
                            <div id="dokuwiki__content">
                                <div class="page">
                                    <?php _tpl_toc_to_foundation(); ?>
                                    <?php html_msgarea(); /* occasional error and info messages */ ?>
                                    <?php tpl_flush(); ?>
                                    <?php tpl_content(false); ?>
                                    <div class="clearer"></div>
                                </div>
                            </div>
                        </div>
                        <div class="medium-3 columns medium-pull-9">
                            <?php if ($conf['sidebar']) { ?>
                            <div class="sidebar" id="sidetoc" role="navigation">
                                <?php _tpl_index_to_foundation(); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div><!--/row-->
                </div><!-- container -->
                <div class="clearer"></div>
                <hr class="a11y" />
                <!-- ********** FOOTER ********** -->
                <footer class="navbar navbar-static-bottom">
                    <div class="row">
                        <div class="small-12 columns">
                            <?php _tpl_output_page_tools($showTools, 'li'); ?>
                            <div class="clearer"></div>
                        <div>
                        <?php tpl_pageinfo() /* 'Last modified' etc */ ?>
                        <?php tpl_license('button') /* content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 */ ?>
                        <?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?>
                        <?php tpl_includeFile('footer.html') ?>
                    </div>
                    <div class="clearer"></div>
                    <div>
                        <p>
                            <a href="http://www.dokuwiki.org">DokuWiki</a>
                            <a href="https://github.com/ryanwmoore/dokutwitterbootstrap">template</a>
                            (released under <a href="http://www.gnu.org/licenses/gpl.html">GPLv2</a>)
                            using <a href="http://twitter.github.com/bootstrap/">Bootstrap</a>
                            by <a href="http://rmoore.cs.pitt.edu/">Ryan W. Moore</a>
                        </p>
                    </div>
                </footer>
            </div>
        </div><!-- /site -->
        <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- load any scripts that may require a newer jQuery library than DokuWiki provides. -->
    <script src="<?php echo tpl_getMediaFile(array("js/bootstrap.min.js")); ?>"></script>
    <script src="<?php echo tpl_getMediaFile(array("js/change_dokuwiki_structure.js")); ?>"></script>

    <!-- restore jQuery for DokuWiki -->
    <script src="<?php echo tpl_getMediaFile(array("js/restore_dokuwikis_jquery.js")); ?>"></script>
</body>
</html>
