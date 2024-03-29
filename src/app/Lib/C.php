<?php

namespace App\Lib;

class C {
	const BET_AMOUNT = 100;
	const MATCH3_VAL = 20/100;
	const MATCH4_VAL = 200/100;
	const MATCH5_VAL = 1000/100;
	
	const DEF_ROW_SIZE = 3;
	const DEF_COL_SIZE = 5;
	
	const DEF_SYMBOLS = [9,10,'J','Q','K','A','cat','dog','monkey','bird'];
	const PAYLINE_MAP = [
						[0,3,6,9,12],
						[1,4,7,10,13],
						[2,5,8,11,14],
						[0,4,8,10,12],
						[2,4,6,10,14],
						];
}