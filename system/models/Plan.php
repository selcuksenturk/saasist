<?php
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	public static function availableModules()
	{
		global $_L;
		return [
			[
				'name' => $_L['Accounting'],
				'short_name' => 'accounting'
			],
			[
				'name' => $_L['Invoicing'],
				'short_name' => 'invoicing'
			],
			[
				'name' => $_L['Quotes'],
				'short_name' => 'quotes'
			],
			[
				'name' => $_L['Suppliers'],
				'short_name' => 'suppliers'
			],
			[
				'name' => $_L['Purchase'],
				'short_name' => 'purchase'
			],
			[
				'name' => $_L['Leads'],
				'short_name' => 'leads'
			],
			[
				'name' => $_L['SMS'],
				'short_name' => 'sms'
			],
			[
				'name' => $_L['Support'],
				'short_name' => 'support'
			],
			[
				'name' => $_L['Knowledgebase'],
				'short_name' => 'kb'
			],
			[
				'name' => $_L['Orders'],
				'short_name' => 'orders'
			],
			[
				'name' => $_L['Documents'],
				'short_name' => 'documents'
			],
			[
				'name' => $_L['Tasks'],
				'short_name' => 'tasks'
			],
			[
				'name' => $_L['Calendar'],
				'short_name' => 'calendar'
			],
			[
				'name' => $_L['Password Manager'],
				'short_name' => 'password_manager'
			],
		];
	}
}