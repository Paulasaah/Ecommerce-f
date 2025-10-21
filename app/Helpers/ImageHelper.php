<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Default placeholder images by category
     */
    private static $categoryPlaceholders = [
        'Women' => 'https://images.unsplash.com/photo-1483985988355-763728e1935b?w=800&q=85',
        'Men' => 'https://images.unsplash.com/photo-1490578474895-699cd4e2cf59?w=800&q=85',
        'Accessories' => 'https://images.unsplash.com/photo-1492707892479-7bc8d5a4ee93?w=800&q=85',
        'Jewelry' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=800&q=85',
        'Bags' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=800&q=85',
        'Shoes' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&q=85',
        'Limited Edition' => 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=800&q=85',
        'Fragrances' => 'https://images.unsplash.com/photo-1520975594089-5933c2ad2b2a?w=800&q=85',
    ];

    /**
     * Default product placeholder
     */
    private static $defaultPlaceholder = 'https://images.unsplash.com/photo-1483985988355-763728e1935b?w=800&q=85';

    /**
     * Get product image URL with fallback
     *
     * @param object|array $product
     * @return string
     */
    public static function getProductImage($product)
    {
        // Convert to array if it's an object
        $productData = is_object($product) ? (array) $product : $product;

        // Check if image_url exists and is not empty
        if (!empty($productData['image_url'])) {
            // If it's a full URL, return it
            if (filter_var($productData['image_url'], FILTER_VALIDATE_URL)) {
                return $productData['image_url'];
            }
            // If it's a path, prepend storage URL
            return asset('storage/' . $productData['image_url']);
        }

        // Fallback to category-based placeholder
        if (!empty($productData['category'])) {
            $categoryName = is_object($productData['category'])
                ? $productData['category']->name
                : $productData['category'];

            return self::$categoryPlaceholders[$categoryName] ?? self::$defaultPlaceholder;
        }

        return self::$defaultPlaceholder;
    }

    /**
     * Get category image URL with fallback
     *
     * @param object|array $category
     * @return string
     */
    public static function getCategoryImage($category)
    {
        $categoryData = is_object($category) ? (array) $category : $category;

        // Check if image_url exists
        if (!empty($categoryData['image_url'])) {
            if (filter_var($categoryData['image_url'], FILTER_VALIDATE_URL)) {
                return $categoryData['image_url'];
            }
            return asset('storage/' . $categoryData['image_url']);
        }

        // Fallback to predefined placeholders
        $categoryName = $categoryData['name'] ?? 'Accessories';
        return self::$categoryPlaceholders[$categoryName] ?? self::$defaultPlaceholder;
    }

    /**
     * Handle image upload and return path
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @return string
     */
    public static function uploadImage($file, $folder = 'products')
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        // Generate unique filename
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Store in storage/app/public/{folder}
        $path = $file->storeAs($folder, $filename, 'public');

        return $path;
    }

    /**
     * Delete image from storage
     *
     * @param string $path
     * @return bool
     */
    public static function deleteImage($path)
    {
        if (empty($path)) {
            return false;
        }

        // Don't delete external URLs
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return false;
        }

        $fullPath = storage_path('app/public/' . $path);

        if (file_exists($fullPath)) {
            return unlink($fullPath);
        }

        return false;
    }

    /**
     * Get all category placeholders
     *
     * @return array
     */
    public static function getCategoryPlaceholders()
    {
        return self::$categoryPlaceholders;
    }

    /**
     * Optimize image URL for responsive display
     *
     * @param string $url
     * @param int $width
     * @param int $quality
     * @return string
     */
    public static function optimizeImageUrl($url, $width = 800, $quality = 85)
    {
        // Only works with Unsplash URLs
        if (strpos($url, 'unsplash.com') !== false) {
            // Remove existing parameters
            $url = strtok($url, '?');
            return $url . "?w={$width}&q={$quality}";
        }

        return $url;
    }
}
