<?php 
namespace App\Console\Commands;

use Illuminate\Console\Command;
use scs;
//use Symfony\Component\Console\Input\InputOption;

class SlotTest extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'slottest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Test the demo slot app";
	
/**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
 
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		
    }

}