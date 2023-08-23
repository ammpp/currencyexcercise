<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\TransactionService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TransactionEditController extends AbstractController
{
	private TransactionService $service;

	public function __construct(TransactionService $service)
	{
		$this->service = $service;
	}

	public function __invoke(int $id, Request $request): JsonResponse
	{
		$targetCurrency = $request->request->get('target');

		switch (true) {
			case strlen($targetCurrency) != 3:
				$errorMessage = 'Target currency must be provided';
				break;
			default:
				$errorMessage = '';
		}

		if ($errorMessage) {
			return new JsonResponse([
				'status' => 'error',
				'message' => $errorMessage
			], JsonResponse::HTTP_BAD_REQUEST);
		} else {
			$transaction = $this->service->editTransaction(
				$id,
				$targetCurrency
			);
			if ($transaction) {
				return new JsonResponse(
					$transaction->normalize()
				);
			} else {
				return new JsonResponse([
					'status' => 'error',
					'message' => 'Transaction not found'
				], JsonResponse::HTTP_NOT_FOUND);
			}
		}
	}
}
