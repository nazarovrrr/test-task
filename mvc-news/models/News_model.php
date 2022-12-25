<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		public function get_news($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('news');
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('id' => $slug));
        return $query->row_array();
}


public function set_news()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);
	
	$date = new DateTime("now", new DateTimeZone('Europe/Moscow') );


    $data = array(
        'title' => $this->input->post('title'),
        'slug' => "",
		'announce' => $this->input->post('announce'),
		'time' => $date->getTimestamp(),
		'time_str' => $date->format('d.m.Y H:m:s'),
        'text' => $this->input->post('text')
    );

    return $this->db->insert('news', $data);
}

public function del_news()
{
    $this->load->helper('url');
echo $this->input->get('id');
  $this->db->delete('news', array('id' => $this->input->get('id'))); 
}

public function find_news()
{
   $slug =  $this->input->post('title');
   
if (is_numeric($slug))
        {
                $slug = "id=$slug";
             
        } else {
			
			$slug = "`news`.`title` LIKE '%$slug%'";
			//$this->db->like('title', 'match');
		}	
  
        $query = $this->db->get_where('news', $slug);
        return $query->row_array();
}



// public function find_by_tag()
// {

// "SELECT t1.*, t2.tag_value FROM Table1 as t1, JOIN Table3 as join_table ON t1.product_uid = join_table.product_uid JOIN Table2 as t2 ON t2.tag_uid = join_table.tag_uid WHERE t1.product_uid = 1"

// }

}

