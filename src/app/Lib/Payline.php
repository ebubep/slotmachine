<?php 
namespace App\Lib;

use App\Lib\C;

class Payline  {
	
	
	//use spin , rand_board and C::PAYLINE_MAP to find matching paylines 
    public function find_matching_paylines($spin , $rand_board){
		$matched_pl_arr = [];
		
		foreach(C::PAYLINE_MAP as $pl_arr){
			$pl_str_arr = $this->pl_to_string_arr($pl_arr,$rand_board);
			$matched_symbols_size = $this->find_matched_symbols_size($pl_str_arr);
			$str = implode(",",$pl_arr);
			if($matched_symbols_size > 0)$matched_pl_arr[] = ["[$str]" => $matched_symbols_size];
		}
		return $matched_pl_arr ;
	}
	
	public function calc_total_win($matched_pl_arr , $bet_amount){
		
		$total_win = 0;
		
		foreach($matched_pl_arr as $elm){
			foreach($elm as $pl_arr => $matched_symbols_size){
				switch($matched_symbols_size){
					case '3' : $total_win += (C::MATCH3_VAL)* $bet_amount;
							break ;
					case '4' : $total_win += (C::MATCH4_VAL)*$bet_amount;
							break ;
					case '5' : $total_win += (C::MATCH5_VAL)*$bet_amount;
							break ;
				}
			}
		}
		return $total_win ;
	}
	
	//convert a payline to a string representation from the matching $rand_board
	private function pl_to_string_arr($pl_arr,$rand_board){
		$str_arr = [];
		foreach($pl_arr as $pl_index)
			$str_arr[] = $rand_board[$pl_index];
		return $str_arr;
	}
	
	//find a payline that matches conidtion of 3,4,5 consecutive occurence
	private function find_matched_symbols_size($pl_str_arr){
		$str = implode("",$pl_str_arr);
		//I plan to later iterate over oinly first 3 elements 
		//because after that, no more possibilities of finding a match
		
		foreach($pl_str_arr as $charset){
			$re = "#($charset)\\1\\1+#";
			$matched_arr = "";
			$res = preg_match_all($re , $str,$matched_arr );
			
			//we return the number of matched symbols immediately 
			//because once,at least, 3 occurences are found, we have only 2 more options
			//which can never be a match
			if($res > 0)return substr_count($matched_arr[0][0] , $charset );
			
		}
	}
}	
?>