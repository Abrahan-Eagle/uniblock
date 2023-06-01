<?php

namespace Database\Seeders;

use App\Models\Historyabout;
use Illuminate\Database\Seeder;

class HistoryaboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = [
            [
            'title' => 'Quizás muchos pueden llegar a preguntarse como empezó a reunirse Centro Refugio Hefzi-bá.',
           
            'content' => 'Pues aquí les cuento nuestros inicios. 
            A principio del año 1998 en mi casa nos comenzamos a reunir mi esposa Nelly y yo con un grupo de
            hermanos a los cuales yo los había pastoreado un tiempo atrás, en una congregación de la localidad del
            Socorro en Valencia, Vzla. Pero debido que tenían tiempo que su congregación no funcionó mas, nos pidieron a
            Nelly y a mí si les podíamos pastorear, oramos a Dios y después de Él nos dió su respuesta de que si lo hiciéramos,
            empezamos a reunirnos.
            Después de varios días de reuniones, nos surgió la pregunta de como llamaríamos a la congregación que estaba
            naciendo. Dios nos llevó al libro de Isaías cap. 62 vers. 2 al 4 y allí nos decía que Él se deleitaba con la
            nueva congregación y por eso le debíamos poner HEFZI-BÁ, inmediatamente hubo la conexión divina de nosotros
            con el nombre que Dios nos había colocado como su pueblo que eramos.
            Is. 62,2-4: "Entonces las naciones verán tu justicia,
            Y todos los reyes, tu gloria.
            Y te será dado un nombre nuevo,
            Que la boca de YHVH pronunciará.
            3 Serás corona fúlgida en la mano de
            YHVH,
            Y diadema real en la palma de tu
            Dios.
            4 Nunca más serás llamada la
            Desamparada,
            Ni tu tierra, la Desolada,
            Sino que serás llamada Hefzi-bá,° y
            tu país, Beula,°
            Porque el amor de YHVH estará
            contigo
            Y tu tierra tendrá marido,"
            Así fueron nuestros inicios como congregación y ahora obedecemos a Dios y esperamos la segunda venida de
            nuestro Rey y Salvador Jesús.
            Mientras tanto hacemos su voluntad accionando en el ministerio de la reconciliación que Jesús nos dejo.
            ',
           
            'img' => 'founder.jpg',
           
            'url_video' => 'admin@admin',
            ],
        ];

        foreach ($about as $item) {
            Historyabout::create( $item );
        }
    }
}
