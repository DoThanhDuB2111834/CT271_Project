<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'group' => 'admin'],
            ['name' => 'superadmin', 'group' => 'admin'],
            ['name' => 'customer', 'group' => 'customer'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }

        $permissions = [
            ['name' => 'create-user', 'group' => 'user'],
            ['name' => 'update-user', 'group' => 'user'],
            ['name' => 'show-user', 'group' => 'user'],
            ['name' => 'delete-user', 'group' => 'user'],

            ['name' => 'create-role', 'group' => 'role'],
            ['name' => 'update-role', 'group' => 'role'],
            ['name' => 'show-role', 'group' => 'role'],
            ['name' => 'delete-role', 'group' => 'role'],

            ['name' => 'create-category', 'group' => 'category'],
            ['name' => 'update-category', 'group' => 'category'],
            ['name' => 'show-category', 'group' => 'category'],
            ['name' => 'delete-category', 'group' => 'category'],

            ['name' => 'create-product', 'group' => 'product'],
            ['name' => 'update-product', 'group' => 'product'],
            ['name' => 'show-product', 'group' => 'product'],
            ['name' => 'delete-product', 'group' => 'product'],

            ['name' => 'create-goods_receipt', 'group' => 'goods_receipt'],
            ['name' => 'update-goods_receipt', 'group' => 'goods_receipt'],
            ['name' => 'show-goods_receipt', 'group' => 'goods_receipt'],
            ['name' => 'delete-goods_receipt', 'group' => 'goods_receipt'],

            ['name' => 'create-supplier', 'group' => 'supplier'],
            ['name' => 'update-supplier', 'group' => 'supplier'],
            ['name' => 'show-supplier', 'group' => 'supplier'],
            ['name' => 'delete-supplier', 'group' => 'supplier'],

            ['name' => 'create-discount', 'group' => 'discount'],
            ['name' => 'update-discount', 'group' => 'discount'],
            ['name' => 'show-discount', 'group' => 'discount'],
            ['name' => 'delete-discount', 'group' => 'discount'],

            ['name' => 'create-coupon', 'group' => 'coupon'],
            ['name' => 'update-coupon', 'group' => 'coupon'],
            ['name' => 'show-coupon', 'group' => 'coupon'],
            ['name' => 'delete-coupon', 'group' => 'coupon'],

            ['name' => 'create-order', 'group' => 'order'],
            ['name' => 'update-order', 'group' => 'order'],
            ['name' => 'show-order', 'group' => 'order'],
            ['name' => 'delete-order', 'group' => 'order'],
        ];

        $superAdmin = ModelsRole::find(2);
        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
            $superAdmin->givePermissionTo($permission['name']);
        }

        $admin = ModelsRole::find(1);
        $admin->givePermissionTo('show-category');
        $admin->givePermissionTo('show-product');
        $admin->givePermissionTo('show-coupon');
        $admin->givePermissionTo('show-goods_receipt');
        $admin->givePermissionTo('create-goods_receipt');
        $admin->givePermissionTo('show-supplier');
        $admin->givePermissionTo('show-discount');
        $admin->givePermissionTo('show-order');
        $admin->givePermissionTo('update-order');
    }
}
