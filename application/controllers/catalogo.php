<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
    }

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('login');
		}		
	}	
//*************************************************************************************************************************
	public function index($campo = 'id', $orden = 'ASC')
	{
	   $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       
       $data['titulo'] = "SASTRERIA";
       $data['contenido'] = "catalogo/limpio";
        $data['tabla'] = $this->catalogo_model->clientes($campo, $orden);
       
		$this->load->view('header');
		$this->load->view('main', $data);
	}
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
//************************************************************************************************************************* 
 	public function tabla_clientes()
	{
	   $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       
       $data['titulo'] = "CATALOGO DE CLIENTES";
       $data['contenido'] = "catalogo/clientes_c_form_agrega";
       
		$this->load->view('header');
		$this->load->view('main', $data);
	}   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
  function insert_cliente()
	{
	$nom= $this->input->post('nom');
    $dir= $this->input->post('dir');
    $col= $this->input->post('col');
    $pob= $this->input->post('pob');
    $cp= $this->input->post('cp');
    $correo= $this->input->post('correo');
    $rfc= $this->input->post('rfc');
    $tcas= $this->input->post('tcas');
    $ttra= $this->input->post('ttra');
    $tcel= $this->input->post('tcel');
    $num= $this->input->post('num');
    $int= $this->input->post('int');
    
	$this->load->model('catalogo_model');
    $this->catalogo_model->create_member_cliente($nom,$dir,$col,$pob,$cp,$correo,$rfc,$tcas,$ttra,$tcel,$num,$int);
    redirect('catalogo');
    
    }

  function insert_cliente_recepcion()
	{
	$nom= $this->input->post('nom');
    $dir= $this->input->post('dir');
    $col= $this->input->post('col');
    $pob= $this->input->post('pob');
    $cp= $this->input->post('cp');
    $correo= $this->input->post('correo');
    $rfc= $this->input->post('rfc');
    $tcas= $this->input->post('tcas');
    $ttra= $this->input->post('ttra');
    $tcel= $this->input->post('tcel');
    $num= $this->input->post('num');
    $int= $this->input->post('inte');
    
	$this->load->model('catalogo_model');
    echo $this->catalogo_model->create_member_cliente($nom,$dir,$col,$pob,$cp,$correo,$rfc,$tcas,$ttra,$tcel,$num,$int);
    }

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 
 	public function cambia_cliente($id)
	{
	   
       $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       //$data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       $trae = $this->catalogo_model->trae_datos_cliente($id);
       $row = $trae->row();
       $data['id'] = $id;
       $data['nom'] = $row->nombre;
       $data['dir'] = $row->dire;
       $data['num'] = $row->num;
       $data['int'] = $row->int;
       $data['col'] = $row->col;
       $data['pob'] = $row->pob;
       $data['cp'] = $row->cp;
       $data['rfc'] = $row->rfc;
       $data['correo'] = $row->correo;
       $data['tcas'] = $row->telcasa;
       $data['ttra'] = $row->teltra;
       $data['tcel'] = $row->telcel;
       $data['tipo'] = $row->tipo;
       
       $data['titulo'] = "CAMBIAR DATOS DE CLIENTE";
       $data['contenido'] = "catalogo/clientes_c_form_cambia";
        $data['tabla'] = '';
       
		$this->load->view('header');
		$this->load->view('main', $data);
	}  
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 function cambia_cliente_datos()
	{
	$id=$this->input->post('id');   
	$nom= $this->input->post('nom');
    $dir= $this->input->post('dir');
    $col= $this->input->post('col');
    $pob= $this->input->post('pob');
    $cp= $this->input->post('cp');
    $correo= $this->input->post('correo');
    $rfc= $this->input->post('rfc');
    $tcas= $this->input->post('tcas');
    $ttra= $this->input->post('ttra');
    $tcel= $this->input->post('tcel');
    $num= $this->input->post('num');
    $int= $this->input->post('int');
    $tipo=$this->input->post('tipo'); 
    
	$this->load->model('catalogo_model');
    $this->catalogo_model->update_member_cliente($id,$nom,$dir,$col,$pob,$cp,$correo,$rfc,$tcas,$ttra,$tcel,$num,$int,$tipo);
    redirect('catalogo');    
    }
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
//************************************************************************************************************************* 
 	public function tabla_prendas()
	{
	   $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       
       $data['titulo'] = "CATALOGO DE PRENDAS";
       $data['contenido'] = "catalogo/prendas_c_form_agrega";
        $data['tabla'] = $this->catalogo_model->prendas();
       
		$this->load->view('header');
		$this->load->view('main', $data);
	}   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
  function insert_prenda()
	{
	$nom= $this->input->post('nom');
    
 	$this->load->model('catalogo_model');
    $this->catalogo_model->create_member_prenda($nom);
    redirect('catalogo/tabla_prendas');
    
    }
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 
 	public function cambia_prendas($id)
	{
	   
       $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       $trae = $this->catalogo_model->trae_datos_prendas($id);
       $row = $trae->row();
       $data['id'] = $id;
       $data['nom'] = $row->nombre;
       $data['tipo'] = $row->tipo;
      
       
       $data['titulo'] = "CAMBIAR DATOS DE PRENDAS";
       $data['contenido'] = "catalogo/prendas_c_form_cambia";
        $data['tabla'] = '';
       
		$this->load->view('header');
		$this->load->view('main', $data);
	}  
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 function cambia_prenda_datos()
	{
	$id=$this->input->post('id');   
	$nom= $this->input->post('nom');
    $tipo=$this->input->post('tipo'); 
    
	$this->load->model('catalogo_model');
    $this->catalogo_model->update_member_prendas($id,$nom,$tipo);
    redirect('catalogo/tabla_prendas');    
    }
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
//************************************************************************************************************************* 
 	public function tabla_pagos()
	{
	   $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       
       $data['titulo'] = "CATALOGO DE PAGOS";
       $data['contenido'] = "catalogo/pagos_c_form_agrega";
        $data['tabla'] = $this->catalogo_model->pagos();
       
		$this->load->view('header');
		$this->load->view('main', $data);
	}   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
  function insert_pagos()
	{
	$nom= $this->input->post('nom');
    
 	$this->load->model('catalogo_model');
    $this->catalogo_model->create_member_pagos($nom);
    redirect('catalogo/tabla_pagos');
    
    }
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 
 	public function cambia_pagos($id)
	{
	   
       $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       $trae = $this->catalogo_model->trae_datos_pagos($id);
       $row = $trae->row();
       $data['id'] = $id;
       $data['nom'] = $row->nombre;
       $data['tipo'] = $row->tipo;
      
       
       $data['titulo'] = "CAMBIAR DATOS DE PAGOS";
       $data['contenido'] = "catalogo/pagos_c_form_cambia";
        $data['tabla'] = '';
       
		$this->load->view('header');
		$this->load->view('main', $data);
	}  
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 function cambia_pagos_datos()
	{
	$id=$this->input->post('id');   
	$nom= $this->input->post('nom');
    $tipo=$this->input->post('tipo'); 
    
	$this->load->model('catalogo_model');
    $this->catalogo_model->update_member_pagos($id,$nom,$tipo);
    redirect('catalogo/tabla_pagos');    
    }

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
//************************************************************************************************************************* 
 	public function tabla_horarios()
	{
	   $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       
       $data['titulo'] = "CATALOGO DE HORARIOS";
       $data['contenido'] = "catalogo/limpio";
        $data['tabla'] = $this->catalogo_model->horarios();
       
		$this->load->view('header');
		$this->load->view('main', $data);
	}
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
//************************************************************************************************************************* 
 	public function tabla_estatus()
	{
	   $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       
       $data['titulo'] = "CATALOGO DE STATUS";
       $data['contenido'] = "catalogo/limpio";
        $data['tabla'] = $this->catalogo_model->estatus();
       
		$this->load->view('header');
		$this->load->view('main', $data);
	}   
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
//************************************************************************************************************************* 
 	public function tabla_servicios()
	{
	   $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       $data['prex'] = $this->catalogo_model->busca_prenda();
       $data['titulo'] = "CATALOGO DE SERVICIOS";
       $data['contenido'] = "catalogo/servicios_c_form_agrega";
        $data['tabla'] = $this->catalogo_model->servicios();
       
		$this->load->view('header');
		$this->load->view('main', $data);
	}   

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
  function insert_servicios()
	{
	$nom= $this->input->post('nom');
    $pre= $this->input->post('pre');
    $precio= $this->input->post('precio');
    
 	$this->load->model('catalogo_model');
    $this->catalogo_model->create_member_servicios($nom,$pre,$precio);
    redirect('catalogo/tabla_servicios');
    
    }

    function recepcion_insert_servicios()
	{
	$nom= $this->input->post('nom');
    $pre= $this->input->post('pre');
    $precio= $this->input->post('precio');
    
 	$this->load->model('catalogo_model');
    echo $this->catalogo_model->create_member_servicios($nom,$pre,$precio);
    
    }
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 
 	public function cambia_servicios($id)
	{
	   
       $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       $trae = $this->catalogo_model->trae_datos_servicios($id);
       $row = $trae->row();
       $data['id'] = $id;
       $data['pre'] = $row->prenda;
       $data['prendax'] = $row->prendax;
       $data['nom'] = $row->nombre;
       $data['precio'] = $row->precio;
       $data['tipo'] = $row->tipo;
      
       
       $data['titulo'] = "CAMBIAR DATOS DE SERVICIOS";
       $data['contenido'] = "catalogo/servicios_c_form_cambia";
       $data['tabla'] = '';
       
	   $this->load->view('header');
	   $this->load->view('main', $data);
	}  
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 function cambia_servicios_datos()
	{
	$id=$this->input->post('id');   
	$nom= $this->input->post('nombre');
    $pre= $this->input->post('pre');
    $precio= $this->input->post('precio');
    $tipo=$this->input->post('tipo'); 
    
	$this->load->model('catalogo_model');
    $this->catalogo_model->update_member_servicios($id,$nom,$pre,$precio,$tipo);
    redirect('catalogo/tabla_servicios');    
    }


 	public function usuarios()
	{
	   $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       
       $data['titulo'] = "CATALOGO DE USUARIOS";
       $data['contenido'] = "catalogo/usuarios";
       $this->load->model('catalogo_model');
       $data['tabla'] = $this->catalogo_model->usuarios();
       
	   $this->load->view('header');
	   $this->load->view('main', $data);
	}   

 	public function nuevo_usuario()
	{
	   $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       
       $data['titulo'] = "AGREGA UN NUEVO USUARIO";
       $data['contenido'] = "catalogo/nuevo_usuario";
       
	   $this->load->view('header');
	   $this->load->view('main', $data);
	}
    
    public function nuevo_usuario_submit()
    {
        //id, username, password, nivel, tipo, nombre, puesto, email, avatar
        $data->username = $this->input->post('username');
        $data->password = $this->input->post('password');
        $data->nivel = 2;
        $data->tipo = 1;
        $data->nombre = $this->input->post('nombre');
        $data->puesto = 'CAJERO';
        $data->email = $this->input->post('email');
        $data->avatar = 'sample_user.png';
        
        $this->db->insert('usuarios', $data);
        echo $this->db->insert_id();
    }

 	public function cambia_usuario($id)
	{
	   $data = array();
       $data['menu'] = 'inicio';
       $data['submenu'] = 'completo';
       //$data['sidebar'] = "head/sidebar";
       //$data['widgets'] = "main/widgets";
       $data['dondeestoy'] = "main/dondeestoy";
       $this->load->model('catalogo_model');
       
       $data['titulo'] = "MODIFICA USUARIO";
       $data['contenido'] = "catalogo/cambia_usuario";
       $this->load->model('catalogo_model');
       $data['query'] = $this->catalogo_model->usuario($id);
       
	   $this->load->view('header');
	   $this->load->view('main', $data);
	}   

    public function cambia_usuario_submit()
    {
        //id, username, password, nivel, tipo, nombre, puesto, email, avatar
        $data->username = $this->input->post('username');
        $data->password = $this->input->post('password');
        $data->tipo = $this->input->post('tipo');;
        $data->nombre = $this->input->post('nombre');
        $data->email = $this->input->post('email');
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('usuarios', $data);
        echo $this->db->affected_rows();
    }
 
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />   
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////<br />    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */