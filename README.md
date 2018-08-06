1、下载本项目到本地，并进入到项目根目录

2、composer instal

   执行完毕后，如果没有自动初始化则执行php init命令手动初始化

3、修改common/config/main-local.php，设置数据库信息

4、顺序执行以下命令

yii migrate --migrationPath=@yii/rbac/migrations

yii migrate --migrationPath=@mdm/admin/migrations

yii migrate

==========

账号密码

admin

111111
