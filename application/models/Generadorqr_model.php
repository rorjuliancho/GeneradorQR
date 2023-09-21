<?php defined('BASEPATH') or exit('No direct script access allowed');
class Generadorqr_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function informacion()
    {
        $this->db->select('*');
        $query = $this->db->get('guia');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function ultimoRegistro()
    {
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('guia');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function insertAllData($data)
    {
        $this->db->insert('guia', $data);
        return true;
    }

    public function updateAllData($data, $id)
    {
        $this->db->update('guia', $data);
        return true;
    }

    public function insertAllPopUp($data)
    {
        $this->db->insert('imagen_guia', $data);
        return true;
    }

    public function insertarInstancia($data)
    {
        $this->db->insert('guia', $data);
        return true;
    }

    public function last_id()
    {
        $this->db->select('id');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('guia');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function generatePDF($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('guia');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function generatePDFImage($id, $seccion)
    {
        $this->db->select('*');
        $this->db->where('idguia', $id);
        $this->db->where('seccion', $seccion);
        $query = $this->db->get('imagen_guia ');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function updateQR($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('guia', $data);
      
        return true;
    }
}
