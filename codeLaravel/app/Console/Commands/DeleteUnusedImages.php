<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;

class DeleteUnusedImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-unused-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $allImages = Storage::disk('public')->files('images');
        $projects = Project::all();
        $usedImages = $projects->pluck('images')->toArray();

        foreach ($allImages as $image) {
            if (!in_array($image, $usedImages)) {
                Storage::disk('public')->delete($image);
            }
        }

        $this->info('Unused images have been deleted.');
    }
}
