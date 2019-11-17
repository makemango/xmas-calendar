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





<section class='grid-1 full-list'>
  <div class='title'></div>
  <div class='day-1'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>1</div>
          <div class='back'> 
            <b><?php the_field('day_text_back_1', 'option'); ?></b>  
            <span><a href="" class='btn open-modal' data-modal="#modal1">Öffnen</a></span>
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
          <b><?php the_field('day_text_back_2', 'option'); ?></b>  
            <span><a href="#" class='btn open-modal' data-modal="#modal2">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_3', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal3">Öffnen</a></span>
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
            <b><?php the_field('day_text_back_4', 'option'); ?></b>  
            <span><a href="#" class='btn open-modal' data-modal="#modal4">Öffnen</a></span></div>
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
              <b><?php the_field('day_text_back_5', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal5">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_6', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal6">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_7', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal7">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_8', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal8">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_9', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal9">Öffnen</a></span>
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
          <b><?php the_field('day_text_back_10', 'option'); ?></b>  
            <span><a href="#" class='btn open-modal' data-modal="#modal10">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_11', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal11">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_12', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal12">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_13', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal13">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_14', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal14">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_15', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal15">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_16', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal16">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_17', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal17">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_18', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal18">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_19', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal19">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_20', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal20">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_21', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal21">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_22', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal22">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_23', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal23">Öffnen</a></span>
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
              <b><?php the_field('day_text_back_24', 'option'); ?></b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal24">Öffnen</a></span>
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

<?php
 
}
add_shortcode('xmas', 'xmas_calendar');
add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );

?>

<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5dcf528373dfd',
	'title' => 'XmasCalendar',
	'fields' => array(
		array(
			'key' => 'field_5dd15255efeb8',
			'label' => 'Banner',
			'name' => 'banner',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd155852b55c',
			'label' => 'Logo',
			'name' => 'logo',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd07bbf29f9f',
			'label' => 'Hintergrund Rückseiten',
			'name' => 'day_bg_back',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
		),
		array(
			'key' => 'field_5dd0748a3e6e4',
			'label' => 'Tag_1',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd074943e6e5',
			'label' => 'Hintergrund',
			'name' => 'day_bg_1',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd074c73e6e6',
			'label' => 'Text',
			'name' => 'day_text_back_1',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd074e03e6e7',
			'label' => 'Modal Text',
			'name' => 'modal_text_1',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd074f53e6e8',
			'label' => 'Button Link',
			'name' => 'modal_link_1',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15f9bfa5d8',
			'label' => 'Tag_2',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15c7efa577',
			'label' => 'Hintergrund',
			'name' => 'day_bg_2',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cc3fa592',
			'label' => 'Text',
			'name' => 'day_text_back_2',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15cf2fa5a9',
			'label' => 'Modal Text',
			'name' => 'modal_text_2',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d18fa5c0',
			'label' => 'Button Link',
			'name' => 'modal_link_2',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15f9dfa5d9',
			'label' => 'Tag_3',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15c95fa57c',
			'label' => 'Hintergrund',
			'name' => 'day_bg_3',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cc5fa593',
			'label' => 'Text',
			'name' => 'day_text_back_3',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15cf4fa5aa',
			'label' => 'Modal Text',
			'name' => 'modal_text_3',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d19fa5c1',
			'label' => 'Button Link',
			'name' => 'modal_link_3',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15f9efa5da',
			'label' => 'Tag_4',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15c98fa57d',
			'label' => 'Hintergrund',
			'name' => 'day_bg_4',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cc7fa594',
			'label' => 'Text',
			'name' => 'day_text_back_4',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15cf5fa5ab',
			'label' => 'Modal Text',
			'name' => 'modal_text_4',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d1afa5c2',
			'label' => 'Button Link',
			'name' => 'modal_link_4',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15f9ffa5db',
			'label' => 'Tag_5',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15c9afa57e',
			'label' => 'Hintergrund',
			'name' => 'day_bg_5',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cc8fa595',
			'label' => 'Text',
			'name' => 'day_text_back_5',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15cf7fa5ac',
			'label' => 'Modal Text',
			'name' => 'modal_text_5',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d1bfa5c3',
			'label' => 'Button Link',
			'name' => 'modal_link_5',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fa0fa5dc',
			'label' => 'Tag_6',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15c9bfa57f',
			'label' => 'Hintergrund',
			'name' => 'day_bg_6',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cccfa596',
			'label' => 'Text',
			'name' => 'day_text_back_6',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15cf9fa5ad',
			'label' => 'Modal Text',
			'name' => 'modal_text_6',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d1cfa5c4',
			'label' => 'Button Link',
			'name' => 'modal_link_6',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fa2fa5dd',
			'label' => 'Tag_7',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15c9dfa580',
			'label' => 'Hintergrund',
			'name' => 'day_bg_7',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15ccdfa597',
			'label' => 'Text',
			'name' => 'day_text_back_7',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15cfafa5ae',
			'label' => 'Modal Text',
			'name' => 'modal_text_7',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d1dfa5c5',
			'label' => 'Button Link',
			'name' => 'modal_link_7',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fa3fa5de',
			'label' => 'Tag_8',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15c9efa581',
			'label' => 'Hintergrund',
			'name' => 'day_bg_8',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15ccffa598',
			'label' => 'Text',
			'name' => 'day_text_back_8',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15cfdfa5af',
			'label' => 'Modal Text',
			'name' => 'modal_text_8',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d1ffa5c6',
			'label' => 'Button Link',
			'name' => 'modal_link_8',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fa4fa5df',
			'label' => 'Tag_9',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15ca1fa582',
			'label' => 'Hintergrund',
			'name' => 'day_bg_9',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cd0fa599',
			'label' => 'Text',
			'name' => 'day_text_back_9',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15cfffa5b0',
			'label' => 'Modal Text',
			'name' => 'modal_text_9',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d1ffa5c7',
			'label' => 'Button Link',
			'name' => 'modal_link_9',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fa5fa5e0',
			'label' => 'Tag_10',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15ca3fa583',
			'label' => 'Hintergrund',
			'name' => 'day_bg_10',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cd2fa59a',
			'label' => 'Text',
			'name' => 'day_text_back_10',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d00fa5b1',
			'label' => 'Modal Text',
			'name' => 'modal_text_10',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d21fa5c8',
			'label' => 'Button Link',
			'name' => 'modal_link_10',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fa6fa5e1',
			'label' => 'Tag_11',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15ca4fa584',
			'label' => 'Hintergrund',
			'name' => 'day_bg_11',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cd4fa59b',
			'label' => 'Text',
			'name' => 'day_text_back_11',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d02fa5b2',
			'label' => 'Modal Text',
			'name' => 'modal_text_11',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d22fa5c9',
			'label' => 'Button Link',
			'name' => 'modal_link_11',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fa7fa5e2',
			'label' => 'Tag_12',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15ca6fa585',
			'label' => 'Hintergrund',
			'name' => 'day_bg_12',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cd6fa59c',
			'label' => 'Text',
			'name' => 'day_text_back_12',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d04fa5b3',
			'label' => 'Modal Text',
			'name' => 'modal_text_12',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d23fa5ca',
			'label' => 'Button Link',
			'name' => 'modal_link_12',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fa9fa5e3',
			'label' => 'Tag_13',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15ca8fa586',
			'label' => 'Hintergrund',
			'name' => 'day_bg_13',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cd8fa59d',
			'label' => 'Text',
			'name' => 'day_text_back_13',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d05fa5b4',
			'label' => 'Modal Text',
			'name' => 'modal_text_13',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d24fa5cb',
			'label' => 'Button Link',
			'name' => 'modal_link_13',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15faafa5e4',
			'label' => 'Tag_14',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15ca9fa587',
			'label' => 'Hintergrund',
			'name' => 'day_bg_14',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cd9fa59e',
			'label' => 'Text',
			'name' => 'day_text_back_14',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d07fa5b5',
			'label' => 'Modal Text',
			'name' => 'modal_text_14',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d25fa5cc',
			'label' => 'Button Link',
			'name' => 'modal_link_14',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fabfa5e5',
			'label' => 'Tag_15',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15cadfa588',
			'label' => 'Hintergrund',
			'name' => 'day_bg_15',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cdbfa59f',
			'label' => 'Text',
			'name' => 'day_text_back_15',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d09fa5b6',
			'label' => 'Modal Text',
			'name' => 'modal_text_15',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d26fa5cd',
			'label' => 'Button Link',
			'name' => 'modal_link_15',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15facfa5e6',
			'label' => 'Tag_16',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15caffa589',
			'label' => 'Hintergrund',
			'name' => 'day_bg_16',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cddfa5a0',
			'label' => 'Text',
			'name' => 'day_text_back_16',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d0afa5b7',
			'label' => 'Modal Text',
			'name' => 'modal_text_16',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d27fa5ce',
			'label' => 'Button Link',
			'name' => 'modal_link_16',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fadfa5e7',
			'label' => 'Tag_17',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15cb0fa58a',
			'label' => 'Hintergrund',
			'name' => 'day_bg_17',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15ce0fa5a1',
			'label' => 'Text',
			'name' => 'day_text_back_17',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d0bfa5b8',
			'label' => 'Modal Text',
			'name' => 'modal_text_17',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d29fa5cf',
			'label' => 'Button Link',
			'name' => 'modal_link_17',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15faefa5e8',
			'label' => 'Tag_18',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15cb2fa58b',
			'label' => 'Hintergrund',
			'name' => 'day_bg_18',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15ce2fa5a2',
			'label' => 'Text',
			'name' => 'day_text_back_18',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d0cfa5b9',
			'label' => 'Modal Text',
			'name' => 'modal_text_18',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d2afa5d0',
			'label' => 'Button Link',
			'name' => 'modal_link_18',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15faffa5e9',
			'label' => 'Tag_19',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15cb3fa58c',
			'label' => 'Hintergrund',
			'name' => 'day_bg_19',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15ce3fa5a3',
			'label' => 'Text',
			'name' => 'day_text_back_19',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d0efa5ba',
			'label' => 'Modal Text',
			'name' => 'modal_text_19',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d2bfa5d1',
			'label' => 'Button Link',
			'name' => 'modal_link_19',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fb1fa5ea',
			'label' => 'Tag_20',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15cb5fa58d',
			'label' => 'Hintergrund',
			'name' => 'day_bg_20',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15ce5fa5a4',
			'label' => 'Text',
			'name' => 'day_text_back_20',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d10fa5bb',
			'label' => 'Modal Text',
			'name' => 'modal_text_20',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d2cfa5d2',
			'label' => 'Button Link',
			'name' => 'modal_link_20',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fb2fa5eb',
			'label' => 'Tag_21',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15cb8fa58e',
			'label' => 'Hintergrund',
			'name' => 'day_bg_21',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15ce6fa5a5',
			'label' => 'Text',
			'name' => 'day_text_back_21',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d11fa5bc',
			'label' => 'Modal Text',
			'name' => 'modal_text_21',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d2dfa5d3',
			'label' => 'Button Link',
			'name' => 'modal_link_21',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fb3fa5ec',
			'label' => 'Tag_22',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15cb9fa58f',
			'label' => 'Hintergrund',
			'name' => 'day_bg_22',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15ce8fa5a6',
			'label' => 'Text',
			'name' => 'day_text_back_22',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d12fa5bd',
			'label' => 'Modal Text',
			'name' => 'modal_text_22',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d2efa5d4',
			'label' => 'Button Link',
			'name' => 'modal_link_22',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fb4fa5ed',
			'label' => 'Tag_23',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15cbcfa590',
			'label' => 'Hintergrund',
			'name' => 'day_bg_23',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cebfa5a7',
			'label' => 'Text',
			'name' => 'day_text_back_23',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d13fa5be',
			'label' => 'Modal Text',
			'name' => 'modal_text_23',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d2ffa5d5',
			'label' => 'Button Link',
			'name' => 'modal_link_23',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15fb5fa5ee',
			'label' => 'Tag_24',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5dd15cbffa591',
			'label' => 'Hintergrund',
			'name' => 'day_bg_24',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5dd15cedfa5a8',
			'label' => 'Text',
			'name' => 'day_text_back_24',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dd15d15fa5bf',
			'label' => 'Modal Text',
			'name' => 'modal_text_24',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_5dd15d31fa5d6',
			'label' => 'Button Link',
			'name' => 'modal_link_24',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'xmas-calendar',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

?>