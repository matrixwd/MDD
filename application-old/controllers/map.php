<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Map extends CI_Controller {

        function __construct() {
            parent::__construct();
        }

        function index() {
            // Load the library
            $this->load->library('googlemaps');

            // Load our model
            $this->load->model('map_model', '', TRUE);

            // Initialize the map, passing through any parameters
            $config = array();
            $config['center'] = 'auto';
            $config['zoom'] = 'auto';
            $config['sensor'] = 'true';

            // Centeres the map base on users location
            $config['onboundschanged'] = 'if (!centreGot) {
	            var mapCentre = map.getCenter();
	            marker_0.setOptions({
		            position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
	            });
            }
            centreGot = true;';

            $this->googlemaps->initialize($config);

            // set up the marker ready for positioning
            // once we know the users location
            $marker = array();
            $marker['animation'] = 'DROP';
            $this->googlemaps->add_marker($marker);

            //End get user location
            $this->googlemaps->initialize($config);

            // Get the co-ordinates from the database using our model
            $coords = $this->map_model->get_coordinates();

            // Loop through the coordinates we obtained above and add them to the map
            foreach ($coords as $coordinate) {
                $marker = array();
                $marker['position'] = $coordinate->lat.','.$coordinate->lng;
                $this->googlemaps->add_marker($marker);
            }

            // Create the map
            $data = array();
            $data['map'] = $this->googlemaps->create_map();

            // Load our view, passing through the map data
            $this->load->view('map_view', $data);
        }
    }