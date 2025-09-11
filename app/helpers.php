<?php

use App\Models\CMS\Page;
use App\Models\CMS\Locale;
use App\Models\Catalog\Course;
use App\Models\Catalog\Category;
use App\Models\CMS\Currency;
use Illuminate\Support\Facades\Cache;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return \App\Models\Setting::where('key', $key)->value('value') ?? $default;
    }
}

if (!function_exists('page_content')) {
    function page_content(string $sectionType, string $key, $default = null, $removePTags = false)
    {
        $slug = request()->segment(1) ?: 'home';
        $locale = app()->getLocale();

        $page = once(function () use ($slug, $locale) {
            return Page::with([
                'metas',
                'translation',
                'sections.translations' => fn($q) => $q->where('locale', $locale),
            ])
                ->where('slug', $slug)
                ->where('is_active', true)
                ->first();
        });

        if (!$page) return $default;

        $section = $page->sections->firstWhere('type', $sectionType);
        if (!$section) return $default;

        if ($key == 'image') return  asset('storage/' . $section->image);


        $translation = $section->translations->firstWhere('locale', $locale);

        // remove start and end <p> tags from the content and keep the inner content only
        if ($removePTags) {
            return $translation->{$key} ? preg_replace('/^<p>(.*)<\/p>$/s', '$1', $translation->{$key}) : $default;
        }
        return $translation->{$key} ?? $default;
    }
}



if (!function_exists('active_locals')) {
    function active_locals()
    {
        return Locale::pluck('code')->toArray() ?? ['en'];
    }
}

if (!function_exists('render_meta_tags')) {
    function render_meta_tags($meta = null)
    {
        $defaultTitle = config('app.name', 'Xacedemia');
        $defaultDescription = 'Welcome to ' . $defaultTitle . ' | Training Provider.';
        $defaultKeywords = 'Global Training Provider';

        $title = $meta->meta_title ?? $defaultTitle;
        $description = $meta->meta_description ?? $defaultDescription;
        $keywords = $meta->meta_keywords ?? $defaultKeywords;

        return <<<HTML
            <title>{$title}</title>
            <meta name="description" content="{$description}">
            <meta name="keywords" content="{$keywords}">
        HTML;
    }
}

if (!function_exists("convertStringToSlug")) {
    function convertStringToSlug($string)
    {
        // Remove HTML tags and get plain text content
        $string = strip_tags($string);
        // Remove '&nbsp;' entity
        $string = str_replace('&nbsp;', ' ', $string);

        // Convert to lowercase and remove leading/trailing whitespaces
        $trimmedText = strtolower(trim($string));

        // Replace non-alphanumeric characters with hyphens
        $trimmedText = preg_replace('/[^a-z0-9]+/', '-', $trimmedText);

        // Remove consecutive hyphens
        $trimmedText = preg_replace('/-+/', '-', $trimmedText);

        // Remove leading and trailing hyphens
        $trimmedText = trim($trimmedText, '-');

        return $trimmedText;
    }
}

if (!function_exists("menu_cataloge")) {
    function menu_cataloge()
    {
        return Category::query()
            ->catalog()
            ->whereHas('topics.courses') // only categories that have courses via topics
            ->with([
                'translation',
                'topics.translation',
                'topics.courses.translation'
            ])
            ->orderBy('position')
            ->get();
    }
}

if (!function_exists('courses')) {
    function courses()
    {
        $locale = app()->getLocale();

        return Cache::remember('courses_all_' . $locale, 3600, function () use ($locale) {
            return Course::query()
                ->withJoins()
                ->withSelection()
                ->where('courses.is_active', true)
                ->orderBy('courses.created_at', 'desc')
                ->groupBy('courses.id')
                ->get();
        });
    }
}

if (!function_exists('clear_course_cache')) {
    function clear_course_cache()
    {
        foreach (active_locals() as $locale) {
            Cache::forget('courses_all_' . $locale);
        }
    }
}


if (!function_exists('active_currency')) {
    /**
     * When $obj = true, returns the Currency row (cached).
     * Otherwise returns the code string (e.g. 'AED').
     */
    function active_currency(bool $obj = false)
    {
        static $active = null;

        if ($active === null) {
            // TODO: swap this for your real “current site / session” currency
            $active = Currency::default()->first();

            if ($active->code === 'AED') {
                $active->symbol = '<span class="dirham-symbol">&#xea;</span>';
            }
        }

        return $obj ? $active : ($active?->code ?? 'GBP');
    }
}


if (!function_exists('price_format')) {
    /**
     * Format price according to currency settings.
     *
     * @param string $ccy  Currency code (e.g., AED, USD, EUR)
     * @param float  $amt  Amount to format
     * @return string
     */
    function price_format(string $ccy, float $amt, $decimal = null): string
    {
        $currency = Currency::where('code', $ccy)->first();

        if (!$currency) {
            return number_format($amt, 2); // fallback
        }

        if ($currency->code === 'AED') {
            $currency->symbol = '<span class="dirham-symbol">&#xea;</span>';
        }

        $formattedAmount = number_format(
            $amt,
            $decimal ?? $currency->decimal ?? 2,
            $currency->decimal_separator ?? '.',
            $currency->group_separator ?? ','
        );

        return $currency->currency_position === 'Left'
            ? $currency->symbol . ' ' .  $formattedAmount
            : $formattedAmount . $currency->symbol;
    }
}

