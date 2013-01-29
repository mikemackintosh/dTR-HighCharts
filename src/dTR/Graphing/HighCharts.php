<?php

/*
 * dTR-HighCharts
 *
 * @author Mike Mackintosh
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public Licence
 * @copyright (c) 2013 - Mike Mackintosh
 * @version 0.1
 * @package dTR
 */

namespace dTR\Graphing;

/*
 * 
 */
class HighCharts{
	
	private
		$series = array();
	
	public function __construct(){
		
		
		
	}
	
	public function dataColumn($column){
		
		$this->dataColumn = $column;
		
		return $this;
		
	}

	public function dateColumn($column){
	
		$this->dateColumn = $column;
	
		return $this;
	
	}
	
	public function isDate($bool = true){
		
		$this->date = $bool;
		
		return $this;
		
	}
	
	public function seriesName($name){
		
		$this->seriesName = $name;
		
		return $this;
		
	}
	
	public function setData($data){
		
		$this->data = $data;
		
		return $this;
		
	}
	
	public function __toString(){
		
		foreach($this->data as $data){
			
			if(!array_key_exists($data[$this->seriesName], $this->series)){
				
				$this->series[$data[$this->seriesName]] = array(
							"name" => $data[$this->seriesName],
							"data" => array()
						);
				
			}

			if($data[$this->dataColumn] == "null" || $data[$this->dataColumn] == null){
				$data[$this->dataColumn] = 0;
			}
			
			
			$data[$this->dateColumn] = $data[$this->dateColumn] - substr($data[$this->dateColumn], -2);
			$this->series[$data[$this->seriesName]]['data'][] = array( (int) $data[$this->dateColumn]*1000, (is_numeric($data[$this->dataColumn]) ? (int)$data[$this->dataColumn] : null));
			
		}
		
		
		return json_encode(array_values($this->series));
				
	}
	
}