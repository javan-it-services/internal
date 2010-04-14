<?php
class AccountingBukuBesar extends AppModel {

	var $name = 'AccountingBukuBesar';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'AccountingAccount' => array(
			'className' => 'AccountingAccount',
			'foreignKey' => 'accounting_account_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AccountingTransaction' => array(
			'className' => 'AccountingTransaction',
			'foreignKey' => 'accounting_transaction_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function getDebitRange($account_id,$from, $to)
	{
		$result = $this->query("SELECT SUM(`debit`)  AS saldo 
								FROM `accounting_buku_besars` 
								WHERE 
									`accounting_account_id`= $account_id
									AND `created` >= '$from' 
									AND `created` <=  '$to'");
									
		return $result[0][0]['saldo'];
	}
	
	function getCreditRange($account_id,$from, $to)
	{
		$result = $this->query("SELECT SUM(`credit`)  AS saldo 
								FROM `accounting_buku_besars` 
								WHERE 
									`accounting_account_id`= $account_id
									AND `created` >= '$from' 
									AND `created` <=  '$to'");
									
		return $result[0][0]['saldo'];
	}
	
	function getDebit($account_id,$before=null,$after = null)
	{
		$q = '';
		
		if($before != null){
			$q .= " AND `created` <= '$before'";
		}
		if($after != null) {
			$q .= " AND `created` >= '$after'";
		}
		
		$result = $this->query("SELECT (SUM(`debit`) - SUM(`credit`))  AS saldo 
								FROM `accounting_buku_besars` 
								WHERE 
									`accounting_account_id`= $account_id
									$q ");
		return $result[0][0]['saldo'] > 0 ?$result[0][0]['saldo'] : 0;
	}
	function getCredit($account_id,$before=null,$after = null)
	{
		$q = '';
		
		if($before != null){
			$q .= " AND `created` <= '$before'";
		}
		if($after != null) {
			$q .= " AND `created` >= '$after'";
		}
		
		$result = $this->query("SELECT (SUM(`credit`) - SUM(`debit`)) AS saldo 
								FROM `accounting_buku_besars` 
								WHERE 
									`accounting_account_id`= $account_id
									$q ");
		return $result[0][0]['saldo'] > 0 ?$result[0][0]['saldo'] : 0;
	}
	
	function getNeracaSaldo($before = null)
	{
		$q = '';
		if($before !== null){
			$q = "WHERE BukuBesar.created <= '$before'";
		}
		$result = $this->query("SELECT
									Account.id,
									Account.nomor,
									Account.account_type,
									Account.name,
									(SUM(BukuBesar.debit) - SUM(BukuBesar.credit)) as debit, 
									(SUM(BukuBesar.credit) - SUM(BukuBesar.debit)) as credit
								FROM accounting_buku_besars as BukuBesar 
								JOIN accounting_accounts as Account ON(Account.id = BukuBesar.accounting_account_id)
								$q
								AND Account.id != 18
								GROUP BY Account.id
								ORDER BY Account.account_type
								");
								
		return $result;
	}
	/**
	 * @var $account_type, valid is AKTIVA,KEWAJIBAN, EKUITAS
	 */
	function getNeraca($account_type,$month=null)
	{
		if($account_type == 'AKTIVA') {
			$q = "(SUM(BukuBesar.debit) - SUM(BukuBesar.credit)) as jumlah";
		} else {
			$q = "(SUM(BukuBesar.credit) - SUM(BukuBesar.debit)) as jumlah";
		}
		if($month === null){
			$month = date('Y-m');
		}
		
		$type = $this->query("SELECT
									Account.id,
									Account.nomor,
									Account.account_type,
									Account.name,
									$q 
								FROM accounting_buku_besars as BukuBesar 
								JOIN accounting_accounts as Account ON(Account.id = BukuBesar.accounting_account_id)
								WHERE Account.account_type = '$account_type'
								AND DATE_FORMAT(BukuBesar.created,'%Y-%m') = '$month'
								AND Account.display = 1
								GROUP BY Account.id");
		$jumlah = $this->query("SELECT 
									$q
								FROM accounting_buku_besars as BukuBesar 
								JOIN accounting_accounts as Account ON(Account.id = BukuBesar.accounting_account_id)
								WHERE Account.account_type = '$account_type'
								AND DATE_FORMAT(BukuBesar.created,'%Y-%m') = '$month'
								AND Account.display = 1");
		return array("data"=>$type,"jumlah" => $jumlah[0][0]['jumlah']);
	}
	
	function getNeracaAll($before=null)
	{
		$type = array('AKTIVA','KEWAJIBAN','EKUITAS');
		$data = array();
		
		foreach($type as $t)
		{
			$data[$t] = $this->getNeraca($t,$before);
		}
		
		return $data;
		
	}
	
	
	function getLabaRugi($filter = null)
	{
		if($filter !== null)
			$month = $filter['year'] . '-' . $filter['month'];
		else 
			$month = date('Y-m');
		
		$each = array(2 => 'PENDAPATAN',14 => 'BEBAN');
		$laba_rugi = array();
		foreach($each as $parent_id => $type){
			$data = $this->query("SELECT
									Account.id,
									Account.nomor,
									Account.account_type,
									Account.name,
									(SUM(BukuBesar.credit) - SUM(BukuBesar.debit)) as jumlah
								FROM accounting_buku_besars as BukuBesar 
								JOIN accounting_accounts as Account ON(Account.id = BukuBesar.accounting_account_id)
								WHERE DATE_FORMAT(BukuBesar.created,'%Y-%m') = '$month'
								AND Account.parent_id = $parent_id
								GROUP BY Account.id");
								
			$jumlah = $this->query("SELECT (SUM(BukuBesar.credit) - SUM(BukuBesar.debit)) as jumlah
								FROM accounting_buku_besars as BukuBesar 
								JOIN accounting_accounts as Account ON(Account.id = BukuBesar.accounting_account_id)
								WHERE DATE_FORMAT(BukuBesar.created,'%Y-%m') = '$month'
								AND Account.parent_id = $parent_id");
								
			$laba_rugi[$type] = array("data"=>$data,"jumlah" => $jumlah[0][0]['jumlah']);
		}
		
		return $laba_rugi;
	}
	

}
