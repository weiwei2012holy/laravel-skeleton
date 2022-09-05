## Laravel 快速开发模板

### 文档

- 脚手架：https://infyom.com/open-source/laravelgenerator/docs/introduction
- 授权认证：https://learnku.com/docs/laravel/9.x/sanctum/12272#68a9ea
- 缓存: `redis`
- 数据库: `mysql`

### 常用方法

- 响应失败:`FastResponse::error(...)`

```json
{
    "success": false,
    "message": "请先登陆",
    "code": 401
}
```

- 响应成功: `FastResponse::success(...)`

```json
{
    "success": true,
    "message": "成功",
    "data": {
        "id": 1,
        "nickname": "虚拟用户11",
        "avatar": "......",
        "created_at": "2022-09-05T02:42:19.000000Z",
        "updated_at": "2022-09-05T06:20:00.000000Z"
    }
}
```

### Shell脚本

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
