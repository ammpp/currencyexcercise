<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
	public function __invoke(): Response
	{
		return new Response('
			<b>GET</b> /api/symbols - Get all currrencies symbols<br />
			<hr />
			<b>POST</b> /api/transaction - Creates transaction<ul>
			<li>method (string) - payment method</li>
			<li>type (string) - deposit or withdrawal</li>
			<li>amount (number) - amount in base currency</li>
			<li>currency (string) - base currency symbol</li>
			<li>target (string) - target currency symbol</li>
			</ul>
			<hr />
			<b>GET</b> /api/transaction - List of transactions<ul>
			<li>limit (int) - limit of elements</li>
			<li>offset (int) - offset of elements fragment</li>
			</ul>
			<hr />
			<b>PUT</b> /api/transaction/{id} - Edit transaction<ul>
			<li>target (string) - target currency symbol</li>
			</ul>
			<hr />
			<b>DELETE</b> /api/transaction/{id} - Delete transaction<br />
		');
	}
}
