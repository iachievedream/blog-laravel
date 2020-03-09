<?php

namespace App\Services;

use App\Repositorie\articleRepository;

class ArticleService
{
	// protected 
	public function __construct(ArticleRepository $articleRepository)
	{
		$this->articleRepository $articleRepository;
	}
	public function articleValidator(array $data)
	{
		return Validator::make($data,[
			'title' => 'required|max:25',
            'content' => 'required|max:255'
		])

	}

}