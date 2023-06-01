<?php

namespace Database\Seeders;

use App\Models\Videohero;
use Illuminate\Database\Seeder;

class VideoheroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Videohero::factory()->times(3)->create();

          $video = [
              [
                  'title' => 'Hola. Es un gozo en Dios darles la bienvenida a la pagina de nuestra congregación.',

                'content' => 'Esperando brindarles muchas opciones que les sean útiles, para que puedan tener cada día
                una mejor relación con Él. Por eso nuestra Misión es que seamos las herramientas
                de honra en las manos de YHVH, para alcanzar a los perdidos, y así el Espíritu Santo establezca su REINO
                en el corazón de los salvos y a la vez equiparlos. Para que puedan ejercer las diferentes funciones de
                servicio como iglesia del Señor que somos reconciliando a las personas con Dios y creciendo hasta la
                estatura de nuestro Salvador Jesucristo (Efesios 4. 11-13).
                Estableciendo muchos grupos de Hijos de Dios en todas partes del globo terráqueo. ',
                
                'img' => 'founder.jpg',
                
                'url_video' => 'admin@admin',
          ],
          ];

          foreach ($video as $item) {
            Videohero::create( $item );
          }

    }
}
