<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a single product record stored in DB.
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'image_url',
        'category',
        'izbrannoe'
    ];

//    /**
//     * @var FileStorageRepository
//     */
//     private FileStorageRepository $storage;
//
//    /**
//     * @var string
//     */
//    private string $imageFileName;
//    /**
//     * @param FileStorageRepository $fileStorageRepository
//     */
//
//    public function __construct(FileStorageRepository $fileStorageRepository)
//    {
//        $this->storage = $fileStorageRepository;
//    }
//    /*...*/
//    /**
//     * Returns product image URL.
//     *
//     * @return string|null
//     */
//    public function getImageUrl(): ?string
//    {
//        if ($this->storage->fileExists($this->imageFileName) !== true) {
//            return null;
//        }
//        return $this->storage->getUrl($this->imageFileName);
//    }
//
//    /**
//     * Returns whether image was successfully updated or not.
//     *
//     * @return bool
//     */
//    public function updateImage(): bool
//    {
//        /*...*/
//        try {
//
//           if ($this->storage->fileExists($this->imageFileName) !== true) {
//                 $this->storage->deleteFile($this->imageFileName);
//              }
//           $this->storage->saveFile($this->imageFileName);
//            } catch (\Exception $exception) {
//            /*...*/
//            return false;
//        }
//        /*...*/
//        return true;
//    }
}
