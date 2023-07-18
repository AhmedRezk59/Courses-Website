<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

final class DeleteTempUploadedFiles extends Command
{
    protected $signature = 'app:delete-temp-uploaded-files';

    protected $description = 'Delete temporary uploaded files older than 24 hours.';

    public function handle(): void
    {
        foreach (Storage::directories('tmp') as $directory) {
            $directoryLastModified = Carbon::createFromTimestamp(Storage::lastModified($directory));

            if (now()->diffInHours($directoryLastModified) > 2) {
                Storage::deleteDirectory($directory);
            }
        }
    }
}
