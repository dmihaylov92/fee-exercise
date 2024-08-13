<?php 

namespace MyApp\Services;

use Phalcon\Db\Adapter\Pdo\Mysql;
use MyApp\Models\Transaction;

class FeeCalculationService
{
    protected FeatureToggle $featureToggleService;

    public function __construct(Mysql $db)
    {
        $this->featureToggleService = new FeatureToggle($db);
    }

    public function calculate(Transaction $transaction): float
    {
        $feesEnabled = $this->featureToggleService->isEnabled('fees_feature');
        
        if ($feesEnabled === false) {
            return 0;
        }

        $fee = 0;

        if ($transaction->type === 'Credit') {
            $fee = $transaction->amount * 0.015; // 1.5% for Credit transactions
        } elseif ($transaction->type === 'Debit') {
            $fee = 1.00; // 1% for Debit transactions
        }

        $transaction->fee = $fee;
        
        return $fee;
    }
}
