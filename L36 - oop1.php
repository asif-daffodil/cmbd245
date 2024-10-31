<?php
class studentInfo
{
    public $name = "Md Alamin";
    protected $area = "Dhanmondi";
    protected $city = "Dhaka";
    protected $country = "Bangladesh";
    private $phone = "01700000000";
    public const gender = "Male";
    public static $age = 25;

    public function studentName()
    {
        return "Student name is : " . $this->name . " and phone number is : " . $this->phone;
    }

    public function __construct()
    {
        echo "This is a constructor <br>";
    }

    public function __destruct()
    {
        echo "This is a destructor <br>";
    }

    public static function studentAge()
    {
        return "Student age is : " . self::$age;
    }
}

$student = new studentInfo();
echo $student->name . "<br>";
// echo $student->area . "<br>";
// echo $student->phone . "<br>";
$student->name = "Md Rubel";
echo $student->studentName() . "<br>";
echo $student::gender . "<br>";
echo $student::$age . "<br>";
echo $student::studentAge() . "<br>";

// inheritance
class studentInfo2 extends studentInfo
{

    public function address()
    {
        // echo $this->phone;
        return $this->area . ", " . $this->city . ", " . $this->country;
    }

    public function __construct()
    {
        return;
    }

    public function __destruct()
    {
        return;
    }
}

$student2 = new studentInfo2();
echo $student2->address() . "<br>";
