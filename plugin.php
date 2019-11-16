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

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/makemango/custom-mangos',
	__FILE__,
	'custom-mangos'
);

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('393c629340ea5ad57618a80164be637fae3bc451');

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('real-estate-base-template');



/**
 * Loads <list assets here>.
 */
function custom_enqueue_files() {
	// if this is not the front page, abort.
	// if ( ! is_front_page() ) {
	// 	return;
	// }

	// loads a CSS file in the head.
	 wp_enqueue_style( 'highlightjs-css', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );

	/**
	 * loads JS files in the footer.
	 */
	 wp_enqueue_script( 'highlighjs', plugin_dir_url( __FILE__ ) . 'assets/js/script.js', '', '9.9.0', true );

	// wp_enqueue_script( 'highlightjs-init', plugin_dir_url( __FILE__ ) . 'assets/js/highlight-init.js', '', '1.0.0', true );
}

if( function_exists('acf_add_options_page') ) {
	
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Mango Setup',
		'menu_title' 	=> 'Mango Setup',
		'menu_slug' 	=> 'mango-panel',
		'capability' 	=> 'edit_posts',
		'redirect' 		=> false
	));

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

	
}


add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );

function xmas_calendar()
{
?>

<section class='grid-1 full-list'>
  <div class='title'></div>
  <div class='day-1'>
    <label>
      <input type='checkbox'>
        <div class='door'>
          <div class='front'>1</div>
          <div class='back'> 
            <b>5% auf alle Produkte</b>  
            <span><a href="#" class='btn open-modal' data-modal="#modal1">Öffnen</a></span>
                </div>
              </div>
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
          <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
            <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal6">Öffnen</a></span>
          </div>
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
          <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
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
              <b>20% auf alle Produkte</b>  
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
              <b>5% auf alle Produkte</b>  
              <span><a href="#" class='btn open-modal' data-modal="#modal24">Öffnen</a></span>
          </div>
        </div>
      </input>
    </label>
  </div>
<section>

<section>
  <div class='modal' id='modal1'>
      <div class='content'>
        <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
        <p>
            Heute gibt es 5% auf alle Artikel.<br> 
            Klicke auf den Button um den Gutschein anzuwenden!	
        </p>
        <a class='btn close-modal' data-modal="#modal1" href="#">Einlösen</a>
      </div>	
    </div>
    <div class='modal' id='modal2'>
        <div class='content'>
          <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
          <p>
              Heute gibt es 5% auf alle Artikel.<br> 
              Klicke auf den Button um den Gutschein anzuwenden!	
          </p>
          <a class='btn close-modal' data-modal="#modal2" href="#">Einlösen</a>
        </div>	
      </div>
      <div class='modal' id='modal3'>
          <div class='content'>
            <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
            <p>
                Heute gibt es 5% auf alle Artikel.<br> 
                Klicke auf den Button um den Gutschein anzuwenden!	
            </p>
            <a class='btn close-modal' data-modal="#modal3" href="#">Einlösen</a>
          </div>	
        </div>
        <div class='modal' id='modal4'>
            <div class='content'>
              <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
              <p>
                  Heute gibt es 5% auf alle Artikel.<br> 
                  Klicke auf den Button um den Gutschein anzuwenden!	
              </p>
              <a class='btn close-modal' data-modal="#modal4" href="#">Einlösen</a>
            </div>	
          </div>
          <div class='modal' id='modal5'>
              <div class='content'>
                <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                <p>
                    Heute gibt es 10% auf alle Artikel.<br> 
                    Klicke auf den Button um den Gutschein anzuwenden!	
                </p>
                <a class='btn close-modal' data-modal="#modal5" href="#">Einlösen</a>
              </div>	
            </div>
          <div class='modal' id='modal6'>
                <div class='content'>
                  <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                  <p>
                      Heute gibt es 5% auf alle Artikel.<br> 
                      Klicke auf den Button um den Gutschein anzuwenden!	
                  </p>
                  <a class='btn close-modal' data-modal="#modal6" href="#">Einlösen</a>
                </div>	
              </div>
          <div class='modal' id='modal7'>
                  <div class='content'>
                    <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                    <p>
                        Heute gibt es 5% auf alle Artikel.<br> 
                        Klicke auf den Button um den Gutschein anzuwenden!	
                    </p>
                    <a class='btn close-modal' data-modal="#modal7" href="#">Einlösen</a>
                  </div>	
                </div>
          <div class='modal' id='modal8'>
                    <div class='content'>
                      <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                      <p>
                          Heute gibt es 5% auf alle Artikel.<br> 
                          Klicke auf den Button um den Gutschein anzuwenden!	
                      </p>
                      <a class='btn close-modal' data-modal="#modal8" href="#">Einlösen</a>
                    </div>	
                  </div>
          <div class='modal' id='modal9'>
                      <div class='content'>
                        <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                        <p>
                            Heute gibt es 5% auf alle Artikel.<br> 
                            Klicke auf den Button um den Gutschein anzuwenden!	
                        </p>
                        <a class='btn close-modal' data-modal="#modal9" href="#">Einlösen</a>
                      </div>	
                    </div>
          <div class='modal' id='modal10'>
                        <div class='content'>
                          <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                          <p>
                              Heute gibt es 5% auf alle Artikel.<br> 
                              Klicke auf den Button um den Gutschein anzuwenden!	
                          </p>
                          <a class='btn close-modal' data-modal="#modal10" href="#">Einlösen</a>
                        </div>	
                      </div>
          <div class='modal' id='modal11'>
                          <div class='content'>
                            <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                            <p>
                                Heute gibt es 5% auf alle Artikel.<br> 
                                Klicke auf den Button um den Gutschein anzuwenden!	
                            </p>
                            <a class='btn close-modal' data-modal="#modal11" href="#">Einlösen</a>
                          </div>	
                        </div>
          <div class='modal' id='modal12'>
                            <div class='content'>
                              <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                              <p>
                                  Heute gibt es 5% auf alle Artikel.<br> 
                                  Klicke auf den Button um den Gutschein anzuwenden!	
                              </p>
                              <a class='btn close-modal' data-modal="#modal12" href="#">Einlösen</a>
                            </div>	
                          </div>
          <div class='modal' id='modal13'>
                           <div class='content'>
                                <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                <p>
                                    Heute gibt es 5% auf alle Artikel.<br> 
                                    Klicke auf den Button um den Gutschein anzuwenden!	
                                </p>
                                <a class='btn close-modal' data-modal="#modal13" href="#">Einlösen</a>
                              </div>	
                            </div>
          <div class='modal' id='modal14'>
                               <div class='content'>
                                  <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                  <p>
                                      Heute gibt es 5% auf alle Artikel.<br> 
                                      Klicke auf den Button um den Gutschein anzuwenden!	
                                  </p>
                                  <a class='btn close-modal' data-modal="#modal14" href="#">Einlösen</a>
                                </div>	
                              </div>
          <div class='modal' id='modal15'>
                                  <div class='content'>
                                    <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                    <p>
                                        Heute gibt es 5% auf alle Artikel.<br> 
                                        Klicke auf den Button um den Gutschein anzuwenden!	
                                    </p>
                                    <a class='btn close-modal' data-modal="#modal15" href="#">Einlösen</a>
                                  </div>	
                                </div>
          <div class='modal' id='modal16'>
                                    <div class='content'>
                                      <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                      <p>
                                          Heute gibt es 5% auf alle Artikel.<br> 
                                          Klicke auf den Button um den Gutschein anzuwenden!	
                                      </p>
                                      <a class='btn close-modal' data-modal="#modal16" href="#">Einlösen</a>
                                    </div>	
                                  </div>
          <div class='modal' id='modal17'>
                                      <div class='content'>
                                        <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                        <p>
                                            Heute gibt es 5% auf alle Artikel.<br> 
                                            Klicke auf den Button um den Gutschein anzuwenden!	
                                        </p>
                                        <a class='btn close-modal' data-modal="#modal17" href="#">Einlösen</a>
                                      </div>	
                                    </div>
          <div class='modal' id='modal18'>
                                        <div class='content'>
                                          <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                          <p>
                                              Heute gibt es 5% auf alle Artikel.<br> 
                                              Klicke auf den Button um den Gutschein anzuwenden!	
                                          </p>
                                          <a class='btn close-modal' data-modal="#modal18" href="#">Einlösen</a>
                                        </div>	
                                      </div>
          <div class='modal' id='modal19'>
                                          <div class='content'>
                                            <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                            <p>
                                                Heute gibt es 5% auf alle Artikel.<br> 
                                                Klicke auf den Button um den Gutschein anzuwenden!	
                                            </p>
                                            <a class='btn close-modal' data-modal="#modal19" href="#">Einlösen</a>
                                          </div>	
                                        </div>
          <div class='modal' id='modal20'>
                                            <div class='content'>
                                              <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                              <p>
                                                  Heute gibt es 5% auf alle Artikel.<br> 
                                                  Klicke auf den Button um den Gutschein anzuwenden!	
                                              </p>
                                              <a class='btn close-modal' data-modal="#modal20" href="#">Einlösen</a>
                                            </div>	
                                          </div>
          <div class='modal' id='modal21'>
                                              <div class='content'>
                                                <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                                <p>
                                                    Heute gibt es 5% auf alle Artikel.<br> 
                                                    Klicke auf den Button um den Gutschein anzuwenden!	
                                                </p>
                                                <a class='btn close-modal' data-modal="#modal21" href="#">Einlösen</a>
                                              </div>	
                                            </div>
          <div class='modal' id='modal22'>
            <div class='content'>
              <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                <p>
                  Heute gibt es 5% auf alle Artikel.<br> 
                   Klicke auf den Button um den Gutschein anzuwenden!	
                     </p>
                      <a class='btn close-modal' data-modal="#modal22" href="#">Einlösen</a>
                      </div>	
                      </div>
          <div class='modal' id='modal23'>
                                                  <div class='content'>
                                                    <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                                    <p>
                                                        Heute gibt es 20% auf alle Artikel.<br> 
                                                        Klicke auf den Button um den Gutschein anzuwenden!	
                                                    </p>
                                                    <a class='btn close-modal' data-modal="#modal23" href="#">Einlösen</a>
                                                  </div>	
                                                </div>
          <div class='modal' id='modal24'>
                                                    <div class='content'>
                                                      <h1 class='title_modal'><img src="assets/img/logo.png" alt="Hanadi Beauty Adventskalender" /><br></h1>
                                                      <p>
                                                          Heute gibt es 5% auf alle Artikel.<br> 
                                                          Klicke auf den Button um den Gutschein anzuwenden!	
                                                      </p>
                                                      <a class='btn close-modal' data-modal="#modal24" href="#">Einlösen</a>
                                                    </div>	
                                                  </div>

</section>

<?php
 
}
add_shortcode('xmas', 'xmas_calendar');

?>