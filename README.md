
## Laravel 快速开发模板

### 文档

- 脚手架：https://infyom.com/open-source/laravelgenerator/docs/introduction
- 授权认证：https://learnku.com/docs/laravel/9.x/sanctum/12272#68a9ea


### Shell脚本

#### 常见用法
```shell
# 初始化CURD
php artisan infyom:publish --localized 

# 生成API
php artisan infyom:api $MODEL_NAME
# 生成后台页面
php artisan infyom:scaffold $MODEL_NAME
# 生成API+后台
php artisan infyom:api_scaffold $MODEL_NAME 

# 清除用户所有的token并且生成一个新的
php8 artisan user:token 1 -F

# 从现有的Mysql中生成后台CRUD
php8 artisan infyom:scaffold AppUser --fromTable  --table=app_users 
```
