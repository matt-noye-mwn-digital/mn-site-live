<?php

namespace App\Console\Commands;

use App\Models\Knowledgebase;
use Illuminate\Console\Command;

class IndexKnowledgebase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:index-knowledgebase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Index the Knowledgebase model for search';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Indexing Knowledgebase Model....');
        Knowledgebase::searchable();
        $this->info('Indexing complete.');
    }
}
