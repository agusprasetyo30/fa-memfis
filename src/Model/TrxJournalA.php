<?php

namespace memfisfa\Finac\Model;

use App\Models\Project;
use memfisfa\Finac\Model\MemfisModel;

class TrxJournalA extends MemfisModel
{
    protected $table = "trxjournala";

    protected $fillable = [
		'id_branch',
		'voucher_no',
		'description',
		'account_code',
		'debit',
		'credit',
		'id_project',
    ];

	protected $appends = [
		'debit_currency',
		'credit_currency',
	];

	public function coa()
	{
		return $this->belongsTo(
			Coa::class,
			'account_code',
			'id'
		);
	}

	public function getDebitCurrencyAttribute()
	{
		return number_format($this->debit);
	}

	public function getCreditCurrencyAttribute()
	{
		return number_format($this->credit);
    }

	public function journal()
	{
		return $this->belongsTo(
			'memfisfa\Finac\Model\TrxJournal',
			'voucher_no',
			'voucher_no'
		);
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }

}
