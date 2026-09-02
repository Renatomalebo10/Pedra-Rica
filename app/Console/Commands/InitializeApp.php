<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:initialize')]
#[Description('Roda migrate e seed idempotente e prepara os caches no deploy')]
class InitializeApp extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            $this->call('migrate', ['--force' => true]);
        } catch (\Throwable $e) {
            $this->error('MIGRATE FALHOU: '.$e->getMessage());

            return self::FAILURE;
        }

        try {
            if (! User::where('email', 'admin@pedrarica.com')->exists()) {
                $this->call('db:seed', ['--force' => true]);
                $this->info('Seed executado (sem admin anterior).');
            } else {
                $this->info('Admin ja existe, seed ignorado.');
            }
        } catch (\Throwable $e) {
            $this->error('SEED FALHOU: '.$e->getMessage());

            return self::FAILURE;
        }

        $this->call('optimize', ['--ansi' => true]);

        return self::SUCCESS;
    }
}
