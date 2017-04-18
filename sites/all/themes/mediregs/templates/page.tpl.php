<?php // Default Mediregs Template

// Analytics Support Code
// Set content type for analytics to be used for setting the category
// drupal_add_js('http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', 'external');
drupal_add_js('http://libs.coremetrics.com/eluminate.js', 'external');
drupal_add_js('cmSetClientID("90378051", false, "www9.wolterskluwerlb.com", "mediregs.com");', 'inline');
$thistype = $node->type;


print "<!-- Qualaroo for wolterskluwerlb.com -->
<!-- Paste this code right after the <body> tag on every page of your site. -->
<script type='text/javascript'>
  var _kiq = _kiq || [];
  (function(){
    setTimeout(function(){
    var d = document, f = d.getElementsByTagName('script')[0], s = d.createElement('script'); s.type = 'text/javascript';
    s.async = true; s.src = '//s3.amazonaws.com/ki.js/58628/di5.js'; f.parentNode.insertBefore(s, f);
    }, 1);
  })();
</script>";

function get_current_search_terms() {
// only do this once per request
static $return;
    if (!isset($return)) {
        // extract keys from path
        $path = explode('/', $_GET['q'], 3);
        // only if the path is search (if you have a different search url, please modify)
        if(count($path) == 3 && $path[0]=="search") {
            $return = $path[2];
        } else {
            $keys = empty($_REQUEST['keys']) ? '' : $_REQUEST['keys'];
            $return = $keys;
        }
    }
    return $return;
}

$searchstring = get_current_search_terms();
if (!$searchstring) {

//Check for main pages, we want the page title to match the page category, these are the static pages main pages of contents
if (empty($thistype) || ($thistype =='page') || ($thistype =='product') || ($thistype =='role') || ($thistype =='issue')) {
  $thistype = $title;
}
// End Analytics Support Code
}

?>

<?php if (!$searchstring): ?>
 <script>
cmCreatePageviewTag(<?php echo ("'HS:$title'"); ?>, <?php echo ("'HS:$thistype'"); ?>);
</script>
<?php endif; ?>

<?php // echo  strtoupper(get_cat_name((isset($category[$i][1]->cat_ID) ? $category[$i][1]->cat_ID : $category[$i][0]->cat_ID))); ?>

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
                  <h1 id="site-name" style="text-align:center;"<?php print $site_name_attributes; ?>></h1>
                <?php endif; ?>

                <?php if ($site_slogan): ?>
                  <h2 id="site-slogan"<?php print $site_slogan_attributes; ?>><?php print $site_slogan; ?></h2>
                <?php endif; ?>

              </hgroup><!-- /end #name-and-slogan -->
            <?php endif; ?>

          </div><!-- /end #branding -->
        <?php endif; ?>

        <?php print render($page['header']); // Header region ?>

      </div>

    </header> <!-- /header -->

    <?php print render($page['menu_bar']); // Menubar region ?>

    <!-- Messages and Help -->
    <?php print $messages; ?>
    <?php print render($page['help']); ?>

    <!-- Breadcrumbs -->
    <?php if ($breadcrumb): print $breadcrumb; endif; ?>


    <?php
    $page_headers = _mediregs_page_headers();
    if ($page_headers) {
      print $page_headers;
    }

    
print "<!-- Qualaroo for wolterskluwerlb.com/health -->
<!-- Paste this code right after the <body> tag on every page of your site. -->
<script type='text/javascript'>
  var _kiq = _kiq || [];
  (function(){
    setTimeout(function(){
    var d = document, f = d.getElementsByTagName('script')[0], s = d.createElement('script'); s.type = 'text/javascript';
    s.async = true; s.src = '//s3.amazonaws.com/ki.js/58628/d3L.js'; f.parentNode.insertBefore(s, f);
    }, 1);
  })();
</script>";
     
    ?>
    
    
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



    <div id="columns">
      <div class="columns-inner clearfix">

        <div id="content-column">
          <div class="content-inner">
    
            <?php print render($page['highlight']); // Highlighted region ?>

            <<?php print $tag; ?> id="main-content" role="main">

              <?php print render($title_prefix); ?>
              <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
                <header id="main-content-header" class="clearfix">

                  <?php if ($title): ?>
                    <h1 id="page-title"><?php print $title; ?></h1>
                  <?php endif; ?>

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

              <?php if ($content = render($page['content'])): ?>
                <div id="content">
                  <?php print $content; // Main content region ?>
                </div>
              <?php endif; ?>

              <!-- Feed icons (RSS, Atom icons etc -->
              <?php print $feed_icons; ?>

            </<?php print $tag; ?>> <!-- /main-content -->

            <?php print render($page['content_aside']); // Aside region ?>

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
            
          </div>
        </div> <!-- /content-column -->

        <?php print render($page['sidebar_first']); // Sidebar first region ?>
        <?php print render($page['sidebar_second']); // Sidebar second region ?>

      </div>
    </div> <!-- /columns -->

    <?php print render($page['tertiary_content']); // Tertiary content region (Tertiary) ?>


    <?php if ($page['footer']): ?>
      <footer id="footer" role="contentinfo">
        <div id="footer-inner" class="clearfix">
          <?php print render($page['footer']); // Footer region ?>
        </div>
      </footer>
    <?php endif; ?>

  </div> <!-- /page -->
</div> <!-- /texture overlay -->
