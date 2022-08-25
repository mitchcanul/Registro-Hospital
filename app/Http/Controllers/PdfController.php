<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        // $this->fpdf = new Fpdf;
        $this->fpdf = new Fpdf($orientation='P',$unit='mm');
    }
    public function imprimirPdfP(Request $request){
        // conexion a base de datos
            // require 'cn.php';
            //$consulta = DB::select("SELECT id_hospital, id_ciudad, nombres, apellido_p, apellido_m, edad, sexo, fecha_nacimiento, fecha_inscripcion, nombre_tutor, telefono_tutor FROM pacientes WHERE id_paciente=$request->id_paciente");
            //dd($consulta);
            //$resultado = $mysqli->query($consulta);
           // $union= "SELECT nombre_hospital FROM hospitales INNER JOIN pacientes WHERE hospitales.id_hospital = pacientes.id_hospital";
            // $result = $mysqli->query($union);
            $consulta=Paciente::find($request->id_paciente);

            //
            // $union = "SELECT id_hospital FROM pacientes INNER JOIN hospitales WHERE $request->pacientes.id_hospital=$request-> hospitales.id_hospital";

            // conexion a base de datos
            $this->fpdf->AddPage();
            $this->fpdf->SetFont('Arial','',12);
            $textypos = 5;
            $this->fpdf->setY(12);
            $this->fpdf->setX(10);


            // Agregamos los datos de la empresa
            //while($row = $consulta->fetch_assoc()){
            $this->fpdf->SetFont('Arial','B',24);
            $this->fpdf->Cell(25,5, "Hospital infantil ");
            $this->fpdf->Ln(20);
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(20,5, "DATOS DEL PACIENTE");
            $this->fpdf->Ln(10);
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(20,5, "Hospital : ");

            $this->fpdf->SetFont('Arial','',12);

            $this->fpdf->Cell(60,5,iconv('UTF-8', 'windows-1252', $consulta->hospitales->nombre_hospital),0,0,'C',0);
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','B',14);
             $this->fpdf->Cell(20,5, "Ciudad : ");
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(20,5,iconv('UTF-8', 'windows-1252', $consulta->ciudades->nombre_ciudad),0,0,'C',0);
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(20,5, "Nombres : ");
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(35,5,iconv('UTF-8', 'windows-1252',$consulta->nombres),0,0,'C',0);
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(20,5, "Apellido Paterno : ");
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(67,5,iconv('UTF-8', 'windows-1252',$consulta->apellido_p),0,0,'C',0);
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(20,5, "Apellido materno : ");
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(60,5,iconv('UTF-8', 'windows-1252',$consulta->apellido_m),0,0,'C',0);
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(20,5, "Edad : ");
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(2,5,iconv('UTF-8', 'windows-1252',$consulta->edad),0,0,'C',0);
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(25,5, "Sexo : ");
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(10,5,iconv('UTF-8', 'windows-1252',$consulta->sexo),0,0,'C',0);
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(20,5, "Fecha de nacimiento : ");
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(90,5,iconv('UTF-8', 'windows-1252',$consulta->fecha_nacimiento),0,0,'C',0);
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(20,5, "Fecha de inscripcion : ");
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(90,5,iconv('UTF-8', 'windows-1252',$consulta->fecha_inscripcion),0,0,'C',0);
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(20,5, "Nombre del tutor : ");
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(90,5,iconv('UTF-8', 'windows-1252',$consulta->nombre_tutor),0,0,'C',0);
            $this->fpdf->Ln();
            $this->fpdf->SetFont('Arial','B',14);
            $this->fpdf->Cell(20,5, "Telefono del tutor : ");
            $this->fpdf->SetFont('Arial','',12);
            $this->fpdf->Cell(75,5,iconv('UTF-8', 'windows-1252',$consulta->telefono_tutor),0,0,'C',0);

            $this->fpdf->Ln();
            $this->fpdf->Ln();
            $this->fpdf->Ln();

            /// Apartir de aqui empezamos con la tabla de productos

            /////////////////////////////
            //// Array de Cabecera

            $header = array("FECHA DE CITA", "SALA","MOTIVO DE CITA");
            //// Arrar de Productos
            $products = array(
                array("25/AGOSTO/2022", "Sala pedriatria","Revision de peso de acuerdo a dieta",0),
                array("25/SEPTIEMBRE/2022", "Dentista","Muela picada",0,),
                array("25/OCTUBRE/2022", "Nutriologo","Plan de alimentacion",0),
                array("25/NOVIEMBRE/2022", "Cardiólogo","Revision de corazon",0),
                array("25/DICIEMBRE/2022", "Cardiólogo","Revisión de corazon",0),
            );
                // Column widths
                $w = array(60, 50, 80);
                // Header
                for($i=0;$i<count($header);$i++)
                    $this->fpdf->Cell($w[$i],7,$header[$i],1,0,'C');
                $this->fpdf->Ln();
                // Data
                $total = 0;
                foreach($products as $row)
                {
                    $this->fpdf->Cell($w[0],6,$row[0],1);
                    $this->fpdf->Cell($w[1],6,$row[1],1);
                    $this->fpdf->Cell($w[2],6,$row[2],1);



                    $this->fpdf->Ln();


                }

                    $this->fpdf->Output();

                    exit;

    }
}
