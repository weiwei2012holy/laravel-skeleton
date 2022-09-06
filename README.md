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
php8 artisan infyom:scaffold User --fromTable  --table=users 

# 从文件生成
php8 artisan infyom:scaffold Demo --fieldsFile=Demo.json 
# 回滚（删除生成的文件）
php8 artisan infyom:rollback Demo scaffold

```

### 数据JSON描述文件

- name: 数据库字段名称
- dbType: 数据库迁移数据类型,参考`Laravel 迁移文件`语法,后面可以接`:`分割方法,`,`分割参数，格式`{类型},{参数1},{参数2},{...}:{方法1},{方法参数1},{...}` 如 `$table->string('nickname',50)`=>`string,50:default,`
- htmlType: 表单显示数据类型,参考`html input标签`语法, 格式`{类型}:{K},{V}:{K2},{V2}...`,代码见`HTMLFieldGenerator`
  - `select`:Draft:1,Published:2,Archived:3
  - `enum`同上
  - `radio`:Blog:1,Event:2,Guest:3
  - `checkbox` 貌似不支持
  - ...
- validations: 表单验证规则
- searchable: 是否支持搜索
- fillable: 是否可以填充属性
- primary: 主键
- inForm: 表单是否展示(create, update)
- inIndex: 列表是否展示(index)
- inView: 详情是否展示(show)

#### checkbox代码参考
```html
<!-- Roles Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sex', __('models/demos.fields.roles'), ['class' => 'form-check-label']) !!}
    <div class="form-check">
        {!! Form::checkbox('roles[]', '1', null, ['class' => 'form-check-input','id'=>'roles-1']) !!}
        {!! Form::label('roles-1', '客服', ['class' => 'form-check-label']) !!}
    </div>
    <div class="form-check">
        {!! Form::checkbox('roles[]', '2', null, ['class' => 'form-check-input','id'=>'roles-2']) !!}
        {!! Form::label('roles-2', '销售', ['class' => 'form-check-label']) !!}
    </div>
    <div class="form-check">
        {!! Form::checkbox('roles[]', '3', null, ['class' => 'form-check-input','id'=>'roles-3']) !!}
        {!! Form::label('roles-3', '管理员', ['class' => 'form-check-label']) !!}
    </div>
    <div class="form-check">
        {!! Form::checkbox('roles[]', '4', null, ['class' => 'form-check-input','id'=>'roles-4']) !!}
        {!! Form::label('roles-4', '超级管理员', ['class' => 'form-check-label']) !!}
    </div>
</div>

```
