<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Home\BaseController;
use App\Libraries\Alimama\Contracts\AlimamaInterface;
use App\Models\Coupon;
use Carbon\Carbon;
use App\Traits\ShowFromToView;

class ZhiBoController extends BaseController
{
    use ShowFromToView;

    public $taobao;

    public function __construct(Request $request, AlimamaInterface $taobao)
    {
      $this->taobao = $taobao;
      $this->__construct_base($request);
    }

    // 直播的页面
    public function index ()
    {
      $TDK = ['title'=>'优惠券商品直播 | '.config('website.name'),
              'keywords'=>'',
              'description'=>''];

      $coupons = Coupon::couponsRecommendRandom(self::$from, 15, 10);
      $show_from = $this->showFrom(self::$from);

      return view('home.wx.zhibo.index', compact('TDK', 'show_from', 'coupons'));
    }

    // 获取直播的页面
    public function random (Request $request)
    {
      $coupon = Coupon::couponsRecommendRandom(self::$from, 1, 1)->first();
      $show_from = $request->show_from;
      $show_from ? $img_src = route('image.index', $coupon->image_encrypt) : $img_src = $coupon->image;

      return [
        'id'            => $coupon->id,
        'goods_name'    => $coupon->goods_name,
        'image'         => $coupon->image,
        'image_encrypt' => $coupon->image_encrypt,
        'category'      => $coupon->category,
        'price'         => $coupon->price,
        'sales'         => $coupon->sales,
        'price_now'     => $coupon->price_now,
        'url'           => route('home.couponInfo', $coupon->id),
        'img_src'       => $img_src,
        'save_money'    => $coupon->price - $coupon->price_now,
        'time'          => Carbon::now()->toTimeString()
      ];
    }
}
