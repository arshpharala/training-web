<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Catalog\Topic;
use App\Models\Catalog\Course;
use App\Models\Catalog\Category;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {

        // return $this->test();

    }

    function test()
    {
        // DB::beginTransaction();

        // try {

        //     // Delete all courses
        //     Course::withTrashed()->with(['translations', 'deliveryMethods', 'metas'])->chunkById(100, function ($courses) {
        //         foreach ($courses as $course) {
        //             $course->translations()->delete();
        //             $course->deliveryMethods()->detach();
        //             if (method_exists($course, 'metas')) {
        //                 $course->metas()->delete();
        //             }

        //             $course->forceDelete();

        //         }
        //     });

        //     // Delete all topics
        //     Topic::withTrashed()->with(['translations', 'metas'])->chunkById(100, function ($topics) {
        //         foreach ($topics as $topic) {
        //             $topic->translations()->delete();
        //             if (method_exists($topic, 'metas')) {
        //                 $topic->metas()->delete();
        //             }
        //             $topic->forceDelete();
        //         }
        //     });

        //     // Delete all categories
        //     Category::withTrashed()->with(['translations', 'metas'])->chunkById(100, function ($categories) {
        //         foreach ($categories as $category) {
        //             $category->translations()->delete();
        //             if (method_exists($category, 'metas')) {
        //                 $category->metas()->delete();
        //             }
        //             $category->forceDelete();
        //         }
        //     });
        // } catch (\Throwable $th) {
        //     throw $th;
        // }


        return $this->importCourses();
    }

    public function importCourses()
    {
        $path = public_path('assets/json/courses.json'); // adjust path if needed
        $jsonData = file_get_contents($path);
        $courses = json_decode($jsonData, true);

        // DB::beginTransaction();
        // try {
            foreach ($courses as $row) {
                // 1. Category
                $category = Category::firstOrCreate(
                    ['slug' => $row['Category_Slug']],
                    [
                        'position' => (int)($row['Core_Position'] ?? 0),
                        'is_active' => true,
                        'is_featured' => false,
                    ]
                );

                // Ensure category translation
                $category->translations()->updateOrCreate(
                    ['locale' => app()->getLocale()],
                    [
                        'name' => $row['Category'],
                        'short_description' => $row['Category_Description'] ?? null
                    ]
                );

                // 2. Topic (sub-category)
                $topic = Topic::firstOrCreate(
                    [
                        'slug' => $row['Sub_Category_Slug'],
                        'category_id' => $category->id
                    ],
                    [
                        'position' => 0,
                        'is_active' => true,
                        'is_featured' => false,
                    ]
                );

                $topic->translations()->updateOrCreate(
                    ['locale' => app()->getLocale()],
                    ['name' => $row['Sub_Category']]
                );

                // 3. Course
                $course = Course::firstOrCreate(
                    [
                        'slug' => $row['Course_Slug'],
                        'topic_id' => $topic->id
                    ],
                    [
                        'position' => (int)($row['Course_Position'] ?? 0),
                        'duration' => (int)($row['Course_Duration'] ?: 1),
                        'default_price' => (float)($row['Price_GBP'] ?? 0),
                        'is_active' => true,
                        'is_featured' => false,
                    ]
                );

                $course->translations()->updateOrCreate(
                    ['locale' => app()->getLocale()],
                    ['name' => $row['Course_Name']]
                );
            }

            // DB::commit();
            return "Courses imported successfully.";
        // } catch (\Throwable $e) {
        //     DB::rollBack();
        //     throw $e;
        // }
    }


    public function addCountryStateCity()
    {
        // die;
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', "-1");
        $jsonData   =   file_get_contents("countries-states-cities.json");
        $countries  =   json_decode($jsonData, true);

        // $countries  =   $jsonArray['countries'];
        // $states     =   $jsonArray['states'];
        // $cities     =   $jsonArray['cities'];
        // dd($countries);
        foreach ($countries as $country) {
            $countryObject                  =   new Country();
            $countryObject->name            =   $country['name'];
            $countryObject->iso3            =   $country['iso3'];
            $countryObject->iso2            =   $country['iso2'];
            $countryObject->numeric_code    =   $country['numeric_code'];
            $countryObject->phone_code      =   $country['phonecode'];
            $countryObject->currency        =   $country['currency'];
            $countryObject->save();
            foreach ($country['states'] as $state) {
                $stateObject                =   new State();
                $stateObject->country_id    =   $countryObject->id;
                $stateObject->name          =   $state['name'];
                $stateObject->state_code    =   $state['state_code'];
                $stateObject->save();
                foreach ($state['cities'] as $city) {
                    $cityObject             =   new City();
                    $cityObject->state_id   =   $stateObject->id;
                    $cityObject->name       =   $city['name'];
                    $cityObject->save();
                }
            }
        }
        echo "done";
    }
}
