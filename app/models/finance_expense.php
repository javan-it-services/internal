<?php
class FinanceExpense extends AppModel {

	var $name = 'FinanceExpense';
	var $belongsTo = array(
			'FinanceAccount' => array(
				'className' => 'FinanceAccount',
				'foreignKey' => 'finance_account_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			),
			'FinanceYear' => array(
				'className' => 'FinanceYear',
				'foreignKey' => 'finance_year_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
}
?>