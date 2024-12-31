<?php

namespace App\Services;
use App\Traits\HandleError;
use App\Interfaces\IBalanceTransferService;
use App\Repositories\TransactionsRepository;

class BalanceTransferService implements IBalanceTransferService
{
    public function __construct(protected TransactionsRepository $transactionsRepository)
    {
        // Constructor code here
    }

    public function transfer($data)
    {
        $data['created_by'] = 1;
        $result = $this->transactionsRepository->processTranster($data);

        if (!$result['success']) {
            return HandleError::handle($result['message']);
        }

        return $result['result'];
    }
}
