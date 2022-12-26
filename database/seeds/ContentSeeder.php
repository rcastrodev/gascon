<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/Grupo_801.png',
                'content_1' => 'SOLUCIONES PARA LA INDUSTRIA DEL PETRÓLEO Y EL GÁS',
                'content_2' => '<p>Trabajamos desde 1966 para garantizar productos de alta calidad y confiabilidad.</p>'
            ]);
        }

        Content::create([
            'section_id'    => 2,
            'image'         => 'images/home/Enmascarar_grupo_105.png',
            'content_1'     => 'ASESORAMIENTO, DESARROLLO Y FABRICACIÓN',
            'content_2'     => '<p>Brindamos un servicio de atención personalizada en Yacimientos para cubrir mejor tus necesidades, asesorarte sobre el correcto uso de nuestros productos y estar siempre a disposición para cualquier inquietud o desarrollo de algún nuevo producto.</p>'
        ]);

        /** Fin home page */
        /** Empresa  */

        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 3,
                'order'     => 'AA',
                'image'     => 'images/home/Grupo_801.png'
            ]);
        }

        Content::create([
            'section_id' => 4,
            'image' => 'images/company/gascon-empresa-fabrica.png',
            'image2' => 'images/company/gascon-empresa-administracion.png',
            'content_1' => 'NUESTRA EMPRESA',
            'content_2' => '<p>Establecimientos Gascon S.A. fue creado en 1966 por los mismos tres socios que lo conforman hoy en día, con el fin de construir una Industria Metalúrgica.</p><p>La empresa se vinculó rápidamente al rubro petrolero y comenzó a fabricar repuestos y accesorios para las productoras de crudo, de manera casi inmediata tomaron conciencia de la forma en que había que trabajar para poder ser competentes en este mercado, donde las piezas son exigidas al máximo y la calidad de los materiales deben ser de primerísima línea.</p><p>En tal sentido se desarrollaron una serie de productos basados en piezas importadas alcanzando el nivel deseado y cumpliendo con las exigencias de los clientes, por ser productos probados en distintas partes del mundo.</p><p>Hoy en día cuenta con una planta industrial equipada y con la ayuda de los hijos y nietos de los creadores trabajando en la empresa.</p>',
            'content_3' => 'Planta Industrial y Administración: Lincoln Nº 1441, Villa Maipú (1650) San Martín, Buenos Aires, Argentina',
        ]);
         
        Content::create([
            'section_id'    => 5,
            'content_1'     => 'Nos distinguimos de nuestra competencia por:',
            'content_2'     => '<ul><li>Antigüedad en el mercado.</li><li>Conciencia del uso de los materiales.</li>
            <li>Experiencia con presencia en los yacimientos.</li></ul>',
            'content_3'     => '<ul><li>Piezas de primerísima calidad y rendimiento</li><li>Respeto por el medio ambiente.</li><li>Respuesta rápida de acuerdo a las necesidades.</li></ul>',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'AA',
            'content_1'     => 'VISIÓN',
            'content_2'     => '<p>Ser distinguidos por la industria petroléra y gasífera Latinoamericana como una empresa abocada al desarrollo de elementos de boca de pozo y de medición de caudal de gas de primerísima calidad, rendimiento y fuerte sentido de responsabilidad social.</p>',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'BB',
            'content_1'     => 'MISION',
            'content_2'     => '<p>Proveer productos de calidad y un destacado servicio a toda la industria vinculada con el petróleo y gas trabajando con responsabilidad y eficacia en todos los niveles de nuestra organización, colaborando a la vez con el cuidado del medio ambiente.</p>',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'CC',
            'content_1'     => 'RESPONSABILIDAD SOCIAL',
            'content_2'     => '<p>Contribuir al medio ambiente con la “Linea Ecológica” que cuenta con productos desarrollados para la industria petrolera, diseñados para evitar cualquier tipo de daño al medio ambiente. Colaboramos con entidades como Bomberos Voluntarios, Clínica Medica, entre otros.</p>',
        ]);
        
        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'image'     => 'images/company/Enmascarar_grupo_88.png',
            'content_1' => 'Grupo Argentino de Proveedores Petroleros',
            'content_2' => 'www.gapp-oil.com.ar',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'BB',
            'image'     => 'images/company/Enmascarar_grupo_89.png',
            'content_1' => 'Registro SICLAR Nº 400066',
            'content_2' => 'www.siclar.com',
        ]);
        
        Content::create([
            'section_id' => 7,
            'order'     => 'CC',
            'image'     => 'images/company/Enmascarar_grupo_90.png',
            'content_1' => 'Achilles: Supplier Information & Supply Chain',
            'content_2' => 'www.achilles.com',
        ]);
        
        /** fin empresa  */
        /** Clientes */
        Content::create([
            'section_id' => 8,
            'image'     => 'images/clients/Grupo_801.png',
            'content_1' => 'Clientes',
        ]);
        
        Content::create([
            'section_id' => 9,
            'order'     => 'AA',
            'image'     => 'images/clients/Grupo_810.png',
            'content_1' => 'YPF',
        ]);
        /** Fin clientes */
        /** Representantes */
        Content::create([
            'section_id' => 10,
            'image'     => 'images/representatives/Grupo_801.png',
            'content_1' => 'Representantes',
        ]);

        Content::create([
            'section_id' => 11,
            'order'     => 'AA',
            'image'     => 'images/representatives/Grupo_810.png',
            'content_1' => 'Terramar SRL',
            'content_2' => 'Comodoro Rivadavia',
            'content_3' => 'Argentina www.terramar.com.ar',
        ]);
        /** Fin representantes */
        /** Oficinas */
        Content::create([
            'section_id' => 12,
            'image'     => 'images/offices/Grupo_801.png',
            'content_1' => 'Oficinas',
        ]);

        Content::create([
            'section_id' => 13,
            'order'     => 'AA',
            'content_1' => 'Oficina Neuquén',
            'content_2' => 'Sr. Eduardo',
            'content_3' => '+541147559290|+54 11 4755-9290',
            'content_4' => 'gcollazo@gascon.com.ar',
        ]);
        /** Fin Oficinas */
        /** Novedades */
        Content::create([
            'section_id' => 14,
            'image'     => 'images/offices/Grupo_801.png',
            'content_1' => 'NOVEDADES',
        ]);

        Content::create([
            'section_id' => 15,
            'order'     => 'AA',
            'image'     => 'images/news/Enmascarar_grupo_105.png',
            'content_1' => 'TEE PRENSA DE ALTO RENDIMIENTO',
            'content_2' => '<p>Para satisfacer los requerimientos del mercado, presentamos el Tee prensa de alto rendimiento con un nuevo sistema de empaque que reduce los costos de mantenimiento y operación.</p>',
            'content_3' => 'NUEVO PRODUCTO',
        ]);
        /** Fin Novedades */
        /** Calidad */
        Content::create([
            'section_id' => 16,
            'image'     => 'images/quality/Grupo_801.png',
            'content_1' => 'calidad',
        ]);

        Content::create([
            'section_id'    => 17,
            'order'         => 'AA',
            'image'         => 'images/quality/Grupo_802.png',
            'image2'        => 'images/quality/Grupo_803.png',
            'content_2'     => '        <p>En 1996 Establecimientos Gascón S.A. comenzó a trabajar bajo sistemas de aseguramiento de la calidad. En 1998 se logro certificar el sistema de calidad bajo normas ISO 9000, la certificación fue otorgada por el organismo IRAM.</p>
            <p>En el 2016 Establecimientos Gascon S.A. certificó su Sistema de Gestión de la Calidad bajo Normas API Q1 siguiendo su camino de mejora continua y en busca de ofrecerles a sus clientes mejores estándares de calidad día a día.</p>
            <p>En la actualidad realizamos todos nuestros procesos bajo un Sistema de Gestión de la Calidad según Normas ISO 9001-2015 y API Q1, certificado por el Instituto Americano de Petroleo.</p>',
        ]);

        Content::create([
            'section_id' => 18,
            'order'     => 'AA',
            'image'     => 'images/quality/Grupo_801.png',
            'content_1' => 'PDF Politicas de calidad',
        ]);

        Content::create([
            'section_id' => 18,
            'order'     => 'BB',
            'image'     => 'images/quality/Grupo_801.png',
            'content_1' => 'PDF de APIQR',
        ]);

        Content::create([
            'section_id' => 18,
            'order'     => 'CC',
            'image'     => 'images/quality/Grupo_801.png',
            'content_1' => 'PDF de API Specification Q1',
        ]);


        Content::create([
            'section_id'    => 19,
            'image'         => 'images/quality/Enmascarar_grupo_104.png',
            'content_1'     => 'ENCUESTA DE SATISFACCIÓN DE CLIENTES',
            'content_2'     => '<p>Para poder tener una evaluación de su satisfacción como Cliente y alcanzar los objetivos enunciados solicitamos su colaboración respondiendo el siguiente cuestionario.</p>',
        ]);

        /** Fin Calidad */

    }
}