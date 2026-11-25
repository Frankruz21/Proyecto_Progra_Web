<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//seeder usuarios y roles
use Database\Seeders\UsuariosRoles\RoleSeeder;
use Database\Seeders\UsuariosRoles\UserSeeder;
use Database\Seeders\UsuariosRoles\SolicitudInstructorSeeder;
use Database\Seeders\UsuariosRoles\PerfilInstructorSeeder;
use Database\Seeders\UsuariosRoles\DatoFiscalSeeder;

//cursos
use Database\Seeders\Cursos\CategoriaSeeder;
use Database\Seeders\Cursos\CursoSeeder;
use Database\Seeders\Cursos\RutaAprendizajeSeeder;
use Database\Seeders\Cursos\CursoRutaSeeder;
use Database\Seeders\Cursos\TestimonioSeeder;
use Database\Seeders\Cursos\ModuloSeeder;
use Database\Seeders\Cursos\LeccionSeeder;
use Database\Seeders\Cursos\ExamenSeeder;
use Database\Seeders\Cursos\PreguntaExamenSeeder;
use Database\Seeders\Cursos\OpcionPreguntaSeeder;
use Database\Seeders\Cursos\IntentoExamenSeeder;
use Database\Seeders\Cursos\RespuestaIntentoSeeder;
use Database\Seeders\Cursos\RespuestaOpcionSeeder;
use Database\Seeders\Cursos\EjercicioCodigoSeeder;
use Database\Seeders\Cursos\CasoPruebaSeeder;
use Database\Seeders\Cursos\EnvioCodigoSeeder;
use Database\Seeders\Cursos\RecursoSeeder;

//catalogo
use Database\Seeders\Catalogo\NivelSeeder;
use Database\Seeders\Catalogo\IdiomaSeeder;

//CarritoPagos
use Database\Seeders\CarritoPagos\CarritoSeeder;
use Database\Seeders\CarritoPagos\CuponSeeder;
use Database\Seeders\CarritoPagos\DetalleOrdenSeeder;
use Database\Seeders\CarritoPagos\ItemsCarritoSeeder;
use Database\Seeders\CarritoPagos\OrdenSeeder;
use Database\Seeders\CarritoPagos\PagoSeeder;

//Facturacion
use Database\Seeders\Facturacion\EmpresaSeeder;
use Database\Seeders\Facturacion\CaiRangoSeeder;
use Database\Seeders\Facturacion\FacturaSeeder;
use Database\Seeders\Facturacion\DetalleFacturaSeeder;
use Database\Seeders\Facturacion\BitacoraAuditoriaSeeder;

//Matricula
use Database\Seeders\Matricula\MatriculaSeeder;
use Database\Seeders\Matricula\ProgresoSeeder;
use Database\Seeders\Matricula\CertificadoSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {

        $this->call([
            //usuarios
            RoleSeeder::class,
            UserSeeder::class,
            SolicitudInstructorSeeder::class,

            //cursos
            CategoriaSeeder::class,

            //catalogo
            NivelSeeder::class,
            IdiomaSeeder::class,

            //usuarios
            PerfilInstructorSeeder::class,
            DatoFiscalSeeder::class,

            //cursos
            CursoSeeder::class,
            RutaAprendizajeSeeder::class,
            CursoRutaSeeder::class,
            TestimonioSeeder::class,
            ModuloSeeder::class,
            LeccionSeeder::class,
            ExamenSeeder::class,
            PreguntaExamenSeeder::class,
            OpcionPreguntaSeeder::class,
            IntentoExamenSeeder::class,
            RespuestaIntentoSeeder::class,
            RespuestaOpcionSeeder::class,
            EjercicioCodigoSeeder::class,
            CasoPruebaSeeder::class,
            EnvioCodigoSeeder::class,
            RecursoSeeder::class,

            //CarritoPagos
            CuponSeeder::class,
            CarritoSeeder::class,
            ItemsCarritoSeeder::class,
            OrdenSeeder::class,
            DetalleOrdenSeeder::class,
            PagoSeeder::class,

            //Facturacion
            EmpresaSeeder::class,
            CaiRangoSeeder::class,
            FacturaSeeder::class,
            DetalleFacturaSeeder::class,
            BitacoraAuditoriaSeeder::class,

            //Matricula
            MatriculaSeeder::class,
            ProgresoSeeder::class,
            CertificadoSeeder::class,

        ]);
    }
}
