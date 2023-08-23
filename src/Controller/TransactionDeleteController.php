<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\TransactionService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TransactionDeleteController extends AbstractController
{
	private TransactionService $service;

	public function __construct(TransactionService $service)
	{
		$this->service = $service;
	}

	public function __invoke(int $id): JsonResponse
	{
		if ($this->service->deleteTransaction($id)) {
			return new JsonResponse([
				'status' => 'OK'
			]);
		} else {
			return new JsonResponse([
				'status' => 'error',
				'message' => 'Transaction not found'
			], JsonResponse::HTTP_NOT_FOUND);
		}
	}
}
