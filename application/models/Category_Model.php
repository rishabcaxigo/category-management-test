<?php

class Category_Model extends CI_Model
{
    public function Category_Details($ID = null, $MasterID = null)
    {
        $this->db->select('*');
        $this->db->from('category');
        if (isset($ID)) {
            $this->db->where('ID', $ID);
        }
        $this->db->where('Deleted!=', 1);
        if (isset($MasterID)) {
            $this->db->where('MasterCategoryID', $MasterID);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function getMaxID()
    {
        $this->db->select('max(ID)as ID');
        $this->db->from('category');
        $query = $this->db->get();
        return $query->result();
    }

    public function Insert_Category($data)
    {
        $this->db->insert('category', $data);
        return $this->db->insert_id();
    }

    public function Delete_Category($ID)
    {
        $this->db->where('ID', $ID);
        return $this->db->delete('category');
    }


    public function Update_Category($ID = null,  $UpdateData)
    {
        if (!empty($ID)) {
            $this->db->where('ID', $ID);
        }
        $this->db->update('category', $UpdateData);
        return $this->db->affected_rows();
    }
}
