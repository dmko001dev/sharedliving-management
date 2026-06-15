<?php

namespace Database\Seeders;

use App\Models\ContentListItem;
use App\Models\Faq;
use App\Models\GallerySlide;
use App\Models\PageSection;
use App\Models\Property;
use App\Models\RoomType;
use App\Models\ServiceAudienceCard;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@sharedliving.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        $this->seedPageSections();
        $this->seedProperties();
        $this->seedGallerySlides();
        $this->seedRoomTypes();
        $this->seedContentLists();
        $this->seedServiceAudienceCards();
        $this->seedFaqs();
    }

    private function seedPageSections(): void
    {
        $sections = [
            [
                'page' => 'properties',
                'section_key' => 'properties_hero',
                'label' => 'Our Properties',
                'title' => 'Available Rooms & Properties in Cincinnati',
                'subtitle' => 'Browse our current co-living spaces. All rooms are furnished, utilities included, and move-in ready.',
                'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1600&h=900&fit=crop&q=80',
            ],
            [
                'page' => 'properties',
                'section_key' => 'properties_gallery',
                'label' => 'Gallery',
                'title' => 'Take a Look Inside',
                'description' => 'Browse photos of our professionally managed co-living spaces — furnished, clean, and move-in ready.',
            ],
            [
                'page' => 'properties',
                'section_key' => 'properties_room_types',
                'label' => 'Options',
                'title' => 'Room Types',
            ],
            [
                'page' => 'properties',
                'section_key' => 'properties_included',
                'label' => 'Included',
                'title' => 'What Is Included',
            ],
            [
                'page' => 'properties',
                'section_key' => 'properties_cta',
                'title' => 'Ready to See a Room in Person?',
                'subtitle' => 'Schedule a tour and find your next home today.',
                'button_text' => 'Schedule a Tour',
            ],
            [
                'page' => 'services',
                'section_key' => 'services_hero',
                'label' => 'Our Services',
                'title' => 'Co-Living Services in Cincinnati',
                'subtitle' => 'Professional shared housing management for residents, agencies, and referral partners.',
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1600&h=900&fit=crop&q=80',
            ],
            [
                'page' => 'services',
                'section_key' => 'services_residents',
                'label' => 'Residents',
                'title' => 'For Residents',
                'lead' => 'At Shared Living Management, we make co-living simple. When you join our program, everything is taken care of. Your room is furnished, your utilities are paid, and your home is professionally maintained.',
                'intro' => 'Here is what you get as a resident:',
                'image' => 'https://images.unsplash.com/photo-1600607687644-c7171b42498f?w=700&h=900&fit=crop&q=80',
            ],
            [
                'page' => 'services',
                'section_key' => 'services_serve',
                'label' => 'Community',
                'title' => 'Who We Serve',
                'description' => 'Shared Living Management provides housing for individuals committed to personal growth. Everyone deserves a safe, supportive place to call home.',
            ],
            [
                'page' => 'services',
                'section_key' => 'services_partners',
                'label' => 'Partners',
                'title' => 'For Agencies & Referral Partners',
                'description' => 'Shared Living Management works with housing agencies, social services organizations, and referral partners to provide reliable co-living placements. When you refer a client to us, you can trust that they will be placed in a safe, well-managed property with professional oversight.',
                'intro' => 'Why agencies partner with us:',
                'button_text' => 'Become a Partner',
            ],
            [
                'page' => 'services',
                'section_key' => 'services_partners_referral',
                'title' => 'Referral Information',
                'description' => 'We welcome referrals from case managers, shelters, social workers, hospitals, and community organizations looking for stable and supportive housing.',
            ],
            [
                'page' => 'services',
                'section_key' => 'services_apply',
                'label' => 'Process',
                'title' => 'How to Apply',
            ],
            [
                'page' => 'services',
                'section_key' => 'services_requirements',
                'label' => 'Requirements',
                'title' => 'Move-In Requirements',
            ],
            [
                'page' => 'services',
                'section_key' => 'services_faq',
                'label' => 'Support',
                'title' => 'Frequently Asked Questions',
            ],
        ];

        foreach ($sections as $section) {
            PageSection::query()->updateOrCreate(
                ['section_key' => $section['section_key']],
                $section
            );
        }
    }

    private function seedProperties(): void
    {
        $properties = [
            [
                'title' => 'Maple Drive Residence',
                'location' => 'Cincinnati, Ohio',
                'badge' => 'Private Rooms',
                'image' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=600&h=400&fit=crop&q=80',
                'tags' => ['Furnished', 'WiFi', 'All Utilities'],
                'sort_order' => 0,
            ],
            [
                'title' => 'West Side Commons',
                'location' => 'Cincinnati, Ohio',
                'badge' => 'Shared Rooms',
                'image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=600&h=400&fit=crop&q=80',
                'tags' => ['Furnished', 'WiFi', 'Laundry'],
                'sort_order' => 1,
            ],
            [
                'title' => 'Northside Living',
                'location' => 'Cincinnati, Ohio',
                'badge' => 'Private & Shared',
                'image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=600&h=400&fit=crop&q=80',
                'tags' => ['Furnished', 'WiFi', 'Parking', 'Utilities'],
                'sort_order' => 2,
            ],
        ];

        foreach ($properties as $property) {
            Property::query()->updateOrCreate(
                ['title' => $property['title']],
                array_merge($property, ['is_active' => true, 'pricing_text' => 'Contact us for pricing'])
            );
        }
    }

    private function seedGallerySlides(): void
    {
        $slides = [
            ['caption' => 'Spacious Living Areas', 'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop&q=80', 'sort_order' => 0],
            ['caption' => 'Fully Furnished Bedrooms', 'image' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800&h=600&fit=crop&q=80', 'sort_order' => 1],
            ['caption' => 'Comfortable Common Spaces', 'image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=800&h=600&fit=crop&q=80', 'sort_order' => 2],
            ['caption' => 'Modern Kitchens', 'image' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800&h=600&fit=crop&q=80', 'sort_order' => 3],
            ['caption' => 'Well-Maintained Exteriors', 'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800&h=600&fit=crop&q=80', 'sort_order' => 4],
            ['caption' => 'Clean Bathrooms', 'image' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=800&h=600&fit=crop&q=80', 'sort_order' => 5],
        ];

        foreach ($slides as $slide) {
            GallerySlide::query()->updateOrCreate(
                ['caption' => $slide['caption']],
                array_merge($slide, ['is_active' => true])
            );
        }
    }

    private function seedRoomTypes(): void
    {
        $types = [
            [
                'title' => 'Private Room',
                'description' => 'Your own private bedroom in a shared home. Common areas shared with other residents. Ideal for those who want personal space with the affordability of co-living.',
                'sort_order' => 0,
            ],
            [
                'title' => 'Shared Room',
                'description' => 'Share a bedroom with one other resident. All common areas shared. The most affordable co-living option in our program.',
                'sort_order' => 1,
            ],
        ];

        foreach ($types as $type) {
            RoomType::query()->updateOrCreate(
                ['title' => $type['title']],
                array_merge($type, ['is_active' => true, 'pricing_text' => 'Contact us for pricing'])
            );
        }
    }

    private function seedContentLists(): void
    {
        $lists = [
            'properties' => [
                'included' => [
                    'Fully furnished bedrooms and common areas',
                    'WiFi included',
                    'All utilities included (electric, water, gas)',
                    'On-site laundry (washer and dryer)',
                    'Off-street parking (where available)',
                    'Shared kitchen with appliances',
                    'Professional property management',
                    'Life skills workshops and program activities',
                    '24/7 emergency support',
                ],
            ],
            'services' => [
                'residents_benefits' => [
                    'Fully furnished private or shared room',
                    'All utilities included (electric, water, gas, WiFi)',
                    'Access to shared kitchen, living room, and laundry',
                    'Professional property management and maintenance',
                    'Life skills workshops and personal development',
                    'Money management and budgeting guidance',
                    'Cooking classes and wellness sessions',
                    'Community involvement and volunteer programs',
                    '24/7 emergency support line',
                ],
                'partners_benefits' => [
                    'Professionally managed properties that meet all local standards',
                    'Clear documentation and reporting for every placement',
                    'Responsive communication and dedicated point of contact',
                    'Regular property inspections and maintenance logs',
                    'Structured program with workshops and life skills support',
                    'Flexible placement options (private and shared rooms)',
                ],
                'apply_steps' => [
                    'Submit an application through our contact form or call us directly.',
                    'We review your application and assess eligibility within 48 hours.',
                    'Schedule a visit, ask questions, and meet the team.',
                    'Complete your program agreement and move-in paperwork.',
                    'Pay your program fee and move into your new home.',
                ],
                'requirements' => [
                    'Valid government-issued ID',
                    'Completed program application',
                    'Commitment to personal growth',
                    'Willingness to follow house rules',
                    'Participation in program activities',
                    'Program fees due at move-in',
                    'Signed occupancy agreement',
                ],
            ],
        ];

        foreach ($lists as $page => $sections) {
            foreach ($sections as $section => $items) {
                $type = $section === 'apply_steps' ? 'numbered' : 'bullet';

                foreach ($items as $index => $content) {
                    ContentListItem::query()->updateOrCreate(
                        [
                            'page' => $page,
                            'section' => $section,
                            'content' => $content,
                        ],
                        [
                            'type' => $type,
                            'sort_order' => $index,
                            'is_active' => true,
                        ]
                    );
                }
            }
        }
    }

    private function seedServiceAudienceCards(): void
    {
        $cards = [
            ['title' => 'Adults Seeking Stability', 'description' => 'Safe, stable housing for adults in need of a structured living environment.'],
            ['title' => 'Personal Growth', 'description' => 'Residents committed to developing life skills and working toward independence.'],
            ['title' => 'Financial Literacy', 'description' => 'Individuals looking to strengthen budgeting skills and build financial stability.'],
            ['title' => 'Transitional Housing', 'description' => 'Support for those transitioning from shelters, treatment, or crisis situations.'],
            ['title' => 'Referral Clients', 'description' => 'Clients referred by case managers, social workers, hospitals, and shelters.'],
            ['title' => 'Community-Minded', 'description' => 'Residents willing to participate in workshops, activities, and house rules.'],
        ];

        foreach ($cards as $index => $card) {
            ServiceAudienceCard::query()->updateOrCreate(
                ['title' => $card['title']],
                array_merge($card, ['sort_order' => $index, 'is_active' => true])
            );
        }
    }

    private function seedFaqs(): void
    {
        $faqs = [
            ['q' => 'What is co-living?', 'a' => 'Co-living is a shared housing arrangement where residents have their own private or shared bedroom while sharing common areas like the kitchen, living room, and laundry. It combines affordability with community and professional management.'],
            ['q' => 'Who do you serve?', 'a' => 'We serve adults in need of stable housing who are committed to personal growth, willing to follow house rules, and participate in program activities including workshops and community involvement.'],
            ['q' => 'What is included in the program?', 'a' => 'Furnished rooms, all utilities, WiFi, laundry access, life skills workshops, money management guidance, cooking classes, stress management sessions, and 24/7 emergency support.'],
            ['q' => 'How do I apply?', 'a' => 'Fill out our contact form, call us at (513) 571-0154, or get referred by a case manager or community organization. We respond within 24 hours.'],
            ['q' => 'Do you work with housing agencies?', 'a' => 'Yes. We welcome referrals from case managers, shelters, social workers, hospitals, and community organizations. Contact us to become a referral partner.'],
            ['q' => 'What are the house rules?', 'a' => 'Residents must respect all staff and residents, keep shared spaces clean, attend scheduled workshops, pay program fees on time, and follow all safety policies. No violence or illegal substances.'],
        ];

        foreach ($faqs as $index => $faq) {
            Faq::query()->updateOrCreate(
                ['question' => $faq['q']],
                [
                    'answer' => $faq['a'],
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }
}
