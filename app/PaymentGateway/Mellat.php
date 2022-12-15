<?php

namespace App\PaymentGateway;

use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Verta;

class Mellat extends Payment
{
    public $orderID;
    public function send($amounts, $addressId , $description , $ip)
    {

    require_once("mellat/nusoap.php");
		
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	//$page = curl_exec ($ch);

	$client = new soapclient('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
	$namespace='http://interfaces.core.sw.bps.com/';

	///////////////// PAY REQUEST

	if (isset($_POST['PayRequestButton'])) 
	{ 
        $v = verta();
		$terminalId = $_POST['TerminalId'];
		$userName = $_POST['UserName'];
		$userPassword = $_POST['UserPassword'];
		$orderId = $_POST['PayOrderId'];
		$amount = $_POST['PayAmount'];
		//$date =  date("YYMMDD");
		//$time =  date("HHIISS");
		$localDate = $_POST['PayDate'];
		$localTime = $_POST['PayTime'];
		$additionalData = $_POST['PayAdditionalData'];
		$callBackUrl = $_POST['PayCallBackUrl'];
		$payerId = $_POST['PayPayerId'];

		// Check for an error
		$err = $client->getError();
		if ($err) {
			echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
			die();
		}
	  
		$parameters = array(
			'terminalId' => '6814608',
			'userName' => 'lik404',
			'userPassword' => '31776521',
			'orderId' => '1001',
			'amount' => $amounts,
			'localDate' => $v->formatDate(),
			'localTime' => $v->formatTime(),
			'additionalData' => 'null',
			'callBackUrl' => route('home.payment_verify', ['gatewayName' => 'mellat']),
			'payerId' => '0');

		// Call the SOAP method
		$result = $client->call('bpPayRequest', $parameters, $namespace);
		
		// Check for a fault
		if ($client->fault) {
			echo '<h2>Fault</h2><pre>';
			print_r($result);
			echo '</pre>';
			die();
		} 
		else {
			// Check for errors
			
			$resultStr  = $result;

			$err = $client->getError();
			if ($err) {
				// Display the error
				echo '<h2>Error</h2><pre>' . $err . '</pre>';
				die();
			} 
			else {
				// Display the result

				$res = explode (',',$resultStr);

				echo "<script>alert('Pay Response is : " . $resultStr . "');</script>";
				echo "Pay Response is : " . $resultStr;

				$ResCode = $res[0];
				
				if ($ResCode == "0") {
					// Update table, Save RefId
					echo "<script language='javascript' type='text/javascript'>postRefId('" . $res[1] . "');</script>";
				} 
				else {
				// log error in app
					// Update table, log the error
					// Show proper message to user
				}
			}// end Display the result
		}// end Check for errors
	}
	else
	{	
		echo "<script>initData();</script>";
	}
	 
  }

  public function verify($token , $status)
    {
        require_once("mellat/nusoap.php");
        
		$terminalId = $_POST['TerminalId'];
		$userName = $_POST['UserName'];
		$userPassword = $_POST['UserPassword'];
		$orderId = $_POST['VerifyOrderId'];
		$verifySaleOrderId = $_POST['VerifySaleOrderId'];
		$verifySaleReferenceId = $_POST['VerifySaleReferenceId'];

		// Check for an error
		$err = $client->getError();
		if ($err) {
			echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
			die();
		}
	  	  
		$parameters = array(
			'terminalId' => $terminalId,
			'userName' => $userName,
			'userPassword' => $userPassword,
			'orderId' => $orderId,
			'saleOrderId' => $verifySaleOrderId,
			'saleReferenceId' => $verifySaleReferenceId);

		// Call the SOAP method
		$result = $client->call('bpVerifyRequest', $parameters, $namespace);

		// Check for a fault
		if ($client->fault) {
			echo '<h2>Fault</h2><pre>';
			print_r($result);
			echo '</pre>';
			die();
		} 
		else {

			$resultStr = $result;
			
			$err = $client->getError();
			if ($err) {
				// Display the error
				echo '<h2>Error</h2><pre>' . $err . '</pre>';
				die();
			} 
			else {
				// Display the result
				// Update Table, Save Verify Status 
				// Note: Successful Verify means complete successful sale was done.
				echo "<script>alert('Verify Response is : " . $resultStr . "');</script>";
				echo "Verify Response is : " . $resultStr;
			}// end Display the result
		}// end Check for errors

    }


}


