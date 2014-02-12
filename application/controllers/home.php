<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

      parent::__construct();

      $this->load->helper('url');

      $this->load->helper('form');

      $this->load->model('article_model');

     }

	public function index()
	{

		$getArticlelist				=	$this->article_model->getArticlelist();

		//print_r($getArticlelist);

		$outputdata['articlelist']	=	$getArticlelist;

		$this->load->view('articlelist', $outputdata);
	}

	// Start of Post Article 

	public function postarticle()
	{
		
		if(isset($_POST['articlesubmit']))
		{
			
			$addarticle	=	$this->article_model->articleInsert($_POST);

			if($addarticle==1)
			{
				//$outputdata['article_msg']	=	'Article Posted Successfully';

			//	$this->load->view('article', $outputdata);

				$this->index();

			}
			else
			{
				$outputdata['article_msg']	=	'Error Occured in Article Posting. Please try again';

				$this->load->view('article', $outputdata);
			}

		}
		else
		{

			//$outputdata['article_msg']		=	'Error Occured in Article Posting. Please try again';

			$this->load->view('article');
		}

	}
	// End of Post Article


	//Start Of Edit Article

	public function articleEdit()
	{

		$articleId 		= $this->uri->segment(3);

		if($articleId!='' && (!isset($_POST['editsubmit'])))
		{

				$updateArticle					=	$this->article_model->getArticle($articleId);

				//print_r($updateArticle);

				$outputdata['articleid']		=	$updateArticle['art_id'];

				$outputdata['title']			=	$updateArticle['title'];

				$outputdata['description']		=	$updateArticle['description'];

				$outputdata['editsubmit']		=	'editsubmit';

				$outputdata['editbutton']		=	'SAVE';

				$outputdata['articletitle']		=	'UPDATE ARTICLE';

				$outputdata['editaction']		=	'articleEdit';


				$this->load->view('article', $outputdata);

		}
		else if(isset($_POST['editsubmit']))
		{

				$addarticle	=	$this->article_model->articleUpdate($_POST);

				if($addarticle==1)
				{

					$this->index();
				}
				else
				{
					$this->index();
				}
		}
		else
		{

			$getArticlelist				=	$this->article_model->getArticlelist();

			//print_r($getArticlelist);

			$outputdata['articlelist']	=	$getArticlelist;

			$outputdata['article_edit_msg']		=	'Error Occured in Article Edit. Please try again';

			$this->load->view('articlelist', $outputdata);

		}

	}

	//End of Edit Article

	//Start of Article Delete

	public function articleDelete()
	{

		$articleId 			=	$this->uri->segment(3);

		$articleRemove		=	$this->article_model->articleDelete($articleId);

		if($articleRemove==1)

		{

				$this->index();
		}
		else
		{

			$getArticlelist				=	$this->article_model->getArticlelist();

			//print_r($getArticlelist);

			$outputdata['articlelist']	=	$getArticlelist;

			$outputdata['article_edit_msg']		=	'Error Occured in Article Delete. Please try again';

			$this->load->view('articlelist', $outputdata);

		}

	}
}