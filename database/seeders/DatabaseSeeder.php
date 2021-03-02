<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Profile;
use App\Models\Tax;
use App\Models\TaxGroup;
use App\Models\User;
use Database\Factories\ProfileFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::unprepared(file_get_contents(database_path('sql/countries.sql')));
        \Illuminate\Support\Facades\DB::unprepared(file_get_contents(database_path('sql/states.sql')));
        \Illuminate\Support\Facades\DB::unprepared(file_get_contents(database_path('sql/cities.sql')));


        $u = User::factory()->create([
            'email'=>'test@test.com',
            'password'=>Hash::make('gfhjkm')
            ]);
        $u->profile()->save(Profile::factory()->make());

        User::factory(50)->create()->each(function($u){
            $u->profile()->save(Profile::factory()->make());
        });

        Product::factory(50)->create();

        ProductAttribute::factory()->create(['name'=>'width', 'default_value'=>'30']);
        ProductAttribute::factory()->create(['name'=>'height', 'default_value'=>'50']);
        ProductAttribute::factory()->create(['name'=>'print_width', 'default_value'=>'5400']);
        ProductAttribute::factory()->create(['name'=>'print_height', 'default_value'=>'7200']);

        TaxGroup::factory()->create(['name'=>"Standart rates"]);
        TaxGroup::factory()->create(['name'=>"Maps rates"]);
        TaxGroup::factory()->create(['name'=>"Reduced rates"]);
        TaxGroup::factory()->create(['name'=>"Zero rates"]);

        $standart_rates_json = json_decode(file_get_contents(database_path('json/standart_rates.json')));
        foreach($standart_rates_json as $tax){
            $tax_group = TaxGroup::where('name','Standart rates')->first()->pluck('id');
            $country = Country::where('sortname',$tax->sortname)->first();
            if($tax_group && $country){
                Tax::factory()->create([
                    'tax_group_id'=>$tax_group,
                    'country_id'=>$country->id,
                    'postcode'=>$tax->postcode,
                    'name'=>$tax->name,
                    'rate'=>$tax->rate,
                    'priority'=>$tax->priority,
                    'compound'=>$tax->compound,
                    'applied_to_shipping'=>$tax->applied_to_shipping
                ]);
            }
        }

        $map_rates_json = json_decode(file_get_contents(database_path('json/maps_rates.json')));
        foreach($map_rates_json as $tax){
            $tax_group = TaxGroup::where('name','Maps rates')->first()->pluck('id');
            $country = Country::where('sortname',$tax->sortname)->first();
            if($tax_group && $country){
                Tax::factory()->create([
                    'tax_group_id'=>$tax_group,
                    'country_id'=>$country->id,
                    'postcode'=>$tax->postcode,
                    'name'=>$tax->name,
                    'rate'=>$tax->rate,
                    'priority'=>$tax->priority,
                    'compound'=>$tax->compound,
                    'applied_to_shipping'=>$tax->shipping
                ]);
            }
        }
    }
}
