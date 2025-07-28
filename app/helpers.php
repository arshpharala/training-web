<?php

use App\Models\CMS\Page;
use App\Models\CMS\Locale;
use App\Models\Catalog\Category;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return \App\Models\Setting::where('key', $key)->value('value') ?? $default;
    }
}

if (!function_exists('page_content')) {
    function page_content(string $sectionType, string $key, $default = null)
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

        if ($key == 'image') return  asset('storage/'. $section->image);


        $translation = $section->translations->firstWhere('locale', $locale);
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
            ->has('courses')
            ->with('translation', 'courses.translation')
            ->orderBy('position')
            ->get();
    }
}
