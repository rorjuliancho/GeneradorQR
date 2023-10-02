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
        $this->db->where('estado !=', '1');
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

    public function encontrarGuiaId($id)
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
    public function encontrarGuiaIdPrincipal($id)
    {
        $this->db->select('*');
        $this->db->where('idguia', $id);
        $this->db->where('seccion', 'principal');
        $query = $this->db->get('imagen_guia');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function encontrarGuiaIdPartes($id)
    {
        $this->db->select('*');
        $this->db->where('idguia', $id);
        $this->db->where('seccion', 'partes');
        $query = $this->db->get('imagen_guia');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function encontrarGuiaIdFunciones($id)
    {
        $this->db->select('*');
        $this->db->where('idguia', $id);
        $this->db->where('seccion', 'funciones');
        $query = $this->db->get('imagen_guia');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function updateImagenesGuia($data, $idImagen)
    {
        $this->db->where('idimagen_guia', $idImagen);
        $this->db->update('imagen_guia', $data);
    }

    public function updateInformacionGuia($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('guia', $data);
    }

    public function DeleteGuia($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('guia', $data);
    }
}
