<?php

namespace Modules\Admin\Commands;

use Illuminate\Console\Command;

class AdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '安装 admin 模块...';

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
    public function handle(){

        $this->info('admin 模块安装准备！皮皮虾，我们走......');
        // 发布包资源
        $this->call("vendor:publish",["--tag"=>"admin", "--force"=>1]);

        // 执行数据迁移
        $this->call('migrate');

        // 数据填充
        $this->call('db:seed', ['--class' => "Modules\Admin\Seeds\DatabaseSeeder"]);

        // 执行entrust包命令
        $this->info('配置entrust包......');
        $this->call('vendor:publish', ['--provider' => 'Zizaco\Entrust\EntrustServiceProvider']);

        $this->info('admin 模块安装完成！皮皮虾，快停下......');
    }
}
