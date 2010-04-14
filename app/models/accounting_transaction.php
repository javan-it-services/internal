<?php
class AccountingTransaction extends AppModel {

	var $name = 'AccountingTransaction';
	
	var $actsAs = array(
		'NameScope' => array(
			'desc' => array(
				'order' => 'AccountingTransaction.created DESC '
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'AccountDebit' => array(
			'className' => 'AccountingAccount',
			'foreignKey' => 'account_debit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AccountCredit' => array(
			'className' => 'AccountingAccount',
			'foreignKey' => 'account_credit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'AccountingBukuBesar' => array(
			'className' => 'AccountingBukuBesar',
			'foreignKey' => 'accounting_transaction_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
	function save($data){
		App::import('Model','AccountingBukuBesar');
		App::import('Model','AccountingAccount');
		
		$bukubesar = new AccountingBukuBesar();
		$account = new AccountingAccount();
		
		//$type = $this->AccountingTransactionType
		//			->findById($data['AccountingTransaction']['accounting_transaction_type_id']);
		//$data['AccountingTransaction']['account_debit_id'] = $type['AccountingTransactionType']['account_debit_id'];
		//$data['AccountingTransaction']['account_credit_id'] = $type['AccountingTransactionType']['account_credit_id'];
		if(parent::save($data)){
			
			$bukus = array(
				array(
					'AccountingBukuBesar' => array(
						'accounting_account_id' => $data['AccountingTransaction']['account_debit_id'],
						'accounting_transaction_id' => $this->id,
						'estimates' => 'DEBIT',
						'amount' => $data['AccountingTransaction']['amount'],
						'debit' => $data['AccountingTransaction']['amount'],
						'credit' => 0,
					)
				),
				array(
					'AccountingBukuBesar' => array(
						'accounting_account_id' => $data['AccountingTransaction']['account_credit_id'],
						'accounting_transaction_id' => $this->id,
						'estimates' => 'CREDIT',
						'amount' => $data['AccountingTransaction']['amount'],
						'debit' => 0,
						'credit' => $data['AccountingTransaction']['amount'],
					)
				)
			);
			
			foreach($bukus as $buku) {
				$b = $bukubesar->find('all',array(
					'conditions' => array(
						'AccountingBukuBesar.accounting_transaction_id' => $buku['AccountingBukuBesar']['accounting_transaction_id'],
						'AccountingBukuBesar.estimates' => $buku['AccountingBukuBesar']['estimates']
						
					)
				));
				if(count($b) === 0) {
					$bukubesar->create();
				} else {
					$bukubesar->id = $b[0]['AccountingBukuBesar']['id'];
				}
				
				$bukubesar->save($buku);
				
				$parent = $account->read(null,$buku['AccountingBukuBesar']['accounting_account_id']);
				
				if($parent['AccountingAccount']['parent_id'] == 14){
					$bukubesar->create();
					$bukubesar->save(array(
						'AccountingBukuBesar' => array(
							'accounting_account_id' => 18,
							'accounting_transaction_id' => $this->id,
							'estimates' => 'DEBIT',
							'amount' => $buku['AccountingBukuBesar']['amount'],
							'debit' => $buku['AccountingBukuBesar']['amount'],
							'credit' => 0,
						)
					));
				}
				
				if($parent['AccountingAccount']['parent_id'] == 2){
					$bukubesar->create();
					$bukubesar->save(array(
						'AccountingBukuBesar' => array(
							'accounting_account_id' => 18,
							'accounting_transaction_id' => $this->id,
							'estimates' => 'CREDIT',
							'amount' => $buku['AccountingBukuBesar']['amount'],
							'debit' => 0,
							'credit' => $buku['AccountingBukuBesar']['amount'],
						)
					));
				}
				
				
				
			}
			
			return true;
		} else {
			return false;
		}
	}
	
	function afterDelete(){
		App::import('Model','AccountingBukuBesar');
		$bukubesar = new AccountingBukuBesar();
		
		$bukus = $bukubesar->find('all',array(
			'conditions' => array('AccountingBukuBesar.accounting_transaction_id' => $this->id)
		));
		
		foreach($bukus as $buku){
			$bukubesar->delete($buku['AccountingBukuBesar']['id']);
		}
	}

}
?>
