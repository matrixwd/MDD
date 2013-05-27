<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('home_message');
        $this->load->library('googlemaps');

        $config = array();
        $config['center'] = 'auto';
        $config['zoom'] = 'auto';
        $config['onboundschanged'] = 'if (!centreGot) {
	                                    var mapCentre = map.getCenter();
	                                    marker_0.setOptions({
		                                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
	    });
}
centreGot = true;';
        $config['geocodeCaching'] = TRUE;
        $config['minifyJS'] = TRUE;
        $this->googlemaps->initialize($config);

// set up the marker ready for positioning
// once we know the users location
        $marker = array();
        $marker['infowindow_content'] = '1 - Hello World!';
        $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
        $marker['draggable'] = FALSE;
        $marker['animation'] = 'DROP';
        $marker['onclick'] = 'alert("You just clicked me!!")';
        $this->googlemaps->add_marker($marker);

        $data['map'] = $this->googlemaps->create_map();

        $this->load->view('home_message', $data);
        $this->load->view('apitest', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */