<?php

namespace App\Filters\V1;

use Illuminate\Database\Eloquent\Builder;

class InvoicesFilter extends AbstractFilter
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {
        return $query->when($this->request->filled('id'), function (Builder $query){
                $query->where('id', '=', $this->request->input('id'));
            })
            ->when($this->request->filled('customerId'), function (Builder $query){
                $query->where('customer_id', '=', $this->request->input('customerId'));
            })
            ->when($this->request->filled('amountFrom'), function (Builder $query){
                $query->where('amount', '>=', $this->request->input('amountFrom'));
            })
            ->when($this->request->filled('amountTo'), function (Builder $query){
                $query->where('amount', '<=', $this->request->input('amountTo'));
            })
            ->when($this->request->filled('status'), function (Builder $query){
                $query->where('status', '=', $this->request->input('status'));
            })
            ->when($this->request->filled('billedDateFrom'), function (Builder $query){
                $query->where('billed_date', '>=', $this->request->input('billedDateFrom'));
            })
            ->when($this->request->filled('billedDateTo'), function (Builder $query){
                $query->where('billed_date', '<=', $this->request->input('billedDateTo'));
            })
            ->when($this->request->filled('paidDateFrom'), function (Builder $query){
                $query->where('paid_date', '>=', $this->request->input('paidDateFrom'));
            })
            ->when($this->request->filled('paidDateTo'), function (Builder $query){
                $query->where('paid_date', '<=', $this->request->input('paidDateTo'));
            })
            ->orderBy(
                $this->request->input('sortBy', 'id'),
                $this->request->input('sortOrder', 'desc'),
            );
    }
}
