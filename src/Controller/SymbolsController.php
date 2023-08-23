<?php
namespace App\Controller;

use App\Service\ApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class SymbolsController extends AbstractController
{
	private ApiClient $apiClient;

	public function __construct(ApiClient $apiClient)
	{
		$this->apiClient = $apiClient;
	}

	public function __invoke(): JsonResponse
	{
		return new JsonResponse($this->apiClient->getSymbols(), 200, [], true);
	}
}
