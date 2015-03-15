<?php
/**

 **/
class Company extends CI_Model{

    /**

     **/
    public function __construct()
    {
        parent::__construct();
    }
	
	public function save_register($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
	
	/*
	* metodo para obtener volcado de imagenes.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_imagenes(){
		$query=$this->db->get('imagenes');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;	
		}	
	}
	
	/*
	* metodo para obtener volcado de categorias,
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_categorias(){
		$query=$this->db->get('categorias');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;	
		}	
	}

	/*
	* metodo para obtener volcado de categorias con un array.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_categorias_array(){
		$query=$this->db->get('categorias');
		if($query->num_rows()>0){
			$res=$query->result();
			$data=array();
			foreach($res  as $resultado):
				$data[$resultado->categoriaId]=$resultado->categoriaNombreIngles;
			endforeach;	
			return $data;
		}else{
			return 0;	
		}
	}


	/*
	* metodo para eliminar una fila de categorias
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function delete_categoria($id){
		 
        $this->db->delete('categorias', array('categoriaId'=>$id));
 
	}

	/*
	* metodo para eliminar un tutorial.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function delete_tutorial($id){
		 
        $this->db->delete('tutoriales', array('tutoriald'=>$id));
 
	}

	/*
	* metodo para obtener los tutoriales.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_tutoriales(){
		$query=$this->db->get('tutoriales');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;	
		}	
	}

	/*
	* metodo para obtener el nombre de un tutorial.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_name_tuto($id_tuto){

		$this->db->where('categoriaId',$id_tuto);
		$query=$this->db->get('categorias');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->categoriaNombreIngles;
		}else{
			return '...';
		}
	}

	/*
	* metodo para obtener los datos de un tutorial.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_tutorial_id($id_tutorial){
		$this->db->where('tutoriald',$id_tutorial);
		$query=$this->db->get('tutoriales');
		if($query->num_rows()>0){
			return $query->row();

		}else{
			return 0;
		}
	}
	
	
	
	/*
	*Metodo para obtener la informacion
	*de las notificaciones
	*autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_notificaciones(){
		$data = $this->db->get('notificaciones');
		if ($data->num_rows() > 0){
        	return $data->result();
		} else {
			return 0;
		}	
	}
	
	
	/*
	*Metodo para guardar la informacion
	*de las notificaciones
	*autor jalomo <jalomo@hotmail.es>
	*/
	public function save_notificacion($data){
		$this->db->insert('notificaciones', $data);
        return $this->db->insert_id();
	}
	
	/*
	*Metodo para obtener la informacion
	* de las noticias
	autor: jalomo <jalmo@hotmail.es>
	*/
	public function get_noticias(){
		$data = $this->db->get('noticias');
		if ($data->num_rows()>0){
			return $data->result();
		} else {
			return 0;
		}		
	}
	
	/*
	*Metodo para guardar la informacion
	* del registro del administrador
	*autor jalomo <jalomo@hotmail.es>
	*/
	public function save_admin($data){
		$this->db->insert('admin', $data);
        return $this->db->insert_id();
	}
	
	
	
	/**
     * Method for take all the notifications and the user can
     * see the information that was sent before ago.
	 *
     **/
    public function get_all_list_notifications()
    {
        $data = $this->db->get('notificaciones');
        return $data->result();
    }
	
	
	 /**
     * Method for get the specific data of the notifications
     * and can show all the information for the user 
     * and know what is the message to sent
     *
     * @params int idNotification
     * @return array mixedData
     *
     **/
    public function get_specific_notification($id)
    {
        $this->db->where('notificacionId', $id);
        $data = $this->db->get('notificaciones');
        return $data->row();
    }
	
	/**
     * Method for load all the information about the news and can
     * show then in the mobile app, this for can show in the list
     * to the user admin as well.
     **/
    public function save_news($data){
        $this->db->insert('noticias', $data);
        return $this->db->insert_id();
    }
	
	/*
	* metodo para guardar en la tabla de eventos
	*/
	public function save_eventos($data){
        $this->db->insert('eventos', $data);
        return $this->db->insert_id();
    }

	/**
     * Method to use for get all the information 
     * of the news will be added to a list for show the
     * information to the admin panel
     **/
    public function get_all_news(){
        $data = $this->db->get('noticias');
        return $data->result();
    }
	
	/*
	* metodo para obtener un volcado de 
	* todos los eventos.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_all_eventos(){
        $data = $this->db->get('eventos');
        return $data->result();
    }
	
	
	
	/**
     * Method for get the specific data of the specific
     * news and can show to users for edit or just know
     * what is the information to share the mobile app's users
     **/
    public function get_specific_news($id){
        $this->db->where('noticiasId', $id);
        $data = $this->db->get('noticias');
        return $data->row();
    }
	
	
	/*
	* funcion para obtener los datos de 
	* un reguistro de la tabla eventos
	*/
	public function get_specific_eventos($id){
        $this->db->where('eventosId', $id);
        $data = $this->db->get('eventos');
        return $data->row();
    }
	
	/**
     * Method for load all the information for can see the data
     * will be update by the user admin and then can show the
     * updates in the mobile app
     *
     * @params array mixedData
     * @params int idNews
     *
     * @return void
     **/
    public function update_news($data, $id){
        $this->db->update('noticias', $data, array('noticiasId'=>$id));
    }
	
	
	/*
	* funcion para editar un registro de la tabla eventos
	*/
	public function update_eventos($data, $id){
        $this->db->update('eventos', $data, array('eventosId'=>$id));
    }
	
	 /**
     * Method for delete the specific notification and the user can
     * see how drop or how to hide the information wants to delete
     * once confirm the dialog box
     *
     * @params int idNotification
     * @return void
     **/
    public function delete_specific_notification($id)
    {
        $this->db->delete('notificaciones', array('notificacionId'=>$id));
    }
	
	
	/*
	* 
	*/
	public function count_results_users($user, $pass)
    {
        $this->db->where('adminUsername', $user);
        $this->db->where('adminPassword', $pass);
        $total = $this->db->count_all_results('admin');
        return $total;
    }
	
	/*
	*
	*/
	public function get_all_data_users_specific($username, $pass)
    {
        $this->db->where('adminUsername', $username);
        $this->db->where('adminPassword', $pass);
        $data = $this->db->get('admin');
        return $data->row();
    }
	

}
