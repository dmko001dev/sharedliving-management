<?php

namespace App\Http\Controllers;

use App\Models\ContentListItem;
use App\Models\Faq;
use App\Models\GallerySlide;
use App\Models\PageSection;
use App\Models\Property;
use App\Models\RoomType;
use App\Models\ServiceAudienceCard;

class PropertyPageController extends Controller
{
    public function index()
    {
        return view('pages.properties', [
            'hero' => PageSection::forKey('properties_hero'),
            'gallerySection' => PageSection::forKey('properties_gallery'),
            'roomTypesSection' => PageSection::forKey('properties_room_types'),
            'includedSection' => PageSection::forKey('properties_included'),
            'ctaSection' => PageSection::forKey('properties_cta'),
            'properties' => Property::active()->ordered()->get(),
            'gallerySlides' => GallerySlide::active()->ordered()->get(),
            'roomTypes' => RoomType::active()->ordered()->get(),
            'includedItems' => ContentListItem::active()->ordered()
                ->forPageSection('properties', 'included')
                ->get(),
        ]);
    }
}
