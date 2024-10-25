<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $armcharAndSofaCategory = category::updateOrCreate(['name' => 'armchair và sofa']);
        $armchairCategory = category::updateOrCreate(['name' => 'armchair', 'urlImageSlider' => 'Image/slider/banner-trang-armchair.jpg']);
        $livingRoom = category::updateOrCreate(['name' => 'Phòng khách', 'urlImageSlider' => 'Image/slider/banner-trang-phong-khach.jpg']);
        $sofaCategory = category::updateOrCreate(['name' => 'Sofa', 'urlImageSlider' => 'Image/slider/banner-trang-sofa.jpg']);
        $sofaGocCategory = category::updateOrCreate(['name' => 'Sofa góc', 'urlImageSlider' => 'Image/slider/banner-trang-sofaGoc.jpg']);
        $armcharAndSofaCategory->children()->attach(['id' => $armchairCategory->id]);
        $armcharAndSofaCategory->children()->attach(['id' => $sofaCategory->id]);
        $armcharAndSofaCategory->children()->attach(['id' => $sofaGocCategory->id]);

        $armchairMay = ['name' => 'armchair mây mới', 'description' => 'hàng mới về', 'size' => 'D670 - R760 - C700 mm', 'color' => 'green', 'price' => 13900000];
        $model = Product::updateOrCreate($armchairMay);
        $model->Images()->create(['url' => 'Image/product/armchair-may-moi-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-may-moi-4-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-may-moi-mau-xanh-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairDoultonvintage = ['name' => 'Armchair Doulton vintage', 'description' => 'hàng mới về', 'size' => 'D510 - R850 - C790/420 mm', 'color' => 'gray', 'price' => 28500000];
        $model = Product::updateOrCreate($armchairDoultonvintage);
        $model->Images()->create(['url' => 'Image/product/armchair-doulton-vintage-1-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-doulton-vintage-2-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-doulton-vintage-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairOgam = ['name' => 'Armchair Ogami vải vact10499', 'description' => 'hàng mới về', 'size' => 'D820 - R720 - C730 mm', 'color' => 'Orange', 'price' => 8900000];
        $model = Product::updateOrCreate($armchairOgam);
        $model->Images()->create(['url' => 'Image/product/armchair-tet-vai-vact10499.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-khach-tet-hien-dai-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairOrientalvact10389 = ['name' => 'Armchair Oriental vact10389', 'description' => 'hàng mới về', 'size' => 'D800 - R815 - C1000 mm', 'color' => 'white', 'price' => 15900000];
        $model = Product::updateOrCreate($armchairOrientalvact10389);
        $model->Images()->create(['url' => 'Image/product/easy-chair-oriental-vact10389-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/easy-chair-oriental-vact10389-2-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/easy-chair-oriental-vact10389-4-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairSF044TER = ['name' => 'Armchair vải màu nâu đỏ SF044TER.I', 'description' => 'hàng mới về', 'size' => '800x550 mm', 'color' => 'brown', 'price' => 32900000];
        $model = Product::updateOrCreate($armchairSF044TER);
        $model->Images()->create(['url' => 'Image/product/Armchair-vai-mau-nau-do-sf044ter.i-1-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/Armchair-vai-mau-nau-do-sf044ter.i-2-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/Armchair-vai-mau-nau-do-sf044ter.i-300x200.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaMay = ['name' => 'Sofa 2 chỗ Mây mới', 'description' => 'hàng mới về', 'size' => 'D1690 - R760 - C700 mm', 'color' => 'brown', 'price' => 19900000];
        $model = Product::updateOrCreate($sofaMay);
        $model->Images()->create(['url' => 'Image/product/sofa-2-cho-may-moi-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/sofa-2-cho-may-moi-2-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/sofa-2-cho-may-moi-mau-xanh-768x511.jpg']);

        $model->categories()->attach(['id' => $sofaCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaOgami = ['name' => 'Sofa 2 chỗ Ogami vải vact10499', 'description' => 'hàng mới về', 'size' => 'D1440 - R720 - C730 mm', 'color' => 'red rose', 'price' => 12900000];
        $model = Product::updateOrCreate($sofaOgami);
        $model->Images()->create(['url' => 'Image/product/phong-khach-tet-hien-dai-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-khach-tet-hien-dai-768x511 (1).jpg']);
        $model->Images()->create(['url' => 'Image/product/sofe-2-cho-tet-vai-vact10499-768x511.jpg']);

        $model->categories()->attach(['id' => $sofaCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaPioGoc = ['name' => 'Sofa Pio góc phải vải VACT11303/VACT10492', 'description' => 'hàng mới về', 'size' => 'D2800/1650 - R850 - C810 mm', 'color' => 'white', 'price' => 36920000];
        $model = Product::updateOrCreate($sofaPioGoc);
        $model->Images()->create(['url' => 'Image/product/Phong-khach-Pio-tao-nha-tinh-te-3-768x512.jpg']);
        $model->Images()->create(['url' => 'Image/product/Sofa-pio-goc-phai-vai-VACT11303-VACT10492-768x511.jpg']);

        $model->categories()->attach(['id' => $sofaGocCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaMorettiGoc = ['name' => 'Sofa Moretti góc phải vải vact10635/6643', 'description' => 'hàng mới về', 'size' => 'D3300/1830 - R950 - C850 mm', 'color' => 'green', 'price' => 49990000];
        $model = Product::updateOrCreate($sofaMorettiGoc);
        $model->Images()->create(['url' => 'Image/product/sofa-moretti-goc-phai-vai-vact10635.6643-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/bo-suu-tap-Morretti-768x447.jpg']);

        $model->categories()->attach(['id' => $sofaGocCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);
    }
}
