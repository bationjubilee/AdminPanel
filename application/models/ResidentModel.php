 <?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class ResidentModel extends CI_Model
{
    
    function residentListingCount($searchText = '')
    {
        $this->db->select("resident.res_id, resident.res_Fname, resident.res_Lname, resident.age, resident.gender, resident.status, resident.mobile_no, address.add_desc");
        $this->db->from('resident');
        $this->db->join('address', 'address.add_id = resident.add_id');
        if(!empty($searchText)) {
            $likeCriteria = "(resident.res_Fname  LIKE '%".$searchText."%'
                            OR  resident.res_Lname  LIKE '%".$searchText."%'
                            OR  address.add_desc  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    
    function residentListing($searchText = '', $page, $segment)
    {
        $this->db->select("resident.res_id, resident.res_Fname, resident.res_Lname, resident.age, resident.gender, resident.status, resident.mobile_no, address.add_desc");
        $this->db->from('resident');
        $this->db->join('address', 'address.add_id = resident.add_id');
        if(!empty($searchText)) {
            $likeCriteria = "(resident.res_Fname  LIKE '%".$searchText."%'
                            OR  resident.res_Lname  LIKE '%".$searchText."%'
                            OR  address.add_desc  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('resident.res_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }

    
    public function get_address()
    {
        $this->db->select('add_id, add_desc');
        $this->db->from('address');
        $this->db->where('add_id !=', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

    function addNewResident($residentInfo)
    {
        $this->db->trans_start();
        $this->db->insert('resident', $residentInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    
    function getResidentInfo($res_id)
    {
        $this->db->select('res_id, res_Fname, res_Lname,age, gender, status, mobile_no, add_id');
        $this->db->from('resident');
        $this->db->where('res_id', $res_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    function editResident($residentInfo, $res_id)
    {
        $this->db->where('res_id', $res_id);
        $this->db->update('resident', $residentInfo);
        
        return TRUE;
    }
    
    function deleteResident($res_id, $residentInfo)
    {
        $this->db->where('res_id', $res_id);
        $this->db->update('resident', $residentInfo);
        
        return $this->db->affected_rows();
    }


    function getResidentInfoById($res_id)
    {
        $this->db->select('res_id', 'res_Fname', 'res_Lname','age', 'gender', 'status', 'mobile_no', 'add_id');
        $this->db->from('resident');
        $this->db->where('res_id', $res_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    function getResidentInfoWithAddress($res_id)
    {
        $this->db->select("resident.res_id, resident.res_Fname, resident.res_Lname, resident.age, resident.gender, resident.status, resident.mobile_no, address.add_desc");
        $this->db->from('resident');
        $this->db->join('address', 'address.add_id = resident.add_id');
        $this->db->where('resident.res_id', $res_id);
        $query = $this->db->get();
        
        return $query->row();
    }

}

  