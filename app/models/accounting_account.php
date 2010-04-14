<?php
class AccountingAccount extends AppModel {

	var $name = 'AccountingAccount';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'ParentAccount' => array(
			'className' => 'AccountingAccount',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'AccountingBukuBesar' => array(
			'className' => 'AccountingBukuBesar',
			'foreignKey' => 'accounting_account_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function getAccountTree($parent_id = 0)
	{
		$this->recursive = -1;
		
		$accounts = $this->find('all',array(
			'conditions' => array(
				'AccountingAccount.parent_id' => $parent_id
			),
			'order' => array('AccountingAccount.account_type'),
		));
		
		for ($i = 0; $i < count($accounts); $i++) {
			$count = $this->find('count', array(
				'conditions' => array(
					'AccountingAccount.parent_id' => $accounts[$i]['AccountingAccount']['id']
				)
			));
			if($count != 0){
				$accounts[$i]['children'] = $this->getAccountTree($accounts[$i]['AccountingAccount']['id']);
			}
		}
		
		return $accounts;
	}
	
	function getChildes()
	{
		return $this->find('all',array(
			'conditions' => array(
				'(SELECT count(*) from accounting_accounts WHERE parent_id = AccountingAccount.id)' => 0
			)
		));
	}
	
	function getChildesList()
	{
		return $this->find('list',array(
			'conditions' => array(
				'(SELECT count(*) from accounting_accounts WHERE parent_id = AccountingAccount.id)' => 0
			),
			'order'=> array('AccountingAccount.parent_id'),
		));
	}


}
?>
