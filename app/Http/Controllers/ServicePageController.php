<?php

namespace App\Http\Controllers;

use App\Models\ContentListItem;
use App\Models\Faq;
use App\Models\PageSection;
use App\Models\ServiceAudienceCard;

class ServicePageController extends Controller
{
    public function index()
    {
        return view('pages.services', [
            'hero' => PageSection::forKey('services_hero'),
            'residentsSection' => PageSection::forKey('services_residents'),
            'serveSection' => PageSection::forKey('services_serve'),
            'partnersSection' => PageSection::forKey('services_partners'),
            'referralSection' => PageSection::forKey('services_partners_referral'),
            'applySection' => PageSection::forKey('services_apply'),
            'requirementsSection' => PageSection::forKey('services_requirements'),
            'faqSection' => PageSection::forKey('services_faq'),
            'residentsBenefits' => ContentListItem::active()->ordered()
                ->forPageSection('services', 'residents_benefits')
                ->get(),
            'partnersBenefits' => ContentListItem::active()->ordered()
                ->forPageSection('services', 'partners_benefits')
                ->get(),
            'applySteps' => ContentListItem::active()->ordered()
                ->forPageSection('services', 'apply_steps')
                ->get(),
            'requirements' => ContentListItem::active()->ordered()
                ->forPageSection('services', 'requirements')
                ->get(),
            'audienceCards' => ServiceAudienceCard::active()->ordered()->get(),
            'faqs' => Faq::active()->ordered()->get(),
        ]);
    }
}
