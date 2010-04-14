<?php

class AccountingReportingsController extends AppController {

	var $helpers = array('Html', 'Form','Time','Number');
	var $uses = array('AccountingTransaction','AccountingAccount','AccountingBukuBesar');
	var $components = array('Session');

	function __construct()
	{
		parent::__construct();
		$this->set("modul","accounting");
		$this->set("submodul","reporting");
		
	}
	
	function index(){
		$this->redirect(array('action'=>'neraca_saldo'));
	}
	
	function jurnal(){
		$this->set('current','jurnal');

		$this->AccountingTransaction->recursive = 0;
		
		$from = null;
		$to = null;
		$jurnal_selected_from = null;
		$jurnal_selected_to = null;
		if(isset($this->data['FilterJurnal'])){
			
			$jurnal_selected_from = $this->data['FilterJurnal']['created_from'];
			$jurnal_selected_to = $this->data['FilterJurnal']['created_to'];
			
			$from = trim(implode('-',array_values($this->data['FilterJurnal']['created_from'])),'-') . ' 00:00:00';
			$to = trim(implode('-',array_values($this->data['FilterJurnal']['created_to'])),'-') .' 23:59:59';
			

			
			
			$this->Session->write('FilterJurnal.created_from',$from);
			$this->Session->write('FilterJurnal.selected_from',$jurnal_selected_from);
			
			$this->Session->write('FilterJurnal.created_to',$to);
			$this->Session->write('FilterJurnal.selected_to',$jurnal_selected_to);
			
		} else {
			if($this->Session->check('FilterJurnal')){
				$from = $this->Session->read('FilterJurnal.created_from');
				$to = $this->Session->read('FilterJurnal.created_to');
				
				$jurnal_selected_from = $this->Session->read('FilterJurnal.selected_from');
				$jurnal_selected_to = $this->Session->read('FilterJurnal.selected_to');
			}
		}
		if($from !== null) {
			$this->paginate['conditions'] = array(
				'AccountingTransaction.created >= ' => $from,
				'AccountingTransaction.created <= ' => $to
			);
		}
		$this->set('jurnal_selected_from',$jurnal_selected_from);
		$this->set('jurnal_selected_to',$jurnal_selected_to);
		
		$jurnals = $this->paginate('AccountingTransaction');
		
		$this->set(compact('jurnals','date_options_created'));
	}
	
	
	function buku_besar(){
		
		$selected_year = date('Y');
		$selected_month = date('m');
		if(isset($this->data['FilterBukuBesar'])){
			$date = $this->data['FilterBukuBesar']['year'] .'-'
					. $this->data['FilterBukuBesar']['month'];
					
			$account_id = $this->data['FilterBukuBesar']['account'];
			$this->AccountingAccount->recursive = -1;
			$this->set('account',$this->AccountingAccount->read(null,$account_id));
			
			$bukubesars = $this->AccountingBukuBesar->find('all',array(
				'conditions' => array(
					'AccountingBukuBesar.accounting_account_id' => $account_id,
					'AccountingBukuBesar.created >= ' => $date.'-1 00:00:00',
					'AccountingBukuBesar.created <= ' => $date.'-31 23:59:59',
				)
			));
			$this->set('bukubesars',$bukubesars);
			
			$month = (int) $this->data['FilterBukuBesar']['month'];
			$year = (int) $this->data['FilterBukuBesar']['year'];
			
			if($month - 1 == 0) {
				$month_before = 12;
				$year_before = $year - 1;
			} else {
				$month_before = $month - 1;
				$year_before = $year;
			}
			
			$date_before = $year_before . '-' . $month_before . '-31 23:59:59';
			$date_current_after = $date .'-1 00:00:00';
			$date_current_before = $date .'-31 23:59:59';
			
			$this->set('saldo_debit',$this->AccountingBukuBesar->getDebitRange($account_id,$date_current_after,$date_current_before));
			$this->set('saldo_credit',$this->AccountingBukuBesar->getCreditRange($account_id,$date_current_after,$date_current_before));
			
			$this->set('saldo_awal_debit',$this->AccountingBukuBesar->getDebit($account_id,$date_before));
			$this->set('saldo_awal_credit',$this->AccountingBukuBesar->getCredit($account_id,$date_before));
			
			$this->set('saldo_akhir_debit',$this->AccountingBukuBesar->getDebit($account_id,$date.'-31 23:59:59'));
			$this->set('saldo_akhir_credit',$this->AccountingBukuBesar->getCredit($account_id,$date.'-31 23:59:59'));
			
			$selected_month = $this->data['FilterBukuBesar']['month'];
			$selected_year = $this->data['FilterBukuBesar']['year'];
			
		}
		$this->set('selected_month',$selected_month);
		$this->set('selected_year',$selected_year);
		$this->set('current','buku_besar');
		$this->set('accounts',$this->AccountingAccount->getChildesList());
	}
	
	function neraca_saldo(){
		$this->set('current','neraca_saldo');
		
		if(isset($this->data['FilterNeracaSaldo']))
		{
			$this->set('selected_month',$this->data['FilterNeracaSaldo']['month']);
			$this->set('selected_year',$this->data['FilterNeracaSaldo']['year']);
			
			$before = $this->data['FilterNeracaSaldo']['year'] . '-'
						. $this->data['FilterNeracaSaldo']['month']
						. '-31 23:59:59';
			$this->set('neraca',$this->AccountingBukuBesar->getNeracaSaldo($before));
			
		} else {
			$this->set('selected_month',date('m'));
			$this->set('selected_year',date('Y'));
			$this->set('neraca',$this->AccountingBukuBesar->getNeracaSaldo());
		}
		
	}
	
	function neraca()
	{
		$this->set('current','neraca');
		if(isset($this->data['FilterNeraca']))
		{
			$this->set('selected_month',$this->data['FilterNeraca']['month']);
			$this->set('selected_year',$this->data['FilterNeraca']['year']);
			
			$month = $this->data['FilterNeraca']['year'] . '-'
						. $this->data['FilterNeraca']['month'];
			$this->set('neraca',$this->AccountingBukuBesar->getNeracaAll($month));
			
		} else {
			$this->set('selected_month',date('m'));
			$this->set('selected_year',date('Y'));
			$this->set('neraca',$this->AccountingBukuBesar->getNeracaAll());
		}
	}
	
	function laba_rugi()
	{
		$this->set('current','laba_rugi');
		
		if(isset($this->data['FilterLabaRugi']))
		{
			$selected_month = $this->data['FilterLabaRugi']['month'];
			$selected_year = $this->data['FilterLabaRugi']['year'];
			$laba_rugi = $this->AccountingBukuBesar->getLabaRugi($this->data['FilterLabaRugi']);
		} else {
			$selected_month = date('m');
			$selected_year = date('Y');
			$laba_rugi = $this->AccountingBukuBesar->getLabaRugi();
		}
		$this->set('selected_month',$selected_month);
		$this->set('selected_year', $selected_year);
		$this->set('laba_rugi',$laba_rugi);
	}
	
	

	
	function jurnal_penyesuaian(){
		$this->set('current','jurnal_penyesuaian');
		$this->AccountingTransaction->recursive = 0;
		
		$from = null;
		$to = null;
		$jurnal_selected_from = null;
		$jurnal_selected_to = null;
		if(isset($this->data['FilterJurnalPenyesuaian'])){
			
			$jurnal_selected_from = $this->data['FilterJurnalPenyesuaian']['created_from'];
			$jurnal_selected_to = $this->data['FilterJurnalPenyesuaian']['created_to'];
			
			$from = trim(implode('-',array_values($this->data['FilterJurnalPenyesuaian']['created_from'])),'-') . ' 00:00:00';
			$to = trim(implode('-',array_values($this->data['FilterJurnalPenyesuaian']['created_to'])),'-') .' 23:59:59';
			

			
			
			$this->Session->write('FilterJurnalPenyesuaian.created_from',$from);
			$this->Session->write('FilterJurnalPenyesuaian.selected_from',$jurnal_selected_from);
			
			$this->Session->write('FilterJurnalPenyesuaian.created_to',$to);
			$this->Session->write('FilterJurnalPenyesuaian.selected_to',$jurnal_selected_to);
			
		} else {
			if($this->Session->check('FilterJurnalPenyesuaian')){
				$from = $this->Session->read('FilterJurnalPenyesuaian.created_from');
				$to = $this->Session->read('FilterJurnalPenyesuaian.created_to');
				
				$jurnal_selected_from = $this->Session->read('FilterJurnalPenyesuaian.selected_from');
				$jurnal_selected_to = $this->Session->read('FilterJurnalPenyesuaian.selected_to');
			}
		}
		if($from !== null) {
			$this->paginate['conditions'] = array(
				'AccountingTransaction.created >= ' => $from,
				'AccountingTransaction.created <= ' => $to
			);
		}
		$this->paginate['conditions']['AccountingTransaction.adjustment'] = true;
		$this->set('jurnal_selected_from',$jurnal_selected_from);
		$this->set('jurnal_selected_to',$jurnal_selected_to);
		
		$jurnals = $this->paginate('AccountingTransaction');
		
		$this->set(compact('jurnals','date_options_created'));
	}
	
	
	
	function neraca_lajur(){
		$this->set('current','neraca_lajur');
	}
	
	function jurnal_penutup(){
		$this->set('current','jurnal_penutup');
	}
	
	
}
