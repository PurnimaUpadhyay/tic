<?php
/* Title Tag */
function thb_theme_setup() {
   /* Text Domain */
   load_theme_textdomain('thevoux', THB_THEME_ROOT_ABS . '/inc/languages');
   
   /* Background Support */
   add_theme_support( 'custom-background', array( 'default-color' => 'ffffff') );
   
   /* Image Settings */
   add_theme_support( 'post-thumbnails' );
   set_post_thumbnail_size( 100, 90, true );
   add_image_size('thevoux-featured', 1170, 500, true );
   add_image_size('thevoux-single', 800, 600, true );
   add_image_size('thevoux-megamenu', 240, 150, true );
   add_image_size('thevoux-masonry', 600, 9999, false );
   add_image_size('thevoux-blog-list', 370, 190, true );
   add_image_size('thevoux-style1', 600, 460, true );
   add_image_size('thevoux-style2', 600, 600, true );
   add_image_size('thevoux-style3', 570, 450, true );
   add_image_size('thevoux-style8', 570, 450, true );
   add_image_size('thevoux-style3-small', 540, 280, true );
   add_image_size('thevoux-widget', 340, 150, true );
   add_image_size('thevoux-vertical', 320, 380, true );
   /* Post Formats */
   add_theme_support('post-formats', array('image', 'gallery', 'video'));
   
   /* HTML5 Galleries */
   add_theme_support( 'html5', array( 'gallery', 'caption', 'comment-list' ) );
   add_filter( 'use_default_gallery_style', '__return_false' );
   
   /* Editor Styling */
   $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lora:300,400,400italic,500,600,700' );
   add_editor_style( array($font_url, 'assets/css/editor-style.css') );
   
   /* Required Settings */
   if(!isset($content_width)) $content_width = 1170;
   add_theme_support( 'automatic-feed-links' );
   
   /* Title Support */
   add_theme_support( 'title-tag' );
   
   /* WooCommerce Support */
   add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'thb_theme_setup' );


/* Youtube & Vimeo Embeds */
function thb_remove_youtube_controls($code){
  if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false || strpos($code, 'player.vimeo.com') !== false){
  		if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false) {
      	$return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&modestbranding=1", $code);
  		} else {
      	$return = $code;
  		}
      $return = '<div class="flex-video widescreen'.(strpos($code, 'player.vimeo.com') !== false ? ' vimeo' : ' youtube').'">'.$return.'</div>';
  } else {
      $return = $code;
  }
  return $return;
}
 
add_filter('embed_handler_html', 'thb_remove_youtube_controls');
add_filter('embed_oembed_html', 'thb_remove_youtube_controls');

/* Author FB, TW & G+ Links */
function thb_my_new_contactmethods( $contactmethods ) {
// Add Position
$contactmethods['position'] = 'Position';
// Add Twitter
$contactmethods['twitter'] = 'Twitter URL';
// Add Facebook
$contactmethods['facebook'] = 'Facebook URL';
// Add Google+
$contactmethods['googleplus'] = 'Google Plus URL';

return $contactmethods;
}
add_filter('user_contactmethods','thb_my_new_contactmethods',10,1);

/* Font Awesome Array */
function thb_getIconArray(){
	$icons = array(
			'' => '',
			'fa-adjust' => 'Adjust',
			'fa-adn' => 'Adn',
			'fa-align-center' => 'Align center',
			'fa-align-justify' => 'Align justify',
			'fa-align-left' => 'Align left',
			'fa-align-right' => 'Align right',
			'fa-ambulance' => 'Ambulance',
			'fa-anchor' => 'Anchor',
			'fa-android' => 'Android',
			'fa-angellist' => 'Angellist',
			'fa-angle-double-down' => 'Angle double down',
			'fa-angle-double-left' => 'Angle double left',
			'fa-angle-double-right' => 'Angle double right',
			'fa-angle-double-up' => 'Angle double up',
			'fa-angle-down' => 'Angle down',
			'fa-angle-left' => 'Angle left',
			'fa-angle-right' => 'Angle right',
			'fa-angle-up' => 'Angle up',
			'fa-apple' => 'Apple',
			'fa-archive' => 'Archive',
			'fa-area-chart' => 'Area chart',
			'fa-arrow-circle-down' => 'Arrow circle down',
			'fa-arrow-circle-left' => 'Arrow circle left',
			'fa-arrow-circle-o-down' => 'Arrow circle o down',
			'fa-arrow-circle-o-left' => 'Arrow circle o left',
			'fa-arrow-circle-o-right' => 'Arrow circle o right',
			'fa-arrow-circle-o-up' => 'Arrow circle o up',
			'fa-arrow-circle-right' => 'Arrow circle right',
			'fa-arrow-circle-up' => 'Arrow circle up',
			'fa-arrow-down' => 'Arrow down',
			'fa-arrow-left' => 'Arrow left',
			'fa-arrow-right' => 'Arrow right',
			'fa-arrow-up' => 'Arrow up',
			'fa-arrows' => 'Arrows',
			'fa-arrows-alt' => 'Arrows alt',
			'fa-arrows-h' => 'Arrows h',
			'fa-arrows-v' => 'Arrows v',
			'fa-asterisk' => 'Asterisk',
			'fa-at' => 'At',
			'fa-backward' => 'Backward',
			'fa-ban' => 'Ban',
			'fa-bar-chart' => 'Bar chart',
			'fa-barcode' => 'Barcode',
			'fa-bars' => 'Bars',
			'fa-bed' => 'Bed',
			'fa-beer' => 'Beer',
			'fa-behance' => 'Behance',
			'fa-behance-square' => 'Behance square',
			'fa-bell' => 'Bell',
			'fa-bell-o' => 'Bell o',
			'fa-bell-slash' => 'Bell slash',
			'fa-bell-slash-o' => 'Bell slash o',
			'fa-bicycle' => 'Bicycle',
			'fa-binoculars' => 'Binoculars',
			'fa-birthday-cake' => 'Birthday cake',
			'fa-bitbucket' => 'Bitbucket',
			'fa-bitbucket-square' => 'Bitbucket square',
			'fa-bold' => 'Bold',
			'fa-bolt' => 'Bolt',
			'fa-bomb' => 'Bomb',
			'fa-book' => 'Book',
			'fa-bookmark' => 'Bookmark',
			'fa-bookmark-o' => 'Bookmark o',
			'fa-briefcase' => 'Briefcase',
			'fa-btc' => 'Btc',
			'fa-bug' => 'Bug',
			'fa-building' => 'Building',
			'fa-building-o' => 'Building o',
			'fa-bullhorn' => 'Bullhorn',
			'fa-bullseye' => 'Bullseye',
			'fa-bus' => 'Bus',
			'fa-buysellads' => 'Buysellads',
			'fa-calculator' => 'Calculator',
			'fa-calendar' => 'Calendar',
			'fa-calendar-o' => 'Calendar o',
			'fa-camera' => 'Camera',
			'fa-camera-retro' => 'Camera retro',
			'fa-car' => 'Car',
			'fa-caret-down' => 'Caret down',
			'fa-caret-left' => 'Caret left',
			'fa-caret-right' => 'Caret right',
			'fa-caret-square-o-down' => 'Caret square o down',
			'fa-caret-square-o-left' => 'Caret square o left',
			'fa-caret-square-o-right' => 'Caret square o right',
			'fa-caret-square-o-up' => 'Caret square o up',
			'fa-caret-up' => 'Caret up',
			'fa-cart-arrow-down' => 'Cart arrow down',
			'fa-cart-plus' => 'Cart plus',
			'fa-cc' => 'Cc',
			'fa-cc-amex' => 'Cc amex',
			'fa-cc-discover' => 'Cc discover',
			'fa-cc-mastercard' => 'Cc mastercard',
			'fa-cc-paypal' => 'Cc paypal',
			'fa-cc-stripe' => 'Cc stripe',
			'fa-cc-visa' => 'Cc visa',
			'fa-certificate' => 'Certificate',
			'fa-chain-broken' => 'Chain broken',
			'fa-check' => 'Check',
			'fa-check-circle' => 'Check circle',
			'fa-check-circle-o' => 'Check circle o',
			'fa-check-square' => 'Check square',
			'fa-check-square-o' => 'Check square o',
			'fa-chevron-circle-down' => 'Chevron circle down',
			'fa-chevron-circle-left' => 'Chevron circle left',
			'fa-chevron-circle-right' => 'Chevron circle right',
			'fa-chevron-circle-up' => 'Chevron circle up',
			'fa-chevron-down' => 'Chevron down',
			'fa-chevron-left' => 'Chevron left',
			'fa-chevron-right' => 'Chevron right',
			'fa-chevron-up' => 'Chevron up',
			'fa-child' => 'Child',
			'fa-circle' => 'Circle',
			'fa-circle-o' => 'Circle o',
			'fa-circle-o-notch' => 'Circle o notch',
			'fa-circle-thin' => 'Circle thin',
			'fa-clipboard' => 'Clipboard',
			'fa-clock-o' => 'Clock o',
			'fa-cloud' => 'Cloud',
			'fa-cloud-download' => 'Cloud download',
			'fa-cloud-upload' => 'Cloud upload',
			'fa-code' => 'Code',
			'fa-code-fork' => 'Code fork',
			'fa-codepen' => 'Codepen',
			'fa-coffee' => 'Coffee',
			'fa-cog' => 'Cog',
			'fa-cogs' => 'Cogs',
			'fa-columns' => 'Columns',
			'fa-comment' => 'Comment',
			'fa-comment-o' => 'Comment o',
			'fa-comments' => 'Comments',
			'fa-comments-o' => 'Comments o',
			'fa-compass' => 'Compass',
			'fa-compress' => 'Compress',
			'fa-connectdevelop' => 'Connectdevelop',
			'fa-copyright' => 'Copyright',
			'fa-credit-card' => 'Credit card',
			'fa-crop' => 'Crop',
			'fa-crosshairs' => 'Crosshairs',
			'fa-css3' => 'Css3',
			'fa-cube' => 'Cube',
			'fa-cubes' => 'Cubes',
			'fa-cutlery' => 'Cutlery',
			'fa-dashcube' => 'Dashcube',
			'fa-database' => 'Database',
			'fa-delicious' => 'Delicious',
			'fa-desktop' => 'Desktop',
			'fa-deviantart' => 'Deviantart',
			'fa-diamond' => 'Diamond',
			'fa-digg' => 'Digg',
			'fa-dot-circle-o' => 'Dot circle o',
			'fa-download' => 'Download',
			'fa-dribbble' => 'Dribbble',
			'fa-dropbox' => 'Dropbox',
			'fa-drupal' => 'Drupal',
			'fa-eject' => 'Eject',
			'fa-ellipsis-h' => 'Ellipsis h',
			'fa-ellipsis-v' => 'Ellipsis v',
			'fa-empire' => 'Empire',
			'fa-envelope' => 'Envelope',
			'fa-envelope-o' => 'Envelope o',
			'fa-envelope-square' => 'Envelope square',
			'fa-eraser' => 'Eraser',
			'fa-eur' => 'Eur',
			'fa-exchange' => 'Exchange',
			'fa-exclamation' => 'Exclamation',
			'fa-exclamation-circle' => 'Exclamation circle',
			'fa-exclamation-triangle' => 'Exclamation triangle',
			'fa-expand' => 'Expand',
			'fa-external-link' => 'External link',
			'fa-external-link-square' => 'External link square',
			'fa-eye' => 'Eye',
			'fa-eye-slash' => 'Eye slash',
			'fa-eyedropper' => 'Eyedropper',
			'fa-facebook' => 'Facebook',
			'fa-facebook-official' => 'Facebook official',
			'fa-facebook-square' => 'Facebook square',
			'fa-fast-backward' => 'Fast backward',
			'fa-fast-forward' => 'Fast forward',
			'fa-fax' => 'Fax',
			'fa-female' => 'Female',
			'fa-fighter-jet' => 'Fighter jet',
			'fa-file' => 'File',
			'fa-file-archive-o' => 'File archive o',
			'fa-file-audio-o' => 'File audio o',
			'fa-file-code-o' => 'File code o',
			'fa-file-excel-o' => 'File excel o',
			'fa-file-image-o' => 'File image o',
			'fa-file-o' => 'File o',
			'fa-file-pdf-o' => 'File pdf o',
			'fa-file-powerpoint-o' => 'File powerpoint o',
			'fa-file-text' => 'File text',
			'fa-file-text-o' => 'File text o',
			'fa-file-video-o' => 'File video o',
			'fa-file-word-o' => 'File word o',
			'fa-files-o' => 'Files o',
			'fa-film' => 'Film',
			'fa-filter' => 'Filter',
			'fa-fire' => 'Fire',
			'fa-fire-extinguisher' => 'Fire extinguisher',
			'fa-flag' => 'Flag',
			'fa-flag-checkered' => 'Flag checkered',
			'fa-flag-o' => 'Flag o',
			'fa-flask' => 'Flask',
			'fa-flickr' => 'Flickr',
			'fa-floppy-o' => 'Floppy o',
			'fa-folder' => 'Folder',
			'fa-folder-o' => 'Folder o',
			'fa-folder-open' => 'Folder open',
			'fa-folder-open-o' => 'Folder open o',
			'fa-font' => 'Font',
			'fa-forumbee' => 'Forumbee',
			'fa-forward' => 'Forward',
			'fa-foursquare' => 'Foursquare',
			'fa-frown-o' => 'Frown o',
			'fa-futbol-o' => 'Futbol o',
			'fa-gamepad' => 'Gamepad',
			'fa-gavel' => 'Gavel',
			'fa-gbp' => 'Gbp',
			'fa-gift' => 'Gift',
			'fa-git' => 'Git',
			'fa-git-square' => 'Git square',
			'fa-github' => 'Github',
			'fa-github-alt' => 'Github alt',
			'fa-github-square' => 'Github square',
			'fa-glass' => 'Glass',
			'fa-globe' => 'Globe',
			'fa-google' => 'Google',
			'fa-google-plus' => 'Google plus',
			'fa-google-plus-square' => 'Google plus square',
			'fa-google-wallet' => 'Google wallet',
			'fa-graduation-cap' => 'Graduation cap',
			'fa-gratipay' => 'Gratipay',
			'fa-h-square' => 'H square',
			'fa-hacker-news' => 'Hacker news',
			'fa-hand-o-down' => 'Hand o down',
			'fa-hand-o-left' => 'Hand o left',
			'fa-hand-o-right' => 'Hand o right',
			'fa-hand-o-up' => 'Hand o up',
			'fa-hdd-o' => 'Hdd o',
			'fa-header' => 'Header',
			'fa-headphones' => 'Headphones',
			'fa-heart' => 'Heart',
			'fa-heart-o' => 'Heart o',
			'fa-heartbeat' => 'Heartbeat',
			'fa-history' => 'History',
			'fa-home' => 'Home',
			'fa-hospital-o' => 'Hospital o',
			'fa-html5' => 'Html5',
			'fa-ils' => 'Ils',
			'fa-inbox' => 'Inbox',
			'fa-indent' => 'Indent',
			'fa-info' => 'Info',
			'fa-info-circle' => 'Info circle',
			'fa-inr' => 'Inr',
			'fa-instagram' => 'Instagram',
			'fa-ioxhost' => 'Ioxhost',
			'fa-italic' => 'Italic',
			'fa-joomla' => 'Joomla',
			'fa-jpy' => 'Jpy',
			'fa-jsfiddle' => 'Jsfiddle',
			'fa-key' => 'Key',
			'fa-keyboard-o' => 'Keyboard o',
			'fa-krw' => 'Krw',
			'fa-language' => 'Language',
			'fa-laptop' => 'Laptop',
			'fa-lastfm' => 'Lastfm',
			'fa-lastfm-square' => 'Lastfm square',
			'fa-leaf' => 'Leaf',
			'fa-leanpub' => 'Leanpub',
			'fa-lemon-o' => 'Lemon o',
			'fa-level-down' => 'Level down',
			'fa-level-up' => 'Level up',
			'fa-life-ring' => 'Life ring',
			'fa-lightbulb-o' => 'Lightbulb o',
			'fa-line-chart' => 'Line chart',
			'fa-link' => 'Link',
			'fa-linkedin' => 'Linkedin',
			'fa-linkedin-square' => 'Linkedin square',
			'fa-linux' => 'Linux',
			'fa-list' => 'List',
			'fa-list-alt' => 'List alt',
			'fa-list-ol' => 'List ol',
			'fa-list-ul' => 'List ul',
			'fa-location-arrow' => 'Location arrow',
			'fa-lock' => 'Lock',
			'fa-long-arrow-down' => 'Long arrow down',
			'fa-long-arrow-left' => 'Long arrow left',
			'fa-long-arrow-right' => 'Long arrow right',
			'fa-long-arrow-up' => 'Long arrow up',
			'fa-magic' => 'Magic',
			'fa-magnet' => 'Magnet',
			'fa-male' => 'Male',
			'fa-map-marker' => 'Map marker',
			'fa-mars' => 'Mars',
			'fa-mars-double' => 'Mars double',
			'fa-mars-stroke' => 'Mars stroke',
			'fa-mars-stroke-h' => 'Mars stroke h',
			'fa-mars-stroke-v' => 'Mars stroke v',
			'fa-maxcdn' => 'Maxcdn',
			'fa-meanpath' => 'Meanpath',
			'fa-medium' => 'Medium',
			'fa-medkit' => 'Medkit',
			'fa-meh-o' => 'Meh o',
			'fa-mercury' => 'Mercury',
			'fa-microphone' => 'Microphone',
			'fa-microphone-slash' => 'Microphone slash',
			'fa-minus' => 'Minus',
			'fa-minus-circle' => 'Minus circle',
			'fa-minus-square' => 'Minus square',
			'fa-minus-square-o' => 'Minus square o',
			'fa-mobile' => 'Mobile',
			'fa-money' => 'Money',
			'fa-moon-o' => 'Moon o',
			'fa-motorcycle' => 'Motorcycle',
			'fa-music' => 'Music',
			'fa-neuter' => 'Neuter',
			'fa-newspaper-o' => 'Newspaper o',
			'fa-openid' => 'Openid',
			'fa-outdent' => 'Outdent',
			'fa-pagelines' => 'Pagelines',
			'fa-paint-brush' => 'Paint brush',
			'fa-paper-plane' => 'Paper plane',
			'fa-paper-plane-o' => 'Paper plane o',
			'fa-paperclip' => 'Paperclip',
			'fa-paragraph' => 'Paragraph',
			'fa-pause' => 'Pause',
			'fa-paw' => 'Paw',
			'fa-paypal' => 'Paypal',
			'fa-pencil' => 'Pencil',
			'fa-pencil-square' => 'Pencil square',
			'fa-pencil-square-o' => 'Pencil square o',
			'fa-phone' => 'Phone',
			'fa-phone-square' => 'Phone square',
			'fa-picture-o' => 'Picture o',
			'fa-pie-chart' => 'Pie chart',
			'fa-pied-piper' => 'Pied piper',
			'fa-pied-piper-alt' => 'Pied piper alt',
			'fa-pinterest' => 'Pinterest',
			'fa-pinterest-p' => 'Pinterest p',
			'fa-pinterest-square' => 'Pinterest square',
			'fa-plane' => 'Plane',
			'fa-play' => 'Play',
			'fa-play-circle' => 'Play circle',
			'fa-play-circle-o' => 'Play circle o',
			'fa-plug' => 'Plug',
			'fa-plus' => 'Plus',
			'fa-plus-circle' => 'Plus circle',
			'fa-plus-square' => 'Plus square',
			'fa-plus-square-o' => 'Plus square o',
			'fa-power-off' => 'Power off',
			'fa-print' => 'Print',
			'fa-puzzle-piece' => 'Puzzle piece',
			'fa-qq' => 'Qq',
			'fa-qrcode' => 'Qrcode',
			'fa-question' => 'Question',
			'fa-question-circle' => 'Question circle',
			'fa-quote-left' => 'Quote left',
			'fa-quote-right' => 'Quote right',
			'fa-random' => 'Random',
			'fa-rebel' => 'Rebel',
			'fa-recycle' => 'Recycle',
			'fa-reddit' => 'Reddit',
			'fa-reddit-square' => 'Reddit square',
			'fa-refresh' => 'Refresh',
			'fa-renren' => 'Renren',
			'fa-repeat' => 'Repeat',
			'fa-reply' => 'Reply',
			'fa-reply-all' => 'Reply all',
			'fa-retweet' => 'Retweet',
			'fa-road' => 'Road',
			'fa-rocket' => 'Rocket',
			'fa-rss' => 'Rss',
			'fa-rss-square' => 'Rss square',
			'fa-rub' => 'Rub',
			'fa-scissors' => 'Scissors',
			'fa-search' => 'Search',
			'fa-search-minus' => 'Search minus',
			'fa-search-plus' => 'Search plus',
			'fa-sellsy' => 'Sellsy',
			'fa-server' => 'Server',
			'fa-share' => 'Share',
			'fa-share-alt' => 'Share alt',
			'fa-share-alt-square' => 'Share alt square',
			'fa-share-square' => 'Share square',
			'fa-share-square-o' => 'Share square o',
			'fa-shield' => 'Shield',
			'fa-ship' => 'Ship',
			'fa-shirtsinbulk' => 'Shirtsinbulk',
			'fa-shopping-cart' => 'Shopping cart',
			'fa-sign-in' => 'Sign in',
			'fa-sign-out' => 'Sign out',
			'fa-signal' => 'Signal',
			'fa-simplybuilt' => 'Simplybuilt',
			'fa-sitemap' => 'Sitemap',
			'fa-skyatlas' => 'Skyatlas',
			'fa-skype' => 'Skype',
			'fa-slack' => 'Slack',
			'fa-sliders' => 'Sliders',
			'fa-slideshare' => 'Slideshare',
			'fa-smile-o' => 'Smile o',
			'fa-sort' => 'Sort',
			'fa-sort-alpha-asc' => 'Sort alpha asc',
			'fa-sort-alpha-desc' => 'Sort alpha desc',
			'fa-sort-amount-asc' => 'Sort amount asc',
			'fa-sort-amount-desc' => 'Sort amount desc',
			'fa-sort-asc' => 'Sort asc',
			'fa-sort-desc' => 'Sort desc',
			'fa-sort-numeric-asc' => 'Sort numeric asc',
			'fa-sort-numeric-desc' => 'Sort numeric desc',
			'fa-soundcloud' => 'Soundcloud',
			'fa-space-shuttle' => 'Space shuttle',
			'fa-spinner' => 'Spinner',
			'fa-spoon' => 'Spoon',
			'fa-spotify' => 'Spotify',
			'fa-square' => 'Square',
			'fa-square-o' => 'Square o',
			'fa-stack-exchange' => 'Stack exchange',
			'fa-stack-overflow' => 'Stack overflow',
			'fa-star' => 'Star',
			'fa-star-half' => 'Star half',
			'fa-star-half-o' => 'Star half o',
			'fa-star-o' => 'Star o',
			'fa-steam' => 'Steam',
			'fa-steam-square' => 'Steam square',
			'fa-step-backward' => 'Step backward',
			'fa-step-forward' => 'Step forward',
			'fa-stethoscope' => 'Stethoscope',
			'fa-stop' => 'Stop',
			'fa-street-view' => 'Street view',
			'fa-strikethrough' => 'Strikethrough',
			'fa-stumbleupon' => 'Stumbleupon',
			'fa-stumbleupon-circle' => 'Stumbleupon circle',
			'fa-subscript' => 'Subscript',
			'fa-subway' => 'Subway',
			'fa-suitcase' => 'Suitcase',
			'fa-sun-o' => 'Sun o',
			'fa-superscript' => 'Superscript',
			'fa-table' => 'Table',
			'fa-tablet' => 'Tablet',
			'fa-tachometer' => 'Tachometer',
			'fa-tag' => 'Tag',
			'fa-tags' => 'Tags',
			'fa-tasks' => 'Tasks',
			'fa-taxi' => 'Taxi',
			'fa-tencent-weibo' => 'Tencent weibo',
			'fa-terminal' => 'Terminal',
			'fa-text-height' => 'Text height',
			'fa-text-width' => 'Text width',
			'fa-th' => 'Th',
			'fa-th-large' => 'Th large',
			'fa-th-list' => 'Th list',
			'fa-thumb-tack' => 'Thumb tack',
			'fa-thumbs-down' => 'Thumbs down',
			'fa-thumbs-o-down' => 'Thumbs o down',
			'fa-thumbs-o-up' => 'Thumbs o up',
			'fa-thumbs-up' => 'Thumbs up',
			'fa-ticket' => 'Ticket',
			'fa-times' => 'Times',
			'fa-times-circle' => 'Times circle',
			'fa-times-circle-o' => 'Times circle o',
			'fa-tint' => 'Tint',
			'fa-toggle-off' => 'Toggle off',
			'fa-toggle-on' => 'Toggle on',
			'fa-train' => 'Train',
			'fa-transgender' => 'Transgender',
			'fa-transgender-alt' => 'Transgender alt',
			'fa-trash' => 'Trash',
			'fa-trash-o' => 'Trash o',
			'fa-tree' => 'Tree',
			'fa-trello' => 'Trello',
			'fa-trophy' => 'Trophy',
			'fa-truck' => 'Truck',
			'fa-try' => 'Try',
			'fa-tty' => 'Tty',
			'fa-tumblr' => 'Tumblr',
			'fa-tumblr-square' => 'Tumblr square',
			'fa-twitch' => 'Twitch',
			'fa-twitter' => 'Twitter',
			'fa-twitter-square' => 'Twitter square',
			'fa-umbrella' => 'Umbrella',
			'fa-underline' => 'Underline',
			'fa-undo' => 'Undo',
			'fa-university' => 'University',
			'fa-unlock' => 'Unlock',
			'fa-unlock-alt' => 'Unlock alt',
			'fa-upload' => 'Upload',
			'fa-usd' => 'Usd',
			'fa-user' => 'User',
			'fa-user-md' => 'User md',
			'fa-user-plus' => 'User plus',
			'fa-user-secret' => 'User secret',
			'fa-user-times' => 'User times',
			'fa-users' => 'Users',
			'fa-venus' => 'Venus',
			'fa-venus-double' => 'Venus double',
			'fa-venus-mars' => 'Venus mars',
			'fa-viacoin' => 'Viacoin',
			'fa-video-camera' => 'Video camera',
			'fa-vimeo-square' => 'Vimeo square',
			'fa-vine' => 'Vine',
			'fa-vk' => 'Vk',
			'fa-volume-down' => 'Volume down',
			'fa-volume-off' => 'Volume off',
			'fa-volume-up' => 'Volume up',
			'fa-weibo' => 'Weibo',
			'fa-weixin' => 'Weixin',
			'fa-whatsapp' => 'Whatsapp',
			'fa-wheelchair' => 'Wheelchair',
			'fa-wifi' => 'Wifi',
			'fa-windows' => 'Windows',
			'fa-wordpress' => 'Wordpress',
			'fa-wrench' => 'Wrench',
			'fa-xing' => 'Xing',
			'fa-xing-square' => 'Xing square',
			'fa-yahoo' => 'Yahoo',
			'fa-yelp' => 'Yelp',
			'fa-youtube' => 'Youtube',
			'fa-youtube-play' => 'Youtube play',
			'fa-youtube-square' => 'Youtube square'
		);
  return $icons;
}

/**
 * Shorten large numbers into abbreviations (i.e. 1,500 = 1.5k)
 *
 * @param int    $number  Number to shorten
 * @return String   A number with a symbol
 */ 
function thb_numberAbbreviation($number) {
    $abbrevs = array(12 => "T", 9 => "B", 6 => "M", 3 => "K", 0 => "");

	if ($number > 999) {
	    foreach($abbrevs as $exponent => $abbrev) {
	        if($number >= pow(10, $exponent)) {
	        	$display_num = $number / pow(10, $exponent);
	        	$decimals = ($exponent >= 3 && round($display_num) < 100) ? 1 : 0;
	            return number_format($display_num,$decimals) . $abbrev;
	        }
	    }
	} else {
		return $number;	
	}
}
//Get Facebook Likes Count of a page
function thb_fbLikeCount($pageID, $debug = false) {
	$cache = get_transient( 'thb_page_fbcount' );
	switch (ot_get_option('sharing_cache', '1')) {
		case '1h':
			$time = 3600;
			break;
		case '1':
			$time = DAY_IN_SECONDS;
			break;
		case '7':
			$time = WEEK_IN_SECONDS;
			break;
		case '30':
			$time = DAY_IN_SECONDS * 30;
			break;
	}
	if ( empty( $cache ) ) {
		$url_prefix = is_ssl() ? 'https:' : 'http:';
		
		//Construct a Facebook URL
		$secret = wp_remote_get('https://graph.facebook.com/oauth/access_token?type=client_cred&client_id='.ot_get_option('facebook_app_id').'&client_secret='.ot_get_option('facebook_app_secret').'');
		if ( is_wp_error( $secret ) ) {
			echo $error_string = $secret->get_error_message();
			return;
		}
		$secret = wp_remote_retrieve_body( $secret );
		$json_url = 'https://graph.facebook.com/'.$pageID.'?'.$secret.'&fields=id,name,likes';
		$json = wp_remote_get($json_url);
		// Check for error
		if ( is_wp_error( $json ) ) {
			echo $error_string = $json->get_error_message();
			return;
		}
		$data = wp_remote_retrieve_body( $json );
		$json_output = json_decode($data);
		
	 	set_transient( 'thb_page_fbcount', $json_output->likes, $time );
	 	
		//Extract the likes count from the JSON object
		$likes = $json_output->likes ? $json_output->likes : 0;
		
	} else {
		$likes = $cache;
	}
	if ($debug) {
		$secret = wp_remote_get('https://graph.facebook.com/oauth/access_token?type=client_cred&client_id='.ot_get_option('facebook_app_id').'&client_secret='.ot_get_option('facebook_app_secret').'');
		if ( is_wp_error( $secret ) ) {
			echo $error_string = $secret->get_error_message();
			return;
		}
		$secret = wp_remote_retrieve_body( $secret );
		$json_url = 'https://graph.facebook.com/'.$pageID.'?'.$secret;
		$json = wp_remote_get($json_url);
		// Check for error
		if ( is_wp_error( $json ) ) {
			echo $error_string = $json->get_error_message();
			return;
		}
		$data = wp_remote_retrieve_body( $json );
		$json_output = json_decode($data);
		var_dump($json_output);	
	}
	echo thb_numberAbbreviation($likes);
}
add_filter( 'thb_fbLikeCount', 'thb_fbLikeCount', 99, 2 );

//Get Twitter Follower Count of a page
function thb_getTwitterFollowers($debug = false) {
    $settings = array(
        'oauth_access_token' => ot_get_option('twitter_bar_accesstoken'),
        'oauth_access_token_secret' => ot_get_option('twitter_bar_accesstokensecret'),
        'consumer_key' => ot_get_option('twitter_bar_consumerkey'),
        'consumer_secret' => ot_get_option('twitter_bar_consumersecret')
    );
    $url = 'https://api.twitter.com/1.1/users/show.json';
    $requestMethod = 'GET';
    $getfield = '?screen_name='.ot_get_option('twitter_bar_username');
    
    $cache = get_transient( 'thb_page_twcount' );
    
    switch (ot_get_option('sharing_cache', '1')) {
    	case '1h':
    		$time = 3600;
    		break;
    	case '1':
    		$time = DAY_IN_SECONDS;
    		break;
    	case '7':
    		$time = WEEK_IN_SECONDS;
    		break;
    	case '30':
    		$time = DAY_IN_SECONDS * 30;
    		break;
    }
    if ( empty( $cache ) ) {
	    $twitter = new thb_TwitterAPIExchange($settings);
	    $twitter_data = json_decode($twitter->set_get_field($getfield)
	                 ->build_oauth($url, $requestMethod)
	                 ->process_request());
	    if($twitter_data->errors) {
	    	echo $twitter_data->errors[0]->message;
	    	return;
	    } else {
	      $followers = $twitter_data->followers_count;
	      set_transient( 'thb_page_twcount', $followers, $time );
	    }
    } else {
    	$followers = $cache;
    }
    if ($debug) {
    	$twitter = new thb_TwitterAPIExchange($settings);
    	$twitter_data = json_decode($twitter->set_get_field($getfield)
    	             ->build_oauth($url, $requestMethod)
    	             ->process_request());
    	var_dump($twitter_data);	
    }
    echo thb_numberAbbreviation($followers);
}
add_filter( 'thb_twFollowerCount', 'thb_getTwitterFollowers', 99, 1 );

//Get Instagram Follower Count
function thb_getInstagramFollowers() {
    $id = ot_get_option('instagram_id');
    $api_key = ot_get_option('instagram_accesstoken');
    
    $cache = get_transient( 'thb_page_inscount' );
    
    switch (ot_get_option('sharing_cache', '1')) {
    	case '1h':
    		$time = 3600;
    		break;
    	case '1':
    		$time = DAY_IN_SECONDS;
    		break;
    	case '7':
    		$time = WEEK_IN_SECONDS;
    		break;
    	case '30':
    		$time = DAY_IN_SECONDS * 30;
    		break;
    }
    
    if ( empty( $cache ) ) {
	    $request = @wp_remote_get( 'https://api.instagram.com/v1/users/' . $id . '?access_token=' . $api_key );
	    
      if ( false == $request ) {
        return null;
      }
  
      $response = json_decode( @wp_remote_retrieve_body( $request ) );
  
      if ( isset( $response->data ) && isset( $response->data->counts ) && isset( $response->data->counts->followed_by ) ) {
      	
      	$followers = $response->data->counts->followed_by;
        set_transient( 'thb_page_inscount', $followers, $time );
      }
        
        
    } else {
    	$followers = $cache;
    }
    echo thb_numberAbbreviation($followers);
}
add_filter( 'thb_insFollowerCount', 'thb_getInstagramFollowers', 99, 1 );

//Get Google+ Follower Count
function thb_getGplusFollowers() {
    $id = ot_get_option('gp_username');
    $apikey = ot_get_option('gp_apikey');
    
    $cache = get_transient( 'thb_page_gpcount' );
    
    switch (ot_get_option('sharing_cache', '1')) {
    	case '1h':
    		$time = 3600;
    		break;
    	case '1':
    		$time = DAY_IN_SECONDS;
    		break;
    	case '7':
    		$time = WEEK_IN_SECONDS;
    		break;
    	case '30':
    		$time = DAY_IN_SECONDS * 30;
    		break;
    }
    
    if ( empty( $cache ) ) {
	    $request = @wp_remote_get( 'https://www.googleapis.com/plus/v1/people/' . $id . '?key=' . $apikey );
	    
			if ( false == $request ) {
			 return null;
			}
  
			$response = json_decode( @wp_remote_retrieve_body( $request ) );
      
      if ( isset( $response->circledByCount ) ) {
      	
      	$followers = $response->circledByCount;
        set_transient( 'thb_page_gpcount', $followers, $time );
      }
        
        
    } else {
    	$followers = $cache;
    }
    echo thb_numberAbbreviation($followers);
}
add_filter( 'thb_gpFollowerCount', 'thb_getGplusFollowers', 99, 1 );

/* Social */
function thb_fb_information() {
	$sharing_type =  ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
	
	if (in_array('facebook',$sharing_type) && is_single()) {
		$image_id = get_post_thumbnail_id();
	    $image_link = wp_get_attachment_image_src($image_id,'full');

		$image = aq_resize( $image_link[0], 200, 200, true, false, true);
		?>
		<meta property="og:title" content="<?php the_title_attribute(); ?>" />
		<meta property="og:description" content="<?php echo esc_html(thb_excerpt(200, false, false)); ?>" />
		<meta property="og:image" content="<?php echo $image[0]; ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<?php
	}
}
add_action( 'thb_fb_information', 'thb_fb_information',3 );

/* Review Box */
function thb_is_review() {
	$id = get_the_ID();
	if (get_post_meta($id, 'is_review', TRUE) == 'yes') {
		echo ' has-review';
	} else {
		return false;
	}
}
add_action( 'thb_is_review', 'thb_is_review', 1 );
function thb_post_review_average() {
	$id = get_the_ID();
	if (get_post_meta($id, 'is_review', TRUE) == 'yes') {
		$features = get_post_meta($id, 'post_ratings_percentage', TRUE);
		$count = count($features);
		$total = 0;
		foreach($features as $feature) {
			$total += $feature['feature_score'];
		}
		echo '<span class="ave">'.round($total / $count, 1).'</span>';
	}
}
add_action( 'thb_post_review_average', 'thb_post_review_average' );
function thb_post_review() {
	$id = get_the_ID();
	if (get_post_meta($id, 'is_review', TRUE) == 'yes') {
		$review_title = get_post_meta($id, 'post_ratings_title', TRUE);
		$comments = get_post_meta($id, 'post_ratings_comments', TRUE);
		$features = get_post_meta($id, 'post_ratings_percentage', TRUE); 
		$count = count($features);
		$comment_count = count($comments);
		$total = 0;
		?>
		<div class="post-review">
			<?php if ($review_title) { ?><strong><?php echo $review_title; ?></strong><?php } ?>
			<ul>
			<?php if ($features) { foreach($features as $feature) {
				$total += $feature['feature_score'];
				?>
				
				<li>
					<div class="row">
						<div class="small-12 medium-9 columns"><?php echo $feature['title']; ?></div>
						<div class="small-12 medium-3 columns hide-for-small"><?php echo $feature['feature_score']; ?></div>
					</div>
					<div class="progress">
						<span style="width: <?php echo 10*$feature['feature_score'] ?>%;"></span>
					</div>
				</li>
				
	
			<?php } }?>
			</ul>
			<div class="row">
				<div class="small-12 medium-9 columns">
					<div class="row">
						<div class="small-12 medium-6 columns comment_section">
							<span class="post_comment good"><?php _e('The Good', 'thevoux'); ?></span>
							<?php if ($comments) { foreach($comments as $comment) { ?>
								<?php if ($comment['feature_comment_type'] == 'positive') { ?>
								<p class="positive"><?php echo $comment['title']; ?></p>
								<?php } ?>
							<?php } } ?>
						</div>
						<div class="small-12 medium-6 columns comment_section">
							<span class="post_comment bad"><?php _e('The Bad', 'thevoux'); ?></span>
							<?php if ($comments) { foreach($comments as $comment) { ?>
								<?php if ($comment['feature_comment_type'] == 'negative') { ?>
								<p class="negative"><?php echo $comment['title']; ?></p>
								<?php } ?>
							<?php } } ?>
						</div>
					</div>
				</div>
				<div class="small-12 medium-3 columns">
					<figure class="average"><?php echo round($total / $count, 1); ?></figure>
				</div>
			</div>
			
		</div>
		<?php
	}
}
add_action( 'thb_post_review', 'thb_post_review' );
/* Author Box */
function thb_author($id) {
	$id = $id ? $id : get_the_author_meta( 'ID' );
	?>
	<?php echo get_avatar( $id , '164'); ?>
	<div class="author-content">
		<h1><a href="<?php echo get_author_posts_url( $id ); ?>"><?php the_author_meta('display_name', $id ); ?></a></h1>
		<?php if(get_the_author_meta('position', $id) != '') { ?>
			<h4><?php echo get_the_author_meta('position', $id ); ?></h4>
		<?php } ?>
		<p><?php the_author_meta('description', $id ); ?></p>
		<?php if(get_the_author_meta('url', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('url', $id ); ?>" class="boxed-icon fill"><i class="fa fa-link"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('twitter', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('twitter', $id ); ?>" class="boxed-icon fill twitter"><i class="fa fa-twitter"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('facebook', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('facebook', $id ); ?>" class="boxed-icon fill facebook"><i class="fa fa-facebook"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('googleplus', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('googleplus', $id ); ?>" class="boxed-icon fill google-plus"><i class="fa fa-google-plus"></i></a>
		<?php } ?>
	</div>
	<?php
}
add_action( 'thb_author', 'thb_author',3 );

function thb_is_gallery() {
	$format = get_post_format();
	
	if ($format == 'gallery') {
		echo 'has-gallery';
	} else {
		return false;
	}
}
add_action( 'thb_is_gallery', 'thb_is_gallery', 1 );

function thb_social_article_totalshares($id) {
	$id = $id ? $id : get_the_ID();
	
	$total = get_post_meta($id, 'thb_pssc_counts', true);
	
	if ($total == 0) {
		$total = pssc_all($id);
	}
	return thb_numberAbbreviation($total);
}
add_action( 'thb_social_article_totalshares', 'thb_social_article_totalshares',3 );

function thb_social_article($id) {
	$id = $id ? $id : get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = wp_get_attachment_image_src($image_id,'full');
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');
	$sharing_type = ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
 ?>
 	<?php if (!empty($sharing_type)) { ?>
		<?php if (in_array('facebook',$sharing_type)) { ?>
		<a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="boxed-icon social fill facebook"><i class="fa fa-facebook"></i></a>
		<?php } ?>
		<?php if (in_array('twitter',$sharing_type)) { ?>
		<a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . ''; ?>" class="boxed-icon social fill twitter"><i class="fa fa-twitter"></i></a>
		<?php } ?>
		<?php if (in_array('google-plus',$sharing_type)) { ?>
		<a href="<?php echo 'http://plus.google.com/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon social fill google-plus"><i class="fa fa-google-plus"></i></a>
		<?php } ?>
		<?php if (in_array('pinterest',$sharing_type)) { ?>
		<a href="<?php echo 'http://pinterest.com/pin/create/button/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . ''; ?>" class="boxed-icon social fill pinterest"><i class="fa fa-pinterest"></i></a>
		<?php } ?>
		<?php if (in_array('linkedin',$sharing_type)) { ?>
		<a href="<?php echo 'https://www.linkedin.com/cws/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon social fill linkedin"><i class="fa fa-linkedin"></i></a>
		<?php } ?>
	<?php } ?>
<?php
}
add_action( 'thb_social_article', 'thb_social_article', 3 );

function thb_social_article_detail($id = false, $fixed = false, $class = false) {
	$id = $id ? $id : get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = wp_get_attachment_image_src($image_id,'full');
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');
	$sharing_type = ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
 ?>
 	<?php if (!empty($sharing_type)) { ?>
	<aside class="share-article hide-on-print<?php if ($fixed) { ?> fixed-me<?php } ?> <?php echo $class; ?>">
		<?php if (in_array('facebook',$sharing_type)) { ?>
		<a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="boxed-icon facebook social"><i class="fa fa-facebook"></i><span><?php echo thb_numberAbbreviation(pssc_facebook($id)); ?></span></a>
		<?php } ?>
		<?php if (in_array('twitter',$sharing_type)) { ?>
		<a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . ''; ?>" class="boxed-icon twitter social "><i class="fa fa-twitter"></i><span><?php echo thb_numberAbbreviation(pssc_twitter($id)); ?></span></a>
		<?php } ?>
		<?php if (in_array('google-plus',$sharing_type)) { ?>
		<a href="<?php echo 'http://plus.google.com/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon google-plus social"><i class="fa fa-google-plus"></i><span><?php echo thb_numberAbbreviation(pssc_gplus($id)); ?></span></a>
		<?php } ?>
		<?php if (in_array('pinterest',$sharing_type)) { ?>
		<a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . ''; ?>" class="boxed-icon pinterest social" nopin="nopin" data-pin-no-hover="true"><i class="fa fa-pinterest"></i><span><?php echo thb_numberAbbreviation(pssc_pinterest($id)); ?></span></a>
		<?php } ?>
		<?php if (in_array('linkedin',$sharing_type)) { ?>
		<a href="<?php echo 'https://www.linkedin.com/cws/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon linkedin social"><i class="fa fa-linkedin"></i><span><?php echo pssc_linkedin($id); ?></span></a>
		<?php } ?>
		<a href="<?php the_permalink(); ?>" class="boxed-icon comment"><span><?php echo get_comments_number(); ?></span></a>
	</aside>
	<?php } ?>
<?php
}
add_action( 'thb_social_article_detail', 'thb_social_article_detail', 3, 3 );

function thb_social_product($id = false) {
	$id = $id ? $id : get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = wp_get_attachment_image_src($image_id,'full');
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');
	$sharing_type = ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
 ?>
 <?php if (!empty($sharing_type)) { ?>
 <aside class="share-article">
 	<?php if (in_array('facebook',$sharing_type)) { ?>
 	<a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="boxed-icon facebook social"><i class="fa fa-facebook"></i><span><?php echo thb_numberAbbreviation(pssc_facebook($id)); ?></span></a>
 	<?php } ?>
 	<?php if (in_array('twitter',$sharing_type)) { ?>
 	<a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . ''; ?>" class="boxed-icon twitter social "><i class="fa fa-twitter"></i><span><?php echo thb_numberAbbreviation(pssc_twitter($id)); ?></span></a>
 	<?php } ?>
 	<?php if (in_array('google-plus',$sharing_type)) { ?>
 	<a href="<?php echo 'http://plus.google.com/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon google-plus social"><i class="fa fa-google-plus"></i><span><?php echo thb_numberAbbreviation(pssc_gplus($id)); ?></span></a>
 	<?php } ?>
 	<?php if (in_array('pinterest',$sharing_type)) { ?>
 	<a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . ''; ?>" class="boxed-icon pinterest social" nopin="nopin" data-pin-no-hover="true"><i class="fa fa-pinterest"></i><span><?php echo thb_numberAbbreviation(pssc_pinterest($id)); ?></span></a>
 	<?php } ?>
 </aside>
 <?php } ?>
<?php
}
add_action( 'thb_social_product', 'thb_social_product', 3, 3 );

/* Thb Header Search */
function thb_quick_search() {
 ?>
 	<aside id="quick_search">
		<svg version="1.1" id="search_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
				<path d="M19.769,18.408l-5.408-5.357c1.109-1.364,1.777-3.095,1.777-4.979c0-4.388-3.604-7.958-8.033-7.958
					c-4.429,0-8.032,3.57-8.032,7.958s3.604,7.958,8.032,7.958c1.805,0,3.468-0.601,4.811-1.6l5.435,5.384
					c0.196,0.194,0.453,0.29,0.71,0.29c0.256,0,0.513-0.096,0.709-0.29C20.16,19.426,20.16,18.796,19.769,18.408z M2.079,8.072
					c0-3.292,2.703-5.97,6.025-5.97s6.026,2.678,6.026,5.97c0,3.292-2.704,5.969-6.026,5.969S2.079,11.364,2.079,8.072z"/>
		</svg>
		<!-- Start SearchForm -->
		<form method="get" class="searchform" role="search" action="<?php echo home_url(); ?>/">
		    <fieldset>
		    	<input name="s" type="text" class="s" placeholder="<?php _e( 'Search', 'thevoux' ); ?>">
		    </fieldset>
		</form>
		<!-- End SearchForm -->
	</aside>
<?php
}
add_action( 'thb_quick_search', 'thb_quick_search',3 );

/* THB Social Icons */
function thb_social() {
 ?>
	<?php if (ot_get_option('fb_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('fb_link')); ?>" class="facebook icon-1x" target="_blank"><i class="fa fa-facebook"></i></a>
	<?php } ?>
	<?php if (ot_get_option('pinterest_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('pinterest_link')); ?>" class="pinterest icon-1x" target="_blank"><i class="fa fa-pinterest"></i></a>
	<?php } ?>
	<?php if (ot_get_option('twitter_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('twitter_link')); ?>" class="twitter icon-1x" target="_blank"><i class="fa fa-twitter"></i></a>
	<?php } ?>
	<?php if (ot_get_option('linkedin_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('linkedin_link')); ?>" class="linkedin icon-1x" target="_blank"><i class="fa fa-linkedin"></i></a>
	<?php } ?>
	<?php if (ot_get_option('instragram_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('instragram_link')); ?>" class="instagram icon-1x" target="_blank"><i class="fa fa-instagram"></i></a>
	<?php } ?>
	<?php if (ot_get_option('xing_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('xing_link')); ?>" class="xing icon-1x" target="_blank"><i class="fa fa-xing"></i></a>
	<?php } ?>
	<?php if (ot_get_option('tumblr_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('tumblr_link')); ?>" class="tumblr icon-1x" target="_blank"><i class="fa fa-tumblr"></i></a>
	<?php } ?>
	<?php if (ot_get_option('vk_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('vk_link')); ?>" class="vk icon-1x" target="_blank"><i class="fa fa-vk"></i></a>
	<?php } ?>
	<?php if (ot_get_option('googleplus_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('googleplus_link')); ?>" class="google-plus icon-1x" target="_blank"><i class="fa fa-google-plus"></i></a>
	<?php } ?>
	<?php if (ot_get_option('soundcloud_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('soundcloud_link')); ?>" class="soundcloud icon-1x" target="_blank"><i class="fa fa-soundcloud"></i></a>
	<?php } ?>
	<?php if (ot_get_option('dribbble_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('dribbble_link')); ?>" class="dribbble icon-1x" target="_blank"><i class="fa fa-dribbble"></i></a>
	<?php } ?>
	<?php if (ot_get_option('youtube_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('youtube_link')); ?>" class="youtube icon-1x" target="_blank"><i class="fa fa-youtube"></i></a>
	<?php } ?>
	<?php if (ot_get_option('spotify_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('spotify_link')); ?>" class="spotify icon-1x" target="_blank"><i class="fa fa-spotify"></i></a>
	<?php } ?>
<?php
}
add_action( 'thb_social', 'thb_social',3 );

function thb_social_header() {
	$social_style = ot_get_option('header_socialstyle', 'style1');
	
	if ($social_style == 'style1') {
 ?>
	<aside id="social_header">
		<div>
			<?php if (ot_get_option('fb_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('fb_link_header')); ?>" class="facebook icon-1x" target="_blank"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			<?php if (ot_get_option('pinterest_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('pinterest_link_header')); ?>" class="pinterest icon-1x" target="_blank"><i class="fa fa-pinterest"></i></a>
			<?php } ?>
			<?php if (ot_get_option('twitter_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('twitter_link_header')); ?>" class="twitter icon-1x" target="_blank"><i class="fa fa-twitter"></i></a>
			<?php } ?>
			<?php if (ot_get_option('linkedin_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('linkedin_link_header')); ?>" class="linkedin icon-1x" target="_blank"><i class="fa fa-linkedin"></i></a>
			<?php } ?>
			<?php if (ot_get_option('instragram_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('instragram_link_header')); ?>" class="instagram icon-1x" target="_blank"><i class="fa fa-instagram"></i></a>
			<?php } ?>
			<?php if (ot_get_option('xing_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('xing_link_header')); ?>" class="xing icon-1x" target="_blank"><i class="fa fa-xing"></i></a>
			<?php } ?>
			<?php if (ot_get_option('tumblr_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('tumblr_link_header')); ?>" class="tumblr icon-1x" target="_blank"><i class="fa fa-tumblr"></i></a>
			<?php } ?>
			<?php if (ot_get_option('vk_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('vk_link_header')); ?>" class="vk icon-1x" target="_blank"><i class="fa fa-vk"></i></a>
			<?php } ?>
			<?php if (ot_get_option('googleplus_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('googleplus_link_header')); ?>" class="google-plus icon-1x" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			<?php if (ot_get_option('soundcloud_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('soundcloud_link_header')); ?>" class="soundcloud icon-1x" target="_blank"><i class="fa fa-soundcloud"></i></a>
			<?php } ?>
			<?php if (ot_get_option('dribbble_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('dribbble_link_header')); ?>" class="dribbble icon-1x" target="_blank"><i class="fa fa-dribbble"></i></a>
			<?php } ?>
			<?php if (ot_get_option('youtube_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('youtube_link_header')); ?>" class="youtube icon-1x" target="_blank"><i class="fa fa-youtube"></i></a>
			<?php } ?>
			<?php if (ot_get_option('spotify_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('spotify_link_header')); ?>" class="spotify icon-1x" target="_blank"><i class="fa fa-spotify"></i></a>
			<?php } ?>
		</div>
		<i><svg version="1.1" id="social_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
		<path d="M11.521,14.194c-0.447,0.523-0.956,0.943-1.531,1.257c-0.552,0.314-1.126,0.461-1.698,0.461
			c-0.618,0-1.235-0.168-1.83-0.524c-0.595-0.376-1.062-0.921-1.446-1.674c-0.361-0.753-0.553-1.569-0.553-2.47
			c0-1.09,0.298-2.199,0.873-3.308C5.908,6.848,6.61,6.011,7.46,5.466C8.311,4.9,9.14,4.628,9.947,4.628
			c0.617,0,1.191,0.146,1.744,0.481c0.574,0.293,1.042,0.774,1.446,1.424l0.36-1.612h1.893l-1.531,6.972
			c-0.212,0.982-0.318,1.507-0.318,1.61c0,0.189,0.086,0.355,0.214,0.482c0.149,0.146,0.318,0.209,0.532,0.209
			c0.381,0,0.849-0.209,1.465-0.629c0.809-0.564,1.446-1.297,1.913-2.238c0.47-0.921,0.703-1.885,0.703-2.891
			c0-1.151-0.317-2.218-0.915-3.223c-0.595-1.005-1.487-1.822-2.698-2.408c-1.19-0.606-2.489-0.92-3.935-0.92
			c-1.658,0-3.146,0.397-4.507,1.151C4.932,3.79,3.89,4.88,3.146,6.283C2.38,7.706,2.019,9.234,2.019,10.847
			c0,1.694,0.361,3.159,1.128,4.396c0.743,1.215,1.827,2.135,3.23,2.721c1.424,0.566,2.998,0.859,4.721,0.859
			c1.848,0,3.379-0.293,4.634-0.9s2.169-1.361,2.807-2.24h1.892c-0.36,0.732-0.956,1.486-1.85,2.24
			c-0.871,0.753-1.892,1.34-3.104,1.779c-1.213,0.439-2.658,0.67-4.338,0.67c-1.573,0-3.018-0.21-4.337-0.586
			c-1.317-0.397-2.445-1.006-3.36-1.799c-0.933-0.776-1.637-1.697-2.104-2.723c-0.595-1.319-0.893-2.722-0.893-4.25
			c0-1.696,0.361-3.308,1.063-4.835c0.85-1.864,2.082-3.308,3.657-4.312c1.573-0.984,3.485-1.487,5.738-1.487
			c1.743,0,3.316,0.355,4.698,1.046c1.403,0.711,2.489,1.759,3.296,3.141c0.681,1.214,1.021,2.51,1.021,3.914
			c0,2.01-0.723,3.79-2.147,5.36c-1.296,1.381-2.679,2.093-4.208,2.093c-0.491,0-0.873-0.084-1.171-0.229
			c-0.297-0.126-0.531-0.335-0.659-0.607C11.648,14.929,11.563,14.613,11.521,14.194L11.521,14.194z M6.418,11.389
			c0,0.941,0.234,1.676,0.681,2.199c0.468,0.522,1,0.797,1.573,0.797c0.403,0,0.809-0.126,1.255-0.357
			c0.425-0.23,0.851-0.564,1.255-1.027c0.402-0.459,0.722-1.045,0.977-1.737c0.255-0.71,0.384-1.401,0.384-2.114
			c0-0.942-0.258-1.675-0.724-2.198c-0.468-0.523-1.063-0.774-1.745-0.774c-0.444,0-0.87,0.105-1.253,0.334
			c-0.404,0.23-0.786,0.586-1.169,1.089c-0.36,0.502-0.66,1.109-0.893,1.821C6.546,10.134,6.418,10.782,6.418,11.389z"/>
		</svg></i>
	</aside>
 <?php		
	} else if ($social_style == 'style2') {
 ?>
	<?php if (ot_get_option('fb_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('fb_link_header')); ?>" class="facebook icon-1x" target="_blank"><i class="fa fa-facebook"></i></a>
	<?php } ?>
	<?php if (ot_get_option('pinterest_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('pinterest_link_header')); ?>" class="pinterest icon-1x" target="_blank"><i class="fa fa-pinterest"></i></a>
	<?php } ?>
	<?php if (ot_get_option('twitter_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('twitter_link_header')); ?>" class="twitter icon-1x" target="_blank"><i class="fa fa-twitter"></i></a>
	<?php } ?>
	<?php if (ot_get_option('linkedin_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('linkedin_link_header')); ?>" class="linkedin icon-1x" target="_blank"><i class="fa fa-linkedin"></i></a>
	<?php } ?>
	<?php if (ot_get_option('instragram_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('instragram_link_header')); ?>" class="instagram icon-1x" target="_blank"><i class="fa fa-instagram"></i></a>
	<?php } ?>
	<?php if (ot_get_option('xing_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('xing_link_header')); ?>" class="xing icon-1x" target="_blank"><i class="fa fa-xing"></i></a>
	<?php } ?>
	<?php if (ot_get_option('tumblr_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('tumblr_link_header')); ?>" class="tumblr icon-1x" target="_blank"><i class="fa fa-tumblr"></i></a>
	<?php } ?>
	<?php if (ot_get_option('vk_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('vk_link_header')); ?>" class="vk icon-1x" target="_blank"><i class="fa fa-vk"></i></a>
	<?php } ?>
	<?php if (ot_get_option('googleplus_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('googleplus_link_header')); ?>" class="google-plus icon-1x" target="_blank"><i class="fa fa-google-plus"></i></a>
	<?php } ?>
	<?php if (ot_get_option('soundcloud_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('soundcloud_link')); ?>" class="soundcloud icon-1x" target="_blank"><i class="fa fa-soundcloud"></i></a>
	<?php } ?>
	<?php if (ot_get_option('dribbble_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('dribbble_link_header')); ?>" class="dribbble icon-1x" target="_blank"><i class="fa fa-dribbble"></i></a>
	<?php } ?>
	<?php if (ot_get_option('youtube_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('youtube_link_header')); ?>" class="youtube icon-1x" target="_blank"><i class="fa fa-youtube"></i></a>
	<?php } ?>
	<?php if (ot_get_option('spotify_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('spotify_link_header')); ?>" class="spotify icon-1x" target="_blank"><i class="fa fa-spotify"></i></a>
	<?php } ?>
<?php
	}
}
add_action( 'thb_social_header', 'thb_social_header',3 );

/* Add Category slug as class to categories */
function thb_add_class_callback( $result ) {
	$class = strtolower( $result[2] );
	$class = str_replace( ' ', '-', $class );
	$class = sanitize_title($class);
	
	$replacement = sprintf( ' class="%s">%s</a>', 'cat-'.$class, $result[2] );
	
	return preg_replace( '#>([^<]+)</a>#Uis', $replacement, $result[0] );
}

function thb_add_category_slug( $html ) {
	$search  = '#<a[^>]+(\>([^<]+)\</a>)#Uuis';
	$html = preg_replace_callback( $search, 'thb_add_class_callback', $html );
	
	return $html;
}

add_filter( 'the_category', 'thb_add_category_slug', 99, 1 );

/* Post Categories Array */
function thb_blogCategories(){
	$blog_categories = get_categories();
	$out = array();
	foreach($blog_categories as $category) {
		$out[$category->name] = $category->cat_ID;
	}
	return $out;
}

/* First letter of Content */
function thb_FirstLetter() {
	$content = get_the_excerpt();
	return mb_substr($content,0,1, "utf-8");
}

/* Human time */
function thb_human_time_diff_enhanced( $duration = 60 ) {

	$post_time = get_the_time('U');
	$human_time = '';

	$time_now = date('U');

	// use human time if less that $duration days ago (60 days by default)
	// 60 seconds * 60 minutes * 24 hours * $duration days
	if ( $post_time > $time_now - ( 60 * 60 * 24 * $duration ) ) {
		$human_time = sprintf( __( '%s ago', 'thevoux'), human_time_diff( $post_time, current_time( 'timestamp' ) ) );
	} else {
		$human_time = get_the_date();
	}
	if (ot_get_option('relative_dates', 'on') == 'off') {
		return get_the_date();
	} else {
		return $human_time;
	}
}
// DNS Prefetching
function thb_dns_prefetch() {
	echo '<meta http-equiv="x-dns-prefetch-control" content="on">
	<link rel="dns-prefetch" href="//fonts.googleapis.com" />
	<link rel="dns-prefetch" href="//fonts.gstatic.com" />
	<link rel="dns-prefetch" href="//0.gravatar.com/" />
	<link rel="dns-prefetch" href="//2.gravatar.com/" />
	<link rel="dns-prefetch" href="//1.gravatar.com/" />';
}
add_action('wp_head', 'thb_dns_prefetch', 0);

// Redirect
function thb_disable_redirect_canonical($redirect_url) {
	if (is_singular() && is_page()) { $redirect_url = false; }
	return $redirect_url;
}
add_filter('redirect_canonical','thb_disable_redirect_canonical');

/*--------------------------------------------------------------------*/                							
/*  ADD DASHBOARD LINK			                							
/*--------------------------------------------------------------------*/
function thb_admin_menu_new_items() {
    global $submenu;
    $submenu['index.php'][500] = array( 'Fuelthemes.net', 'manage_options' , 'http://fuelthemes.net/?ref=wp_sidebar' ); 
}
add_action( 'admin_menu' , 'thb_admin_menu_new_items' );


/*--------------------------------------------------------------------*/         							
/*  FOOTER TYPE EDIT									 					
/*--------------------------------------------------------------------*/
function thb_footer_admin () {  
  echo 'Thank you for choosing <a href="http://fuelthemes.net/?ref=wp_footer" target="blank">Fuel Themes</a>.';  
}
add_filter('admin_footer_text', 'thb_footer_admin'); 
?>