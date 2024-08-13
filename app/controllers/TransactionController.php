<?php
namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use MyApp\Models\Transaction;
use MyApp\Services\FeeCalculationService;
use MyApp\Services\TransactionCategorizationService;
use MyApp\Services\ApiService;
use Phalcon\Http\Request\File;

class TransactionController extends Controller
{
    public function processAction()
    {
        $uploadedFile = $this->request->getUploadedFiles()[0];
        
        if ($uploadedFile->getExtension() !== 'csv') {
            return $this->returnJsonResponse(['error' => 'Please upload a valid CSV file.'], 400);
        }

        $transactions = $this->loadTransactionsFromCsv($uploadedFile);

        foreach ($transactions as $transactionData) {
            $transaction = new Transaction($transactionData);
            $transaction->fee = $this->di->get('feeCalculationService')->calculate($transaction);
            $transaction->save();         
        }

        return $this->returnJsonResponse(['message' => 'Transactions processed successfully.']);
    }

    protected function loadTransactionsFromCsv(File $file)
    {
        $transactions = [];

        $csvData = file_get_contents($file->getTempName());
        
        $lines = explode("\n", $csvData);
        foreach ($lines as $line) {
            if (!empty($line)) {
                $transactions[] = str_getcsv($line);
            }
        }

        return $transactions;
    }

    private function returnJsonResponse(array $data, int $status = 201): Response
    {
        $response = new Response();
        $response->setJsonContent($data);
        $response->setStatusCode($status);

        return $response;
    }
}
