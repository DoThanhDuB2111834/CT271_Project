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

        $armchairMay = ['name' => 'armchair mây mới', 'size' => 'D670 - R760 - C700 mm', 'color' => 'green', 'price' => 13900000];
        $model = Product::updateOrCreate($armchairMay);
        $model->Images()->create(['url' => 'Image/product/armchair-may-moi-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-may-moi-4-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-may-moi-mau-xanh-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairDoultonvintage = ['name' => 'Armchair Doulton vintage', 'size' => 'D510 - R850 - C790/420 mm', 'color' => 'gray', 'price' => 28500000];
        $model = Product::updateOrCreate($armchairDoultonvintage);
        $model->Images()->create(['url' => 'Image/product/armchair-doulton-vintage-1-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-doulton-vintage-2-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/armchair-doulton-vintage-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairOgam = ['name' => 'Armchair Ogami vải vact10499', 'size' => 'D820 - R720 - C730 mm', 'color' => 'Orange', 'price' => 8900000];
        $model = Product::updateOrCreate($armchairOgam);
        $model->Images()->create(['url' => 'Image/product/armchair-tet-vai-vact10499.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-khach-tet-hien-dai-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairOrientalvact10389 = ['name' => 'Armchair Oriental vact10389', 'size' => 'D800 - R815 - C1000 mm', 'color' => 'white', 'price' => 15900000];
        $model = Product::updateOrCreate($armchairOrientalvact10389);
        $model->Images()->create(['url' => 'Image/product/easy-chair-oriental-vact10389-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/easy-chair-oriental-vact10389-2-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/easy-chair-oriental-vact10389-4-768x511.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $armchairSF044TER = ['name' => 'Armchair vải màu nâu đỏ SF044TER.I', 'size' => '800x550 mm', 'color' => 'brown', 'price' => 32900000];
        $model = Product::updateOrCreate($armchairSF044TER);
        $model->Images()->create(['url' => 'Image/product/Armchair-vai-mau-nau-do-sf044ter.i-1-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/Armchair-vai-mau-nau-do-sf044ter.i-2-300x200.jpg']);
        $model->Images()->create(['url' => 'Image/product/Armchair-vai-mau-nau-do-sf044ter.i-300x200.jpg']);

        $model->categories()->attach(['id' => $armchairCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaMay = ['name' => 'Sofa 2 chỗ Mây mới', 'size' => 'D1690 - R760 - C700 mm', 'color' => 'brown', 'price' => 19900000];
        $model = Product::updateOrCreate($sofaMay);
        $model->Images()->create(['url' => 'Image/product/sofa-2-cho-may-moi-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/sofa-2-cho-may-moi-2-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/sofa-2-cho-may-moi-mau-xanh-768x511.jpg']);

        $model->categories()->attach(['id' => $sofaCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaOgami = ['name' => 'Sofa 2 chỗ Ogami vải vact10499', 'size' => 'D1440 - R720 - C730 mm', 'color' => 'red rose', 'price' => 12900000];
        $model = Product::updateOrCreate($sofaOgami);
        $model->Images()->create(['url' => 'Image/product/phong-khach-tet-hien-dai-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-khach-tet-hien-dai-768x511 (1).jpg']);
        $model->Images()->create(['url' => 'Image/product/sofe-2-cho-tet-vai-vact10499-768x511.jpg']);

        $model->categories()->attach(['id' => $sofaCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaPioGoc = ['name' => 'Sofa Pio góc phải vải VACT11303/VACT10492', 'description' => 'Sofa góc trái Pio với thiết kế mới lạ, điểm nhấn là phối màu vải hài hòa giữa nệm và khung ghế, dây đai phần lưng như một khuy áo nhằm gia tăng nệm lưng lên xuống tùy theo nhu cầu sử dụng của bạn. Ưu điểm lớn của Pio là bạn có thể phối màu cho bộ sofa yêu thích của mình thay vì chỉ sử dụng một màu đơn sắc thông thường. Chân sofa cũng được thiết kế nhấn nhá chi tiết bằng hai màu sắc thời thượng để tổng thể chung trở nên bắt mắt, hoàn hảo, vỏ nệm có thể tháo rời để vệ sinh. Sofa góc Pio là lựa chọn tối ưu cho không gian phòng khách Bắc Âu - hiện đại.', 'size' => 'D2800/1650 - R850 - C810 mm', 'color' => 'white', 'price' => 36920000];
        $model = Product::updateOrCreate($sofaPioGoc);
        $model->Images()->create(['url' => 'Image/product/Phong-khach-Pio-tao-nha-tinh-te-3-768x512.jpg']);
        $model->Images()->create(['url' => 'Image/product/Sofa-pio-goc-phai-vai-VACT11303-VACT10492-768x511.jpg']);

        $model->categories()->attach(['id' => $sofaGocCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);

        $sofaMorettiGoc = ['name' => 'Sofa Moretti góc phải vải vact10635/6643', 'size' => 'D3300/1830 - R950 - C850 mm', 'color' => 'green', 'price' => 49990000];
        $model = Product::updateOrCreate($sofaMorettiGoc);
        $model->Images()->create(['url' => 'Image/product/sofa-moretti-goc-phai-vai-vact10635.6643-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/bo-suu-tap-Morretti-768x447.jpg']);

        $model->categories()->attach(['id' => $sofaGocCategory->id]);
        $model->categories()->attach(['id' => $livingRoom->id]);


        // Fetch dữ liệu cho Phòng ăn
        $phongAnCategory = category::updateOrCreate(['name' => 'Phòng ăn', 'urlImageSlider' => 'Image/slider/banner-trang-phong-an.jpg']);
        $banCategory = category::updateOrCreate(['name' => 'Bàn']);
        $gheCategory = category::updateOrCreate(['name' => 'Ghế']);
        $banAnCategory = category::updateOrCreate(['name' => 'Bàn ăn', 'urlImageSlider' => 'Image/slider/banner-trang-ban-an.jpg']);
        $gheAnCategory = category::updateOrCreate(['name' => 'Ghế ăn', 'urlImageSlider' => 'Image/slider/banner-trang-ghe-an.jpg']);
        $banCategory->children()->attach(['id' => $banAnCategory->id]);
        $gheCategory->children()->attach(['id' => $gheAnCategory->id]);


        $banAn8ChoOrientaleWalnut = ['name' => 'Bàn ăn 8 chỗ Orientale Walnut', 'size' => 'D2300 - R900 - C750 mm', 'color' => 'brown', 'price' => 72500000];
        $model = Product::updateOrCreate($banAn8ChoOrientaleWalnut);
        $model->Images()->create(['url' => 'Image/product/ban-an-8-cho-orientale-walnut-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-an-orientale-1-768x511.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $banAnCategory->id]);

        $banAn6ChoCoastal = ['name' => 'Bàn ăn 6 chỗ Coastal', 'size' => 'D1600 - R800 - C755 mm', 'description' => 'Bàn ăn Coastal được làm từ gỗ Ash, theo phong cách truyền thống và mang kết cấu vững chãi. Mặt bàn bằng phẳng với các đường vân tự nhiên, bốn cạnh được bo tròn mềm mại để tránh va chạm trong lúc sử dụng. Sản phẩm có 2 kích thước là 6 chỗ và 8 chỗ cho người dùng những lựa chọn linh hoạt, phù hợp với nhiều không gian và nhu cầu sử dụng.', 'color' => 'brown', 'price' => 13900000];
        $model = Product::updateOrCreate($banAn6ChoCoastal);
        $model->Images()->create(['url' => 'Image/product/Ban-an-6-cho-Coastal-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/phong-an-coastal-768x512.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $banAnCategory->id]);

        $banAnMoRongSnapBetonGray = ['name' => 'Bàn ăn mở rộng Snap beton grey', 'size' => 'D1200/1800-R800-C760 mm', 'description' => 'Bàn ăn mở rộng Snap được nhập khẩu từ thương hiệu nổi tiếng Calligaris của Ý là thiết kế bàn ăn tối giản và thanh lịch cho không gian phòng ăn của bạn. Chân bàn kim loại sơn tĩnh điện và mặt bàn melamine. Một thiết kế hoàn hảo cho không gian phòng ăn hiện đại.', 'color' => 'grey', 'price' => 27500000];
        $model = Product::updateOrCreate($banAnMoRongSnapBetonGray);
        $model->Images()->create(['url' => 'Image/product/ban_an_mo_rong_snap_102666-6-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/102666_1-3-768x511.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $banAnCategory->id]);

        $banAn8ChoMay = [
            'name' => 'Bàn ăn Mây mới 8 chỗ',
            'size' => 'D2200 - R900 - C740 mm',
            'color' => 'brown',
            'price' => 16900000
        ];
        $model = Product::updateOrCreate($banAn8ChoMay);
        $model->Images()->create(['url' => 'Image/product/ban-an-may-moi-8-cho-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/ban-an-may-moi-8-cho-4-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/ban-an-may-moi-8-cho-300x200.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $banAnCategory->id]);

        // Ghế ăn

        $gheAnBolero = ['name' => 'Ghế ăn Bolero ACC001 Da AB1142', 'size' => 'D470 - R570 - C860 mm', 'color' => 'grey', 'price' => 6900000];
        $model = Product::updateOrCreate($gheAnBolero);
        $model->Images()->create(['url' => 'Image/product/ghe-an-bolero-1.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ghe-an-Bolero-ACC001-Da-AB1142-768x511.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $gheAnCategory->id]);

        $gheAnRoma = ['name' => 'Ghế ăn Roma', 'size' => 'D560 -R440 - C820 mm', 'color' => 'grey', 'price' => 3400000];
        $model = Product::updateOrCreate($gheAnRoma);
        $model->Images()->create(['url' => 'Image/product/1000-ghe-roma-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/500-roma-ban-an1.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $gheAnCategory->id]);

        $gheAnKhongtayValente = ['name' => 'Ghế ăn không tay Valente', 'size' => 'D500 - R550 - C850 mm', 'color' => 'grey', 'price' => 8900000];
        $model = Product::updateOrCreate($gheAnKhongtayValente);
        $model->Images()->create(['url' => 'Image/product/ghe_an_valente-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ghe-an-khong-tay-Valente-1-1-768x511.jpg']);
        $model->Images()->create(['url' => 'Image/product/Ghe-an-khong-tay-Valente-4-1-768x511.jpg']);

        $model->categories()->attach(['id' => $phongAnCategory->id]);
        $model->categories()->attach(['id' => $gheAnCategory->id]);
    }
}
