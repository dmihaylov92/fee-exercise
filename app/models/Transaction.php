<?php

namespace MyApp\Models;

use Phalcon\Mvc\Model;

class Transaction extends Model
{
    public $id;
    public $external_id;
    public $date;
    public $amount;
    public $currency;
    public $type;
    public $account_id;
    public $fee;

    public function __construct(array $data) {
        $this->external_id = $data['transaction_id'];
        $this->date = $data['date'];
        $this->amount = $data['amount'];
        $this->currency = $data['currency'];
        $this->type = $data['type'];
        $this->account_id = $data['account_id'];
    }

    public function initialize()
    {
        $this->setSource('transactions');
    }
}
