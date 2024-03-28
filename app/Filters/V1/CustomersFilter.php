<?php

namespace App\Filters\V1;

use Illuminate\Database\Eloquent\Builder;

class CustomersFilter extends AbstractFilter
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
            ->when($this->request->filled('name'), function (Builder $query){
                $query->where('name', 'LIKE', "%".$this->request->input('name')."%");
            })
            ->when($this->request->filled('type'), function (Builder $query){
                $query->where('type', '=', $this->request->input('type'));
            })
            ->when($this->request->filled('email'), function (Builder $query){
                $query->where('email', 'LIKE', "%".$this->request->input('email')."%");
            })
            ->when($this->request->filled('address'), function (Builder $query){
                $query->where('address', 'LIKE', "%".$this->request->input('address')."%");
            })
            ->when($this->request->filled('city'), function (Builder $query){
                $query->where('city', 'LIKE', "%".$this->request->input('city')."%");
            })
            ->when($this->request->filled('state'), function (Builder $query){
                $query->where('state', 'LIKE', "%".$this->request->input('state')."%");
            })
            ->when($this->request->filled('postalCode'), function (Builder $query){
                $query->where('postal_code', 'LIKE', "%".$this->request->input('postalCode')."%");
            })
            ->orderBy(
                $this->request->input('sortBy', 'id'),
                $this->request->input('sortOrder', 'desc'),
            );
    }
}
