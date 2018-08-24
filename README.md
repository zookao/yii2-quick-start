1. 下载本项目到本地，并进入到项目根目录
2. composer instal

   执行完毕后，如果没有自动初始化则执行`php init`命令手动初始化
   
3. `php yii backup/up`导入数据

~~yii migrate --migrationPath=@yii/rbac/migrations~~

~~yii migrate --migrationPath=@mdm/admin/migrations~~

~~yii migrate~~

4. 修改common/config/main-local.php，设置数据库信息

==========

账号密码

admin

111111

修改
`/www/wwwroot/yii2frame/vendor/e282486518/yii2-console-migration/components/MigrateCreate.php`
中的
`use yii\base\view;`为`use yii\base\View as view;`
以后可以通过 php yii backup/backup all来备份数据库，php yi backup/up来使用备份
