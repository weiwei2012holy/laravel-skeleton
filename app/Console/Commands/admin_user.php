<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class admin_user extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '管理员设置';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $email = $this->ask('请输入邮箱');
        $pwd = $this->ask('请输入密码');
        if (empty($email) || empty($pwd)) {
            $this->error("邮箱和密码不能为空");
        }
        if (strlen($pwd) < 6 || strlen($pwd) > 20) {
            $this->error("密码长度6-20");
        }
        User::query()->updateOrCreate(['email' => $email], ['password' => \Hash::make($pwd), 'name' => $email]);

    }
}
