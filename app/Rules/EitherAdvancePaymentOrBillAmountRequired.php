<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EitherAdvancePaymentOrBillAmountRequired implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $advancePayment = request()->input('advance_payment');
        $billAmount = request()->input('bill_amount');

          // Check if at least one of them has a value
        if (!empty($advancePayment) || !empty($billAmount)) {
            $fail(' bill amount or payment  amount field is required');
        }

        
    }

   
}
