<?php

namespace App\Services;

use App\Repositorie\ArticleRepository;
use Illuminate\Support\Facades\Validator;

trait ArticleService
{
	// public function __construct(ArticleRepository $articleRepository)
	// {
	// 	$this->articleRepository $articleRepository;
	// }
	public function articleValidator(array $data)
	{
		return validator::make($data, [
			'title' => ['required','max:25'],
            'content' => ['required','max:255']
		]);
	}
}