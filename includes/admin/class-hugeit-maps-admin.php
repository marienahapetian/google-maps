<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Class Hugeit_Maps_Admin
 */
class Hugeit_Maps_Admin {

	/**
	 * Array of pages in admin
	 *
	 * @var array
	 */
	public $pages;

	/**
	 * Hugeit_Maps_Admin constructor.
	 */
	public function __construct() {
		$this->init();


	}

	/**
	 *
	 */
	private function init() {

		add_action( 'wp_loaded', array( $this, 'wp_loaded_actions' ) );

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	 * Add admin menu pages
	 */
	public function admin_menu() {

		$this->pages['main_page'] = add_menu_page( __( 'Huge-IT Google Maps', 'hugeit_maps' ), __( 'Google Maps', 'hugeit_maps' ), 'manage_options', 'hugeit_maps', array(
			$this,
			'init_main_page'
		), HUGEIT_MAPS_IMAGES_URL . 'google-maps-20-x-20.png' );

		$this->pages['featured_plugins'] = add_submenu_page( 'hugeit_maps', __( 'Featured Plugins', 'hg_gmaps' ), __( 'Featured plugins', 'hg_gmaps' ), 'manage_options', 'hugeit_maps_featured_plugins', array(
            $this,
            'init_featured_plugins_page'
        ) );

        $this->pages['licensing'] = add_submenu_page( 'hugeit_maps', __( 'Licensing', 'hg_gmaps' ), __( 'Licensing', 'hg_gmaps' ), 'manage_options', 'hugeit_maps_licensing', array(
            $this,
            'init_licensing_plugins_page'
        ) );
	}

	public function print_error( $error_message, $die = true ) {

		$str = sprintf( '<div class="error"><p>%s&nbsp;<a href="#" onclick="window.history.back()">%s</a></p></div>', $error_message, __( 'Go back', 'hg_gmaps' ) );

		if ( $die ) {

			wp_die( $str );

		} else {
			echo $str;
		}

	}

	/**
	 * Initialize main page
	 */
	public function init_main_page() {
		$api_key = Hugeit_Maps()->get_api_key();

        Hugeit_Maps_Template_Loader::get_template('admin/free-banner.php');

        if ( is_null( $api_key ) || empty( $api_key ) ) {

			Hugeit_Maps_Template_Loader::get_template( 'admin/api-key-notice.php' );

		}

		if ( ! isset( $_GET['task'] ) ) {

			Hugeit_Maps_Template_Loader::get_template( 'admin/maps-list.php' );

		} else {

			$task = $_GET['task'];

			switch ( $task ) {

				case 'edit_map':

					if ( ! isset( $_GET['id'] ) ) {

						Hugeit_Maps()->admin->print_error( __( 'missing "id" parameter.', 'hg_gmaps' ) );

					}

					$id = $_GET['id'];

					if ( ! $id ) {

						Hugeit_Maps()->admin->print_error( __( '"id" parameter must be non negative integer.', 'hg_gmaps' ) );

					}

					if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'hugeit_maps_edit_map_' . $id ) ) {

						Hugeit_Maps()->admin->print_error( __( 'Security check failed.', 'hg_gmaps' ) );

					}

					$map = new Hugeit_Maps_Map( $id );




					Hugeit_Maps_Template_Loader::get_template( 'admin/edit-map.php', array( 'map' => $map ) );

					break;

                case "import_map":
                    $file = $_FILES['huge-map-import-file'];
                    $content = file_get_contents($file['tmp_name']);
                    $content = json_decode($content);
                    if(!empty($content)){
                        $map = new Hugeit_Maps_Map();
                        $map->set_name($content->name)
                            ->set_type($content->type)
                            ->set_zoom($content->zoom)
                            ->set_border_radius($content->border_radius)
                            ->set_center_lat($content->center_lat)
                            ->set_center_lng($content->center_lng)
                            ->set_width($content->width)
                            ->set_height($content->height)
                            ->set_align($content->align)
                            ->set_wheel_scroll($content->wheel_scroll)
                            ->set_draggable($content->draggable)
                            ->set_min_zoom($content->min_zoom)
                            ->set_max_zoom($content->max_zoom)
                            ->set_info_type($content->info_type);
                        $newMapId = $map->save();
                        if($newMapId){
                            foreach ($content->markers as $marker){
                                $newmarker = new Hugeit_Maps_Marker();
                                $newmarker->set_map_id($newMapId)
                                    ->set_name($marker->title)
                                    ->set_lat($marker->lat)
                                    ->set_lng($marker->lng)
                                    ->set_animation($marker->animation)
                                    ->set_description($marker->description)
                                    ->set_size($marker->size)
                                    ->set_img($marker->image);
                                $newmarker->save();
                            }
                            foreach ($content->polygons as $polygon){
                                $newpolygon = new Hugeit_Maps_Polygon();
                                $newpolygon->set_map_id($newMapId)
                                    ->set_name($polygon->name)
                                    ->set_data($polygon->data)
                                    ->set_line_width($polygon->line_width)
                                    ->set_line_opacity($polygon->line_transp)
                                    ->set_line_color($polygon->line_color)
                                    ->set_fill_opacity($polygon->fill_transp)
                                    ->set_fill_color($polygon->fill_color)
                                    ->set_hover_line_opacity($polygon->hover_line_transp)
                                    ->set_hover_line_color($polygon->hover_line_color)
                                    ->set_hover_fill_opacity($polygon->hover_fill_transp)
                                    ->set_hover_fill_color($polygon->hover_fill_color)
                                    ->set_url($polygon->link);

                                $newpolygon->save();
                            }

                            foreach ($content->polylines as $polyline){
                                $newpolyline = new Hugeit_Maps_Polyline();
                                $newpolyline->set_map_id($newMapId)
                                    ->set_name($polyline->name)
                                    ->set_data($polyline->data)
                                    ->set_line_width($polyline->line_width)
                                    ->set_line_opacity($polyline->line_transp)
                                    ->set_line_color($polyline->line_color)
                                    ->set_hover_line_opacity($polyline->hover_line_transp)
                                    ->set_hover_line_color($polyline->hover_line_color);
                                $newpolyline->save();
                            }
                            foreach ($content->circles as $circle){
                                $newcircle = new Hugeit_Maps_Circle();
                                $newcircle->set_map_id($newMapId)
                                    ->set_name($circle->name)
                                    ->set_center_lat($circle->center_lat)
                                    ->set_center_lng($circle->center_lng)
                                    ->set_radius($circle->radius)
                                    ->set_line_width($circle->line_width)
                                    ->set_line_color($circle->line_color)
                                    ->set_fill_color($circle->fill_color)
                                    ->set_fill_opacity($circle->fill_transp)
                                    ->set_hover_line_opacity($circle->hover_line_transp)
                                    ->set_hover_line_color($circle->hover_line_color)
                                    ->set_hover_fill_color($circle->hover_fill_color)
                                    ->set_hover_fill_opacity($circle->hover_fill_transp)
                                    ->set_show_marker($circle->show_marker);
                                $newcircle->save();
                            }
                            foreach ($content->directions as $direction){
                                $newdirection = new Hugeit_Maps_Direction();
                                $newdirection->set_map_id($newMapId)
                                    ->set_name($direction->name)
                                    ->set_start_lat($direction->start_lat)
                                    ->set_start_lng($direction->start_lng)
                                    ->set_end_lat($direction->end_lat)
                                    ->set_end_lng($direction->end_lng)
                                    ->set_line_color($direction->line_color)
                                    ->set_line_width($direction->line_width)
                                    ->set_line_opacity($direction->line_transp)
                                    ->set_show_steps($direction->show_steps)
                                    ->set_travel_mode($direction->travel_mode);
                                $newdirection->save();
                            }
                            foreach ($content->locators as $locator){
                                $newlocator = new Hugeit_Maps_Locator();
                                $newlocator->set_map_id($newMapId)
                                    ->set_name($locator->name)
                                    ->set_locator_lat($locator->lat)
                                    ->set_locator_lng($locator->lng)
                                    ->set_locator_addr($locator->address)
                                    ->set_locator_phone($locator->phone)
                                    ->set_locator_days($locator->days);
                                $newlocator->save();
                            }
                            $location = admin_url( 'admin.php?page=hugeit_maps&task=edit_map&id='.$newMapId );
                            $location = wp_nonce_url( $location, 'hugeit_maps_create_new_map' );
                            header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                            header("Location: $location");
                        }
                    }
                    exit;
                    break;
			}

		}

	}

	/**
	 * Handle some actions when wordpress is loaded
	 * We call this functions when wp is loaded as we will redirect user to another page so we have to do our staff before headers are sent that's why we use wp_loaded hook
	 */
	public function wp_loaded_actions() {

		if ( ! isset( $_GET['page'] ) || $_GET['page'] !== 'hugeit_maps' || ! isset( $_GET['task'] ) ) {
			return;
		}

		$task = $_GET['task'];

		switch ( $task ) {

			case "create_new_map":

				if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'hugeit_maps_create_new_map' ) ) {
					wp_die( sprintf( '<div class="error"><p>%s</p></div>', __( 'Security check failed.', 'hg_gmaps' ) ) );
				}

				$new_map = $this->create_new_map();

				/**
				 * after the map is created we need to redirect user to the edit page
				 */
				if ( $new_map && is_int( $new_map ) ) {

					$location = admin_url( 'admin.php?page=hugeit_maps&task=edit_map&id=' . $new_map );

					$location = wp_nonce_url( $location, 'hugeit_maps_edit_map_' . $new_map );

					$location = html_entity_decode( $location );

                    header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                    header("Location: $location");

					exit;

				} else {

					wp_die( __( 'Problems occurred while creating new map.', 'hg_gmaps' ) );

				}

				break;
			case "remove_map":
				if ( ! isset( $_GET['id'] ) ) {
					wp_die( __( '"id" parameter is required', 'hg_gmaps' ) );
				}

				$id = $_GET['id'];

				if ( absint( $id ) != $id ) {
					wp_die( __( '"id" parameter must be non negative integer', 'hg_gmaps' ) );
				}

				if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'hugeit_maps_remove_map_' . $id ) ) {
					wp_die( __( 'Security check failed', 'hg_gmaps' ) );
				}

				Hugeit_Maps_Map::delete( $id );

				$location = admin_url( 'admin.php?page=hugeit_maps' );


                header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                header("Location: $location");

                exit;

				break;

		}

	}

	/**
	 * Create a new map
	 */
	private function create_new_map() {
		$new_map = new Hugeit_Maps_Map();

		$saved = $new_map->save();

		return $saved;
	}

	/**
	 * Initialize featured plugins page
	 */
	public function init_featured_plugins_page() {

		Hugeit_Maps_Template_Loader::get_template( 'admin/featured-plugins.php' );

	}

	public function init_licensing_plugins_page(){

        Hugeit_Maps_Template_Loader::get_template( 'admin/licensing.php' );

    }

}