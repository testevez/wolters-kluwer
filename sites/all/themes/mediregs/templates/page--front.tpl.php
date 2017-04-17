<?php // Mediregs 
$title = “test”;
?>

<!-- Corementrics -->        
<script type="text/javascript" src="http://libs.coremetrics.com/eluminate.js"></script>
<script type="text/javascript">
cmSetClientID("90378051", false, "www9.wolterskluwerlb.com", "mediregs.com");
cmCreatePageviewTag('HS:Home', 'HS:Home');
</script>


<style>

/*
.region-content-aside .region-inner {
height:800%;
}
#block-views-upcoming-webinars-block {
	height:20%;
}
#block-block-34{
	height:17%;
}
#block-block-2{
	height:60%;
}

.rc-12 .node-teaser, .rc-12 .comment, .rc-12 .block-inner {
	height:100%
}
#block-blog-recent .block-inner {
	height:409px;
	overflow:hidden;
} 
*/
</style>

<div class="texture-overlay">
  <div id="page" class="container <?php print $classes; ?>">

    <header id="header" class="clearfix" role="banner">
      <div class="header-inner clearfix">

        <?php if ($site_logo || $site_name || $site_slogan): ?>
          <!-- start: Branding -->
          <div id="branding" class="branding-elements clearfix">

            <?php if ($site_logo): ?>
              <div id="logo">
                <?php print $site_logo; ?>
              </div>
            <?php endif; ?>

            <?php if ($site_name || $site_slogan): ?>
              <!-- start: Site name and Slogan hgroup -->
              <hgroup id="name-and-slogan"<?php print $hgroup_attributes; ?>>

                <?php if ($site_name): ?>
                  <h1 id="site-name"<?php print $site_name_attributes; ?>><?php // print $site_name; ?></h1>
                <?php endif; ?>

                <?php if ($site_slogan): ?>
                  <h2 id="site-slogan"<?php print $site_slogan_attributes; ?>><?php print $site_slogan; ?></h2>
                <?php endif; ?>

              </hgroup><!-- /end #name-and-slogan -->
            <?php endif; ?>

          </div><!-- /end #branding -->
        <?php endif; ?>

        <?php print render($page['header']); // Header region ?>
		<?php print render($page['content']); ?>

      </div>

    </header> <!-- /header -->

    <?php print render($page['menu_bar']); // Menubar region ?>

    <!-- Messages and Help -->
    <?php print $messages; ?>
    <?php print render($page['help']); ?>

    <!-- Breadcrumbs -->
    <?php if ($breadcrumb): print $breadcrumb; endif; ?>

    <?php print render($page['secondary_content']); // Secondary content region (Secondary) ?>

    <!-- Three column 3x33 Gpanel -->
    <?php if (
      $page['three_33_top'] ||
      $page['three_33_first'] ||
      $page['three_33_second'] ||
      $page['three_33_third'] ||
      $page['three_33_bottom']
      ): ?>
      <div class="at-panel gpanel panel-display three-3x33 clearfix">
        <?php print render($page['three_33_top']); ?>
        <?php print render($page['three_33_first']); ?>
        <?php print render($page['three_33_second']); ?>
        <?php print render($page['three_33_third']); ?>
        <?php print render($page['three_33_bottom']); ?>
      </div>
    <?php endif; ?>
<!--
	    <h2 style="text-align: center"><a title="Goto Health Reform page for free newsletter" href="http://www.wklawbusiness.com/subjects/health-reform?cm_sp=HealthWebsite-_-Clicks-_-NewsletterSignup">Sign up for our free Health Reform Newsletter - Click Here</a></h2>
-->
	
    <div id="columns">
      <div class="columns-inner clearfix">

        <div id="content-column">
          <div class="content-inner">

            <?php print render($page['highlight']); // Highlighted region ?>

            <<?php print $tag; ?> id="main-content" role="main">

              <?php print render($title_prefix); ?>
              <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
                <header id="main-content-header" class="clearfix">

                  <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                    <div id="tasks" class="clearfix">

                      <?php if ($primary_local_tasks): ?>
                        <ul class="tabs primary clearfix"><?php print render($primary_local_tasks); ?></ul>
                      <?php endif; ?>

                      <?php if ($secondary_local_tasks): ?>
                        <ul class="tabs secondary clearfix"><?php print render($secondary_local_tasks); ?></ul>
                      <?php endif; ?>

                      <?php if ($action_links = render($action_links)): ?>
                        <ul class="action-links clearfix"><?php print $action_links; ?></ul>
                      <?php endif; ?>

                    </div>
                  <?php endif; ?>

                </header>
              <?php endif; ?>
              <?php print render($title_suffix); ?>

              <?php  // if ($content = render($page['content'])): ?>
                <div id="content">
                  <?php  // print $content; // Main content region ?>
                </div>
              <?php // endif; ?>

              <!-- Feed icons (RSS, Atom icons etc -->
              <?php print $feed_icons; ?>

            </<?php print $tag; ?>> <!-- /main-content -->

            <?php print render($page['content_aside']); // Aside region ?>

          </div>
        </div> <!-- /content-column -->

        <?php print render($page['sidebar_first']); // Sidebar first region ?>
        <?php print render($page['sidebar_second']); // Sidebar second region ?>

      </div>
    </div> <!-- /columns -->

    <?php print render($page['tertiary_content']); // Tertiary content region (Tertiary) ?>

    <!-- four-4x25 Gpanel -->
    <?php if (
      $page['four_first'] ||
      $page['four_second'] ||
      $page['four_third'] ||
      $page['four_fourth']
      ): ?>
      <div class="at-panel gpanel panel-display four-4x25 clearfix">
        <div class="panel-row row-1 clearfix">
          <?php print render($page['four_first']); ?>
          <?php print render($page['four_second']); ?>
        </div>
        <div class="panel-row row-2 clearfix">
          <?php print render($page['four_third']); ?>
          <?php print render($page['four_fourth']); ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($page['footer']): ?>
      <footer id="footer" role="contentinfo">
        <div id="footer-inner" class="clearfix">
          <?php print render($page['footer']); // Footer region ?>
        </div>
      </footer>
    <?php endif; ?>

  </div> <!-- /page -->
</div> <!-- /texture overlay -->

