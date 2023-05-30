<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['logout'] = 'frontend/logout';
$route['news'] = 'frontend/news/news';
$route['watch-news/(:any)'] = 'frontend/news/viewnews/index/$1';
$route['gallary/(:any)'] = 'frontend/gallary/index/$1';
$route['term'] = 'frontend/term';
$route['privacy-policy'] = 'frontend/privacy';
$route['refund-policy'] = 'frontend/refund';
$route['about-us'] = 'frontend/aboutvs';
$route['products'] = 'frontend/products/product';
$route['product/(:any)'] = 'frontend/products/postview/index/$1';
$route['blogs'] = 'frontend/blog';
$route['blog/(:any)'] = 'frontend/viewblog/index/$1';

$route['user/signup'] = 'frontend/signup';
$route['user/login'] = 'frontend/login';

$route['create/agreecondition'] = 'frontend/agreecondition';
$route['user/buy-product/(:any)'] = 'frontend/user/buyproduct/index/$1';

$route['user/dashboard'] = 'frontend/user/dashboard';
$route['user/my-orders'] = 'frontend/user/myorder';
$route['user/order-transaction'] = 'frontend/user/ordertransaction';
$route['user/profile'] = 'frontend/user/profile';
$route['user/pension'] = 'frontend/user/pension';
$route['user/bonus'] = 'frontend/user/bonus';
$route['user/insurance'] = 'frontend/user/insurance';
$route['user/passbook'] = 'frontend/user/passbook';
$route['user/addaccount'] = 'frontend/user/addaccount';
$route['user/withdrow'] = 'frontend/user/withdrow';
$route['user/withdrawpension'] = 'frontend/user/withdrawpension';
$route['user/withdrawbonus'] = 'frontend/user/withdrawbonus';
$route['user/withdrawinsurance'] = 'frontend/user/withdrawinsurance';


























$route['donation-history'] = 'frontend/user/donationhistory';
$route['sponsor-history'] = 'frontend/user/sponsorhistory';
$route['adopt'] = 'frontend/adopt';
$route['adopt/(:any)'] = 'frontend/adoptpet/index/$1';









$route['profile'] = 'frontend/user/profile';
$route['adopted-pet'] = 'frontend/user/adoptedpet';



$route['adoptpet/adoption/(:any)'] = 'frontend/adoptionform/index/$1';
$route['contact-us'] = 'frontend/contact';
$route['volunteer'] = 'frontend/volunteer';
$route['surrender'] = 'frontend/surrender';


/* dog care */
$route['nutrition'] = 'frontend/dogcare/nutrition/nutrition';
$route['grooming'] = 'frontend/dogcare/grooming/grooming';
$route['problems'] = 'frontend/dogcare/problems/problems';
$route['petcare'] = 'frontend/dogcare/petcare/petcare';
$route['training'] = 'frontend/dogcare/training/training';

$route['givingup'] = 'frontend/dogcare/givingup/givingup';
$route['behave'] = 'frontend/dogcare/behave/behave';
$route['getting'] = 'frontend/dogcare/getting/getting';
$route['gallary'] = 'frontend/gallary';

$route['nutrition/(:any)'] = 'frontend/dogcare/nutrition/postview/index/$1';
$route['grooming/(:any)'] = 'frontend/dogcare/grooming/postview/index/$1';
$route['problems/(:any)'] = 'frontend/dogcare/problems/postview/index/$1';
$route['petcare/(:any)'] = 'frontend/dogcare/petcare/postview/index/$1';
$route['training/(:any)'] = 'frontend/dogcare/training/postview/index/$1';
$route['givingup/(:any)'] = 'frontend/dogcare/givingup/postview/index/$1';
$route['behave/(:any)'] = 'frontend/dogcare/behave/postview/index/$1';
$route['getting/(:any)'] = 'frontend/dogcare/getting/postview/index/$1';
$route['breed/(:any)'] = 'frontend/dogcare/breed/postview/index/$1';
/* end */

/* ways to give */
$route['donate'] = 'frontend/waystogive/donate';
$route['pet-memorial'] = 'frontend/waystogive/petmemorial';
$route['gift-giving'] = 'frontend/waystogive/giftgiving';
$route['other-ways-to-give'] = 'frontend/waystogive/otherways';
$route['sponsor-an-animal'] = 'frontend/waystogive/sponsor';
$route['sponsorpet/(:any)'] = 'frontend/waystogive/sponsorsingle/index/$1';
$route['petmemorial/(:any)'] = 'frontend/waystogive/viewpetmemo/index/$1';

$route['sponsor-an-animal/sponsor/(:any)'] = 'frontend/waystogive/sponsorform/index/$1';
/* end */



$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = FALSE;