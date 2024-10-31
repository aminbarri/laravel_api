<?php

namespace App\Filters\V1;
use illuminate\http\Request;
use App\Filters\ApiFilters;
class InvoiceFilters extends ApiFilters{
 
    protected $safeParms=[
        'amount'=>['eq','gt','lt','lte','gte'],
        'status'=>['eq','ne'],
        'billedDate'=>['eq','gt','lt','lte','gte'],
        'paidDate'=>['eq','gt','lt','lte','gte'],
        'customerId'=>['eq'],
        

    ];

    protected $columnMap = [
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date',
        'customerId' => 'customer_id'
    ];
    protected $operatorMap =[
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
        'ne'=>'!='

    ];

    
}
