<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**

 **/
class Companies extends MX_Controller {

    /**
     
     **/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company', '', TRUE);
        $this->load->library(array('session'));
        $this->load->helper(array('form', 'html', 'companies', 'url'));
    }
	
	public function index(){

        $content = $this->load->view('companies/index', '', TRUE);
        $this->load->view('main/template', array('aside'=>'',
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/login.js')));
		
	}
	
	/*
	*metodo para crear usuarios 
	*administradores
	*autor: jalomo <jalomo@hotmail.es>
	*/
	public function crear_admin(){
	
        $this->load->view('companies/registro_admin');
  
	}
	
	/**
     *metodo para guardar el registro del
	 *administrador
     * 
     **/
    public function guarda_admin()
    {
        $post = $this->input->post('Registro');
        if($post)
        {
            $pass = encrypt_password($post['adminUsername'],
                                     $this->config->item('encryption_key'),
                                     $post['adminPassword']);
            $post['adminPassword'] = $pass;
            $post['adminStatus'] = 1;
			$post['adminFecha']=date('Y-m-d');
            $id = $this->Company->save_admin($post);
            echo $id;
        }
        else{
        }
    }
	
	/*
	*metodo para checar el login y la contraseña
	*/
	public function checkDataLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if(isset($username) && isset($password) && !empty($password) && !empty($username))
        {
            $pass = encrypt_password($username,
                                     $this->config->item('encryption_key'),
                                     $password);
            $total = $this->Company->count_results_users($username, $pass);
            if($total == 1)
            {
                echo "1";
            }
            else{
                echo "0";
            }
        }
        else{
            redirect('companies');
        }
    }
	
	/*
	*metodo para inicio de session
	*/
	public function mainView()
    {
        $post = $this->input->post('Login');
        if(isset($post) && !empty($post))
        {
            $pass = encrypt_password($post['adminUsername'],
                                     $this->config->item('encryption_key'),
                                     $post['adminPassword']);
            $dataUser = $this->Company->get_all_data_users_specific($post['adminUsername'], $pass);

            $array_session = array('id'=>$dataUser->adminId);
            $this->session->set_userdata($array_session);

            if($this->session->userdata('id'))
            {
				redirect('companies/panel');
                /*$aside = $this->load->view('companies/left_menu', '', TRUE);
                $content = $this->load->view('companies/main_view', '', TRUE);
                $this->load->view('main/template', array('aside'=>$aside,
                                                         'content'=>'',
														 'included_js'=>array('statics/js/modules/menu.js')));*/
            }
            else{
            }
        }
        else{
        }
    }
	
	/*
	*metodo donde el usuario crea las 
	*notificaciones.
	*/
	public function panel(){
	 if($this->session->userdata('id'))
        {	
		$menu_header = $this->load->view('companies/menu_header', '', TRUE);
        $aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/panel', '', TRUE);
        $this->load->view('main/panel', array('menu_header'=>$menu_header,
                                                       'aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/notificaciones.js')));
		}
        else{
            redirect('companies');
        }											   
		
	}
	
	/**
     * Method used for close the session once logout
     * of the platform and the system can delete
     * all the values required during the session
     *
     * @return void
     **/
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect('companies');
    }
	
	
    
	
	
	
	
	
}
