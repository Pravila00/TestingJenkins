<?php
require __DIR__ . "/../src/Marks.php";

use PHPUnit\Framework\TestCase;
use pravila\Marks;

class MarksTest extends TestCase
{
    protected $Marks;
    protected $array_marks;
    protected $array_ponderations;

    protected function setUp() : void
    {
        //Datos de array_marks
        $this->array_marks[79][] = 100;
        $this->array_marks[79][] = 100;
        $this->array_marks[79][] = 100;
        $this->array_marks[79][] = 100;

        $this->array_marks[99][] = 100;
        $this->array_marks[99][] = 100;
        $this->array_marks[99][] = 100;
        $this->array_marks[99][] = 100;
        $this->array_marks[99][] = 90;
        $this->array_marks[99][] = 90;
        $this->array_marks[99][] = 90;
        $this->array_marks[99][] = 80;

        $this->array_marks[81][] = 100;

        //Autoevaluaciones
        $this->array_ponderations[79]['ponderation'] = 40;
        //Actividades con buzon
        $this->array_ponderations[99]['ponderation'] = 20;
        //Examenes
        $this->array_ponderations[81]['ponderation'] = 40;

        //Set up Marks object
        $this->Marks = new Marks();
    }

    public function testCalculationOfMean()
    {
        $numbers = [3, 7, 6, 1, 5];
        $result_mean = $this->Marks->get_mean_of_values($numbers);
        //Compares that both values are equal
        $this->assertEquals(4.4, $result_mean);
    }

    public function testFinalMark()
    {
        $final_mark = $this->Marks->get_final_mark($this->array_ponderations,$this->array_marks);
        //Check if the value returned is a number
        $this->assertIsNumeric(
            $final_mark,
            "actual value is Numeric or not"
        );
        //Check the final mark is 98.75
        $this->assertEquals(97.75,$final_mark);
    }
}
