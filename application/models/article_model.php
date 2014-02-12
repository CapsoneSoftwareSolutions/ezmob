<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Article_model extends CI_Model	{
		
	public function __construct()
			{
				parent::__construct();
				
				$this->load->library('encrypt');

				$this->load->library('session');  		
   	   		}
	
	// Start of Article Insert Function

	public function articleInsert($data)
 		{

 			$title			=	$this->input->post('title');

 			$description	=	$this->input->post('description');

 			$data = array(
						   'title' => $title ,

						   'description'  => $description
						 );
 			$this->db->insert('article',$data);    

 			if($this->db->affected_rows()==1)
 			{
 				return 1;
 			}
 			else
 			{
 				return 0;
 			}
 	
 		}


 	// End of Article Insert Function


 	// Start of Get Articlelist from article table

	public function getArticlelist()

		{

				$this->db->select('art_id, title , description');

				$query = $this->db->get('article');

				$this->db->order_by("art_id", "desc"); 

				if($query->num_rows()>0)
				{

						foreach($query->result() as $row)
						{

							$articleList[]=$row;

						}

				}
				else
				{

					$articleList	=	0;

				}

				return $articleList;
		}

	// End of Artcile list
  
  	// Start Of Get Article 

	public function getArticle($articleId)
		{

			$this->db->select('art_id, title, description');

			$this->db->from('article');

			$this->db->where('art_id', $articleId);

			$query = $this->db->get();

			if($query->num_rows==1)
			{
				
				foreach($query->result_array() as $row)	{


					$editArticle	=	$row;
				}
				

			}

			return $editArticle;
		}

	// End of Get Article

	//Start of Update Article

	public function articleUpdate($data)
		{

			$art_id			=	$this->input->post('articleid');

			$title			=	$this->input->post('title');

 			$description	=	$this->input->post('description');

 			$data = array(
						   'title' => $title ,

						   'description'  => $description
						 );

			$this->db->where('art_id', $art_id);

			$this->db->update('article', $data); 

			if($this->db->affected_rows()==1)
			{

				return 1;

			}
			else{

				return 0;
			}


		}
	//End of Update Article

	//Start of Article Delete
	public function articleDelete($articleId)
	{

		$this->db->where('art_id', $articleId);

		$this->db->delete('article');

		if($this->db->affected_rows()==1)

		{
			return 1;
		}
		else
		{
			return 0;
		}

	}

	//End of Article Delete
}
?>
