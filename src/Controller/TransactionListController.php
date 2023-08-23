<?php
namespace App\Controller;

use App\Service\TransactionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Transactions;

class TransactionListController extends AbstractController
{
	private TransactionService $service;

	public function __construct(TransactionService $service)
	{
		$this->service = $service;
	}

	public function __invoke(Request $request): JsonResponse
	{
		return new JsonResponse(
			array_map(
				function (Transactions $transaction) {
					return $transaction->normalize();
				},
				$this->service->getTransactions($request->query->get('limit'), $request->query->get('offset'))
			)
		);
	}
}
