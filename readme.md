# Laravel5.5 后台管理模块

这是一款基于Laravel5.5的用户管理模块，使用了[Entrust](https://github.com/Zizaco/entrust)做权限管理，为了方便二次开发，该扩展包没有发布到packagist，使用者直接下载便可很方便的学习laravel扩展包开发和对扩展包进行二次开发。

## 安装
1. 安装laravel5.5, 然后在laravel文件夹下创建`modules`文件夹，进入`modules`下载该扩展包：

```bash
$ git clone https://github.com/num5/laravel_admin.git admin
```

2. 将 `"Modules\\": "modules"` 加入到`composer.json`的 `psr-4` 下：

```bash
"autoload": {
        "classmap": [
            ......
        ],
        "psr-4": {
            ......
            "Modules\\": "modules"
        }
    },
```

3. 安装 [Entrust](https://github.com/Zizaco/entrust)(仅安装)

4. 打开 `config/app.php` 并把下面代码填加到 `providers` 数组中：

```bash
Zizaco\Entrust\EntrustServiceProvider::class,
Modules\Admin\AdminServiceProvider::class,
```

5. 执行安装命令

```bash
php artisan admin:install
```

初始登录账号、密码分别为
账号：admin@admin.com
密码：123456