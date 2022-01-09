<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create([
            'active'  => '0',
            'name'  => 'Ignác Hujer',
            'slug'  => Str::slug('Ignác Hujer'),
            'function'  => 'Kuriér',
            'description'  => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam sed possimus quo delectus, qui nihil!
            Ut molestiae distinctio delectus eum, ad laudantium quae, suscipit iure explicabo ullam officia hic molestias.
            Fuga facilis aliquam quia animi, corporis necessitatibus iste laborum, reiciendis a dolore eum exercitationem veritatis?',
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

        Testimonial::create([
            'active'  => '1',
            'name'  => 'Jana Ostrolúcka',
            'slug'  => Str::slug('Jana Ostrolúcka'),
            'function'  => 'Predavačka kvetov',
            'description'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, neque temporibus. Natus!
            Fugit iusto, dolor odit assumenda recusandae laudantium harum blanditiis autem suscipit eum.
            Et velit nisi tempora, eveniet quo labore officiis totam perferendis veritatis eos?
            Debitis modi facilis assumenda inventore! Omnis et sint magnam quae veritatis quis.',
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

        Testimonial::create([
            'active'  => '1',
            'name'  => 'Mgr. Peter Vyletel',
            'slug'  => Str::slug('Mgr. Peter Vyletel'),
            'function'  => 'Výrobca výživových doplnkov',
            'description'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Officiis possimus sit odit magni quisquam tempora saepe?
            Non tempore beatae neque minima eum aut velit!
            Nostrum adipisci saepe corrupti cupiditate natus atque dignissimos.
            Magnam numquam corporis sed, necessitatibus voluptate nisi quam!',
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

        Testimonial::create([
            'active'  => '1',
            'name'  => 'Fedor Weldon',
            'slug'  => Str::slug('Fedor Weldon'),
            'function'  => 'Poštár',
            'description'  => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur architecto culpa quas fugiat quia consequuntur iure corrupti facere.
            Deserunt, inventore voluptatem dolorum provident expedita veritatis ullam ex quibusdam blanditiis aspernatur nobis accusantium ea suscipit quas corporis!',
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);

        Testimonial::create([
            'active'  => '1',
            'name'  => 'Dáša Gallová',
            'slug'  => Str::slug('Dáša Gallová'),
            'function'  => 'Holička',
            'description'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum at, rem nam exercitationem minus tenetur perferendis officiis.',
            'created_by' => rand(2,15),
            'updated_by' => rand(2,15),
        ]);
    }
}
