<?php

namespace App\LinkShortener\Commands;

use App\LinkShortener\Queries\ShortenedLinksQueries;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FreshShortenedLinksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Чистит из базы все использованные ссылки';

    protected const CHUNK_SIZE = 100;

    public function __construct(
        private readonly ShortenedLinksQueries $queries
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredLinkTokens = $this->queries->getAllExpiredLinks(['token']);
        $chunks = $expiredLinkTokens->chunk(self::CHUNK_SIZE);

        $this->output->info('Начинаем удаление');

        foreach ($chunks as $tokens) {
            $this->output->comment($tokens);

            try {
                $this->queries->deleteByTokens($tokens);
            } catch (\Exception $exception) {
                Log::error($message = $exception->getMessage());
                $this->output->error('Ошибка:' . $message);
            }
        }

        $this->output->info('Готово');
    }
}
