<?php

namespace App\Console\Commands;

use App\Repositories\AppUserRepository;
use Illuminate\Console\Command;

class app_user_token extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:token {id} {--F|flush : 清空已经发放的token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '管理用户API token';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');

        $user = app(AppUserRepository::class)->find($id);
        if (empty($user)) {
            $this->error("用户不存在");
            return 0;
        }
        if ($this->option('flush')) {
            app(AppUserRepository::class)->flushTokens($user);
        }
        $token = app(AppUserRepository::class)->createToken($user);
        $this->info($token->plainTextToken);
        return 0;
    }
}
