<?php
/*
Plugin Name:	Xmas Calendar 
Plugin URI:		
Description:	
Version:		0.1
Author:			MakeMango
Author URI:		https://mangos.bz
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt

*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_enqueue_scripts', 'custom_enqueue_files' );

// require 'plugin-update-checker/plugin-update-checker.php';
//$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	//'https://github.com/makemango/xmas-calendar/',
	//__FILE__,
	//'xmas-calendar'
// );

//Optional: If you're using a private repository, specify the access token like this:
// $myUpdateChecker->setAuthentication('');

//Optional: Set the branch that contains the stable release.
// $myUpdateChecker->setBranch('master');


/**
 * Loads <list assets here>.
 */
function custom_enqueue_files() {
	// if this is not the front page, abort.
	// if ( ! is_front_page() ) {
	// 	return;
	// }

	// loads a CSS file in the head.
	// wp_enqueue_style( 'highlightjs-css', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );

	/**
	 * loads JS files in the footer.
	 */
	 wp_enqueue_script( 'highlightjs', plugin_dir_url( __FILE__ ) . 'assets/js/script.js', '', '9.9.0', true );

	// wp_enqueue_script( 'highlightjs-init', plugin_dir_url( __FILE__ ) . 'assets/js/highlight-init.js', '', '1.0.0', true );
}

if( function_exists('acf_add_options_page') ) {
	
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'XMAS Calendar',
		'menu_title' 	=> 'XMAS Calendar',
		'menu_slug' 	=> 'xmas-calendar',
		'capability' 	=> 'edit_posts',
		'redirect' 		=> false
  ));
}

// initiate custom fields on option pages
include(plugin_dir_path(__FILE__) . 'includes/initialize-custom-fields.php');

// submenus

	//	acf_add_options_sub_page(array(
//		'page_title' 	=> 'Header Settings',
//		'menu_title' 	=> 'Header',
//		'parent_slug' 	=> $parent['menu_slug'],
//	));
//
//	acf_add_options_sub_page(array(
//		'page_title' 	=> 'Edit Styles',
//		'menu_title'	=> 'Colors/Fonts',
//		'parent_slug' 	=> $parent['menu_slug'],
//	));
//	acf_add_options_sub_page(array(
//		'page_title' 	=> 'Footer Settings',
//		'menu_title' 	=> 'Footer',
//		'parent_slug' 	=> $parent['menu_slug'],
//	));

	







function xmas_calendar()
{
 ?>



<style>


body {
  background: #f4cdc6; /* Old browsers */
  background: -moz-linear-gradient(top, #f4cdc6 0%, #f6d9d4 50%, #f6d9d4 52%, #fefefd 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(top, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to bottom, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f4cdc6', endColorstr='#fefefd',GradientType=0 ); /* IE6-9 */
  background-repeat: none;
  background-attachment: fixed;
  align-content: center;
  font-family: "Montserrat";
  min-height: 100vh;
  justify-content: center;
  align-items: center;
}


* {
  box-sizing: border-box;
}


.btn {
  padding: 5px 5px;
  display: inline-flex;
  background: #000;
  color: #f2cbc2;
  text-decoration: none;
  transition: 0.35s ease-in-out;
  font-weight: 700;
}
.btn:hover {
  background: #f2cbc2;
  color: #000;
}

.overlay {
  width: 100%;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 40px;
  position: fixed;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.75);
  opacity: 0;
  pointer-events: none;
  transition: 0.35s ease-in-out;
  max-height: 100vh;
  overflow-y: auto;
}

@media only screen and (max-width: 600px) {
  .overlay {
    padding: 10px;
  }
  .overlay .modal {
    padding: 10px;
  }
}
.overlay.open {
  opacity: 1;
  pointer-events: inherit;
}
.overlay .modal {
    background: #f4cdc6; /* Old browsers */
  background: -moz-linear-gradient(top, #f4cdc6 0%, #f6d9d4 50%, #f6d9d4 52%, #fefefd 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(top, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to bottom, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f4cdc6', endColorstr='#fefefd',GradientType=0 ); /* IE6-9 */
  text-align: center;
  padding: 40px 80px;
  box-shadow: 0px 1px 10px rgba(17, 0, 0, 0.075);
  opacity: 0;
  pointer-events: none;
  transition: 0.35s ease-in-out;
  max-height: 100vh;
  overflow-y: auto;
}
.overlay .modal.open {
  opacity: 1;
  pointer-events: inherit;
  background: #f4cdc6; /* Old browsers */
  background: -moz-linear-gradient(top, #f4cdc6 0%, #f6d9d4 50%, #f6d9d4 52%, #fefefd 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(top, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to bottom, #f4cdc6 0%,#f6d9d4 50%,#f6d9d4 52%,#fefefd 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f4cdc6', endColorstr='#fefefd',GradientType=0 ); /* IE6-9 */
}
.overlay .modal.open .content {
  transform: translate(0, 0px);
  opacity: 1;
}
.overlay .modal .content {
  transform: translate(0, -10px);
  opacity: 0;
  transition: 0.35s ease-in-out;
  padding: 10px;
  background: none;
 
}
.overlay .modal .title {
  margin-top: 1;
  background: #fff;
  color: #fff;
}

@media only screen and (max-width: 600px) {
  .overlay {
    padding: 10px;
  }
  .overlay .modal {
    padding: 10px;
  }
  .overlay .modal.open {
    padding: 10px;
  }
  .overlay .modal.open.content {
    padding: 10px;
  }
}


/* title graphic */
.title {  
  display: flex;
  align-items: center;
  justify-content: center; 
}

.title img {
  width: 90%;
  height: auto;
}

/* mobile first grid layout */

.grid-1 {
  display: grid;
  /*width: 100%; */
  /* max-width: 1200px; */
  width: 100vw;
  height: 100vh;
  margin: auto;
  
  
  grid-template-columns: 2fr 1fr 1fr;
  grid-template-rows: auto;
  grid-gap: 12px;
  

  grid-template-areas:  "d23    d20     d12"
                        "d2     d14     d4"
                        "d5     d22     d16"
                        "d7     d7      d9"
                        "d1     d1      d9"
                        "d10    d11     d18"
                        "d13    d3      d15"
                        "d6     d24     d24"
                        "d19    d24     d24"
                        "d8    d17     d21";
   
 }

 /* media query */
@media only screen and (min-width: 900px) {
   
  .grid-1 {
    width: 80vw;
    height: 100vh;
    padding: auto;
    margin: auto;
    
    grid-template-columns: repeat(8, 1fr);
    grid-template-areas:    "d4      t       t       t      t t d7      d7"
                            "d2      t       t       t      t  t d11    d12"
                            "d6     t       t       t      t t d9       d9"
                            "d6     d1      d24     d24     d24      d20 d20 d8"
                            "d17    d18     d24     d24     d24  d5    d22 d22"
                            "d23     d23     d24     d24     d24 d5   d15 d19"
                            "d23     d23     d16     d16     d21 d5   d15 d19"
                            "d3     d3     d16     d16     d13 d10   d14 d14";
  }

 
   
}

section div {
   background: none; 
  padding: 0px;
}

/* individual items */
  .title {
    grid-area: t;
    background: url(<?php the_field('banner', 'option'); ?>);
    background-size: cover;

  }
  .day-1 {
    grid-area: d1;
    background: url(<?php the_field('day_bg_1', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-1 .back {
    grid-area: d1;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-2 {
    grid-area: d2;
    background: url(<?php the_field('day_bg_2', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-2 .back {
    grid-area: d2;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-3 {
    grid-area: d3;
    background: url(<?php the_field('day_bg_3', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-3 .back {
    grid-area: d3;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-4 {
    grid-area: d4;
    background: url(<?php the_field('day_bg_4', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-4 .back {
    grid-area: d4;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-5 {
    grid-area: d5;
    background: url(<?php the_field('day_bg_5', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-5 .back {
    grid-area: d5;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-6 {
    grid-area: d6;
    background: url(<?php the_field('day_bg_6', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-6 .back {
    grid-area: d6;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-7 {
    grid-area: d7;
    background: url(<?php the_field('day_bg_7', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-7 .back {
    grid-area: d7;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-8 {
    grid-area: d8;
    background: url(<?php the_field('day_bg_8', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-8 .back {
    grid-area: d8;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-9 {
    grid-area: d9;
    background: url(<?php the_field('day_bg_9', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-9 .back {
    grid-area: d9;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-10 {
    grid-area: d10;
    background: url(<?php the_field('day_bg_10', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-10 .back {
    grid-area: d10;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-11 {
    grid-area: d11;
    background: url(<?php the_field('day_bg_11', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-11 .back {
    grid-area: d11;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-12 {
    grid-area: d12;
    background: url(<?php the_field('day_bg_12', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-12 .back {
    grid-area: d12;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-13 {
    grid-area: d13;
    background: url(<?php the_field('day_bg_13', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-13 .back {
    grid-area: d13;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-14 {
    grid-area: d14;
    background: url(<?php the_field('day_bg_14', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-14 .back {
    grid-area: d14;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-15 {
    grid-area: d15;
    background: url(<?php the_field('day_bg_15', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-15 .back {
    grid-area: d15;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-16 {
    grid-area: d16;
    background: url(<?php the_field('day_bg_16', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-16 .back {
    grid-area: d16;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-17 {
    grid-area: d17;
    background: url(<?php the_field('day_bg_17', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-17 .back {
    grid-area: d17;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-18 {
    grid-area: d18;
    background: url(<?php the_field('day_bg_18', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-18 .back {
    grid-area: d18;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-19 {
    grid-area: d19;
    background: url(<?php the_field('day_bg_19', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-19 .back {
    grid-area: d19;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-20 {
    grid-area: d20;
    background: url(<?php the_field('day_bg_20', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-20 .back {
    grid-area: d20;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-21 {
    grid-area: d21;
    background: url(<?php the_field('day_bg_21', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-21 .back {
    grid-area: d21;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-22 {
    grid-area: d22;
    background: url(<?php the_field('day_bg_22', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-22 .back {
    grid-area: d22;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-23 {
    grid-area: d23;
    background: url(<?php the_field('day_bg_23', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-23 .back {
    grid-area: d23;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }
  .day-24 {
    grid-area: d24;
    background: url(<?php the_field('day_bg_24', 'option'); ?>);
    background-size: cover;
    background-repeat: none;
  }
  .day-24 .back {
    grid-area: d24;
    background: <?php the_field('day_bg_back', 'option'); ?>;
    background-size: cover;
    background-repeat: none;
    display: inline-grid;
    justify-items: center;
    padding: 15% 5% 10% 5%;
  }

/* door styles */
 
.grid-1 input {
  display: none;
}
 
label {
  perspective: 1000px;
  transform-style: preserve-3d;
  cursor: pointer;
 
  display: flex;
  min-height: 100%;
  width: 100%;
  height: 120px;
}
 
.door {
  width: 100%;
  transform-style: preserve-3d;
  transition: all 3000ms;
  border: 0px dashed transparent;
  min-height: 100%;
}


.door div {
   position: absolute;
   height: 100%;
   width: 100%;
   -webkit-perspective: 0;
   -webkit-backface-visibility: hidden;
   -webkit-transform: translate3d(0,0,0);
   visibility:visible;
   backface-visibility: hidden;
   backface-visibility: hidden;
   display: inline-grid;
   align-items: center;
   justify-content: center; 
 }
 
 .door .front {
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-size: 20px;
  font-weight: 800;
  text-shadow: #000000;
  }

 .door .back {
   background-color: none;
   transform: rotateY(180deg);
   text-align: center;
   visibility:visible;
   backface-visibility: hidden;
 }

 label:hover .door {
  border-color: #ffffff;

}
 
:checked + .door {
  transform: rotateY(180deg);
}


</style>

<?php
date_default_timezone_set("Europe/Berlin");
$today = strtotime(date('Y-m-d'));
$month = get_field('x_month', 'option');
  
  $day1 = strtotime("2019-{$month}-01");
  $day2 = strtotime("2019-{$month}-02");
  $day3 = strtotime("2019-{$month}-03");
  $day4 = strtotime("2019-{$month}-04");
  $day5 = strtotime("2019-{$month}-05");
  $day6 = strtotime("2019-{$month}-06");
  $day7 = strtotime("2019-{$month}-07");
  $day8 = strtotime("2019-{$month}-08");
  $day9 = strtotime("2019-{$month}-09");
  $day10 = strtotime("2019-{$month}-10");
  $day11 = strtotime("2019-{$month}-11");
  $day12 = strtotime("2019-{$month}-12");
  $day13 = strtotime("2019-{$month}-13");
  $day14 = strtotime("2019-{$month}-14");
  $day15 = strtotime("2019-{$month}-15");
  $day16 = strtotime("2019-{$month}-16");
  $day17 = strtotime("2019-{$month}-17");
  $day18 = strtotime("2019-{$month}-18");
  $day19 = strtotime("2019-{$month}-19");
  $day20 = strtotime("2019-{$month}-20");
  $day21 = strtotime("2019-{$month}-21");
  $day22 = strtotime("2019-{$month}-22");
  $day23 = strtotime("2019-{$month}-23");
  $day24 = strtotime("2019-{$month}-24");
?>

<section class='grid-1 full-list'>
  <div class='title'></div>
 
  

  <div class='day-1'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>1</div>
          <div class='back'>     
          <?php if($today == $day1): ?>
            <b><?php the_field('day_text_back_1', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal1">Öffnen</a></span>
          <?php elseif($today < $day1): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
    <div class='day-2'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>2</div>
          <div class='back'>
          <?php if($today == $day2): ?>
            <b><?php the_field('day_text_back_2', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal2">Öffnen</a></span>
          <?php elseif($today < $day2): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-3'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>3</div>
          <div class='back'>
          <?php if($today == $day3): ?>
            <b><?php the_field('day_text_back_3', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal3">Öffnen</a></span>
          <?php elseif($today < $day3): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-4'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>4</div>
          <div class='back'>
          <?php if($today == $day4): ?>
            <b><?php the_field('day_text_back_4', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal4">Öffnen</a></span>
          <?php elseif($today < $day4): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-5'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>5</div>
          <div class='back'>
          <?php if($today == $day5): ?>
            <b><?php the_field('day_text_back_5', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal5">Öffnen</a></span>
          <?php elseif($today < $day5): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-6'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>6</div>
          <div class='back'>
          <?php if($today == $day6): ?>
            <b><?php the_field('day_text_back_6', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal6">Öffnen</a></span>
          <?php elseif($today < $day6): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-7'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>7</div>
          <div class='back'>
          <?php if($today == $day7): ?>
            <b><?php the_field('day_text_back_7', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal7">Öffnen</a></span>
          <?php elseif($today < $day7): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-8'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>8</div>
          <div class='back'>
          <?php if($today == $day8): ?>
            <b><?php the_field('day_text_back_8', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal8">Öffnen</a></span>
          <?php elseif($today < $day8): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-9'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>9</div>
          <div class='back'>
          <?php if($today == $day9): ?>
            <b><?php the_field('day_text_back_9', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal9">Öffnen</a></span>
          <?php elseif($today < $day9): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-10'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>10</div>
          <div class='back'>
          <?php if($today == $day10): ?>
            <b><?php the_field('day_text_back_10', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal10">Öffnen</a></span>
          <?php elseif($today < $day10): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>                  
      </input>
    </label>
  </div>
  <div class='day-11'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>11</div>
          <div class='back'>
          <?php if($today == $day11): ?>
            <b><?php the_field('day_text_back_11', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal11">Öffnen</a></span>
          <?php elseif($today < $day11): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-12'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>12</div>
          <div class='back'>
          <?php if($today == $day12): ?>
            <b><?php the_field('day_text_back_12', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal12">Öffnen</a></span>
          <?php elseif($today < $day12): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-13'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>13</div>
          <div class='back'>
          <?php if($today == $day13): ?>
            <b><?php the_field('day_text_back_13', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal13">Öffnen</a></span>
          <?php elseif($today < $day13): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-14'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>14</div>
          <div class='back'>
          <?php if($today == $day14): ?>
            <b><?php the_field('day_text_back_14', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal14">Öffnen</a></span>
          <?php elseif($today < $day14): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-15'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>15</div>
          <div class='back'>
          <?php if($today == $day15): ?>
            <b><?php the_field('day_text_back_15', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal15">Öffnen</a></span>
          <?php elseif($today < $day15): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-16'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>16</div>
          <div class='back'>
          <?php if($today == $day16): ?>
            <b><?php the_field('day_text_back_16', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal16">Öffnen</a></span>
          <?php elseif($today < $day16): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-17'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>17</div>
          <div class='back'>
          <?php if($today == $day17): ?>
            <b><?php the_field('day_text_back_17', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal17">Öffnen</a></span>
          <?php elseif($today < $day17): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-18'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>18</div>
          <div class='back'>
          <?php if($today == $day18): ?>
            <b><?php the_field('day_text_back_18', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal18">Öffnen</a></span>
          <?php elseif($today < $day18): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-19'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>19</div>
          <div class='back'>
          <?php if($today == $day19): ?>
            <b><?php the_field('day_text_back_19', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal19">Öffnen</a></span>
          <?php elseif($today < $day19): ?>   
            <b>Komm bald wieder!</b>
          <?php else: ?>         
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-20'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>20</div>
          <div class='back'>
          <?php if($today == $day20): ?>
            <b><?php the_field('day_text_back_20', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal20">Öffnen</a></span>
          <?php elseif($today < $day20): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-21'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>21</div>
          <div class='back'>
          <?php if($today == $day21): ?>
            <b><?php the_field('day_text_back_21', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal21">Öffnen</a></span>
          <?php elseif($today < $day21): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-22'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>22</div>
          <div class='back'>
          <?php if($today == $day22): ?>
            <b><?php the_field('day_text_back_22', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal22">Öffnen</a></span>
          <?php elseif($today < $day22): ?> 
            <b>Komm bald wieder!</b>          <?php else: ?> 

            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-23'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>23</div>
          <div class='back'>
          <?php if($today == $day23): ?>
            <b><?php the_field('day_text_back_23', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal23">Öffnen</a></span>
          <?php elseif($today < $day23): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
  <div class='day-24'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>24</div>
          <div class='back'>
          <?php if($today == $day24): ?>
            <b><?php the_field('day_text_back_24', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal24">Öffnen</a></span>
          <?php elseif($today < $day24): ?>
            <b>Komm bald wieder!</b>
          <?php else: ?> 
            <b>Leider schon vorbei!</b> 
          <?php endif; ?>
          </div>
        </div>
      </input>
    </label>
  </div>
</section>

<section>
  <div class='modal' id='modal1'>
      <div class='content'>
        <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
        <p>
        <span><?php the_field('modal_text_1','option');?></span>
        </p>
        <a class='btn' data-modal="#modal1" href="<?php the_field('modal_link_1','option');?>">Einlösen</a>
      </div>	
    </div>
    <div class='modal' id='modal2'>
        <div class='content'>
          <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
          <p>
          <span><?php the_field('modal_text_2','option');?></span>	
          </p>
          <a class='btn' data-modal="#modal2" href="<?php the_field('modal_link_2','option');?>">Einlösen</a>
        </div>	
      </div>
      <div class='modal' id='modal3'>
          <div class='content'>
            <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
            <p>
            <span><?php the_field('modal_text_3','option');?></span>	
            </p>
            <a class='btn' data-modal="#modal3" href="<?php the_field('modal_link_3','option');?>">Einlösen</a>
          </div>	
        </div>
        <div class='modal' id='modal4'>
            <div class='content'>
              <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
              <p>
              <span><?php the_field('modal_text_4','option');?></span>
              </p>
              <a class='btn' data-modal="#modal4" href="<?php the_field('modal_link_4','option');?>">Einlösen</a>
            </div>	
          </div>
          <div class='modal' id='modal5'>
              <div class='content'>
                <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                <p>
                <span><?php the_field('modal_text_5','option');?></span>	
                </p>
                <a class='btn' data-modal="#modal5" href="<?php the_field('modal_link_5','option');?>">Einlösen</a>
              </div>	
            </div>
          <div class='modal' id='modal6'>
                <div class='content'>
                  <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                  <p>
                  <span><?php the_field('modal_text_6','option');?></span>	
                  </p>
                  <a class='btn' data-modal="#modal6" href="<?php the_field('modal_link_6','option');?>">Einlösen</a>
                </div>	
              </div>
          <div class='modal' id='modal7'>
                  <div class='content'>
                    <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                    <p>
                    <span><?php the_field('modal_text_7','option');?></span>	
                    </p>
                    <a class='btn' data-modal="#modal7" href="<?php the_field('modal_link_7','option');?>">Einlösen</a>
                  </div>	
                </div>
          <div class='modal' id='modal8'>
                    <div class='content'>
                      <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                      <p>
                      <span><?php the_field('modal_text_8','option');?></span>	
                      </p>
                      <a class='btn' data-modal="#modal8" href="<?php the_field('modal_link_8','option');?>">Einlösen</a>
                    </div>	
                  </div>
          <div class='modal' id='modal9'>
                      <div class='content'>
                        <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                        <p>
                        <span><?php the_field('modal_text_9','option');?></span>	
                        </p>
                        <a class='btn' data-modal="#modal9" href="<?php the_field('modal_link_9','option');?>">Einlösen</a>
                      </div>	
                    </div>
          <div class='modal' id='modal10'>
                        <div class='content'>
                          <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                          <p>
                          <span><?php the_field('modal_text_10','option');?></span>	
                          </p>
                          <a class='btn' data-modal="#modal10" href="<?php the_field('modal_link_10','option');?>">Einlösen</a>
                        </div>	
                      </div>
          <div class='modal' id='modal11'>
                          <div class='content'>
                            <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                            <p>
                            <span><?php the_field('modal_text_11','option');?></span>	
                            </p>
                            <a class='btn' data-modal="#modal11" href="<?php the_field('modal_link_11','option');?>">Einlösen</a>
                          </div>	
                        </div>
          <div class='modal' id='modal12'>
                            <div class='content'>
                              <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                              <p>
                              <span><?php the_field('modal_text_12','option');?></span>	
                              </p>
                              <a class='btn' data-modal="#modal12" href="<?php the_field('modal_link_12','option');?>">Einlösen</a>
                            </div>	
                          </div>
          <div class='modal' id='modal13'>
                           <div class='content'>
                                <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                <p>
                                <span><?php the_field('modal_text_13','option');?></span>	
                                </p>
                                <a class='btn' data-modal="#modal13" href="<?php the_field('modal_link_13','option');?>">Einlösen</a>
                              </div>	
                            </div>
          <div class='modal' id='modal14'>
                               <div class='content'>
                                  <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                  <p>
                                  <span><?php the_field('modal_text_14','option');?></span>	
                                  </p>
                                  <a class='btn' data-modal="#modal14" href="<?php the_field('modal_link_14','option');?>">Einlösen</a>
                                </div>	
                              </div>
          <div class='modal' id='modal15'>
                                  <div class='content'>
                                    <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                    <p>
                                    <span><?php the_field('modal_text_15','option');?></span>	
                                    </p>
                                    <a class='btn' data-modal="#modal15" href="<?php the_field('modal_link_15','option');?>">Einlösen</a>
                                  </div>	
                                </div>
          <div class='modal' id='modal16'>
                                    <div class='content'>
                                      <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                      <p>
                                      <span><?php the_field('modal_text_16','option');?></span>	
                                      </p>
                                      <a class='btn' data-modal="#modal16" href="<?php the_field('modal_link_16','option');?>">Einlösen</a>
                                    </div>	
                                  </div>
          <div class='modal' id='modal17'>
                                      <div class='content'>
                                        <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                        <p>
                                        <span><?php the_field('modal_text_17','option');?></span>	
                                        </p>
                                        <a class='btn' data-modal="#modal17" href="<?php the_field('modal_link_17','option');?>">Einlösen</a>
                                      </div>	
                                    </div>
          <div class='modal' id='modal18'>
                                        <div class='content'>
                                          <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                          <p>
                                          <span><?php the_field('modal_text_18','option');?></span>	
                                          </p>
                                          <a class='btn' data-modal="#modal18" href="<?php the_field('modal_link_18','option');?>">Einlösen</a>
                                        </div>	
                                      </div>
          <div class='modal' id='modal19'>
                                          <div class='content'>
                                            <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                            <p>
                                            <span><?php the_field('modal_text_19','option');?></span>	
                                            </p>
                                            <a class='btn' data-modal="#modal19" href="<?php the_field('modal_link_19','option');?>">Einlösen</a>
                                          </div>	
                                        </div>
          <div class='modal' id='modal20'>
                                            <div class='content'>
                                              <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                              <p>
                                              <span><?php the_field('modal_text_20','option');?></span>	
                                              </p>
                                              <a class='btn' data-modal="#modal20" href="<?php the_field('modal_link_20','option');?>">Einlösen</a>
                                            </div>	
                                          </div>
          <div class='modal' id='modal21'>
                                              <div class='content'>
                                                <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                                <p>
                                                <span><?php the_field('modal_text_21','option');?></span>	
                                                </p>
                                                <a class='btn' data-modal="#modal21" href="<?php the_field('modal_link_21','option');?>">Einlösen</a>
                                              </div>	
                                            </div>
          <div class='modal' id='modal22'>
            <div class='content'>
              <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                <p>
                <span><?php the_field('modal_text_22','option');?></span>	
                     </p>
                      <a class='btn' data-modal="#modal22" href="<?php the_field('modal_link_22','option');?>">Einlösen</a>
                      </div>	
                      </div>
          <div class='modal' id='modal23'>
                                                  <div class='content'>
                                                    <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                                    <p>
                                                    <span><?php the_field('modal_text_23','option');?></span>	
                                                    </p>
                                                    <a class='btn' data-modal="#modal23" href="<?php the_field('modal_link_23','option');?>">Einlösen</a>
                                                  </div>	
                                                </div>
          <div class='modal' id='modal24'>
                                                    <div class='content'>
                                                      <h1 class='title_modal'><img src="<?php the_field('logo', 'option'); ?>" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                                      <p>
                                                      <span><?php the_field('modal_text_24','option');?></span>	
                                                      </p>
                                                      <a class='btn' data-modal="#modal24" href="<?php the_field('modal_link_24','option');?>">Einlösen</a>
                                                    </div>	
                                                  </div>


                                                  

</section>

<div style="background:red;">
<?php

echo(date_format($day1,"Y/m/d")); ?>
</div>
<?php
}

add_shortcode('xmas', 'xmas_calendar');
add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );

?>

