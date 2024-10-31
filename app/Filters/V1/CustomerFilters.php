<?php

namespace App\Filters\V1;
use illuminate\http\Request;
use App\Filters\ApiFilters;
class CustomerFilters extends ApiFilters{
    protected $safeParms=[
        'name'=>['eq'],
        'type'=>['eq'],
        'email'=>['eq'],
        'address'=>['eq'],
        'city'=>['eq'],
        'postalCode'=>['eq','gt','lt'],
        'state'=>['eq'],

    ];

    protected $columnMap = [
        'postalCode' => 'postal_code'
    ];
    protected $operatorMap =[
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',

    ];

   
}
