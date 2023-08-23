<?php
namespace App\Controller;

use App\Service\TransactionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TransactionCreateController extends AbstractController
{
	private TransactionService $service;

	public function __construct(TransactionService $service)
	{
		$this->service = $service;
	}

	public function __invoke(Request $request): JsonResponse
	{
		$method = $request->request->get('method', '');
		$isDeposit = $request->request->get('type') == 'deposit';
		$amount = $request->request->get('amount', 0);
		$baseCurrency = $request->request->get('currency', '');
		$targetCurrency = $request->request->get('target', '');

		switch (true) {
			case !$method:
				$errorMessage = 'Payment method must be provided';
				break;
			case $amount <= 0:
				$errorMessage = 'Amount must be greater than 0';
				break;
			case strlen($baseCurrency) != 3:
				$errorMessage = 'Currency must be provided';
				break;
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
			$transaction = $this->service->createTransaction(
				$method,
				$isDeposit,
				$amount,
				$baseCurrency,
				$targetCurrency,
				$request->getClientIp()
			);
			if ($transaction) {
				return new JsonResponse(
					$transaction->normalize()
				);
			} else {
				return new JsonResponse([
					'status' => 'error',
					'message' => 'Could not create transaction'
				], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
			}
		}
	}
}
