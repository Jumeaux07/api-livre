<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

 /**
 * @OA\Info(
 *     version="1.0",
 *     title="API-LIVRE"
 * )
 * @OA\PathItem(path="/api")
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function uploadImageApi($image){
        //$image est en base base64
        if($image == null){
            return null;
        }
        $imageUrl = Cloudinary::upload($image)->getSecurePath();
        return $imageUrl;
    }

    public function uploadImage($image){
        if($image == null){
            return null;
        }
        $imageUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
        return $imageUrl;
    }
}
