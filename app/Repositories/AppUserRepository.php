<?php

namespace App\Repositories;

use App\Models\AppUser;
use Carbon\Carbon;

class AppUserRepository extends BaseRepository
{
    const TOKEN_NAME = 'app';
    const TOKEN_EXPIRED_DAYS = 30;

    protected array $fieldSearchable = [
        'nickname',
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return AppUser::class;
    }


    /**
     * 生成token
     * @param AppUser $user
     * @return \Laravel\Sanctum\NewAccessToken
     */
    public function createToken(AppUser $user): \Laravel\Sanctum\NewAccessToken
    {
        return $user->createToken(self::TOKEN_NAME, ['*'], Carbon::now()->addDays(self::TOKEN_EXPIRED_DAYS));
    }

    /**
     * 清空token
     * @param AppUser $user
     * @return int
     */
    public function flushTokens(AppUser $user): int
    {
        return $user->tokens()->delete();
    }


    /**
     * 登陆获取token
     * @param AppUser $user
     * @return \Laravel\Sanctum\NewAccessToken
     */
    public function login(AppUser $user): \Laravel\Sanctum\NewAccessToken
    {
        $this->flushTokens($user);
        return $this->createToken($user);
    }
}
